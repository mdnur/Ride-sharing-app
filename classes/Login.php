<?php

use lib\Session;

require_once "lib/Session.php";
require_once "RiderTable.php";
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
        return $rider;
        Session::init();
        Session::set("rider", $rider);
        // header("Location: index.php");
    }
}
