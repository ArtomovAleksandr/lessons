<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Категории товара';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-model-index">

    <h1><?= Html::encode($this->title) ?></h1>

<!--    <p>-->

<!--    </p>-->
     <?php
     echo '<pre>';
    // print_r($dataProvider->getModels());
     foreach ($dataProvider->getModels() as &$value) {
    //     $first=$value ['_attributes:yii\db\BaseActiveRecord:private'];
      //   print_r($first);
        print_r($value);// = $value * 2;
     }
     echo "</pre>";
     ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
//            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
//            'is_visible',
//            'metric_order',
            'path_image',

//            ['class' => 'yii\grid\ActionColumn'],
        ],

    ]); ?>


</div>
