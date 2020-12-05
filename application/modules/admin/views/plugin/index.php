<?php

use app\plugins\Plugin;
use rmrevin\yii\fontawesome\FA;
use yii\helpers\Html;

/* @var $this \yii\web\View */
/* @var $plugins Plugin[] */

$this->title = Yii::t('app', 'Plugins');
$this->params['breadcrumbs'][] = ['label' => 'Plugins', 'url' => ['index']];
?>
<?php if (count($plugins)): ?>
    <div class="row">

        <?php foreach ($plugins as $pluginId => $plugin): ?>
            <div class="col-md-4">
                <div class="box box-<?= $plugin->isEnabled ? 'primary' : 'default' ?> box-plugin">
                    <div class="box-header with-border">
                        <h3 class="box-title"><?= Html::encode($plugin->getTitle()) ?></h3>
                    </div>
                    <div class="box-body no-padding">
                        <div class="plugin-content">
                            <?= Html::img($plugin->getImage(), ['class' => 'plugin-image']) ?>
                            <div class="plugin-description">
                                <?= Html::encode($plugin->getDescription()) ?>
                            </div>
                        </div>
                        <div class="plugin-author">
                            <strong><?= Html::encode($plugin->getAuthor()) ?></strong>
                            <div class="plugin-url">
                                <?= Html::a(Html::encode($plugin->getWebsite()), $plugin->getWebsite()) ?>
                            </div>
                            <div class="plugin-version">
                                <span class="label label-default"><?= Html::encode($plugin->getVersion()) ?></span>
                            </div>
                        </div>
                        <div class="plugin-actions">
                            <?php if ($plugin->isEnabled): ?>
                                <?= Html::a(FA::icon('ban') . 'Disable', ['disable', 'pluginId' => $pluginId], [
                                    'class' => 'btn btn-warning',
                                    'data-method' => 'post'
                                ]) ?>
                                <?php if ($plugin instanceof \app\settings\HasSettings): ?>
                                    <?= Html::a(FA::icon('cog') . 'Settings', ['settings', 'pluginId' => $pluginId], [
                                        'class' => 'btn btn-primary',
                                    ]) ?>
                                <?php endif; ?>
                            <?php else: ?>
                                <?= Html::a(FA::icon('check') . 'Enable', ['enable', 'pluginId' => $pluginId], [
                                    'class' => 'btn btn-primary',
                                    'data-method' => 'post'
                                ]) ?>
                            <?php endif ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<?php else: ?>
    <div class="box box-solid">
        <div class="box-body">
            <?= Yii::t('app', 'No plugins found.') ?>
        </div>
    </div>
<?php endif; ?>
