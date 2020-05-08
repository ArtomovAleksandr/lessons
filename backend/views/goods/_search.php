<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\GoodsSearchModel */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="goods-model-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'num') ?>

    <?= $form->field($model, 'catalog') ?>

    <?= $form->field($model, 'mark') ?>

    <?= $form->field($model, 'name') ?>

    <?php // echo $form->field($model, 'unit_id') ?>

    <?php // echo $form->field($model, 'currency_id') ?>

    <?php // echo $form->field($model, 'factory_id') ?>

    <?php // echo $form->field($model, 'category_id') ?>

    <?php // echo $form->field($model, 'inprice') ?>

    <?php // echo $form->field($model, 'addition') ?>

    <?php // echo $form->field($model, 'countprice') ?>

    <?php // echo $form->field($model, 'outprice') ?>

    <?php // echo $form->field($model, 'max_order') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
