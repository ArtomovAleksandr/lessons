<?php

use common\models\GoodsModel;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = "Заказ id = {$idxmodel}";
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="factory-model-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('К заказам', ['index'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php
    $idx =1;
    echo "<table class='table'>";
    echo "<tr><td>#</td><td>Номер</td><td>Каталог</td><td>Маркировка<td/><td>Название</td><td>Цена</td><td>Количество</td><td>Сумма</td><td></td><td></td></tr>";


    foreach ($models as $model){

        echo "<tr><td>{$idx}</td><td>{$model ->num}</td><td>{$model ->catalog}</td><td>{$model -> mark}<td/><td>{$model ->name}</td><td>{$model ->price}</td><td>{$model ->quantity }</td><td>{$model ->sum}</td><td>"?><?php if($done == 0) echo Html::a('Смотреть', ['order/updategoods', 'id' =>$model -> id], ['class' => 'btn btn-primary']) ?><?php echo "</td><td>" ?><?php if($done == 0) echo Html::a('Удалить', ['order/deletegoods', 'id' =>$model -> id], ['class' => 'btn btn-danger']) ?><?php echo "</td></tr>";

        $idx+=1;
   }
    echo "<tr><td></td><td></td><td></td><td><td/><td></td><td></td><td>Cумма</td><td>{$total}</td><td></td><td></td></tr>";
    echo "</table>";
    ?>




</div>
