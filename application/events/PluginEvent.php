<?php

namespace app\events;

use app\base\Event;
use app\plugins\Plugin;

/**
 * @author Alexander Kononenko <contact@hauntd.me>
 * @package app\components\user\events
 * @property Plugin $plugin
 */
class PluginEvent extends Event
{
    /**
     * @var Plugin
     */
    private $_plugin;

    /**
     * @return Plugin
     */
    public function getPlugin()
    {
        return $this->_plugin;
    }

    /**
     * @param Plugin $plugin
     */
    public function setPlugin(Plugin $plugin)
    {
        $this->_plugin = $plugin;
    }
}
