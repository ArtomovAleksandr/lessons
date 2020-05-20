<?php

namespace backend\controllers;

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
                        'actions' => ['view', 'index','update','archive','create','delete'],
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
        return $this->render('index', [
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

    /**
     * Finds the GoodsModel model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return GoodsModel the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = GoodsModel::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
