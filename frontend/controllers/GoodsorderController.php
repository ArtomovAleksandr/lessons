<?php

namespace frontend\controllers;



use Yii;


use common\models\GoodsModel;
use common\models\OrderModel;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * GoodsorderController implements the CRUD actions for GoodsorderModel model.
 */
class GoodsorderController extends Controller
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
     * Lists all GoodsorderModel models.
     * @return mixed
     */
    public function actionIndex()
    {
        if(Yii::$app->request->isAjax && $res= \Yii::$app->request->post()){
             $name = $res['name'];
             $fone = $res['fone'];
//             var_dump( $res['name']);
//             var_dump( $res['fone']);
//             var_dump( $res['goods']);
             $goods = $res['goods'];
             $countgoods = sizeof($goods);
             $totalorder = 0;
            for($i = 0; $i < $countgoods;$i++)
            {
                $id = $goods[$i]['id'];
            //    var_dump('id = '.$id);
                $goods_one = GoodsModel::find()->where(['id' => $id ])->one();
                $quantity = $goods[$i]['qw'];
          //      var_dump((int)$quantity);
                $price = $goods_one ->getCauntPrice();
                $summ = $price*(int)$quantity;
        //        var_dump('price ='. $summ);
                $totalorder += $summ;


            }
            var_dump('totalorder ='.$totalorder);
            date_default_timezone_set('Europe/Kiev');
            $date = date('Y-m-d H:i:s');
            $db = Yii::$app->db;
            $transaction = $db->beginTransaction();

            try {
                $db ->createCommand()->insert('order',['name'=>$name,
                    'fone'=>$fone,
                    'create_date' => $date])->execute();
                //    'countgoods' => $countgoods,
               //     'totalorder' => $totalorder])->execute();
                $order_id = $db ->getLastInsertID();
                $array=[];
                for($i = 0; $i < $countgoods;$i++)
                {
                    $quantity = $goods[$i]['qw'];
                    $goods_id = $goods[$i]['id'];
                    $nested_array =[(int)$quantity,(int) $order_id,(int)$goods_id];
                    array_push($array, $nested_array);
                }
                var_dump($array);
                $db->createCommand()->batchInsert('goodsorder', ['quantity', 'order_id','goods_id'],  $array )->execute();
                $transaction->commit();
            } catch(\Exception $e) {
                $transaction->rollBack();
                throw $e;
            } catch(\Throwable $e) {
                $transaction->rollBack();
            }

            return 'Запрос принят!';
        }

    }

    /**
     * Displays a single GoodsorderModel model.
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
     * Creates a new GoodsorderModel model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new GoodsorderModel();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing GoodsorderModel model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing GoodsorderModel model.
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
     * Finds the GoodsorderModel model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return GoodsorderModel the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = GoodsorderModel::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
