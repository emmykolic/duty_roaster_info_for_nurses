<?php 
include_once("config.php");
$project->bouncer_admin();
$error=0;
$error_msg="";
if(isset($_GET['rid'])){
    $uid=$project->uid;
    $rid=$_GET['rid'];
}else{
    $error=1;
    $error_msg.="invalid request <br>"; 
}

if($error==0){
    $project->db->query("DELETE FROM roaster WHERE rid='$rid' ");
    $project->set_alert("success", "A Shift was deleted");
header("location:home.php");
}else{
    $project->set_alert("danger", $error_msg);
    header("location:home.php");
}
?>