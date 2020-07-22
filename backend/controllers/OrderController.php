<?php

namespace backend\controllers;



use common\models\CurrencyModel;
use Yii;
use common\models\OrderModel;
use common\models\SearchOrderModel;
use common\models\GoodsorderModel;
use common\models\GoodsModel;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * OrderController implements the CRUD actions for OrderModel model.
 */
class OrderController extends Controller
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
     * Lists all OrderModel models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SearchOrderModel();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider ->query->andWhere(['done'=>false]);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    public function actionNotdone()
    {
        $searchModel = new SearchOrderModel();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider ->query->andWhere(['done'=>true]);

        return $this->render('notdone', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    /**
     * Displays a single OrderModel model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $models =  GoodsorderModel::find()->where(['order_id' => $id])->all();

        if($models ===null){
            throw new NotFoundHttpException('OrderController  View $models ===null');
        }

        $total = 0;
        foreach ($models as &$model){
            $obj = GoodsModel::find()->andFilterWhere(['id'=>$model ->goods_id])->one();
            if($obj ===null){
                throw new NotFoundHttpException('OrderController View $obj ===null');
            }
            $model ->num = $obj ->num;
            $model ->catalog = $obj ->catalog;
            $model ->mark = $obj ->mark;
            $model ->name = $obj ->name;
            $model ->price = $obj ->getCauntPrice();
            $count = $model ->quantity;
            $model ->sum = ($model ->price) * $count;
            $total += $model->sum;
        }

        return $this->render('infoorder', [
            'models' => $models,
            'total' => $total,
        ]);
//        return $this->render('view', [
//            'model' => $this->findModel($id),
//        ]);
    }

    /**
     * Creates a new OrderModel model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new OrderModel();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing OrderModel model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
//        $models =   GoodsorderModel::find()->where(['order_id' => $id])->all();
////        $total = 0;
////        foreach ($models as &$model){
////            $obj = GoodsModel::find()->andFilterWhere(['id'=>$model ->goods_id])->one();
////            $model ->num = $obj ->num;
////            $model ->catalog = $obj ->catalog;
////            $model ->mark = $obj ->mark;
////            $model ->name = $obj ->name;
////            $model ->price = $obj ->getCauntPrice();
////            $count = $model ->quantity;
////            $model ->sum = ($model ->price) * $count;
////            $total += $model->sum;
////        }
////
////        return $this->render('infoorder', [
////            'models' => $models,
////            'total' => $total,
////        ]);
          $model = $this->findOrderModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionUpdategoods($id){

        $model = $this -> findGoodsOrderModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
       //     return $this->redirect(['index']);
           return $this->redirect(['view', 'id' => $model -> order_id]);
        }

        if($model ===null){
            throw new NotFoundHttpException('OrderController  Updategoods $model ===null');
        }

        $obj = GoodsModel::find()->andFilterWhere(['id'=>$model ->goods_id])->one();

        if($obj ===null){
            throw new NotFoundHttpException('OrderController  Updategoods $obj ===null');
        }

        $model ->num = $obj ->num;
        $model ->catalog = $obj ->catalog;
        $model ->mark = $obj ->mark;
        $model ->name = $obj ->name;
        $model ->price = $obj ->getCauntPrice();
        $count = $model ->quantity;
        $model ->sum = ($model ->price) * $count;

        return $this->render('update_goods',[
            'model' => $model,
        ]);
    }
    public function actionDelete($id)
    {
        $this->findOrderModel($id)->delete();

        return $this->redirect(['index']);
    }
    public function actionDeletegoods($id)
    {
        $this->findGoodsOrderModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the OrderModel model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return OrderModel the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findGoodsOrderModel($id)
    {
        if (($model =  GoodsorderModel::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
    protected function findOrderModel($id)
    {
        if (($model = OrderModel::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
