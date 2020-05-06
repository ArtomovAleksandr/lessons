<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "category".
 *
 * @property int $id
 * @property string $name
 * @property int|null $is_visible
 * @property int|null $metric_order
 * @property string|null $path_image
 */
class CategoryModel extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['is_visible', 'metric_order'], 'integer'],
            [['name', 'path_image'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'is_visible' => 'Is Visible',
            'metric_order' => 'Metric Order',
            'path_image' => 'Path Image',
        ];
    }
}
