<?php
use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Yii::$app->name . ' - ' . Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
    <?php $this->beginBody() ?>
    <div class="wrap">
        <?php
            NavBar::begin([
                'brandLabel' => 'Správa ubytování ve Slavonicích',
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar-inverse navbar-fixed-top',
                ],
            ]);
            $menuItems = [
                ['label' => Yii::t('back', 'Home'), 'url' => ['/site/index']],
                ['label' => Yii::t('back', 'Subjects'), 'url' => ['/subject/index']],
	            ['label' => Yii::t('back', 'Facilities'), 'url' => ['/facility/index']],
                ['label' => Yii::t('back', 'Settings'), 'items' => [
	                ['label' => Yii::t('back', 'Facility Properties'), 'url' => ['/facility-property/index']],
	                ['label' => Yii::t('back', 'Room Properties'), 'url' => ['/room-property/index']],
	                '<li role="presentation" class="divider"></li>',
                    ['label' => Yii::t('back', 'Address Types'), 'url' => ['/address-type/index']],
                    ['label' => Yii::t('back', 'Email Types'), 'url' => ['/email-type/index']],
                    ['label' => Yii::t('back', 'Phone Types'), 'url' => ['/phone-type/index']],
	                ['label' => Yii::t('back', 'Person Types'), 'url' => ['/person-type/index']],
                    ['label' => Yii::t('back', 'Facility Types'), 'url' => ['/facility-type/index']],
                    ['label' => Yii::t('back', 'Internet Types'), 'url' => ['/internet-type/index']],
                    ['label' => Yii::t('back', 'Parking Types'), 'url' => ['/parking-type/index']],
	                ['label' => Yii::t('back', 'Catering Types'), 'url' => ['/catering-type/index']],
                    ['label' => Yii::t('back', 'Room Types'), 'url' => ['/room-type/index']],
	                '<li role="presentation" class="divider"></li>',
	                ['label' => Yii::t('back', 'Value Added Taxes'), 'url' => ['/tax/index']],
                    '<li role="presentation" class="divider"></li>',
	                ['label' => Yii::t('back', 'Places'), 'url' => ['/place/index']],
                    ['label' => Yii::t('back', 'States'), 'url' => ['/state/index']],
                ]],
            ];
            if (Yii::$app->user->isGuest) {
                $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
            } else {
                $menuItems[] = [
                    'label' => 'Logout (' . Yii::$app->user->identity->username . ')',
                    'url' => ['/site/logout'],
                    'linkOptions' => ['data-method' => 'post']
                ];
            }
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => $menuItems,
            ]);
            NavBar::end();
        ?>

        <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= $content ?>
        </div>
    </div>

    <footer class="footer">
        <div class="container">
        <p class="pull-left">&copy; Slavonická renesanční, o.p.s. <?= date('Y') ?></p>
        <p class="pull-right"><?= Yii::powered() ?></p>
        </div>
    </footer>

    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
