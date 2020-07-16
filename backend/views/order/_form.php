<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\OrderModel */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="order-model-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'create_date')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'done')->textInput() ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'countgoods')->textInput() ?>

    <?= $form->field($model, 'totalorder')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
