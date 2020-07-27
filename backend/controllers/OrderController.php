<?php

namespace backend\controllers;



use common\models\CurrencyModel;
use Yii;
use common\models\OrderModel;
use common\models\SearchOrderModel;
use common\models\GoodsorderModel;
use common\models\GoodsModel;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
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
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => [ 'index','notdone','view','update','updategoods','delete','deletegoods'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * список не выполненных заказов
     */
    public function actionIndex()
    {
        $searchModel = new SearchOrderModel();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider ->query->andWhere(['done'=>false])-> orderBy(['id' => SORT_DESC]);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * список выполненных заказов
     */
    public function actionNotdone()
    {
        $searchModel = new SearchOrderModel();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider ->query->andWhere(['done'=>true])->orderBy(['id' => SORT_DESC]);

        return $this->render('notdone', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    /**
     * просмотр товра в одном заказе
     */
    public function actionView($id)
    {   $modelorder = $this ->findOrderModel($id);
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
            'idxmodel' => $id,
            'done' => $modelorder ->done,
        ]);

    }

    public function actionUpdate($id)
    {

          $model = $this->findOrderModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }
    /**
     *  изменить количество товара в заказе
     */
    public function actionUpdategoods($id){

        $model = $this -> findGoodsOrderModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
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
    /**
     * удалить заказ
     */
    public function actionDelete($id)
    {
        $this->findOrderModel($id)->delete();

        return $this->redirect(['index']);
    }
    /**
     * удалить товар в заказе
     * если товар остался последним, то удаляем веь заказ
     */

    public function actionDeletegoods($id)
    {
        $model =   $this->findGoodsOrderModel($id);

        $count = GoodsOrderModel::find()->where(['order_id' => $model ->order_id])->count();

        if($count <=1){
            $this ->findOrderModel($model ->order_id) ->delete();

            return $this->redirect(['index']);
        }else{
            $model ->delete();

            return  $this->redirect(['view', 'id' => $model -> order_id]);
        }

    }

    /**
     * поиск моделей
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
