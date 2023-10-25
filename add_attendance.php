<?php include_once("config.php"); 
$project->bouncer();
?>
<?php include_once("header.php"); ?>
<div class="main">
  <section class="module bg-dark-60 about-page-header" data-background="assets/images/about_bg.jpg">
    <div class="container">
      <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
          <h2 class="module-title font-alt">Add Attendance</h2>
          <div class="module-subtitle font-serif">fill the form below to make your daily entry.</div>
        </div>
      </div>
    </div>
  </section>
  <section class="module">
    <div class="container">
      <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
          <?php $project->get_alert(); ?>
          <form role="form" method="post" action="add_attendance_action.php">
            <div class="form-group">
              <label class="sr-only" for="fullname">Enter Fullname</label>
              <input class="form-control" type="fullname" id="fullname" name="entry_fullname" placeholder="Your Fullname*" required="required" data-validation-required-message="Please enter your Attendance fullname." />
              <p class="help-block text-danger"></p>
            </div>
            <div class="form-group">
              <label class="sr-only" for="staff_id">Staff Id:</label>
              <input class="form-control" type="text" id="staffId" name="staff_id" placeholder="Your Staff Id*" required="required" data-validation-required-message="Please enter your Staff Id." />
              <p class="help-block text-danger"></p>
            </div>
            <div class="text-center">
              <button class="btn btn-block btn-round btn-d" type="submit" name="submit">Add Attendance</button>
            </div>
          </form>
          <div class="ajax-response font-alt" id="contactFormResponse"></div>
        </div>
      </div>
    </div>
  </section>


  <?php include_once("footer.php"); ?>