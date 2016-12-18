<?php namespace Admin;

use BaseController;
use View;
use Contact;

class PluginManagerController extends BaseController
{
    public function install($folder)
    {
        // Check if we already installed this plugin.
        $count = \Plugin::where('folder_name', $folder)->count();

        if ($count > 0) {
            return \Redirect::to('admin');
        }

        $name = \PluginManager::getPluginNameByFolder($folder);

        \App::register('Aristona\\' . $name . '\\PluginServiceProvider');
        $plugin  = \App::make($name);
        $attempt = $plugin->install();

        if ($attempt === true) {
            $plugin = new \Plugin;
                $plugin->name        = $name;
                $plugin->folder_name = $folder;
                $plugin->active      = 1;
            $plugin->save();
        }

        return \Redirect::to('admin');
    }

    public function uninstall($folder)
    {
        // Check if we already uninstalled this plugin.
        $count = \Plugin::where('folder_name', $folder)->count();

        if ($count === 0) {
            return \Redirect::to('admin');
        }

        $name = \PluginManager::getPluginNameByFolder($folder);

        \App::register('Aristona\\' . $name . '\\PluginServiceProvider');
        $plugin  = \App::make($name);
        $attempt = $plugin->uninstall();

        if ($attempt === true) {
            \Plugin::where('folder_name', $folder)->delete();
        }

        return \Redirect::to('admin');
    }
}
