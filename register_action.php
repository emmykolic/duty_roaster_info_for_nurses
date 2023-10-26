<?php 
include_once("config.php");
$error=0;
$error_msg="";
if(isset($_POST['submit'])){
    $fullname=$project->post("fullname");
    $email=$project->post("email");
    $phone=$project->post("phone");
    $address = $project->post("address");
    $stability = $project->post("stability");
    $gender = $project->post("gender");
    $dob = $project->post("dob");
    $staff_id = $project->post("staff_id");
    $password=$project->post("password");
    $cpassword=$project->post("cpassword");

    if($fullname=="" || $email=="" || $phone=="" || $address=="" || $stability=="" || $gender=="" || $dob=="" || $staff_id=="" || $password==""){
        $error=1;
        $error_msg.="All fields are compulsary <br>";
    }else{
        if($password!=$cpassword){
            $error=1;
            $error_msg.="your password and confirm password dont match <br>";
        }else{
            $password=sha1(md5($password));
        }
    
        $check=$project->db->query("SELECT * FROM users WHERE email='$email' OR phone='$phone'");
        if($check->num_rows>0){
            $error=1;
            $error_msg.="your email or Phone Number is already in use <br>"; 
        }
    }
    
}else{
    $error=1;
    $error_msg.="invalid request <br>"; 
}

if($error==0){
    $project->db->query("INSERT INTO users (fullname, phone, email , address, stability, gender, dob, $staff_id, password) VALUES ('$fullname','$phone','$email', '$address', '$stability', '$gender', '$dob', '$staff_id', '$password')");
    $project->set_alert("success", "your registration was successful please login");
   header("location:login.php");
}else{
    $project->set_alert("danger", $error_msg);
    header("location:register.php");
}
?>