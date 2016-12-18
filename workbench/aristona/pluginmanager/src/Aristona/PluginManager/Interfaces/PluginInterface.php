<?php namespace Aristona\PluginManager\Interfaces;

interface PluginInterface
{
    public function getName();
    public function getFolder();

    // Used to keep track of installation status of plugins
    public function install();
    public function uninstall();

    // Provides css to head or js to foot.
    public function getProvidedCss();
    public function getProvidedJs();
}