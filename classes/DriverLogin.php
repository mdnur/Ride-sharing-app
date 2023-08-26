<?php

use lib\Session;

// require_once $_SERVER['DOCUMENT_ROOT'] . "/lib/Session.php";

require_once(realpath(dirname(__FILE__) . '/../lib/Session.php'));

require_once(realpath(dirname(__FILE__) . '/../lib/MainTable.php'));
require_once(realpath(dirname(__FILE__) . '/../lib/Database.php'));
require_once "DriverTable.php";
require_once "Validation.php";
class DriverLogin
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
    public function setEmail(string $email): DriverLogin

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
    public function setPassword($password): DriverLogin
    {
        $this->password = $password;

        return $this;
    }

    public function login()
    {
        $email = $this->getEmail();
        $password = $this->getPassword();
        // print_r($email,$password);
        if ($email == "" || $password == "") {
            if (session_status() === PHP_SESSION_NONE) {
                Session::init();
            }
            Session::set("flash_message", "Email or Password must not be empty");
            return false;
        }
        $DriverTable = new DriverTable();
        $driver = $DriverTable->getDriverByEmailAndPassword($email, $password);
        print_r($driver);
        if ($driver == null) {
            if (session_status() === PHP_SESSION_NONE) {
                Session::init();
            }
            Session::set("flash_message", "Email or Password is incorrect");
            return false;
        }
        return $driver;
    }
    public function changePassword($old_password, $new_password, $confirm_password)
    {
        $driver = new DriverTable();
        $driverInfo = $driver->readByid(Session::get('driver')['id']);
        if ($driverInfo['password'] != $old_password) {
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
        if ($driver->update($data, Session::get('driver')['id'])) {
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
        $DriverTable = new DriverTable();
        $driver = $DriverTable->getdriverByFieldName('email', $this->email);
        if ($driver == null) {
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
        $driver = new DriverTable();
        $id = ($driver->getDriverDataByFieldName('email', $to))['id'];

        if (mail($to, $subject, $message, $headers)) {
            $data = [
                'token' => $code
            ];
            $driver->update($data, $id);
            return true;
        } else {
            return false;
        }
    }

    public function resetPassword($email, $code)
    {
        $driver = new DriverTable();
        $driverInfo = $driver->getDriverDataByFieldName('email', $email);
        if ($driverInfo['token'] != $code) {
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
        $driver = new DriverTable();
        $id = ($driver->getDriverDataByFieldName('email', $email))['id'];

        if ($driver->update($data, $id)) {
            return true;
        }
    }
}
