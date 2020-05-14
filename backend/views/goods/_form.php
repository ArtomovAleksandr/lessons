<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\GoodsModel */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="goods-model-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'num')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'catalog')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mark')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'unit_id')->dropDownList($unit) ?>

    <?= $form->field($model, 'currency_id')->dropDownList($currency) ?>

    <?= $form->field($model, 'factory_id')->dropDownList($factory) ?>

    <?= $form->field($model, 'category_id')->dropDownList($category) ?>

    <?= $form->field($model, 'inprice')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'addition')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'countprice')->checkbox([ 'check'=>$model->countprice,'checked' => true])?>

    <?= $form->field($model, 'outprice')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'catalog')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'max_order')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
