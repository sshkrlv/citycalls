<?php

namespace app\modules\admin\controllers;

use app\models\TypeOfProblem;
use app\modules\admin\models\CallViewModel;
use Yii;
use app\models\Call;
use app\models\CallSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use app\models\Customer;

/**
 * CallController implements the CRUD actions for Call model.
 */
class CallController extends Controller
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
     * Lists all Call models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CallSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Call model.
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
     * Creates a new Call model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {

        $model = new Call();

	    $customers = Customer::find()->all();
	    $extraAttributes = new CallViewModel();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            $extraAttributes->load(Yii::$app->request->post());
            $extraAttributes->save($model);

            return $this->redirect(['view', 'id' => $model->callId]);
        }

        return $this->render('create', [
            'model' => $model,
            //'modelTypes' => $modelTypes,
            'customers' => $customers,
            'extraAttributes' => $extraAttributes,
        ]);
    }

    /**
     * Updates an existing Call model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $customers = Customer::find()->all();
        $extraAttributes = new CallViewModel();

        foreach ($model->types as $type){
            array_push($extraAttributes->types, $type->primaryKey);
        }
        foreach ($model->scopes as $scope){
            array_push($extraAttributes->scopes, $scope->primaryKey);
        }
        foreach ($model->technologies as $technology){
            array_push($extraAttributes->technologies, $technology->primaryKey);
        }

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            $extraAttributes->load(Yii::$app->request->post());
            $extraAttributes->save($model);
            return $this->redirect(['view', 'id' => $model->callId]);
        }

        return $this->render('update', [
            'model' => $model,
            'customers' => $customers,

            'extraAttributes' => $extraAttributes,
        ]);
    }

    /**
     * Deletes an existing Call model.
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
     * Finds the Call model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Call the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Call::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
