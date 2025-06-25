<?php
    session_start();
    session_unset();
    session_destroy();
    echo "session is deleted";
    echo "<br>";
    
    setcookie("user", "", time() - 3600, "/");
    setcookie("fullname", "", time() - 3600, "/");
    setcookie("id", "", time() - 3600, "/");
    echo "cookie is deleted";
    
?>