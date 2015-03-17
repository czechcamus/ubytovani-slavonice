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
	public $bedNr;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'subject_id', 'person_id', 'facility_type_id', 'stars', 'partner', 'active', 'created_by', 'updated_by'], 'integer'],
            [['title', 'weburl', 'street', 'house_nr', 'city', 'postal_code', 'checkin_from', 'checkin_to',
	            'checkout_from', 'checkout_to', 'certificate', 'description', 'created_at', 'updated_at',
	            'facilityTypeTitle', 'placeTitle', 'subjectTitle', 'bedNr'], 'safe'],
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
	    $subQuery = Room::find()
		    ->select('facility_id, SUM(bed_nr * nr) AS total_bed_nr')
		    ->groupBy('facility_id');
	    $query->leftJoin(['roomSum' => $subQuery], 'roomSum.facility_id = facility.id');

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

	    $dataProvider->setSort([
		    'attributes' => [
			    'title',
			    'facilityTypeTitle' => [
				    'asc' => ['type.title' => SORT_ASC],
				    'desc' => ['type.title' => SORT_DESC]
			    ],
			    'placeTitle' => [
				    'asc' => ['place.title' => SORT_ASC],
				    'desc' => ['place.title' => SORT_DESC]
			    ],
			    'subjectTitle' => [
				    'asc' => ['subject.title' => SORT_ASC],
				    'desc' => ['subject.title' => SORT_DESC]
			    ],
			    'partner',
			    'active',
			    'bedNr' => [
				    'asc' => ['roomSum.total_bed_nr' => SORT_ASC],
				    'desc' => ['roomSum.total_bed_nr' => SORT_DESC]
			    ]
		    ]
	    ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

	    $query->andFilterWhere([
		    'partner' => $this->partner,
		    'active' => $this->active,
		    'place_id' => $this->placeTitle,
		    'facility_type_id' => $this->facilityTypeTitle
	    ]);

        $query->andFilterWhere(['like', 'facility.title', $this->title]);

	    $query->joinWith(['subject']);
	    $query->andFilterWhere(['like', 'subject.title', $this->subjectTitle]);

	    $query->andFilterWhere([
		   'roomSum.total_bed_nr' => $this->bedNr
	    ]);

        return $dataProvider;
    }
}
