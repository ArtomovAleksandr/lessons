<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
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
    </head>
    <body>
<?php  $this->beginBody() ?>
<div class="container">
    <div class="row mt-2 ml-1 mr-1" id="top">
        <div class="col text-right">
            <a href="#">
                <i class="fa fa-phone"></i>
                <span class="d-none d-inline style-fa">+038 067 564-66-42</span>
            </a>

            <a href="/user/bascket">
                <div class="fa fa-shopping-cart  basket" aria-hidden="true">
                    <div id="goods-basket" class="display-off">2</div>
                </div>
                <span class="d-none d-lg-inline style-fa">Корзина</span>
            </a>

        </div>
    </div>

</div>
<h1>New Loyout</h1>
<?php $this->endBody() ?>
    </body>
</html>
<?php  $this->endPage() ?>
