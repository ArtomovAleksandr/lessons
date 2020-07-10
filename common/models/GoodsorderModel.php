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
    /**
     * {@inheritdoc}
     */
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
            'quantity' => 'Quantity',
            'goods_id' => 'Goods ID',
        ];
    }
}
