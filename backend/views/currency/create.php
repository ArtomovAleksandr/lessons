<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\CurrencyModel */

$this->title = 'Create Currency Model';
$this->params['breadcrumbs'][] = ['label' => 'Currency Models', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="currency-model-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
