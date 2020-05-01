<?php

if (isset($_COOKIE['problem_event_register'])) {
    echo "<script>
        swal({
            icon: 'error',
            text: 'Problem registering to event',
            button: false
            });</script>";
}

if (isset($_COOKIE['event_register_succesfull'])) {
    echo "<script>
        swal({
            icon: 'success',
            text: 'Successfully registered to event',
            button: false
            });</script>";
}

if (isset($_COOKIE['user_register_succesfull'])) {
    echo "<script>
        swal({
            icon: 'success',
            text: 'Création du compte réussie !',
            button: false
            });</script>";
}

if (isset($_COOKIE['adminsuccess'])) {
    echo "<script>
        swal({
            icon: 'success',
            text: 'Successfully logged in',
            button: false
            });
            
        window.setTimeout(function(){
            window.location.href = 'admindashboard.php';
        }, 1000);
            
            </script>";

}

if (isset($_COOKIE['adminfail'])) {
    echo "<script>
        swal({
            icon: 'error',
            text: 'Wrong credentials',
            button: false
            });</script>";
}

if (isset($_COOKIE['emailandeventalreadydb'])) {
    echo "<script>
        swal({
            icon: 'error',
            text: 'Email and event already exist in database',
            button: false
            });</script>";
}

if (isset($_COOKIE['wrongeventname'])) {
    echo "<script>
        swal({
            icon: 'error',
            text: 'Event doesn\'t exist',
            button: false
            });</script>";
}
