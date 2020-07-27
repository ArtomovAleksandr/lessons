<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\GoodsModel */

$this->title = 'Изменить количество товара: ' . $model->name;
//$this->params['breadcrumbs'][] = ['label' => 'Goods Models', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
//$this->params['breadcrumbs'][] = 'Update';
?>
<div class="goods-model-update">

    <h1><?= Html::encode($this->title) ?></h1>
     <p>
         <?=   Html::a('К заказу', ['view', 'id' =>$model -> order_id], ['class' => 'btn btn-success']); ?>
     </p>
    <?= $this->render('_form_goods_update', [
        'model' => $model,
    ]) ?>

</div>
