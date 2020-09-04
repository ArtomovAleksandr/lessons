<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAssetMainFront;
use common\widgets\Alert;

AppAssetMainFront::register($this);
?>
<?php $this->beginPage() ?>


<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php $this->registerCsrfMetaTags() ?>
        <?php $this->head() ?>
<!--        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
       <!--        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">-->
    </head>
    <body>
<?php  $this->beginBody() ?>
<?php
   $text ='<div class="fa fa-shopping-cart  basket" aria-hidden="true">
                    <div id="goods-basket" class="display-off"></div>
                </div>
                <span class="d-none d-lg-inline style-fa">Корзина</span>'
?>
<div class="container">
    <div class="row mt-2 ml-1 mr-1" id="top">
        <div class="col text-center">
            <a href="#" style="pointer-events: none">
                <i class="fa fa-phone"></i>
                <span class="d-none d-inline style-fa">+038 050 687-45-18</span>
            </a>
            <?= Html::a($text, ['/basket'], ['class' => 'profile-link']) ?>
<!--            <a href="--><?//= Url::to('/basket',true) ?><!--">-->
<!--                <div class="fa fa-shopping-cart  basket" aria-hidden="true">-->
<!--                    <div id="goods-basket" class="display-off"></div>-->
<!--                </div>-->
<!--                <span class="d-none d-lg-inline style-fa">Корзина</span>-->
<!--            </a>-->

        </div>
    </div>
    <div class="row mt-2 mr-1 ml-1" id="logo">
        <div style="width: 181px">
            <?= Html::img('@web/images/resourses/logo2.png', ['alt' => 'diselexpert.com.ua']) ?>
        </div>
        <div class="col" id="repead-images">
        </div>
    </div>
</div>

<?= $content ?>

<?php $this->endBody() ?>
    </body>
<!--    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>-->

</html>
<?php  $this->endPage() ?>
