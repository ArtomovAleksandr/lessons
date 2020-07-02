<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
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
        <?php $this->head() ?>
<!--        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
       <!--        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">-->
    </head>
    <body>
<?php  $this->beginBody() ?>
<div class="container">
    <div class="row mt-2 ml-1 mr-1" id="top">
        <div class="col text-center">
            <a href="#" style="pointer-events: none">
                <i class="fa fa-phone"></i>
                <span class="d-none d-inline style-fa">+038 067 564-66-42</span>
            </a>

            <a href="/basket">
                <div class="fa fa-shopping-cart  basket" aria-hidden="true">
                    <div id="goods-basket" class="display-off"></div>
                </div>
                <span class="d-none d-lg-inline style-fa">Корзина</span>
            </a>

        </div>
    </div>
    <div class="row mt-2 mr-1 ml-1" id="logo">
        <div style="width: 181px">
            <img src="../images/resourses/logo2.png" alt="diselexpert.com.ua">
        </div>
        <div class="col" id="repead-images">
        </div>
    </div>
    <nav id="menu" class="navbar navbar-expand-lg navbar-light mt-2">
        <a class="navbar-brand color_white" href="#">Меню</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto color_white">
                <li class="nav-item">
                    <a class="nav-link color_white_hover" href="#">Отзывы</a>
                                   </li>
                <li class="nav-item">
                    <a class="nav-link color_white_hover" href="#">Доставка</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link color_white_hover" href="#">Контакты</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link color_white_hover" href="#">О сервисе</a>
                </li>

            </ul>

        </div>
    </nav>
</div>
<?php
//echo Nav::widget([
//'items' => [
//[
//'label' => 'Home',
//'url' => ['site/index'],
//'linkOptions' => [...],
//],
//[
//'label' => 'Dropdown',
//'items' => [
//['label' => 'Level 1 - Dropdown A', 'url' => '#'],
//'<li class="divider"></li>',
//'<li class="dropdown-header">Dropdown Header</li>',
//['label' => 'Level 1 - Dropdown B', 'url' => '#'],
//],
//],
//[
//'label' => 'Login',
//'url' => ['site/login'],
//'visible' => Yii::$app->user->isGuest
//],
//],
//'options' => ['class' =>'nav-pills'], // set this to nav-tab to get tab-styled navigation
//]);
//?>
<div class="container mt-3">
    <?= $content ?>
<!--    <h5><span class="badge badge-light">ВСЕ КАТЕГОРИИ ТОВАРА</span></h5>-->
<!--    <div class="row mb-2">-->
<!---->
<!--        <div class="product col-lg-3 col-md-3 col-sm-6">-->
<!--            <a href="">-->
<!--                <div class="product-border">-->
<!--                    <div class="product-show">-->
<!--                        <div class="image">-->
<!--                            <img src="../images/resourses/no-photo.jpg" alt="no image">-->
<!--                        </div>-->
<!--                        <div class="capture">-->
<!--                            <h4>Категория 1</h4>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </a>-->
<!--        </div>-->
<!--        <div class="product col-lg-3 col-md-3 col-sm-6">-->
<!--            <a href="">-->
<!--                <div class="product-border">-->
<!--                    <div class="product-show">-->
<!--                        <div class="image">-->
<!--                            <img src="../images/resourses/no-photo.jpg" alt="no image">-->
<!--                        </div>-->
<!--                        <div class="capture">-->
<!--                            <h4>Категория 2</h4>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </a>-->
<!--        </div>-->
<!--        <div class="product col-lg-3 col-md-3 col-sm-6">-->
<!--            <a href="">-->
<!--                <div class="product-border">-->
<!--                    <div class="product-show">-->
<!--                        <div class="image">-->
<!--                            <img src="../images/resourses/no-photo.jpg" alt="no image">-->
<!--                        </div>-->
<!--                        <div class="capture">-->
<!--                            <h4>Категория 3</h4>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </a>-->
<!--        </div>-->
<!--        <div class="product col-lg-3 col-md-3 col-sm-6">-->
<!--            <a href="">-->
<!--                <div class="product-border">-->
<!--                    <div class="product-show">-->
<!--                        <div class="image">-->
<!--                            <img src="../images/resourses/no-photo.jpg" alt="no image">-->
<!--                        </div>-->
<!--                        <div class="capture">-->
<!--                            <h4>Категория 4</h4>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </a>-->
<!--        </div>-->
<!--        <div class="product col-lg-3 col-md-3 col-sm-6">-->
<!--            <a href="">-->
<!--                <div class="product-border">-->
<!--                    <div class="product-show">-->
<!--                        <div class="image">-->
<!--                            <img src="../images/resourses/no-photo.jpg" alt="no image">-->
<!--                        </div>-->
<!--                        <div class="capture">-->
<!--                            <h4>Категория 5</h4>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </a>-->
<!--        </div>-->
<!--        <div class="product col-lg-3 col-md-3 col-sm-6">-->
<!--            <a href="">-->
<!--                <div class="product-border">-->
<!--                    <div class="product-show">-->
<!--                        <div class="image">-->
<!--                            <img src="../images/resourses/no-photo.jpg" alt="no image">-->
<!--                        </div>-->
<!--                        <div class="capture">-->
<!--                            <h4>Категория 6</h4>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </a>-->
<!--        </div>-->
<!--        <div class="product col-lg-3 col-md-3 col-sm-6">-->
<!--            <a href="">-->
<!--                <div class="product-border">-->
<!--                    <div class="product-show">-->
<!--                        <div class="image">-->
<!--                            <img src="../images/resourses/no-photo.jpg" alt="no image">-->
<!--                        </div>-->
<!--                        <div class="capture">-->
<!--                            <h4>Категория 7</h4>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </a>-->
<!--        </div>-->
<!--        <div class="product col-lg-3 col-md-3 col-sm-6">-->
<!--            <a href="">-->
<!--                <div class="product-border">-->
<!--                    <div class="product-show">-->
<!--                        <div class="image">-->
<!--                            <img src="../images/resourses/no-photo.jpg" alt="no image">-->
<!--                        </div>-->
<!--                        <div class="capture">-->
<!--                            <h4>Категория 8</h4>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </a>-->
<!--        </div>-->
<!--    </div>-->
</div>
<?php $this->endBody() ?>
    </body>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</html>
<?php  $this->endPage() ?>
