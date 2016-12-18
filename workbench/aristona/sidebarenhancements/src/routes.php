<?php
// Admin
	Route::group(array('before' => 'auth_admin', 'prefix' => 'admin'), function () {

		Route::group(array('prefix' => 'plugin'), function () {

			Route::group(array('prefix' => 'sidebarenhancements'), function () {

				Route::get('/', 'SidebarEnhancementsController@index');

			});


		});

	});
?>
