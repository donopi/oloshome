<?php

namespace app\notifications;

use app\helpers\Url;
use Yii;
use app\helpers\Html;

/**
 * @author Alexander Kononenko <contact@hauntd.me>
 * @package app\notifications
 */
class GiftReceived extends BaseNotification
{
    /**
     * @inheritdoc
     */
    public $viewName = 'notifications/gift-received';
    /**
     * @var int
     */
    public $sortOrder = 120;

    /**
     * @inheritdoc
     */
    public function category()
    {
        return new GiftReceivedCategory();
    }

    /**
     * @inheritdoc
     */
    public function getUrl()
    {
        return Url::to(['/profile/view']);
    }

    /**
     * @inheritdoc
     */
    public function getMailSubject()
    {
        return Yii::t('app', 'New gift received');
    }

    public function render()
    {
        return $this->html();
    }

    /**
     * @inheritdoc
     */
    public function html()
    {
        return Yii::t('app', '{name} sent you a gift.', [
            'name' => Html::tag('strong',
                Html::a(Html::encode($this->sender->profile->getDisplayName()),
                    ['/profile/view', 'username' => $this->sender->username])
            ),
        ]);
    }
}
