<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "faculty_designation".
 *
 * @property int $id
 * @property int $faculty_id
 * @property int $department_id
 * @property int $subject_id
 * @property int $designation_id
 *
 * @property Departments $department
 * @property Designations $designation
 * @property Faculty $faculty
 * @property Subjects $subject
 */
class FacultyDesignation extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'faculty_designation';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['faculty_id', 'department_id', 'subject_id', 'designation_id'], 'integer'],
            [['department_id'], 'exist', 'skipOnError' => true, 'targetClass' => Departments::className(), 'targetAttribute' => ['department_id' => 'id']],
            [['designation_id'], 'exist', 'skipOnError' => true, 'targetClass' => Designations::className(), 'targetAttribute' => ['designation_id' => 'id']],
            [['faculty_id'], 'exist', 'skipOnError' => true, 'targetClass' => Faculty::className(), 'targetAttribute' => ['faculty_id' => 'id']],
            [['subject_id'], 'exist', 'skipOnError' => true, 'targetClass' => Subjects::className(), 'targetAttribute' => ['subject_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'faculty_id' => 'Faculty ID',
            'department_id' => 'Department ID',
            'subject_id' => 'Subject ID',
            'designation_id' => 'Designation ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDepartment()
    {
        return $this->hasOne(Departments::className(), ['id' => 'department_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDesignation()
    {
        return $this->hasOne(Designations::className(), ['id' => 'designation_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFaculty()
    {
        return $this->hasOne(Faculty::className(), ['id' => 'faculty_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSubject()
    {
        return $this->hasOne(Subjects::className(), ['id' => 'subject_id']);
    }
}
