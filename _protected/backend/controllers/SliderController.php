<?php

namespace backend\controllers;

use backend\models\Slides;
use Yii;
use common\models\FrontendSliders;
use common\models\FrontendSlidersSearch;
use yii\web\Controller;
use yii\filters\AccessControl;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\ActiveDataProvider;
use yii\web\UploadedFile;
use common\traits\AjaxStatusTrait;

/**
 * SliderController implements the CRUD actions for FrontendSliders model.
 */
class SliderController extends Controller
{
    use AjaxStatusTrait;
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

            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['index', 'editslider', 'delete', 'create', 'view', 'update', 'editslide', 'createslide', 'deleteslide','quick-status'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    /**
     * Lists all FrontendSliders models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new FrontendSlidersSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single FrontendSliders model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * action to activate or inactivate slider
     * @return array
     */
    public function actionQuickStatus(){
        $request = Yii::$app->request;
        if($request->isAjax) {
            $id = Yii::$app->request->post('id');
            $model = Slides::findOne($id);
             return  $this->changeStatus($model);

        }
    }

    /**
     * Creates a new FrontendSliders model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new FrontendSliders();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing FrontendSliders model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = FrontendSliders::findOne($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing FrontendSliders model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = FrontendSliders::findOne($id);
        $model->delete();

        return $this->redirect(['index']);
    }

    /**Delete the slide of a slider
     * @param $id
     */
    public function actionDeleteslide($id)
    {
        $model = Slides::findOne($id);
        $model->delete();
        return $this->redirect(['editslider', 'id' => $model->slider_id]);


        // return $this->redirect(['editslider','id'=>$model->slider_id]);
    }

    /**
     * action for editing sliders
     * @param $id
     * @return string\
     */
    public function actionEditslider($id)
    {

        $model = new Slides();
        $dataProvider = new ActiveDataProvider([
            'query' => Slides::find()->where(['slider_id' => $id]),
            'pagination' => [
                'pageSize' => 5,
            ],
        ]);

        return $this->render('editslider', ['model' => $model, 'data' => $dataProvider]);
    }

    public function actionEditslide($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            if(!empty(UploadedFile::getInstance($model, 'image')))
            {
               $model->image = UploadedFile::getInstance($model, 'image');
                $model->image->saveAs(Yii::getAlias('@upload') . '/homeslider/' . $model->image->baseName . '.' . $model->image->extension);
            }



            if ($model->validate()) {

                $model->save();
            }
            else
            {
                print_r($model->getErrors()); die;
            }
            return $this->redirect(['editslider', 'id' => $model->slider_id]);

        }
        return $this->render('editslide', ['model' => $model]);
    }

    public function actionCreateslide($id)
    {
        $model = new Slides();
        $model->slider_id =$id;
         $model->status =1;
        // $slideid = Slides::find()->where(['slider_id' => $id]);
        if ($model->load(Yii::$app->request->post())) {

            if(UploadedFile::getInstance($model, 'image')!='')
            {
                $model->image = UploadedFile::getInstance($model, 'image');
            }

            if ($model->validate()) {
                $model->image->saveAs(Yii::getAlias('@upload') . '/homeslider/' . $model->image->baseName . '.' . $model->image->extension);
                $model->save();
            }
            return $this->redirect(['editslider', 'id' => $model->slider_id]);

        }
        return $this->render('editslide', ['model' => $model]);
    }


    /**
     * Finds the FrontendSliders model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return FrontendSliders the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Slides::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
