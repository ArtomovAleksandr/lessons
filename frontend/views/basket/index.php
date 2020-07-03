<?php


use yii\helpers\Html;
use yii\widgets\Pjax;
use yii\bootstrap\ActiveForm;
$script_send = <<< JS

// alert("Nope, don't do the thing");
JS;

$this->registerJs($script_send);

$this->title = 'Goods Models';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container mt-3">
    <div class="row justify-content-md-center">
        <div class="col col-lg-8 col-sm-12 col-md-12 col-xl-8">
            <div class="image mb-2">Благодарим Вас за выбор товара</div>
            <div class="header  product-border">
                <div class="select-all">

                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="customCheck" checked>
                        <label class="custom-control-label" for="customCheck">Выбрать все доступные товары</label>
                    </div>


                </div>
                <div class="delete-position">
                    <button>
                        <i class="fa fa-trash" aria-hidden="true"></i>
                    </button>
                </div>
            </div>
            <?php  Pjax::begin();        ?>
            <?php $form=ActiveForm::begin() ?>
            <div class="conteiner-product">


            </div>
            <div class="buy product-border">
                <div class="buy-totalpaiment-infoclient">
                    <div class="total-paiment">
                        <div class="total-paiment-title">К оплате</div>
                        <div class="total-paiment-price">00</div>
                        <div class="price-unit">гр.</div>
                    </div>
                    <div class="info-client">
                        <div class="info-client-fone">
                            <div class="client-fone">Введите номер телефона</div>
                            <div class="client-fone-data">
                                <input type="tel" style="color: black"
                                       placeholder="050-567-88-88">
                            </div>
                        </div>
                        <div class="info-client-name">
                            <div class="client-name">Введите свое имя</div>
                            <div class="client-name-data">
                                <input type="text">
                            </div>
                        </div>
                    </div>
                </div>
                <?= Html::submitButton('Оформить заказ', ['id' => 'create-order']) ?>
            </div>
            <?php ActiveForm::end() ?>
            <?php Pjax::end() ?>
        </div>

    </div>

    <?php
    $this->registerCssFile('@web/css/stylebasket.css');
    $this->registerJsFile('@web/js/dto/template_function_basket.js');
    $this->registerJsFile('@web/js/servise/AJAXService.js',['depends'=>
        'yii\web\YiiAsset',
        'yii\bootstrap4\BootstrapAsset',
    ]);
    $this->registerJsFile('@web/js/user_basket.js',['depends'=>
        'yii\web\YiiAsset',
        'yii\bootstrap4\BootstrapAsset',
    ]);
    $this->registerJsFile('@web/js/user_bascket_create_order.js',['depends'=>
        'yii\web\YiiAsset',
        'yii\bootstrap4\BootstrapAsset',
    ]);
    ?>


</div>
