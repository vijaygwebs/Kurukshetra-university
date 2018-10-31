<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "faculty".
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $Contact_no
 * @property string $profile_img
 *
 * @property FacultyDesignation[] $facultyDesignations
 */
class Faculty extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'faculty';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'email', 'Contact_no'], 'string', 'max' => 255],
            [['name', 'email', 'Contact_no'], 'required'],
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
            'email' => 'Email',
            'Contact_no' => 'Contact No',
            'profile_img' => 'Profile Img',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFacultyDesignations()
    {
        return $this->hasMany(FacultyDesignation::className(), ['faculty_id' => 'id']);
    }
}
