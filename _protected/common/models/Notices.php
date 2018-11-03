<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "notices".
 *
 * @property int $id
 * @property string $notice_title
 * @property string $notice_description
 * @property int $status
 */
class Notices extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'notices';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status'], 'integer'],
            [['notice_title', 'notice_description'], 'string', 'max' => 255],
            [['notice_title', 'notice_description'], 'required'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'notice_title' => 'Notice Title',
            'notice_description' => 'Notice Description',
            'status' => 'Status',
        ];
    }
}
