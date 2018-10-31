<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "departments".
 *
 * @property int $id
 * @property string $department_name
 *
 * @property Subjects[] $subjects
 */
class Departments extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'departments';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['department_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'department_name' => 'Department Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSubjects()
    {
        return $this->hasMany(Subjects::className(), ['department_id' => 'id']);
    }
}
