<?php namespace frontend\utilities\materialize;

use Yii;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

/**
 * NavBar renders a navbar HTML component.
 *
 * Any content enclosed between the [[begin()]] and [[end()]] calls of NavBar
 * is treated as the content of the navbar. You may use widgets such as [[Nav]]
 * or [[\yii\widgets\Menu]] to build up such content. For example,
 *
 * ```php
 * use webmaxx\materialize\Nav;
 * use webmaxx\materialize\NavBar;
 *
 * NavBar::begin(['brandLabel' => 'NavBar Test']);
 * echo Nav::widget([
 *     'items' => [
 *         ['label' => 'Home', 'url' => ['/site/index']],
 *         ['label' => 'About', 'url' => ['/site/about']],
 *     ],
 * ]);
 * NavBar::end();
 * ```
 * @see http://materializecss.com/navbar.html
 * @author webmaxx <webmaxx@webmaxx.name>
 * @since 2.0
 */
class NavBar extends Widget
{
    /**
     * @var array the HTML attributes for the widget container tag. The following special options are recognized:
     *
     * - tag: string, defaults to "nav", the name of the container tag.
     *
     * @see \yii\helpers\Html::renderTagAttributes() for details on how attributes are being rendered.
     */
    public $options = [];
    /**
     * @var string|boolean the text of the brand of false if it's not used. Note that this is not HTML-encoded.
     */
    public $brandLabel = false;
    /**
     * @param array|string|boolean $url the URL for the brand's hyperlink tag. This parameter will be processed by [[Url::to()]]
     * and will be used for the "href" attribute of the brand link. Default value is false that means
     * [[\yii\web\Application::homeUrl]] will be used.
     */
    public $brandUrl = false;
    /**
     * @var array the HTML attributes of the brand link.
     * @see \yii\helpers\Html::renderTagAttributes() for details on how attributes are being rendered.
     */
    public $brandOptions = [];
    /**
     * @var boolean if true, then navbar fixed on scroll
     */
    public $fixed = false;
    /**
     * @var array the HTML attributes of the fixed container.
     * @see \yii\helpers\Html::renderTagAttributes() for details on how attributes are being rendered.
     */
    public $fixedContainerOptions = [];
    /**
     * @var array the HTML attributes of the wrapper container.
     * @see \yii\helpers\Html::renderTagAttributes() for details on how attributes are being rendered.
     */
    public $wraperContainerOptions = [];

    /**
     * Initializes the widget.
     */
    public function init()
    {
        parent::init();
        $this->clientOptions = false;
        if ($this->fixed) {
            if (!isset($this->fixedContainerOptions['class'])) {
                Html::addCssClass($this->fixedContainerOptions, 'navbar-fixed');
            }
            echo Html::beginTag('div', $this->fixedContainerOptions);
        }
        Html::addCssClass($this->brandOptions, 'brand-logo');
        $options = $this->options;
        $tag = ArrayHelper::remove($options, 'tag', 'nav');
        echo Html::beginTag($tag, $options);
        if (!isset($this->wraperContainerOptions['class'])) {
            Html::addCssClass($this->wraperContainerOptions, 'nav-wrapper');
        }
        echo Html::beginTag('div', $this->wraperContainerOptions);
        if ($this->brandLabel !== false) {
            Html::addCssClass($this->brandOptions, 'brand-logo');
            echo Html::a($this->brandLabel, $this->brandUrl === false ? Yii::$app->homeUrl : $this->brandUrl, $this->brandOptions);
        }
    }

    /**
     * Renders the widget.
     */
    public function run()
    {
	    $tag = ArrayHelper::remove($this->wraperContainerOptions, 'tag', 'div');
	    echo Html::endTag($tag);
        $tag = ArrayHelper::remove($this->options, 'tag', 'nav');
        echo Html::endTag($tag, $this->options);
        if ($this->fixed) {
            echo Html::endTag('div');
        }
    }
}
