<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\FactoryModel */

$this->title = 'Create Factory Model';
$this->params['breadcrumbs'][] = ['label' => 'Factory Models', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="factory-model-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
