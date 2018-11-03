<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "designations".
 *
 * @property int $id
 * @property string $designation_name
 */
class Designations extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'designations';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['designation_name'], 'string', 'max' => 255],
            [['designation_name'], 'required'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'designation_name' => 'Designation Name',
        ];
    }
}
