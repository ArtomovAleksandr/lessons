<?php

namespace backend\controllers;

use common\models\BgoodsModel;
use common\models\CategoryModel;
use common\models\CurrencyModel;
use common\models\FactoryModel;
use common\models\UnitModel;
use Yii;
use common\models\GoodsModel;
use common\models\GoodsSearchModel;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * GoodsController implements the CRUD actions for GoodsModel model.
 */
class GoodsController extends Controller
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
                        'actions' => ['index','archive','view','create','update','delete'],
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
     * Lists all GoodsModel models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new GoodsSearchModel();
        $dataProvider = $searchModel->searchArchive(Yii::$app->request->queryParams,GoodsModel::NOARCHIVE);
        $factory =  FactoryModel::find()->all();
        $unit = UnitModel::find()->all();
        $currency = CurrencyModel::find() ->all();
        $category = CategoryModel::find() ->all();
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'arrFactory' => ArrayHelper::map($factory,'id','name'),
            'arrUnit' => ArrayHelper::map($unit,'id','name'),
            'arrCurrency' => ArrayHelper::map($currency,'id','name'),
            'arrCategory' => ArrayHelper::map($category,'id','name')
        ]);
    }

    public function actionArchive()
    {
        $searchModel = new GoodsSearchModel();
        $dataProvider = $searchModel->searchArchive(Yii::$app->request->queryParams,GoodsModel::ARCHIVE);
        $factory =  FactoryModel::find()->all();
        $unit = UnitModel::find()->all();
        $currency = CurrencyModel::find() ->all();
        $category = CategoryModel::find() ->all();
        return $this->render('index_archive', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'arrFactory' => ArrayHelper::map($factory,'id','name'),
            'arrUnit' => ArrayHelper::map($unit,'id','name'),
            'arrCurrency' => ArrayHelper::map($currency,'id','name'),
            'arrCategory' => ArrayHelper::map($category,'id','name')
        ]);
    }
    /**
     * Displays a single GoodsModel model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
            'category' => CategoryModel:: find()->all(),
            'unit' =>UnitModel::find()->all(),
            'currency' =>CurrencyModel::find()->all(),
            'factory' => FactoryModel::find()->all(),
        ]);
    }

    /**
     * Creates a new GoodsModel model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new GoodsModel();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
            'category' => CategoryModel:: find()->all(),
            'unit' =>UnitModel::find()->all(),
            'currency' =>CurrencyModel::find()->all(),
            'factory' => FactoryModel::find()->all(),
        ]);
    }

    /**
     * Updates an existing GoodsModel model.
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
            'category' => CategoryModel:: find()->all(),
            'unit' =>UnitModel::find()->all(),
            'currency' =>CurrencyModel::find()->all(),
            'factory' => FactoryModel::find()->all(),
        ]);
    }

    /**
     * Deletes an existing GoodsModel model.
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

    public function actionCopy(){
        $Bmodelss = BgoodsModel::find()->all();
        $ex = "exeption null";
        foreach ($Bmodelss as &$Bmodels) {


            $unit = $Bmodels->unit;
            if ($unit == 'шт.') {
                $unit = 1;
            } elseif ($unit == 'см.') {
                $unit = 3;
            } else {
                $unit = 2;
            }
            $catalog =$Bmodels -> katalog;
            $catalog= preg_replace("/\s+/", "", $catalog);
            $catalog= preg_replace("/-+/", "", $catalog);

            //   $model ->outprice ='67.5'; // (string)((float) ($Bmodels -> pr)*1.5);

       try{
           Yii::$app->db->createCommand()->insert('goods', [
               'id' => $Bmodels ->id,
               'name' => $Bmodels ->name,
               'num' =>  $Bmodels -> num,
               'catalog' => $catalog,
               'mark' => $Bmodels -> mark,
               'unit_id' => $unit,
               'currency_id' => $Bmodels ->curid,
               'factory_id' => $Bmodels -> prodid,
               'category_id' =>$Bmodels -> catid,
               'inprice' => $Bmodels -> pr,
           ])->execute();

          } catch(\Exception $e) {
            $ex =$e;

          }
        }



        return $this->render('copy',[
            'models'=>$Bmodels,
            'ex' => $ex,
            "unit" => $unit,
        ]);
    }
    protected function findModel($id)
    {
        if (($model = GoodsModel::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
