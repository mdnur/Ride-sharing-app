<?php 

use lib\Session;
require_once $_SERVER['DOCUMENT_ROOT']."/lib/Session.php";

class Validation{
    public static function required($value, $field_name){
        if ($value == "") {
            if (session_status() === PHP_SESSION_NONE) {
                Session::init();
            }
            
            $errors = Session::get("flash_message");
            if (!is_array($errors)) {
                $errors = array();
            }
    
            $errors[$field_name] = $field_name . " must not be empty";
            Session::set("flash_message", $errors);
            return null;
        }
        return $value;
    }

    public static function confirm_password($password,$confirm_password){
        if ($password !== $confirm_password) {
            if (session_status() === PHP_SESSION_NONE) {
                Session::init();
            }
            $errors = Session::get("flash_message");
            if (!is_array($errors)) {
                $errors = array();
            }
    
            $errors['password'] = "Password and Confirm Password must be same";
            Session::set("flash_message", $errors);
            return null;
        }
    }
    public static function getRiderByFieldName($field_name, $value)
    {
        $riderTable = new RiderTable();
        $rider = $riderTable->getRiderByFieldName($field_name, $value);
        if($rider > 0){
            if (session_status() === PHP_SESSION_NONE) {
                Session::init();
            }
            
            $errors = Session::get("flash_message");
            if (!is_array($errors)) {
                $errors = array();
            }
    
            $errors[$field_name] = $field_name . " already taken please try another";
            Session::set("flash_message", $errors);
            return null;
        }
        return $value;
    }
}