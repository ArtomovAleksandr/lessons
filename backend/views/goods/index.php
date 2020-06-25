<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\GoodsSearchModel */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Товар';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="goods-model-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать товар', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Смотреть Архив', ['archive'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

         //   'id',
            'num',
            'catalog',
            'mark',
            'name',
        //    'unit_id',
            [
                'attribute' => 'unit_id',
                'value' => 'unit.name',
                'filter' => $arrUnit
            ],
     //       'currency_id',
            [
                'attribute' => 'currency_id',
                'value' => 'currency.shortname',
                'filter' => $arrCurrency
            ],
            [
                    'attribute' => 'factory_id',
                    'value' => 'factory.name',
                    'filter' => $arrFactory
            ],
         //   'factory_id',
       //     'category_id',
            [
                'attribute' => 'category_id',
                'value' => 'category.name',
                'filter' => $arrCategory
            ],
            'inprice',
            'addition',
         //   'countprice',
            [
                'attribute' => 'countprice',
                'value'=> function($model){
                    return $model->getYesNo();
                }

            ],
            'outprice',
            [
                'attribute' => 'price',
                'value'=> function($model){
                   return $model->getCauntPrice();
                }

            ],
            'max_order',
            'path_image',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
