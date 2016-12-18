<?php

function arwell_installed()
{
    $is_installed = File::get(storage_path() . '/installed.txt');

    if (trim($is_installed) === "true") {
        return true;
    }

    return false;
}
