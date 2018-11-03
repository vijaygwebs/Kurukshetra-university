<?php
namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\News;
Class Customsearch extends Model{

    public function search($params){
        $query = News::find();
        $query->andFilterWhere(['like', 'title', $params['s']]);
        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        //$this->load($params);

        return $dataProvider;
    }
}
?>

