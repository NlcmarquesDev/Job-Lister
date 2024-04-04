<?php

function redirect($page = null, $message = null, $status = null)
{
    if (is_string($page)) {
        $location = $page;
    } else {
        $location = $_SERVER['SCRIPT_NAME'];
    }

    //checkMesage
    if ($message != null) {
        $_SESSION['message'] = $message;
    }

    //chech for status
    if ($status != null) {
        $_SESSION['status'] = $status;
    }

    //redirect location
    header("Location: " . $location);
    exit;
}

//Display the Message

function displayMessage()
{
    if (!empty($_SESSION['message'])) {
        //Assign message var
        $message = $_SESSION['message'];

        if (!empty($_SESSION['status'])) {
            //Assign status var
            $status =  $_SESSION['status'];
            //create output
            if ($status == 'error') {
                echo '<div class="alert alert-danger">' . $message . '</div>';
            } else {

                echo '<div class="alert alert-success">' . $message . '</div>';
            }
        }
        //unset vars
        unset($_SESSION['status']);
        unset($_SESSION['message']);
    } else {
        echo '';
    }
}
