<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\CurrencyModel */

$this->title = 'Update Currency Model: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Currency Models', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="currency-model-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
