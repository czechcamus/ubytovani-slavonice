<?php

namespace common\models\facility;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * SearchFacility represents the model behind the search form about `common\models\facility\Facility`.
 */
class SearchFacility extends Facility
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'subject_id', 'person_id', 'partner', 'place_type_id', 'facility_type_id', 'stars', 'created_by', 'updated_by'], 'integer'],
            [['title', 'weburl', 'street', 'house_nr', 'city', 'postal_code', 'checkin_from', 'checkin_to', 'checkout_from', 'checkout_to', 'certificate', 'description', 'created_at', 'updated_at'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = Facility::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'subject_id' => $this->subject_id,
            'person_id' => $this->person_id,
            'partner' => $this->partner,
            'place_type_id' => $this->place_type_id,
            'facility_type_id' => $this->facility_type_id,
            'checkin_from' => $this->checkin_from,
            'checkin_to' => $this->checkin_to,
            'checkout_from' => $this->checkout_from,
            'checkout_to' => $this->checkout_to,
            'stars' => $this->stars,
            'created_at' => $this->created_at,
            'created_by' => $this->created_by,
            'updated_at' => $this->updated_at,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'weburl', $this->weburl])
            ->andFilterWhere(['like', 'street', $this->street])
            ->andFilterWhere(['like', 'house_nr', $this->house_nr])
            ->andFilterWhere(['like', 'city', $this->city])
            ->andFilterWhere(['like', 'postal_code', $this->postal_code])
            ->andFilterWhere(['like', 'certificate', $this->certificate])
            ->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}
