<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\GoodsModel */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Goods Models', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="goods-model-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'num',
            'catalog',
            'mark',
            'name',
            'unit_id',
            'currency_id',
            'factory_id',
            'category_id',
            'inprice',
            'addition',
            'countprice',
            'archive',
            'metric_order',
            'outprice',
            'max_order',
        ],
    ]) ?>

</div>
