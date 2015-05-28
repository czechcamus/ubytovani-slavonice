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
 * Class FacilitySearch represents the model behind the frontend search form
 * @package frontend\models
 */
class FacilitySearch extends Facility
{
	public $priceFrom;
	public $priceTo;
	public $bedNr;
	public $verifyCode;
	public $facilityProperties = [];
	public $roomProperties = [];

	/**
	 * @inheritdoc
	 */
	public function __construct() {
		$this->facilityProperties = ArrayHelper::map(FacilityProperty::find()->orderBy('title')->all(), 'id', 'title');
		$this->roomProperties = ArrayHelper::map(RoomProperty::find()->orderBy('title')->all(), 'id', 'title');
	}

	/**
	 * @inheritdoc
	 */
	public function rules() {
		return [
			[['priceFrom', 'priceTo', 'bedNr'], 'integer'],
			['verifyCode', 'captcha']
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
			'verifyCode' => \Yii::t('front', 'Verification code'),
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
		$query = Facility::find();
		$subQuery = Room::find()
            ->select('facility_id, SUM(bed_nr * nr) AS total_bed_nr')
            ->groupBy('facility_id');
		$query->leftJoin(['roomSum' => $subQuery], 'roomSum.facility_id = facility.id');

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
		}

		return $dataProvider;
	}
}