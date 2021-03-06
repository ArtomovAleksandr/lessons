<?php

use yii\helpers\Html;
use \yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model common\models\GoodsModel */

$this->title = 'Создать товар';
$this->params['breadcrumbs'][] = ['label' => 'Товар', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="goods-model-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'category' => ArrayHelper::map($category,'id','name'),
        'unit' =>  ArrayHelper::map($unit,'id','name'),
        'currency' =>  ArrayHelper::map($currency,'id','name'),
        'factory' =>  ArrayHelper::map($factory,'id','name')
    ]) ?>

</div>
