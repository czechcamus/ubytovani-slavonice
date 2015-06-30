<?php
namespace frontend\controllers;

use frontend\models\FacilitySearchForm;
use frontend\utilities\FrontendController;
use Yii;
use frontend\models\ContactForm;

/**
 * Site controller
 */
class SiteController extends FrontendController
{
    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
	        'contactCaptcha' => [
		        'class' => 'yii\captcha\CaptchaAction',
		        'backColor' => 0x2196f3,
		        'foreColor' => 0x90caf9,
		        'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
	        ]
        ];
    }

    public function actionIndex()
    {
	    $searchModel = new FacilitySearchForm();
        return $this->render('index', compact('searchModel'));
    }

    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
	        $session = Yii::$app->session;
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                $session->setFlash('info', Yii::t('front', 'Thank you for contacting us. We will respond to you as soon as possible.'));
            } else {
                $session->setFlash('info', Yii::t('front', 'There was an error sending email.'));
            }
        }
	    return $this->goBack();
    }
}
