<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "currencyhistory".
 *
 * @property int $id
 * @property string $name
 * @property string $date_setting
 * @property string|null $rate
 */
class CurrencyHistoryModel extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'currencyhistory';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'date_setting'], 'required'],
            [['name', 'date_setting', 'rate'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Наименование',
            'date_setting' => 'Дата изменения',
            'rate' => 'Котировка',
        ];
    }
}
