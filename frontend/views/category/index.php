<?php


// use app\components\BootstrapLinkPager;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\LinkPager;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'ВСЕ КАТЕГОРИИ ТОВАРА';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-model-index">

    <h3><?= Html::encode($this->title) ?></h3>
    <div class="row mb-2">
<!--    <p>-->

<!--    </p>-->
    <?php foreach ($models as $model): ?>
        <div class="product col-lg-3 col-md-3 col-sm-6">
            <a href="/goods?id=<?= $model->id ?>">
<!--            <a href="frontend/gategorygoods">-->
                <div class="product-border">
                    <div class="product-show">
                        <div class="image">
                            <?php if($model->path_image!==null){ ?>
                                    <img src="../images/category/<?=$model->path_image?>" alt="no image">
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
    // display pagination
    echo LinkPager::widget([
        'pagination' => $pages,

    ]);
    ?>



</div>
