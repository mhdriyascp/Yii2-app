<?php

namespace backend\controllers;

use Yii;
use common\models\basemodels\Univercity;
use common\models\searchmodels\UnivercitySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * UnivercityController implements the CRUD actions for Univercity model.
 */
class UnivercityController extends Controller
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
     * Lists all Univercity models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UnivercitySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Univercity model.
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
     * Creates a new Univercity model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Univercity();

        if ($model->load(Yii::$app->request->post())){
            $model->created_by = Yii::$app->user->identity->id;
            $model->created_at = Yii::$app->formatter->asTimestamp(date('Y-d-m h:i:s'));
            $model->updated_at = Yii::$app->formatter->asTimestamp(date('Y-d-m h:i:s'));
            if($model->validate() && $model->save()){
               Yii::$app->session->setFlash('success', "Univercity Created Successfully !");
               return $this->redirect(['view', 'id' => $model->univercity_id]); 
            }
        }     

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Univercity model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $model->created_by = Yii::$app->user->identity->id;
            $model->created_at = Yii::$app->formatter->asTimestamp(date('Y-d-m h:i:s'));
            $model->updated_at = Yii::$app->formatter->asTimestamp(date('Y-d-m h:i:s'));
            if($model->validate() && $model->save()){
               Yii::$app->session->setFlash('success', "Univercity Updated Successfully !");
               return $this->redirect(['view', 'id' => $model->univercity_id]); 
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Univercity model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Univercity model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Univercity the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Univercity::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
