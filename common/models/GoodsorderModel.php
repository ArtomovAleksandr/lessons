<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "goodsorder".
 *
 * @property int $id
 * @property int|null $quantity
 * @property int|null $goods_id
 */
class GoodsorderModel extends \yii\db\ActiveRecord
{
    public $num =''; //кассовый номер
    public $catalog ='';
    public $mark = '';
    public $name =''; //имя товара
    public $price ='';
    public $sum ='';
    public static function tableName()
    {
        return 'goodsorder';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['quantity', 'goods_id'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'quantity' => 'Количество',
            'goods_id' => 'Goods ID',
            'order_id' => '',
            'name' => 'Наименование',
            'mark' => 'Маркировка',
            'catalog' => 'Коталож. номер',
            'num' => 'Внутр. номер',
        ];
    }
}
