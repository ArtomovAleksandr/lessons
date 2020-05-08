<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "goods".
 *
 * @property int $id
 * @property string|null $num
 * @property string|null $catalog
 * @property string|null $mark
 * @property string $name
 * @property int|null $unit_id
 * @property int|null $currency_id
 * @property int|null $factory_id
 * @property int|null $category_id
 * @property string|null $inprice
 * @property string|null $addition
 * @property int|null $countprice
 * @property string|null $outprice
 * @property int|null $max_order
 *
 * @property Category $category
 * @property Currency $currency
 * @property Factory $factory
 * @property Unit $unit
 */
class GoodsModel extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'goods';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['unit_id', 'currency_id', 'factory_id', 'category_id', 'countprice', 'max_order'], 'integer'],
            [['num', 'catalog'], 'string', 'max' => 50],
            [['mark', 'name'], 'string', 'max' => 100],
            [['inprice', 'addition', 'outprice'], 'string', 'max' => 25],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => CategoryModel::className(), 'targetAttribute' => ['category_id' => 'id']],
            [['currency_id'], 'exist', 'skipOnError' => true, 'targetClass' => CurrencyModel::className(), 'targetAttribute' => ['currency_id' => 'id']],
            [['factory_id'], 'exist', 'skipOnError' => true, 'targetClass' => FactoryModel::className(), 'targetAttribute' => ['factory_id' => 'id']],
            [['unit_id'], 'exist', 'skipOnError' => true, 'targetClass' => UnitModel::className(), 'targetAttribute' => ['unit_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'num' => 'Num',
            'catalog' => 'Catalog',
            'mark' => 'Mark',
            'name' => 'Name',
            'unit_id' => 'Unit ID',
            'currency_id' => 'Currency ID',
            'factory_id' => 'Factory ID',
            'category_id' => 'Category ID',
            'inprice' => 'Inprice',
            'addition' => 'Addition',
            'countprice' => 'Countprice',
            'outprice' => 'Outprice',
            'max_order' => 'Max Order',
        ];
    }

    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(CategoryModel::className(), ['id' => 'category_id']);
    }

    /**
     * Gets query for [[Currency]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCurrency()
    {
        return $this->hasOne(CurrencyModel::className(), ['id' => 'currency_id']);
    }

    /**
     * Gets query for [[Factory]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFactory()
    {
        return $this->hasOne(FactoryModel::className(), ['id' => 'factory_id']);
    }

    /**
     * Gets query for [[Unit]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUnit()
    {
        return $this->hasOne(UnitModel::className(), ['id' => 'unit_id']);
    }
}
