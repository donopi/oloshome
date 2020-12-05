<?php

namespace app\modules\admin\controllers;

use app\settings\HasSettings;
use app\settings\SettingsAction;
use Yii;
use yii\filters\VerbFilter;

/**
 * @author Alexander Kononenko <contact@hauntd.me>
 * @package app\modules\admin\controllers
 */
class PluginController extends \app\modules\admin\components\Controller
{
    /**
     * @return array
     * @throws \Exception
     */
    public function actions()
    {
        $pluginId = Yii::$app->request->get('pluginId');
        $plugins = Yii::$app->pluginManager->getEnabledPlugins();

        $actions = [];
        if (isset($plugins[$pluginId]) && $plugins[$pluginId] instanceof HasSettings) {
            $plugin = $plugins[$pluginId];
            $actions['settings'] = [
                'class' => SettingsAction::class,
                'category' => "plugin.$pluginId",
                'title' => Yii::t('app', 'Plugin settings'),
                'viewFile' => 'settings',
                'viewParams' => [
                    'plugin' => $plugin,
                ],
                'items' => $plugin->getSettings(),
            ];
        }

        return $actions;
    }

    /**
     * @return array
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'enable' => ['post'],
                    'disable' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index', [
            'plugins' => Yii::$app->pluginManager->getAvailablePlugins(),
        ]);
    }

    /**
     * @param $pluginId
     * @return \yii\web\Response
     * @throws \yii\base\Exception
     */
    public function actionEnable($pluginId)
    {
        if (Yii::$app->pluginManager->enablePlugin($pluginId)) {
            Yii::$app->session->setFlash('success', Yii::t('app', 'Plugin has been enabled'));
        }

        return $this->redirect(['index']);
    }

    /**
     * @param $pluginId
     * @return \yii\web\Response
     * @throws \yii\db\Exception
     */
    public function actionDisable($pluginId)
    {
        if (Yii::$app->pluginManager->disablePlugin($pluginId)) {
            Yii::$app->settings->remove("plugin.$pluginId");
            Yii::$app->session->setFlash('success', Yii::t('app', 'Plugin has been disabled'));
        }

        return $this->redirect(['index']);
    }
}
