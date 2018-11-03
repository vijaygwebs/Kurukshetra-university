<?php

namespace backend\models;

use Yii;
use common\models\FrontendSliders;

/**
 * This is the model class for table "slides".
 *
 * @property int $id
 * @property int $slider_id
 * @property string $title
 * @property string $description
 * @property string $image
 * @property string $status
 *
 * @property FrontendSliders $slider
 */
class Slides extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public $dbimg;
    public static function tableName()
    {
        return 'slides';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title','description'], 'required'],

            [['slider_id'], 'integer'],
            [['title', 'description',], 'string', 'max' => 255],
            [['slider_id'], 'exist', 'skipOnError' => true, 'targetClass' => FrontendSliders::className(), 'targetAttribute' => ['slider_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'slider_id' => 'Slider_id',
            'title' => 'Title',
            'description' => 'Description',
            'image' => 'Image',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSlider()
    {
        return $this->hasOne(FrontendSliders::className(), ['id' => 'slider_id']);
    }


    public function saveslide(){
       return Yii::$app->db->createCommand()->insert('slides',['slider_id' =>$this->slider_id,'title'=>$this->title,'description'=>$this->description,'image'=>$this->image])->execute();
    }
    public function updateslide(){
       return Yii::$app->db->createCommand()->update('slides',['title'=>$this->title,'description'=>$this->description,'image'=>$this->image],'id = id')->execute();
    }


}
