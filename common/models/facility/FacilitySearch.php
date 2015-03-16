<?php

namespace common\models\facility;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * SearchFacility represents the model behind the search form about `common\models\facility\Facility`.
 */
class FacilitySearch extends Facility
{
	public $facilityTypeTitle;
	public $placeTitle;
	public $subjectTitle;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'subject_id', 'person_id', 'facility_type_id', 'stars', 'created_by', 'updated_by'], 'integer'],
            [['title', 'weburl', 'street', 'house_nr', 'city', 'postal_code', 'checkin_from', 'checkin_to',
	            'checkout_from', 'checkout_to', 'certificate', 'description', 'created_at', 'updated_at',
	            'facilityTypeTitle', 'placeTitle', 'subjectTitle'], 'safe'],
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
		    'partner' => $this->partner
	    ]);

        $query->andFilterWhere(['like', 'facility.title', $this->title]);

	    $query->joinWith(['facilityType', 'place', 'subject']);
	    $query->andFilterWhere(['like', 'type.title', $this->facilityTypeTitle])
		    ->andFilterWhere(['like', 'place.title', $this->placeTitle])
		    ->andFilterWhere(['like', 'subject.title', $this->subjectTitle]);

        return $dataProvider;
    }
}
