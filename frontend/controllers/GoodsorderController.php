<?php

namespace frontend\controllers;




use aki\telegram\Telegram;
use aki\telegram\types\Message;
use yii\httpclient\Client;
use Yii;
//use yii\httpclient\Client;

use aki\telegram\base;
use common\models\GoodsModel;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * GoodsorderController implements the CRUD actions for GoodsorderModel model.
 */
class GoodsorderController extends Controller
{

//    public function behaviors()
//    {
//        return [
//            'verbs' => [
//                'class' => VerbFilter::className(),
//                'actions' => [
//                    'delete' => ['POST'],
//                ],
//            ],
//        ];
//    }

    private function sendMessage(){
        date_default_timezone_set('Europe/Kiev');
        $date = date('Y-m-d H:i:s');
        $client = new Client();
       //  koд

    }
    public function actionIndex()
    {
        if(Yii::$app->request->isAjax && $res= \Yii::$app->request->post()){
             $name = $res['name'];
             $fone = $res['fone'];
             $goods = $res['goods'];
             $countgoods = sizeof($goods);
             $totalorder = 0;
            for($i = 0; $i < $countgoods;$i++)
            {
                $id = $goods[$i]['id'];
                $goods_one = GoodsModel::find()->where(['id' => $id ])->one();
                $quantity = $goods[$i]['qw'];
                $price = $goods_one ->getCauntPrice();
                $summ = $price*(int)$quantity;
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



    public function actionMessage()
    {
        $this->sendMessage();
        return $this->redirect('/');
    }


}
