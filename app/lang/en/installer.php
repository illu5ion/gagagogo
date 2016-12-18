<?php

return array(
	
	'installer'                 => 'Installer',
	'install'                   => 'Install',
	'updater'                   => 'Updater',
	'update'                    => 'Update',
	'username'                  => 'Username',
	'password'                  => 'Password',
	'again'                     => 'again',
	'success'                   => 'Success',
	'i_want_to_install'         => 'I want to install the application.',
	'i_want_to_update'          => 'I want to update my currently installed application.',
	'install_warning'           => 'Warning: This feature makes a fresh install. Your entries in the database will be wiped during the process.',
	'update_confirmation'       => 'Clicking this link will update your database. Want to continue?',
	'installer_success_message' => 'You have successfully installed ' . Config::get('site.application_name') . '. Now, head to <a href="' . URL::to('/') . '">home page</a> and login with the credentials you have used.',
	'updater_success_message'   => 'You have successfully updated ' . Config::get('site.application_name') . '. Now, return to <a href="' . URL::to('/') . '">home page</a>.',
);