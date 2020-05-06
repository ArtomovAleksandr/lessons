<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\CurrencyHistoryModel */

$this->title = 'Create Currency History Model';
$this->params['breadcrumbs'][] = ['label' => 'Currency History Models', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="currency-history-model-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
