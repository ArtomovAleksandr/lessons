<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "bgoods".
 *
 * @property int $id
 * @property int $curid
 * @property int $catid
 * @property int $prodid
 * @property int $groupid
 * @property int $uzelid
 * @property int $supplid
 * @property string $num
 * @property string $katalog
 * @property string $name
 * @property string $unit
 * @property string $mark
 * @property string $pr
 * @property string $price1
 * @property string $price2
 * @property string $price3
 * @property string $price4
 * @property int $maxres
 * @property int $mincount
 * @property int $maxcount
 * @property string $photo
 * @property int $numcat
 */
class BgoodsModel extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bgoods';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['curid', 'catid', 'prodid', 'groupid', 'uzelid', 'supplid', 'maxres', 'mincount', 'maxcount', 'numcat'], 'integer'],
            [['num', 'unit', 'pr', 'price1', 'price2', 'price3', 'price4'], 'string', 'max' => 15],
            [['katalog', 'mark'], 'string', 'max' => 30],
            [['name'], 'string', 'max' => 255],
            [['photo'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'curid' => 'Curid',
            'catid' => 'Catid',
            'prodid' => 'Prodid',
            'groupid' => 'Groupid',
            'uzelid' => 'Uzelid',
            'supplid' => 'Supplid',
            'num' => 'Num',
            'katalog' => 'Katalog',
            'name' => 'Name',
            'unit' => 'Unit',
            'mark' => 'Mark',
            'pr' => 'Pr',
            'price1' => 'Price1',
            'price2' => 'Price2',
            'price3' => 'Price3',
            'price4' => 'Price4',
            'maxres' => 'Maxres',
            'mincount' => 'Mincount',
            'maxcount' => 'Maxcount',
            'photo' => 'Photo',
            'numcat' => 'Numcat',
        ];
    }
}
