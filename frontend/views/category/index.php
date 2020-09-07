<?php


// use app\components\BootstrapLinkPager;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\widgets\LinkPager;
?>
<div class="container mt-3">

    <?php

$this->title = 'ВСЕ КАТЕГОРИИ ТОВАРА';
//$this->params['breadcrumbs'][] = $this->title;
//    var_dump($models);
?>
<div class="category-model-index">

    <h3><?= Html::encode($this->title) ?></h3>
    <div class="row mb-2">



    <?php foreach ($models as $model): ?>
        <div class="product col-lg-3 col-md-3 col-sm-6">
            <?= Html::a('Ccылка' , ['/goods','id' => $model->id], ['class' => 'profile-link']) ?>
            <a href="<?= Url::to(['/goods', 'id' =>  $model->id]); ?>">
                <div class="product-border">
                    <div class="product-show">
                        <div class="image">
                            <?php if($model->path_image!==null){ ?>
                                    <img src="images/category/<?=$model->path_image?>" alt="no image">
                           <?php } ?>
                        </div>
                        <div class="capture">
                            <h4><?= $model->name ?></h4>
                        </div>
                    </div>
                </div>
            </a>
        </div>


    <?php endforeach; ?>
    </div>

    <?php

   echo  LinkPager::widget([
        'pagination' => $pages,
        'hideOnSinglePage' => true,
        'prevPageLabel' => '&laquo; назад',
        'nextPageLabel' => 'далее &raquo;',
        'disableCurrentPageButton' =>true,
        'maxButtonCount' =>0,
        // Настройки контейнера пагинации
        'options' => [
            'tag' => 'ul',
            'class' => 'pagination  justify-content-center',
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
    $this->registerJsFile('@web/js/goods_category.js',['depends'=>
        'yii\web\YiiAsset',
        'yii\bootstrap4\BootstrapAsset',
    ]);
    ?>



</div>
</div>

