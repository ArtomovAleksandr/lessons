<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\GoodsModel */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="goods-model-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'num')->textInput(['disabled' => true]) ?>

    <?= $form->field($model, 'catalog')->textInput(['disabled' => true]) ?>

    <?= $form->field($model, 'mark')->textInput(['disabled' => true]) ?>

    <?= $form->field($model, 'name')->textInput(['disabled' => true]) ?>

    <?= $form->field($model, 'quantity')->input('number') ?>

    <?= $form->field($model, 'order_id')->input('hidden') ?>


    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
