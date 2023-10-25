<?php 
include_once("config.php");
$project->bouncer_admin();
$error = 0;
$error_msg = "";

if(isset($_POST['pid'])){
    $uid = $project->uid;
    $pid = $_POST['pid'];
}else{
    $error = 1;
    $error_msg .= "Invalid request <br>"; 
}
echo $error_msg;

if($error == 0){
    $project->db->query("DELETE FROM patients WHERE pid='$pid' ");
    $project->set_alert("success", "A Patient was discharged");
}else{
    $project->set_alert("danger", $error_msg);
}
?>