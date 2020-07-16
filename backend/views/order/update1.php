<?php

use common\models\GoodsModel;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Factory Models';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="factory-model-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Factory Model', ['create'], ['class' => 'btn btn-success']) ?>
    </p>



    <?php
    var_dump($models);
    $arr = array(1, 2, 3, 4);
    foreach ($arr as &$value) {
        $value = $value * 2;
        echo '<p>'. $value.'</p>';
    }
    foreach ($models as &$model){
               echo 'idx ='.$model['goods_id'];
           }
    echo '<br/>';
    var_dump($obg);
     echo '<br/>';
     echo 'total =' . $total;
    ?>
   


</div>
