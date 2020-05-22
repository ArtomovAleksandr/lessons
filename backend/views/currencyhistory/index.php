<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Currency History Models';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="currency-history-model-index">

    <h1><?= Html::encode($this->title) ?></h1>




    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

      //      'id',
            'name',
            'date_setting',
            'rate',

            ['class' => 'yii\grid\ActionColumn',
                'template' =>'{delete}',
            ],
        ],
    ]); ?>


</div>
