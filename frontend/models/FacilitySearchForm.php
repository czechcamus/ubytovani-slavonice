<?php
/**
 * Created by PhpStorm.
 * User: Pavel
 * Date: 26.5.2015
 * Time: 13:31
 */

namespace frontend\models;

use common\models\facility\Facility;
use common\models\facility\Room;
use common\models\property\FacilityProperty;
use common\models\property\RoomProperty;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use yii\helpers\ArrayHelper;

/**
 * Class FacilitySearchForm represents the model behind the frontend search form
 * @package frontend\models
 */
class FacilitySearchForm extends Model
{
	public $place_id;
	public $facility_type_id;
	public $priceFrom;
	public $priceTo;
	public $bedNr;
	public $facilityProperties = [];
	public $roomProperties = [];

	/**
	 * @inheritdoc
	 */
	public function __construct() {
		parent::__construct();
		$facilityProperties = ArrayHelper::map(FacilityProperty::find()->orderBy('title')->all(), 'id', 'title');
		$roomProperties = ArrayHelper::map(RoomProperty::find()->orderBy('title')->all(), 'id', 'title');
		$selectedFacilityProperties = isset(\Yii::$app->request->queryParams['FacilitySearchForm']['facilityProperties']) ? \Yii::$app->request->queryParams['FacilitySearchForm']['facilityProperties'] : [];
		$selectedRoomProperties = isset(\Yii::$app->request->queryParams['FacilitySearchForm']['roomProperties']) ? \Yii::$app->request->queryParams['FacilitySearchForm']['roomProperties'] : [];
		while ($title = current($facilityProperties)) {
			$this->facilityProperties[ key($facilityProperties) ] = [
				'title' => $title,
				'value' => isset( $selectedFacilityProperties[ key($facilityProperties) ] ) ? 1 : 0
			];
			next($facilityProperties);
		}
		while ($title = current($roomProperties)) {
			$this->roomProperties[ key($roomProperties) ] = [
				'title' => $title,
				'value' => isset( $selectedRoomProperties[ key($roomProperties) ] ) ? 1 : 0
			];
			next($roomProperties);
		}
	}

	/**
	 * @inheritdoc
	 */
	public function rules() {
		return [
			[['place_id', 'facility_type_id', 'priceFrom', 'priceTo', 'bedNr'], 'integer']
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels()
	{
		return [
			'priceFrom' => \Yii::t('front', 'Price from (person and night)'),
			'priceTo' => \Yii::t('front', 'Price to (person and night)'),
			'bedNr' => \Yii::t('front', 'Number of beds'),
			'place_id' => \Yii::t('front', 'Place of accomodation facility'),
			'facility_type_id' => \Yii::t('front', 'Type of accomodation facility')
		];
	}

	/**
	 * @inheritdoc
	 */
	public function scenarios() {
		return Model::scenarios();
	}

	/**
	 * Creates data provider instance with search query applied
	 * @param $params
	 * @return ActiveDataProvider
	 */
	public function search( $params ) {
		$query = Facility::find()->andWhere(['active' => 1]);

		$dataProvider = new ActiveDataProvider([
			'query' => $query,
			'sort' => [
				'defaultOrder' => [
					'partner' => SORT_DESC
				]
			],
			'pagination' => [
				'pageSize' => 10
			]
		]);

		if (!($this->load($params) && $this->validate())) {
			return $dataProvider;
		} else {
			// place selection
			if ($params['FacilitySearchForm']['place_id'] > 0)
				$query->andWhere(['place_id' => $params['FacilitySearchForm']['place_id']]);

			// facility type selection
			if ($params['FacilitySearchForm']['facility_type_id'] > 0)
				$query->andWhere(['facility_type_id' => $params['FacilitySearchForm']['facility_type_id']]);

			// suitable rooms count
			if ($params['FacilitySearchForm']['bedNr'] > 0) {
				$roomsCountSubQuery = Room::find()->select(['facility_id'])->andWhere(['facility_id' => $query->column()])->groupBy(['facility_id'])->having(['>=', 'SUM( bed_nr * nr )', $params['FacilitySearchForm']['bedNr']]);
				$query->andWhere(['id' => $roomsCountSubQuery]);
			}

			// price selection
			if (($params['FacilitySearchForm']['priceFrom'] > 0) || ($params['FacilitySearchForm']['priceTo'] > 0)) {
				$priceFrom = ($params['FacilitySearchForm']['priceFrom'] > 0 ? $params['FacilitySearchForm']['priceFrom'] : 0);
				$priceTo = ($params['FacilitySearchForm']['priceTo'] > 0 ? $params['FacilitySearchForm']['priceTo'] : 9999999);
				$priceSubQuery = Room::find()->select(['facility_id'])->andWhere(['facility_id' => $query->column()])->innerJoinWith(['prices'])
					->andWhere(['>=', 'price.fee', $priceFrom])->andWhere(['<=', 'price.fee', $priceTo])->groupBy(['facility_id']);
				$query->andWhere(['id' => $priceSubQuery]);
			}

			// room property selection
			if (isset($params['FacilitySearchForm']['roomProperties'])) {
				$activeProperties = array_keys( $params['FacilitySearchForm']['roomProperties'] );
				$propertyCount    = count( $activeProperties );
				$roomPropertySubQuery = Room::find()->select(['facility_id'])->distinct()->andWhere(['facility_id' => $query->column()])->innerJoinWith(['roomProperties'])
					->andWhere(['object_property.property_id' => $activeProperties, 'object_property.property_value' => 1])->groupBy(['room.id'])->having(['COUNT(*)' => $propertyCount]);
				$query->andWhere(['id' => $roomPropertySubQuery]);
			}

			// facility property selection
			if (isset($params['FacilitySearchForm']['facilityProperties'])) {
				$activeProperties = array_keys($params['FacilitySearchForm']['facilityProperties']);
				$propertyCount = count($activeProperties);
				$facilityPropertySubQuery = Facility::find()->select(['facility.id'])->andWhere(['facility.id' => $query->column()])->innerJoinWith(['facilityProperties'])
					->andWhere(['object_property.property_id' => $activeProperties, 'object_property.property_value' => 1])->groupBy(['facility.id'])->having(['COUNT(*)' => $propertyCount]);
				$query->andWhere(['id' => $facilityPropertySubQuery]);
			}
		}

		return $dataProvider;
	}
}