<?php 
include_once("config.php");
$project->bouncer_editor();
$error=0;
$error_msg="";
if(isset($_POST['submit'])){
    $uid = $project->post("uid");
    $patients=$project->post("patients");

    if($uid=="" || $patients=="" ){
        $error=1;
        $error_msg.="All fields are compulsary <br>";
    }
}else{
    $error=1;
    $error_msg.="invalid request <br>"; 
}

if($error==0){
    $project->db->query("UPDATE roaster SET patients='$patients' WHERE rid='$patients' ");
    $project->set_alert("success", "You Have Successfully Allocated The Patient");
   header("location:home.php");
}else{
    $project->set_alert("danger", $error_msg);
    header("location:home.php");
}
?>