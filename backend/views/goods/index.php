<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\GoodsSearchModel */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Goods Models';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="goods-model-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Goods Model', ['create'], ['class' => 'btn btn-success']) ?>
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
            'unit_id',
            'currency_id',
            [
                    'attribute' => 'factory_id',
                    'value' => 'factory.name',
                    'filter' => $arrFactory
            ],
         //   'factory_id',
            'category_id',
            'inprice',
            'addition',
            'countprice',
            'outprice',
            'max_order',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
