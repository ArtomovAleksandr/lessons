<?php

namespace frontend\controllers;

use common\models\CategoryModel;
use common\models\FactoryModel;
use common\models\UnitModel;
use Yii;
use common\models\GoodsModel;
use yii\data\ActiveDataProvider;
use yii\data\Pagination;
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
    public function actionIndex($id)
    {
        $query = GoodsModel::find()->where(['category_id' => $id])-> andWhere(['archive'=>false])->orderBy('metric_order');
        $countQuery = clone $query;
        $pages = new Pagination(['totalCount' => $countQuery->count(),'defaultPageSize' => 8, 'forcePageParam' => false,
            'pageSizeParam' => false]);
        $category=CategoryModel::findOne(['id'=>$id]);
        $factory = FactoryModel::find()->all();
        $unit = UnitModel::find()->all();
        $models = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->all();

        return $this->render('index', [
            'models' => $models,
            'pages' => $pages,
            'category' => $category,
            'factorys' => ArrayHelper::map($factory,'id','name'),
            'units' => ArrayHelper::map($unit,'id','name'),
        ]);
    }


}
