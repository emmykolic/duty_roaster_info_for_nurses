<?php
include_once("config.php");
$error = 0;
$error_msg = "";
if (isset($_POST['submit'])) {
    $phone = $project->post("phone");
    $password = $project->post("password");
    // $uid = $project->uid;

    if ($phone == "" || $password == "") {
        $error = 1;
        $error_msg .= "All fields are compulsary <br>";
    } else {

        $password = sha1(md5($password));
        $check = $project->db->query("SELECT * FROM users WHERE (phone='$phone' AND password='$password') OR  (email='$phone' AND password='$password') ");
        if ($check->num_rows < 1) {
            $error = 1;
            $error_msg .= "Invalid Login Credentials <br>";
        } else {
            $check = $check->fetch_assoc();
            $email = $check['email'];
        }
    }
} else {
    $error = 1;
    $error_msg .= "invalid request <br>";
}

if ($error == 0) {
    $_SESSION['auth'] = $email;
    header("location:home.php");
} else {
    $project->set_alert("danger", $error_msg);
    header("location:login.php");
}
