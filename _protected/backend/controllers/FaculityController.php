<?php

namespace backend\controllers;

use common\models\Departments;
use common\models\Faculty;
use common\models\FacultyDesignation;
use common\models\Subjects;
use Yii;
use common\models\Designations;
use backend\models\DesignationsSearch;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;
use yii\data\ActiveDataProvider;
use yii\base\Model;
use yii\web\UploadedFile;

/**
 * DesignationsController implements the CRUD actions for Designations model.
 */
class FaculityController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Designations models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Faculty::find(),
            'pagination' => [
                'pageSize' => 20,
            ],
        ]);
        return $this->render('index',['dataProvider'=>$dataProvider]);
    }

    /**
     * add faculty form
     * @return string
     */
    public function actionAddfaculty(){
        $faculty = new Faculty();
        $faculty_designation = new FacultyDesignation();
        $designations = Designations::find()->all();
        $subjects = Subjects::find()->all();
        $department = Departments::find()->all();

        if($faculty->load(yii::$app->request->post() ))
        {
            if(UploadedFile::getInstance($faculty, 'profile_img')!=''){
                $faculty->profile_img = UploadedFile::getInstance($faculty, 'profile_img');
                $faculty->profile_img->saveAs(Yii::getAlias('@upload') . '/avatars/' . $faculty->profile_img->baseName . '.' . $faculty->profile_img->extension);
            }
           $faculty->save();
            $faculty_id = Yii::$app->db->getLastInsertID();


             $count = count($_POST["FacultyDesignation"]);

            $faculty_designation = [new FacultyDesignation()];
            for($i = 1; $i < $count; $i++) {
                $faculty_designation[] = new FacultyDesignation();
            }
                //Load and validate the multiple models

/*                foreach($faculty_designation as $f_designation){


                    if($f_designation->load(yii::$app->request->post()))
                   {
                       echo "<pre>"; print_r($f_designation); die;
                      // $f_designation->faculty_id = $faculty_id;
                       //$f_designation->save(false);
                   }

                }*/

                if (Model::loadMultiple($faculty_designation, Yii::$app->request->post())) {

                    foreach ($faculty_designation as $faculty_designation1) {
                      // echo "<pre>"; print_r($faculty_designation1);
                        $faculty_designation1->faculty_id = $faculty_id;
                        //Try to save the models. Validation is not needed as it's already been done.
                        if(!$faculty_designation1->save(false)){
                           echo "<pre>"; print_r($faculty_designation1->getErrors()); die;
                        }

                    }
                   return $this->redirect('index');
                }

        }


        return $this->render('addfaculty',['faculty'=>$faculty,'faculty_designation'=>$faculty_designation,'designations'=>$designations,'department'=>$department,'subjects'=>$subjects]);
    }

    public function actionViewmember($id){
        $dataProvider = new ActiveDataProvider([
            'query' => FacultyDesignation::find()->where(['faculty_id'=>$id]),
            'pagination' => [
                'pageSize' => 20,
            ],
        ]);
        return $this->render('viewmember',['dataProvider'=>$dataProvider]);
    }

    public function actionGetsubjects($id){
        //Yii::$app->response->format = Response::FORMAT_JSON;
        //return ArrayHelper::map(Subjects::find()->asArray()->all(), 'id', 'subject_name');
        $subjects = Subjects::find()->where(['department_id' => $id])->all();

        if (!empty($subjects)) {
            foreach($subjects as $subject) {
                echo "<option value='".$subject->id."'>".$subject->subject_name."</option>";
            }
        } else {
            echo "<option>-</option>";
        }
    }
    public function actionDeletemember($id){
    $model = Faculty::findOne($id);
        $model->delete();
        return $this->redirect('index');
    }
    public function actionDeletememberdetails($id){
    $model = FacultyDesignation::findOne($id);
        $model->delete();
        return $this->redirect('index');
    }
    public function actionUpdate($id){
        return $this->render('update');
    }

    /**
     * Displays a single Designations model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */

    protected function findModel($id)
    {
        if (($model = Designations::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
