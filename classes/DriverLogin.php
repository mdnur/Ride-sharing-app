<?php

use lib\Session;

require_once $_SERVER['DOCUMENT_ROOT'] . "/lib/Session.php";
require_once "AdminTable.php";
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
        $driverTable = new DriverTable();
        $driver = $driverTable->getDriverByEmailAndPassword($email, $password);
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
}
