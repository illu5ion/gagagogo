<?php

return array(

	/*
	|	Global
	*/

		'next_post'             => 'Next gag',
		'gag'                   => 'gag',
		'disabled_demo_version' => 'This feature is disabled in demo version',
		'demo_message'          => 'This is demo version of <b>Arwell 1.6.3</b> - Some features may be disabled.',
		'or'                    => 'or',
		'upload'                => 'Upload',
		'contact'               => 'Contact',
		'cancel'                => 'Cancel',
		'page'                  => 'Page',
		'pages'                 => 'Pages',
		'category'              => 'Category',
		'categories'            => 'Categories',
		'featured'              => 'Featured',
		'connect_facebook'      => 'Connect with Facebook',
		'like_us_on_facebook'   => 'Like us on Facebook',
		'admin'                 => 'Admin',
		'user'                  => 'User',
		'banned'                => 'Banned',
		'settings'              => 'Settings',
		'approved'              => 'Approved',
		'not_approved_yet'      => 'Not approved yet',
		'delete'                => 'Delete',	
		'office_address'        => 'Office Address',
		'phone'                 => 'Phone',
		'homepage'              => 'Homepage',
		'search_results'        => 'Search Results',
		'profile_page'          => 'Profile Page',
		'loading_new_gags'      => 'Loading new gags...',
		'turkish'               => 'Turkish',
		'english'               => 'English',
		'loading'               => 'Loading...',
		'optional'              => '(optional)',
		'more'                  => 'More',

	/*
	|	Social
	*/

		'social_share' => 'Share',
		'social_tweet' => 'Tweet',
		'social_pin'   => 'Pin it',

	/*
	|	Plurals
	*/

		'gag_comments' => '{0} no comments|{1} 1 comment|[2,Inf] :count comments',
		'gag_votes'    => ':vote_amt votes',

	/*
	|	Nav
	*/

		'me'           => 'Me',
		'my_profile'   => 'My profile',
		'nav_order'    => 'Order by',
		'nav_top'      => 'Top',
		'nav_hot'      => 'Hot',
		'nav_trending' => 'Trending',
		'nav_fresh'    => 'Fresh',

	/*
	|	Sign in - sign up
	*/

		'sign_in'           => 'Sign in',
		'sign_out'          => 'Sign out',
		'register'          => 'Register',
		'enter_credentials' => 'Please enter your credentials to sign in.',
		'username'          => 'Username',
		'password'          => 'Password',
		'email'             => 'Email',
		'captcha'           => 'Captcha',
		'remember_me'       => 'Remember me',
		'report'            => 'Report this',

	/*
	|	User page
	*/

		'user_public_profile_of' => 'This is the public profile of <i>:username</i>',
		'user_permission_level'  => 'Permission level',
		'user_comments'          => ':username\'s comments',
		'user_votes_taken'       => 'Total votes taken',
		'user_votes_given'       => 'Total votes given',
		'user_shares'            => 'Gags shared',

	/*
	|	Upload modal
	*/

		'upload_images'      => 'Upload image',
		'upload_media'       => 'Upload media',
		'upload_title'       => 'Title',
		'upload_credits'     => 'Credits',
		'upload_url'         => 'Enter URL',
		'upload_url_helper'  => 'Youtube, Vimeo, Vine etc. link',
		'upload_choose_file' => 'Select an image to upload',
		'upload_success'     => 'You have successfully uploaded your gag!',

	/*
	|	Profile page
	*/

		'profile_welcome'         => 'Welcome to your profile page, <b>:username</b>',
		'profile_change_password' => 'Change password',
		'profile_new_password'    => 'New password',
		'profile_again'           => 'again',
		'profile_captcha'         => 'Captcha image',
		'profile_your_comments'   => 'Your comments',
		'profile_comment_header'  => 'Posted by :url about :date',

	/*
	|	Comments area
	*/

		'comment_recent_comments' => 'Recent comments',
		'comment_posted_by'       => 'Posted by :url about :date',
		'comment_post_a_comment'  => 'Post a comment',

	/*
	|	Category page
	*/

		'category_in_this_category' => 'Gags in <i>[:catname]</i> category.',

	/*
	|	Contact page
	*/

		'contact_leave_us_a_message' => 'Leave us a message',
		'contact_ur_name'            => 'Your name',
		'contact_ur_email'           => 'Your email',
		'contact_ur_message'         => 'Your message',
		'contact_send_my_message'    => 'Send my message',
		'contact_other_ways'         => 'Other ways to contact us',

	/*
	|	Gag page
	*/

		'gag_sender' => 'Sender: <i>:username</i>',
		'gag_date'   => 'Date: <i>:date</i>',
		'gag_seen'   => 'Seen: <i>:count</i> times.',

	/*
	|	Notifications
	*/

		'notifications'                             => 'Notifications',
		'notification_comment'                      => '<a href="' . URL::to('u/:username') . '"><b>:username</b></a> has commented on your post.',
		'notification_vote'                         => '<a href="' . URL::to('u/:username') . '"><b>:username</b></a> voted on your post.',
		'notification_check_it'                     => 'Check it out',
		'notification_view_all'                     => 'View all',
		'notification_no_new_notification_is_found' => 'No new notification is found.',
		'notification_new_notification'             => 'You have a new notification.',
		'notification_successfully_trashed'         => 'Notifications successfully trashed.',
		'notification_login_required'               => 'You need to be logged in to receive notifications.',

	/*
	|	Comment
	*/

		'comment'                   => 'Comment',
		'your_comment'              => 'Your comment',
		'publish_my_comment'        => 'Publish my comment',
		'leave_your_comment'        => 'Leave your comment.',
		'logged_in_as'              => 'Logged in as <b>:username</b>',
		'comment_logged_out_notice' => 'You must be logged in to leave comments. Please login by clicking <a data-toggle="modal" data-target="#loginModal" style="cursor: pointer;">here.</a>',

	/*
	|	Errors
	*/

		'error'                                => 'Error',
		'info'                                 => 'Info',
		'warning'                              => 'Warning',
		'success'                              => 'Success',
		'error_not_found'                      => 'No :name is found.',
		'category_empty'                       => 'Sorry, this category seems to be empty.',
		'error_wrong_password'                 => 'Username and password does not match.',
		'error_banned'                         => 'You are banned.',
		'error_registered_but_could_not_login' => 'You have successfully registered, but could not autologin.',
		'error_could_not_delete_comment'       => 'Could not delete this comment.',
		'error_convert_exception'              => 'An error occured converting GIF to PNG.',
		'error_not_a_valid_url'                => 'This is not a valid video link.',
		'error_vine_image_not_obtained'        => 'An error occured while fetching image of the vine video.',
		'error_comment_cooldown'               => 'Slow down! You are trying to comment too fast.',

	/*
	|	Successes
	*/

		'success_logged_in'                     => 'You have successfully logged in.',
		'success_registered_and_logged_in'      => 'You have successfully registered and logged in.',
		'success_sign_up'                       => 'You have successfully registered and may now login.',
		'success_comment_awaits_admin_approval' => 'Your comment is successfully posted, but it will be visible after admin approval.',
		'success_comment_auto_approved'         => 'Your comment is successfully posted and automatically approved.',
		'success_comment_deleted'               => 'Comment successfully deleted.',
		'success_message_sent'					=> 'Your message is successfully sent.',
		'success_password_changed'				=> 'Your password is successfully changed.'

);