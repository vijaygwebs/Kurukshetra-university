<?php

namespace backend\controllers;

use backend\models\Departments;
use backend\models\Faculty;
use backend\models\FacultyDesignation;
use backend\models\Subjects;
use Yii;
use backend\models\Designations;
use backend\models\DesignationsSearch;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;
use yii\data\ActiveDataProvider;

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

        if($faculty->load(Yii::$app->request->post()) && $faculty->save())
        {
            $faculty = new Faculty();
            $faculty_designation->faculty_id = Yii::$app->db->getLastInsertID();
            if($faculty_designation->load(Yii::$app->request->post()) && $faculty_designation->save()){
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
