<?php
/**
 * Created by PhpStorm.
 * User: Pavel
 * Date: 27.5.2015
 * Time: 17:30
 */

namespace frontend\components;

use common\models\facility\Availability;
use yii\base\Widget;
use yii2fullcalendar\models\Event;

/**
 * Class Rooms displays rooms of facility
 * @package frontend\components
 */

class Calendar extends Widget {

	/**
	 * @var integer id of room
	 */
	public $roomId = 0;

	/**
	 * @var array calendar header options
	 */
	public $header = [
		'left' => 'prev',
		'center' => 'title',
		'right' => 'next'
	];

	/**
	 * @var array options of calendar container
	 */
	public $options = [
		'lang' => 'cs'
	];

	/**
	 * @var array of calendar events
	 */
	private $_events = [];

	/**
	 * Prepares array of events
	 */
	public function init() {
		$availabilities = Availability::findAll(['room_id' => $this->roomId]);
		foreach ( $availabilities as $availability ) {
			$event = new Event();
			$event->id = $availability->id;
			$event->color = 'orange';
			$event->title = \Yii::t('front', 'unavailable');
			$event->start = $availability->date_from;
			$event->end = date('Y-m-d', strtotime($availability->date_to)+86400);
			$this->_events[] = $event;
		}
	}

	/**
	 * @return string returns view file for displaying calendar
	 */
	public function run() {
		return $this->render('calendar', [
			'events' => $this->_events,
			'header' => $this->header,
			'options' => $this->options
		]);
	}
}