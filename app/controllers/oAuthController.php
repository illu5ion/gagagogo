<?php

class oAuthController extends BaseController {

    public function facebook()
    {
        // Get code from facebook
        $code = Input::get( 'code' );

        // Init FB service
        $fb = OAuth::consumer('Facebook', URL::to('auth/provider/facebook'));

        // Check if code is provided
        if ( !empty( $code ) ) {

            // This was a callback request from facebook, get the token
            $token = $fb->requestAccessToken( $code );

            // Send a request with it
            $response = json_decode($fb->request( '/me'), true);
            $id = $response['id'];

            // Check if this user had an account before
            $userHasAccount = User::where('facebook_id', $id)->first();

            // Create user's account and log him in.
            if(!$userHasAccount)
            {
                // If facebook sent us an email, let's check it.

                if (isset($response['email'])) {
                    $username = strstr($response['email'], '@', true);
                    $email = $response['email'];
                } else {
                    $username = $id;
                    $email = $id;
                }

                // Let's get our account.
                $user = new User();
                    $user->username    = $username;
                    $user->facebook_id = $id;
                    $user->password    = Hash::make(Str::random(10));
                    $user->usermail    = $email;
                    $user->authority   = 1;
                    $user->registration_type = 'facebook';
                $user->save();

               // Log him in
               Auth::loginUsingId($user->id);
            }
            else
            {
                // If he is not banned, log him.
                if((int) $userHasAccount->authority === 255)
                {
                    return Redirect::to('banned');
                }

                Auth::loginUsingId($userHasAccount->id);
            }

            return Redirect::to('/');
        }
        // Else, ask for permissions first
        else {
            // Get auth uri
            $url = $fb->getAuthorizationUri();

            // Load facebook login URL
            return Redirect::to((string) $url);
        }
    }
}
