<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Goods Models';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="goods-model-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Goods Model', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'num',
            'catalog',
            'mark',
            'name',
            //'unit_id',
            //'currency_id',
            //'factory_id',
            'category_id',
            //'inprice',
            //'addition',
            //'countprice',
            //'archive',
            //'metric_order',
            //'outprice',
            //'max_order',
             'path_image',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <div class="container mt-3">



        <?php
     //   echo print_r($factorys);
        ?>
        <h5>Запчасти категории - <?= $category->name ?></h5>
        <div class="row mb-2">
            <?php foreach ($models as $model): ?>
            <div class="product col-xl-6 col-lg-6 col-md-12 col-sm-12">
                <div class="product-border">
                    <div class="image">
                       <?php
                        if($model-> path_image !== NULL){ ?>
                          <img src="/images/goods/<?= $model->path_image?>" alt = "no image">
                      <?php    }
                        ?>
                    </div>
                    <div class="capture-order">
                        <div class="capture">
                            <div class="capture-row-name">
                                <div class="capture-descript">Наименование</div>
                                <div class="capture-name"><?= $model->name ?></div>
                            </div>
                            <div class="capture-factory">
                                <div class="capture-descript">Производитель</div>
                                <div class="capture-name"><?= $model->factory_id ?></div>
                            </div>
                            <div class="capture-catalog">
                                <div class="capture-descript">Каталожный номер</div>
                                <div class="capture-name"><?= $model->catalog ?></div>
                            </div>
                            <div class="capture-unit">
                                <div class="capture-descript">Каталожный номер</div>
                                <div class="capture-name"><?= $model->unit_id ?></div>
                            </div>
                            <div class="capture-price">
                                <div class="capture-descript-price">Цена</div>
                                <div class="capture-name-price"><?= $model->outprice ?></div>
                                <div class="capture-descript">гр.</div>
                            </div>
                        </div>
                        <div class="order">
                            <button>
                                <i class="fa fa-plus" aria-hidden="true">

                                </i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>






</div>
