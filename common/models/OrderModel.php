<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "order".
 *
 * @property int $id
 * @property string $ctreate_date
 * @property string|null $name
 * @property string $fone
 * @property int|null $done
 * @property string|null $description
 * @property int|null $countgoods
 * @property string|null $totalorder
 *
 * @property Goodsorder[] $goodsorders
 */
class OrderModel extends \yii\db\ActiveRecord
{
  //  public $name;

    public static function tableName()
    {
        return 'order';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['create_date', 'fone'], 'required'],
            [['done'], 'integer'],
            [['done', 'countgoods'], 'integer'],
      //      [['description'], 'string'],
            [['create_date'], 'string', 'max' => 50],
            [['name', 'fone', 'totalorder'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'create_date' => 'Дата создания',
            'name' => 'Имя',
            'fone' => 'Телефон',
            'done' => 'Done',
            'description' => 'Description',
            'countgoods' => 'Countgoods',
            'totalorder' => 'Totalorder',
        ];
    }

    /**
     * Gets query for [[Goodsorders]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGoodsorders()
    {
        return $this->hasMany(GoodsorderModel::className(), ['order_id' => 'id']);
    }
}
