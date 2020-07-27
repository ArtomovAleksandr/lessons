<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\CategoryModel */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="category-model-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'is_visible')->dropDownList([0 => 'не видимая категория', 1 => 'видимая категория']) ?>

    <?= $form->field($model, 'metric_order')->textInput() ?>

    <?= $form->field($model, 'path_image')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
