<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\OrderModel */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="order-model-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'create_date')->textInput(['disabled' => true]) ?>

    <?= $form->field($model, 'name')->textInput(['disabled' => true]) ?>

    <?= $form->field($model, 'fone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'done')->dropDownList([0 => 'не выполнен', 1 => 'выполнен']) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>



    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
