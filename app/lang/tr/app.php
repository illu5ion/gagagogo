<?php

return array(

	/*
	|	Global
	*/

		'next_post'             => 'Sonraki',
		'gag'                   => 'paylaşım',
		'disabled_demo_version' => 'Bu özellik demo modunda devredışı bırakılmıştır.',
		'demo_message'          => 'Bu site, <b>Arwell 1.6.3</b> versiyonu demo sitesidir - Bazı özellikler devredışı bırakılmış olabilir.',
		'or'                    => 'veya',
		'upload'                => 'Yükle',
		'contact'               => 'İletişim',
		'cancel'                => 'İptal',
		'page'                  => 'Sayfa',
		'pages'                 => 'Sayfalar',
		'category'              => 'Kategori',
		'categories'            => 'Kategoriler',
		'featured'              => 'Beğenilenler',
		'connect_facebook'      => 'Facebook ile bağlan',
		'like_us_on_facebook'   => 'Bizi Facebook\'ta beğenin.',
		'admin'                 => 'Yönetici',
		'user'                  => 'Kullanıcı',
		'banned'                => 'Yasaklı',
		'settings'              => 'Ayarlar',
		'approved'              => 'Onaylanmış',
		'not_approved_yet'      => 'Onaylanmamış',
		'delete'                => 'Sil',	
		'office_address'        => 'Ofis Adresi',
		'phone'                 => 'Telefon',
		'homepage'              => 'Anasayfa',
		'search_results'        => 'Arama Sonuçları',
		'profile_page'          => 'Profil Sayfası',
		'loading_new_gags'      => 'Yeni paylaşımlar yükleniyor...',
		'turkish'               => 'Türkçe',
		'english'               => 'İngilizce',
		'loading'               => 'Yükleniyor...',
		'optional'              => '(opsiyonel)',
		'more'                  => 'Dahası',

	/*
	|	Social
	*/

		'social_share' => 'Paylaş',
		'social_tweet' => 'Twitle',
		'social_pin'   => 'Pinle',

	/*
	|	Plurals
	*/

		'gag_comments' => '{0} yorum yok|{1} 1 yorum|[2,Inf] :count yorum',
		'gag_votes'    => ':vote_amt oy',

	/*
	|	Nav
	*/

		'me'           => 'Ben',
		'my_profile'   => 'Benim profilim',
		'nav_order'    => 'Sırala',
		'nav_top'      => 'En üst',
		'nav_hot'      => 'Sıcak',
		'nav_trending' => 'Trend',
		'nav_fresh'    => 'Taze',

	/*
	|	Sign in - sign up
	*/

		'sign_in'           => 'Giriş',
		'sign_out'          => 'Çıkış',
		'register'          => 'Kayıt',
		'enter_credentials' => 'Lütfen giriş için bilgilerinizi girin.',
		'username'          => 'Kullanıcı adı',
		'password'          => 'Şifre',
		'email'             => 'Email',
		'captcha'           => 'Doğrulama',
		'remember_me'       => 'Beni hatırla',
		'report'            => 'Şikayet et',

	/*
	|	User page
	*/

		'user_public_profile_of' => 'Bu sayfa <i>:username</i> kullanıcısının sayfasıdır.',
		'user_permission_level'  => 'Yetki seviyesi',
		'user_comments'          => ':username\'ın yorumları',
		'user_votes_taken'       => 'Toplamda aldığı oylar',
		'user_votes_given'       => 'Toplamda verdiği oylar',
		'user_shares'            => 'Paylaşım sayısı',

	/*
	|	Upload modal
	*/

		'upload_images'      => 'Resim yükle',
		'upload_media'       => 'Video yükle',
		'upload_title'       => 'Başlık',
		'upload_credits'     => 'Kaynak',
		'upload_url'         => 'Link girin',
		'upload_url_helper'  => 'Youtube, Vimeo, Vine vb. linkler',
		'upload_choose_file' => 'Yüklenecek resmi seçin',
		'upload_success'     => 'Paylaşımın başarıyla yüklendi!',

	/*
	|	Profile page
	*/

		'profile_welcome'         => 'Profil sayfanıza hoşgeldiniz, <b>:username</b>',
		'profile_change_password' => 'Şifre Değiştir',
		'profile_new_password'    => 'Yeni şifre',
		'profile_again'           => 'tekrar',
		'profile_captcha'         => 'Doğrulama resmi',
		'profile_your_comments'   => 'Senin yorumların',
		'profile_comment_header'  => ':url tarafından :date tarihinde paylaşıldı.',

	/*
	|	Comments area
	*/

		'comment_recent_comments' => 'Yeni yorumlar',
		'comment_posted_by'       => ':url tarafından :date tarihinde paylaşıldı.',
		'comment_post_a_comment'  => 'Yorumunu paylaş',

	/*
	|	Category page
	*/

		'category_in_this_category' => '<i>[:catname]</i> kategorisindeki paylaşımlar.',

	/*
	|	Contact page
	*/

		'contact_leave_us_a_message' => 'Bize bir mesaj bırakın.',
		'contact_ur_name'            => 'Adınız',
		'contact_ur_email'           => 'Email adresiniz',
		'contact_ur_message'         => 'Mesajınız',
		'contact_send_my_message'    => 'Mesajımı gönder',
		'contact_other_ways'         => 'Alternatif yollar',

	/*
	|	Gag page
	*/

		'gag_sender' => 'Gönderen: <i>:username</i>',
		'gag_date'   => 'Tarih: <i>:date</i>',
		'gag_seen'   => '<i>:count</i> defa görüldü',

	/*
	|	Notifications
	*/

		'notifications'                             => 'Bildirimler',
		'notification_comment'                      => '<a href="' . URL::to('u/:username') . '"><b>:username</b></a> paylaşımına bir yorum yaptı.',
		'notification_vote'                         => '<a href="' . URL::to('u/:username') . '"><b>:username</b></a> paylaşımına oy verdi.',
		'notification_check_it'                     => 'Şimdi gör',
		'notification_view_all'                     => 'Hepsini Gör',
		'notification_no_new_notification_is_found' => 'Yeni bir bildirim bulunamadı.',
		'notification_new_notification'             => 'Yeni bir bildiriminiz var.',
		'notification_successfully_trashed'         => 'Bildirimler başarıyla temizlendi.',
		'notification_login_required'               => 'Bildirim almak için giriş yapmanız gerekiyor.',

	/*
	|	Comment
	*/
		
		'comment'                   => 'Yorum',
		'your_comment'              => 'Yorumunuz',
		'publish_my_comment'        => 'Yorumumu paylaş',
		'leave_your_comment'        => 'Yorumunuzu paylaşın.',
		'logged_in_as'              => '<b>:username</b> olarak giriş yapıldı',
		'comment_logged_out_notice' => 'Yorum paylaşmak için giriş yapmış olmalısınız. Lütfen <a data-toggle="modal" data-target="#loginModal" style="cursor: pointer;">buraya</a> tıklayarak giriş yapın.',

	/*
	|	Errors
	*/

		'error'                                => 'Hata',
		'info'                                 => 'Bilgi',
		'warning'                              => 'Uyarı',
		'success'                              => 'Başarı',
		'error_not_found'                      => 'Hiçbir :name bulunamadı.',
		'category_empty'                       => 'Üzgünüm, bu kategoride birşey yok.',
		'error_wrong_password'                 => 'Kullanıcı adı ve şifre uyuşmuyor.',
		'error_banned'                         => 'Hesabınız yasaklanmış.',
		'error_registered_but_could_not_login' => 'Başarıyla kayıt olundu, ancak otomatik giriş yapılamadı.',
		'error_could_not_delete_comment'       => 'Bu yorum silinemiyor.',
		'error_convert_exception'              => 'Resmi GIF formatından PNGye döndürürken hata alındı.',
		'error_not_a_valid_url'                => 'Bu video linki doğru görünmüyor.',
		'error_vine_image_not_obtained'        => 'Vine videosunun resmi alınırken bir hata oluştu.',
		'error_comment_cooldown'               => 'Yavaşla! Çok hızlı yorum yapmaya çalışıyorsun.',

	/*
	|	Successes
	*/

		'success_logged_in'                     => 'Başarıyla giriş yapıldı.',
		'success_registered_and_logged_in'      => 'Başarıyla kayıt olundu ve giriş yapıldı.',
		'success_sign_up'                       => 'Başarıyla kayıt oldunuz. Artık giriş yapabilirsiniz.',
		'success_comment_awaits_admin_approval' => 'Yorumunuz başarıyla paylaşıldı, ancak yönetici onayından sonra görünür olacak.',
		'success_comment_auto_approved'         => 'Yorumunuz başarıyla paylaşıldı ve otomatik olarak onaylandı.',
		'success_comment_deleted'               => 'Yorum başaryla silindi.',
		'success_message_sent'					=> 'Mesajınız başarıyla gönderildi.',
		'success_password_changed'				=> 'Şifreniz başarıyla değiştirildi.'

);