<?php

final class validation {

    static function isNull($name) {
        $flag = false;
        if (!isset($_POST[$name]) || $_POST[$name] == "") {
            $flag = true;
        }
        return $flag;
    }

    static function keepErrorData($name) {

        if (isset($_REQUEST[$name]))
            echo $_REQUEST[$name];
    }

    static function errorMessage($name) {
        $flag = false;
        if (isset($_POST[$name]) && $_POST[$name] == "") {
            $flag = true;
            echo "Please enter " . $name;
        } else if (isset($_POST[$name])) {

            if ($name == "name") {
                if (strlen($_REQUEST[$name]) < 2) {
                    $flag = true;
                    echo "Name must be >= 2 letter";
                }
            }
            if ($name == "phone") {
                if (!is_numeric($_REQUEST[$name])) {
                    $flag = true;
                    echo "Phone must be a number";
                } else if (strlen($_REQUEST[$name]) < 10 || strlen($_REQUEST[$name])>11) {
                    //echo strlen($_REQUEST[$name]);
                    $flag = true;
                    echo "Phone must be >=10 && <=11 letter";
                }
            }
            if ($name == "email") {
                if (!filter_var($_REQUEST[$name], FILTER_VALIDATE_EMAIL)) {
                    $flag = true;
                    echo "Invalid email address";
                }
            }
        }
        return $flag;
    }

}
