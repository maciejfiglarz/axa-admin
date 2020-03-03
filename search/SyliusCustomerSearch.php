<?php

namespace app\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\SyliusCustomer;

/**
 * SyliusCustomerSearch represents the model behind the search form of `app\models\SyliusCustomer`.
 */
class SyliusCustomerSearch extends SyliusCustomer
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'customer_group_id', 'default_address_id', 'subscribed_to_newsletter'], 'integer'],
            [['email', 'email_canonical', 'first_name', 'last_name', 'birthday', 'gender', 'created_at', 'updated_at', 'phone_number'], 'safe'],
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
        $query = SyliusCustomer::find();

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
            'customer_group_id' => $this->customer_group_id,
            'default_address_id' => $this->default_address_id,
            'birthday' => $this->birthday,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'subscribed_to_newsletter' => $this->subscribed_to_newsletter,
        ]);

        $query->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'email_canonical', $this->email_canonical])
            ->andFilterWhere(['like', 'first_name', $this->first_name])
            ->andFilterWhere(['like', 'last_name', $this->last_name])
            ->andFilterWhere(['like', 'gender', $this->gender])
            ->andFilterWhere(['like', 'phone_number', $this->phone_number]);

        return $dataProvider;
    }
}
