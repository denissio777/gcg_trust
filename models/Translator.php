<?php
/**
 * Created by PhpStorm.
 * User: prog
 * Date: 28.07.18
 * Time: 20:28
 */

namespace app\models;


class Translator
{

    public $translate = [];

    public function __construct($locale)
    {
        switch ($locale){
            default:
                $this->translate = [
                    'name' => 'Name',
                    'email' => 'E-mail',
                    'phone' => 'Phone',
                    'subject' => 'Subject',
                    'message' => 'Message',
                    'verify' => 'Verify Code',
                    'send' => 'Send',
                    'ty_message' => 'Thank you! We will contact you soon!',
                    'get_started' => 'Get Started!',
                    'login' => 'Login',
                    'register' => 'Register',
                    'dashboard' => 'Dashboard',
                    'logout' => 'Logout',
                    'full_name' => 'Full Name',
                    'body' => 'Write your message here',
                    'wallets' => 'Wallets',
                    'profile' => 'Profile',
                    'account' => 'Account',
                    'username' => 'Username',
                    'new_password' => 'New password',
                    'current_password' => 'Current password',
                    'first_name' => 'First name',
                    'last_name' => 'Last name',
                    'country' => 'Country',
                    'city' => 'City',
                    'zip_code' => 'Zip code',
                    'address' => 'Address',
                    'state' => 'State',
                    'save' => 'Save',
                    'password' => 'Password',
                    'remember' => 'Remember me next time',
                    'login_welcome' => 'Welcome, please sign in',
                    'login_didnt_receive' => 'Didn\'t receive confirmation message?',
                    'login_sign_up' => 'Don\'t have an account? Sign up!',
                    'login_forgot' => 'Forgot password?',
                    'sign_in' => 'Sign in',
                    'repeat_password' => 'Repeat password',
                    'already_registered' => 'Already registered? Sign in!',
                    'accept' => 'I accept <a href="/terms" target="_blank">terms & conditions</a>',
                    'sign_up' => 'Sign up',
                    'continue' => 'Continue',
                    'recover' => 'Recover your password',
                    'request' => 'Request new confirmation message',
                    'rms' => 'Recovery message sent',
                    'invalid_link' => 'Invalid or expired link',
                    'password_changed' => 'Password has been changed',
                    'link_sent' => 'A new confirmation link has been sent',
                    'label' => 'Label',
                    'wallet_error' => 'Some error happened! Please, try again later.',
                    'date' => 'Date',
                    'status' => 'Status',
                    'approved' => 'Approved',
                    'waiting' => 'Waiting',
                    'record_not_found' => 'Record not found',
                    'read' => 'Read',
                    'posted_by' => 'Posted by'

                ];
                return $this->translate;
        }
    }

}