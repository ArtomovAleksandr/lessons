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
       //     'unit_id',
            [
                'label' => 'Еденица измерения',
                'attribute' => 'unit.name',
            ],

      //      'currency_id',
            [
                'label' => 'Валюта',
                'attribute' => 'currency.name',
            ],
       //     'factory_id',
            [
                'label' => 'Производитель',
                'attribute' => 'factory.name',
            ],
       //     'category_id',
            [
                'label' => 'Категория',
                'attribute' => 'category.name',
            ],
            'inprice',
            'addition',
     //       'countprice',
            [
                'attribute' => 'countprice',
                'value'=> function($model){
                    return $model->getYesNo();
                }

            ],
            'outprice',
            [
                'attribute' => 'price',
                'value'=> function($model){
                    return $model->getCauntPrice();
                }

            ],
            'max_order',
        ],
    ]) ?>

</div>
