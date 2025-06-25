<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "qlbanhang";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }

    $sql = "select password from customers where id = '".$_COOKIE['id']."'";

    $result = $conn->query($sql);
    if($result->num_rows > 0){
        $row = $result->fetch_assoc();
    }else{
        echo "error";
        exit;
    }
    $input_password = md5($_POST['cur_pass']);
    if($input_password !== $row['password']){
        echo "sai mk cu";
        echo "<br>";
        echo "mk input: ".$input_password;
        echo "<br>";
        echo "mk sql: ".$row['password'];
        exit;
    }else if($_POST['new_pass'] !== $_POST['new_pass_again']){
        echo "xac nhan lai sai";
        exit;
    }else{
        $sql = "UPDATE customers SET password = '".md5($_POST['new_pass'])."' WHERE id='".$_COOKIE['user']."'";
        if ($conn->query($sql) === TRUE) {
            echo "Đổi mật khẩu thành công";
        } else {
            echo "Lỗi khi đổi mật khẩu: " . $conn->error;
        }
    }

?>