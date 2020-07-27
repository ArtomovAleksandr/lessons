<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\SearchOrderModel */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Не выполненные заказы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-model-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Выполненные заказы', ['notdone'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'create_date',
            'name',
            'fone',
            //'done',
            //'description:ntext',
            //'countgoods',
            //'totalorder',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
