<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "frontend_sliders".
 *
 * @property int $id
 * @property string $slider_name
 */
class FrontendSliders extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'frontend_sliders';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['slider_name','status'],'required'],
            [['slider_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'slider_name' => 'Slider Name',
            'status' => 'Slider status',
        ];
    }
}
