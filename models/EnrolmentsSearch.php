<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Enrolments;

/**
 * EnrolmentsSearch represents the model behind the search form of `app\models\Enrolments`.
 */
class EnrolmentsSearch extends Enrolments
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'y2004', 'y2005', 'y2006', 'y2007', 'y2008', 'y2009', 'y2010', 'y2011', 'y2012', 'y2013', 'y2014', 'y2015', 'y2016', 'y2017', 'y2018'], 'integer'],
            [['code', 'school_name'], 'safe'],
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
        $query = Enrolments::find();

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
            'y2004' => $this->y2004,
            'y2005' => $this->y2005,
            'y2006' => $this->y2006,
            'y2007' => $this->y2007,
            'y2008' => $this->y2008,
            'y2009' => $this->y2009,
            'y2010' => $this->y2010,
            'y2011' => $this->y2011,
            'y2012' => $this->y2012,
            'y2013' => $this->y2013,
            'y2014' => $this->y2014,
            'y2015' => $this->y2015,
            'y2016' => $this->y2016,
            'y2017' => $this->y2017,
            'y2018' => $this->y2018,
        ]);

        $query->andFilterWhere(['like', 'code', $this->code])
            ->andFilterWhere(['like', 'school_name', $this->school_name]);

        return $dataProvider;
    }
}
