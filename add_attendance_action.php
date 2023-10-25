<?php 
include_once("config.php");
$project->bouncer();
$error=0;
$error_msg="";
if(isset($_POST['submit'])){
    $uid=$project->uid;
    $entry_fullname=$project->post("entry_fullname");
    $staff_id = $project->post("staff_id");

    if($entry_fullname=="" || $staff_id==""){
        $error=1;
        $error_msg.="All fields are compulsary <br>";
    }
    
}else{
    $error=1;
    $error_msg.="invalid request <br>"; 
}

if($error==0){
    $dater = time();
    $project->db->query("INSERT INTO roaster (entry_fullname, entry_date, staff_id, uid) VALUES ('$entry_fullname', '$dater', '$staff_id', '$uid')");
    $project->set_alert("success", "Your Attendance Was Successfully Submitted");
   header("location:home.php");
}else{
    $project->set_alert("danger", $error_msg);
    header("location:add_attendance.php");
}
?>