<?php include_once("config.php"); 
$project->bouncer_editor();
if(isset($_GET['uid'])){
    $uid=$_GET['uid'];
    $list=$project->db->query("SELECT * FROM patients ORDER BY pid DESC");
    if($list->num_rows<1){
        $project->set_alert("success", "There are no Patient to allocate <br>");
        die(header("Location: home.php" ));
    }
}else{
    $project->set_alert("success", "Staff not Found");
    die(header("Location: home.php" ));
}

?>
<?php include_once("header.php"); ?>
      <div class="main">
        
        <section class="module">
          <div class="container">
            <div class="row">
              <div class="col-sm-6 col-sm-offset-3">
              <h2 class="module-title font-alt">Allocate Patients</h2> 
                <?php $project->get_alert(); ?>
                <form role="form" method="post" action="allocate_patients_action.php">
                  <input type="hidden" name="uid" value="<?=$uid?>">
                  <div class="form-group">
                    <label class="sr-only" for="patients">Patients</label>
                    <select class="form-control" id="patients" name="patients"  required="required" data-validation-required-message="Please enter your entry patients.">
                        <option value="">Select patients</option>
                        <?php while($row=$list->fetch_assoc()):?>
                        <option value="<?= $row['pid']?>"><?=ucwords($row['firstname'])?> <?=ucwords($row['lastname'])?></option>
                        <?php endwhile; ?>
                    </select>
                    <p class="help-block text-danger"></p>
                  </div>
                  <div class="text-center">
                    <button class="btn btn-block btn-round btn-d" type="submit" name="submit">Allocate</button>
                  </div>
                </form>
                <div class="ajax-response font-alt" id="contactFormResponse"></div>
              </div>
            </div>
          </div>
        </section>
        <?php include_once("footer.php"); ?>