<?php
/* @var $this yii\web\View */
/* @var $events \yii2fullcalendar\models\Event[] */
/* @var $header array options of header */
/* @var $options array options of calendar container */

use yii2fullcalendar\yii2fullcalendar;

echo yii2fullcalendar::widget(compact('events', 'header', 'options'));
