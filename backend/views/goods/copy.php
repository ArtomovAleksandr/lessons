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

    <?php
   // var_dump($models);
    var_dump($ex);
    var_dump($unit);

    ?>


</div>
