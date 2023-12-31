<?php

use lib\Session;

// require_once $_SERVER['DOCUMENT_ROOT']. "/lib/Session.php";

require_once(realpath(dirname(__FILE__) . '/../lib/Session.php'));

require_once(realpath(dirname(__FILE__) . '/../lib/Database.php'));

require_once "RiderTable.php";
require_once "CreditTable.php";
require_once "Validation.php";
class Login
{
    private string $email;
    private string $password;

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return Login
     */
    public function setEmail(string $email): Login
    {
        $this->email = $email;
        return $this;
    }


    /**
     * Get the value of password
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */
    public function setPassword($password): Login
    {
        $this->password = $password;

        return $this;
    }

    public function login()
    {
        $email = $this->getEmail();
        $password = $this->getPassword();
        if ($email == "" || $password == "") {
            if (session_status() === PHP_SESSION_NONE) {
                Session::init();
            }
            Session::set("flash_message", "Email or Password must not be empty");
            return false;
        }
        $riderTable = new RiderTable();
        $rider = $riderTable->getRiderByEmailAndPassword($email, $password);
        if ($rider == null) {
            if (session_status() === PHP_SESSION_NONE) {
                Session::init();
            }
            Session::set("flash_message", "Email or Password is incorrect");
            return false;
        }
        return $rider;
        // header("Location: index.php");
    }
    public function signUp($post)
    {
        $this->signUpValidation($post);
        unset($post['log']);
        unset($post['confirm_password']);
        $post['role'] = 'rider';
        $post['created_at'] = date('d-m-y h:i:s');

        $riderTable = new RiderTable();
        if (Session::get('flash_message') == null) {
            
            // print_r($post);
            if ($riderTable->insert($post)) {
                $id =  ($riderTable->getRiderByFieldNameS('email',$post['email']))['id'];
                $data = [
                    'credit_amount'=> 500,
                    'user_id' => $id,
                    'payment_type_id' =>2,
                    'created_at' => date('d-m-y h:i:s')
                ];
                $credit = new CreditTable();
                $credit->insert($data);
                return $this->login();
            }
        }
    }

    public function signUpValidation($post)
    {
        $post['name'] = Validation::required($post['name'], 'name');
        $post['email'] = Validation::required($post['email'], 'email');
        $post['password'] = Validation::required($post['password'], 'password');
        $post['username'] = Validation::required($post['username'], 'username');
        $post['phone'] = Validation::required($post['phone'], 'phone');
        $post['confirm_password'] = Validation::required($post['confirm_password'], 'confirm_password');
        Validation::confirm_password($post['password'], $post['confirm_password']);
        Validation::getRiderByFieldName('email', $post['email']);
        Validation::getRiderByFieldName('username', $post['username']);
        Validation::getRiderByFieldName('phone', $post['phone']);
        return $this;
    }
    public function changePassword($old_password, $new_password, $confirm_password)
    {
        $rider = new RiderTable();
        $riderInfo = $rider->readByid(Session::get('rider')['id']);
        if ($riderInfo['password'] != $old_password) {
            Session::set("flash_message_info", "Old Password is incorrect");
            return false;
        }

        Validation::required($old_password, 'old_password');
        Validation::required($new_password, 'password');
        Validation::required($confirm_password, 'confirm_password');
        Validation::confirm_password($new_password, $confirm_password);

        $data = [
            'password' => $new_password
        ];
        if ($rider->update($data, Session::get('rider')['id'])) {
            Session::set("flash_message_success", "Password Changed Successfully");
            return true;
        }
    }

    public function forgetPassword()
    {
        if (empty($this->email)) {
            if (session_status() === PHP_SESSION_NONE) {
                Session::init();
            }
            Session::set("flash_message", "Email  must not be empty");
            return false;
        }
        $riderTable = new RiderTable();
        $rider = $riderTable->getriderByFieldName('email', $this->email);
        if ($rider == null) {
            if (session_status() === PHP_SESSION_NONE) {
                Session::init();
            }
            Session::set("flash_message", "Email is incorrect");
            return false;
        }
        return true;
    }

    public function sendmail($to, $code)
    {
        $from = 'mdnur701@gmail.com';
        $fromName = 'TransitWise';

        $subject = "Forget Password Code";

        $message = "You have requested the reset password code. Your reset password code is " . $code . ".";

        // Additional headers 
        $headers = 'From: ' . $fromName . '<' . $from . '>';
        $rider = new RiderTable();
        $id = ($rider->getRiderDataByFieldName('email', $to))['id'];

        if (mail($to, $subject, $message, $headers)) {
            $data = [
                'token' => $code
            ];
            $rider->update($data, $id);
            return true;
        } else {
            return false;
        }
    }

    public function resetPassword($email, $code)
    {
        $rider = new RiderTable();
        $riderInfo = $rider->getRiderDataByFieldName('email', $email);
        if ($riderInfo['token'] != $code) {
            Session::set("flash_message", "Code is incorrect");
            return false;
        }

        return true;
    }
    public function changePasswordNew($password, $confirm_password, $token, $email)
    {
        if (!$this->resetPassword($email, $token)) {
            return false;
        }
        Validation::required($password, 'password');
        Validation::required($confirm_password, 'confirm_password');
        Validation::confirm_password($password, $confirm_password);

        $data = [
            'password' => $password,
            'token' => null
        ];
        $rider = new RiderTable();
        $id = ($rider->getRiderDataByFieldName('email', $email))['id'];

        if ($rider->update($data, $id)) {
            return true;
        }
    }
}
