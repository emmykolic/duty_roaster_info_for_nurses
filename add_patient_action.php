<?php
include("config.php");
$error = 0;
$error_msg="";
if (isset($_POST['submit'])) {
    $firstname = $project->post("firstname");
    $lastname = $project->post("lastname");
    $email = $project->post("email");
    $card_num = $project->post("card_num");
    if ($firstname=="" || $lastname=="" || $email=="" || $card_num=="") {
        $error=1;
        $error_msg.="All fields are compulsary <br>";
    }else{
        $check=$project->db->query("SELECT * FROM patients WHERE email='$email' AND card_num='$card_num'");
        if($check->num_rows>0){
            $error=1;
            $error_msg.="your Email or Card Number is already in use <br>"; 
        }
    }
}else{
    $error=1;
    $error_msg.="invalid request <br>"; 
}

if ($error==0) {
    $dater = time();
    $project->db->query("INSERT INTO patients(firstname, lastname, email, card_num, date) VALUES('$firstname', '$lastname', '$email', '$card_num', '$dater')");
    $project->set_alert("success","Your Patient Was Successfully Registered");
    header("location:home.php");
}else{
    $project->set_alert("danger", $error_msg);
    header("location:add_patient.php");
}
?>