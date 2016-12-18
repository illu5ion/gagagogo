<?php

return array(
	
	'installer'                 => 'Yükleyici',
	'install'                   => 'Yükle',
	'updater'                   => 'Updater',
	'update'                    => 'Güncelle',
	'username'                  => 'Kullanıcı adı',
	'password'                  => 'Şifre',
	'again'                     => 'tekrar',
	'success'                   => 'Başarı',
	'i_want_to_install'         => 'Uygulamayı yüklemek istiyorum.',
	'i_want_to_update'          => 'Yüklenmiş uygulamamı güncellemek istiyorum.',
	'install_warning'           => 'Uyarı: Bu özellik veritabanını baştan kurar. Şuana kadar veritabanına eklediğiniz herşey bu esnada silinir.',
	'update_warning'            => 'Uyarı: Eğer bu uygulamayı ilk defa kuruyorsanız, önce yüklemeyi kullanın.',
	'installer_success_message' => Config::get('site.application_name') . ' uygulaması başarıyla kuruldu. Şimdi, <a href="' . URL::to('/') . '">anasayfaya</a> geçin ve biraz önce girdiğiniz bilgilerle giriş yapın.',
	'updater_success_message'   => Config::get('site.application_name') . ' uygulaması başarıyla güncellendi. Şimdi, <a href="' . URL::to('/') . '">anasayfaya</a> dönün.',
);