<?php

namespace backend\controllers;

use backend\models\CurrencyHistoryModel;
use Yii;
use common\models\CurrencyModel;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CurrencyController implements the CRUD actions for CurrencyModel model.
 */
class CurrencyController extends Controller
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
                        'actions' => ['view', 'index','update'],
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


    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => CurrencyModel::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }


    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }



    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $currencyhistory = new CurrencyHistoryModel();
            $currencyhistory ->rate = $model ->rate;
            $currencyhistory ->name = $model ->name;
            //set  date time
            date_default_timezone_set('Europe/Kiev');
            $date = date('Y-m-d H:i:s');
            $currencyhistory ->date_setting =$date;
            $currencyhistory ->save();
            return $this->redirect(['view', 'id' => $model->id]);
        }
        if($id !=1) {
            return $this->render('update', [
                'model' => $model,
            ]);
        }else{

            return Yii::$app->getResponse()->redirect(Yii::$app->getRequest()->getUrl());
        }
    }


    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }


    protected function findModel($id)
    {
        if (($model = CurrencyModel::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
