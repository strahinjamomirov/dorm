<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\ChangingDorm;

/**
 * ChangingDormSearch represents the model behind the search form of `common\models\ChangingDorm`.
 */
class ChangingDormSearch extends ChangingDorm
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'gender', 'changing_from', 'changing_to', 'category', 'number_of_beds'], 'integer'],
            [['fb_link'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = ChangingDorm::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'user_id' => $this->user_id,
            'gender' => $this->gender,
            'changing_from' => $this->changing_from,
            'changing_to' => $this->changing_to,
            'category' => $this->category,
            'number_of_beds' => $this->number_of_beds,
        ]);

        $query->andFilterWhere(['like', 'fb_link', $this->fb_link]);

        return $dataProvider;
    }
}
