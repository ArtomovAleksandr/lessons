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
   var_dump($model);
echo "<table class='table'>";
echo "<tr><td>Номер</td><td>Каталог</td><td>Маркировка<td/><td>Название</td><td>Цена</td><td>Количество</td><td>Сумма</td><td></td><td></td></tr>";
echo "<tr><td>{$model ->num}</td><td>{$model ->catalog}</td><td>{$model -> mark}<td/><td>{$model ->name}</td><td>{$model ->price}</td><td>{$model ->quantity }</td><td>{$model ->sum}</td><td>"?><?= Html::a('Профиль', ['order/updategoods', 'id' =>$model -> id], ['class' => 'btn btn-primary']) ?><?php echo "</td><td><a class='btn btn-danger' href='currency/delete?id='>Удалить</a></td></tr>";
echo "</table>";

?>
