<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Goods Models';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="goods-model-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Goods Model', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'num',
            'catalog',
            'mark',
            'name',
            //'unit_id',
            //'currency_id',
            //'factory_id',
            //'category_id',
            //'inprice',
            //'addition',
            //'countprice',
            //'archive',
            //'metric_order',
            //'outprice',
            //'max_order',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?= 'id ='.$id ?>

</div>
