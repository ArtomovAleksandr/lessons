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

    $idx =1;
    echo "<table class='table'>";
    echo "<tr><td>#</td><td>Номер</td><td>Каталог</td><td>Маркировка<td/><td>Название</td><td>Цена</td><td>Количество</td><td>Сумма</td><td></td><td></td></tr>";


    foreach ($models as $model){
        var_dump($model);
        echo "<tr><td>{$idx}</td><td>{$model ->num}</td><td>{$model ->catalog}</td><td>{$model -> mark}<td/><td>{$model ->name}</td><td>{$model ->price}</td><td>{$model ->quantity }</td><td>{$model ->sum}</td><td>"?><?= Html::a('Изменить', ['order/updategoods', 'id' =>$model -> id], ['class' => 'btn btn-primary'])  ?><?php echo "</td><td>"?><?= Html::a('Удалить', ['order/deletegoods', 'id' =>$model -> id], ['class' => 'btn btn-danger']) ?><?php echo "</td></tr>";
//        <a class='btn btn-primary' href='order/updаtegoods?id={$model -> id }'>Редактировать</a>
        $idx+=1;
   }
    echo "<tr><td></td><td>1</td><td>2</td><td>3<td/><td>4</td><td>5</td><td>Cумма</td><td>{$total}</td><td></td><td></td></tr>";
    echo "</table>";
    ?>




</div>
