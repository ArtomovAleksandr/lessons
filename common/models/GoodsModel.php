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
    const ARCHIVE = 1;

    const NOARCHIVE = 0;

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
            [['unit_id', 'currency_id', 'factory_id', 'category_id', 'countprice','archive', 'metric_order', 'max_order'], 'integer'],
            [['num', 'catalog'], 'string', 'max' => 50],
            [['mark'], 'string', 'max' => 100],
            [['path_image','name'],'string','max' => 255],
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
            'num' => 'Внутр. номер',
            'catalog' => 'Каталожн. ном.',
            'mark' => 'Маркировка',
            'name' => 'Наименование',
            'unit_id' => 'Ед. изм.',
            'currency_id' => 'Валюта',
            'factory_id' => 'Производитель',
            'category_id' => 'Категория',
            'inprice' => 'Входн. цена',
            'addition' => 'Наценка в %',
            'countprice' => 'Вычислять цену?',
            'archive' => 'Архив',
            'metric_order' => 'Сортировка',
            'outprice' => 'Вых. цена',
            'max_order' => 'Макс. кол. заказа',
            'price' => 'Цена',
            'path_image' => 'Картинка'
        ];
    }
    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCauntPrice()
    {
        if  ($this->countprice == 0){
            return ceil( ($this->outprice)*($this->currency->rate));
        }else{
            return ceil(($this->inprice)*($this->currency->rate)*((($this->addition)/100)+1));
        }

    }
    public function  getYesNo(){
        if  ($this->countprice == 0){
            return 'НЕТ';
        }else{
            return 'ДА';
        }
    }
    public function  getArchive(){
        if  ($this->archive == 0){
            return 'НЕТ';
        }else{
            return 'ДА';
        }
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

    public function getFactorys($factorys, $id){
        echo 'id ='. print_r($id);
        foreach ($factorys as $factory):
            echo 'factory ='. print_r($factory);
            if($factory->id == $id){
                return $factory->name;
            }
        endforeach;
    }
}
