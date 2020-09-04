<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\LinkPager;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Goods Models';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="goods-model-index">
    <div class="container mt-3">

        <h5>Запчасти категории - <?= $category->name ?></h5>
        <div class="row mb-2">
            <?php foreach ($models as $model): ?>
            <div class="product col-xl-6 col-lg-6 col-md-12 col-sm-12">
                <div class="product-border">
                    <div class="image">
                       <?php
                        if($model-> path_image != NULL){ ?>
                          <img src="/images/goods/<?= $model->path_image?>" alt = "no image">
                      <?php
                        }
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
                                <?php $factoryid = $model->factory_id ?>
                                <div class="capture-name"><?= $factorys[$factoryid] ?></div>
                            </div>
                            <div class="capture-catalog">
                                <div class="capture-descript">Каталожный номер</div>
                                <div class="capture-name"><?= $model->catalog ?></div>
                            </div>
                            <div class="capture-unit">
                                <div class="capture-descript">Еденица измер.</div>
                                <?php $unitid = $model->unit_id ?>
                                <?php if($model -> max_order >0 ){?>
                                   <div class="capture-name"><?= $units[$unitid].'   в наличии'?></div>
                               <?php }else{ ?>
                                <div class="capture-name"><?= $units[$unitid].'   под заказ'?></div>
                                <?php  } ?>
                            </div>
                            <div class="capture-price">
                                <div class="capture-descript-price">Цена</div>
                                <div class="capture-name-price"><?= $model->getCauntPrice() ?></div>
                                <div class="capture-descript">гр.</div>
                            </div>
                        </div>
                        <div class="order">
                            <button>
                                <i class="fa fa-plus" aria-hidden="true"></i>
                            </button>
                        </div>
                    </div>
                    <div class="basket-show">
                        <div class="basket-order-head">
                            <button>
                                <i class="fa fa-arrow-left" aria-hidden="true"></i>
                            </button>
                        <div class="basket-name">
                            <div class="basket-description"><?= $model->name ?></div>
                            <div class="basket-unit"><?= $model->catalog ?></div>
                        </div>
                        </div>
                        <div class="order-main">
                            <div class="add-cart-wrap">
                                <div class="select-quantity-minus">
                                    <button class="select-quantity-button" disabled>
                                        <i class="fa fa-minus" aria-hidden="false"></i>
                                    </button>
                                </div>
                                <div class="current-quantity">
                                    <input type="text" value="1" title="Количество товара">
                                </div>
                                <div class="select-quantity-plus">
                                    <button class="select-quantity-button">
                                        <i class="fa fa-plus" aria-hidden="false"></i>
                                    </button>
                                </div>

                            </div>
                            <button class="to-basket" value="<?= $model->id ?>">В КОРЗИНУ</button>
                        </div>
                        <div class="line-box">
                            <div class="line"></div>
                        </div>
                        <div class="price-box">
                            <div class="order-price-fixed">Сумма товара</div>
                            <div class="total-price-curency">
                                <div class="total-price"><?= $model->getCauntPrice() ?></div>
                                <div class="curency">грн.</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <p>
            <?= Html::a('К категориям', ['/'], ['class' => 'btn btn-primary']) ?>
        </p>
    </div>

    <?php
    echo  LinkPager::widget([
        'pagination' => $pages,
        'hideOnSinglePage' => true,
        'prevPageLabel' => '&laquo; назад',
        'nextPageLabel' => 'далее &raquo;',
        'disableCurrentPageButton' =>true,
        'maxButtonCount' =>5,

        // Настройки контейнера пагинации
        'options' => [
            'tag' => 'ul',
            'class' => 'pagination justify-content-center',
            'id' => 'pager-container',
        ],

        // Настройки классов css для ссылок
        'linkOptions' => ['class' => 'page-link'],
        'activePageCssClass' => 'page-item',
        'disabledPageCssClass' => 'disabled',
        'disabledListItemSubTagOptions' => ['tag' => 'a', 'class' => 'page-link'],
        // Настройки для навигационных ссылок

        'prevPageCssClass' => 'page-item',
        'nextPageCssClass' => 'page-item',
    ]);
    ?>
    <?php
    $this->registerJsFile('@web/js/dto/template_function_basket.js');
    $this->registerJsFile('@web/js/dto/DTOGoodsStorage.js');
    $this->registerJsFile('@web/js/goods_category.js',['depends'=>
        'yii\web\YiiAsset',
        'yii\bootstrap4\BootstrapAsset',
    ]);
    ?>





</div>
