<?php


spl_autoload_register(function ($class) {
    include(realpath(dirname(__FILE__) . "/../../Classes/" . $class . ".php"));

});