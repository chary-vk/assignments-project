

<?php

function login($username, $password)
{


    require 'db.php';

    $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";

    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {

        $row = mysqli_fetch_all($result, MYSQLI_ASSOC);

        $_SESSION['username'] = $username;
        $_SESSION['userid'] = $row[0]['id'];
        $_SESSION['role'] = $row[0]['role'];
        return true;
    } else {

        return false;
    }
}
