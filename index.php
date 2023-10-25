<?php include_once("config.php"); 
// $project->bouncer();
?>
<?php include_once("header.php"); ?>
<div class="main">
  <section class="module bg-dark-60 background" style="height: 60vh;">
    <div class="container">
      <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
          <h2 class="module-title font-alt"><?= $project->site_name ?></h2>
          <div class="module-subtitle font-serif">Development Of Duty Roaster For Nurses System.</div>
        </div>
      </div>
    </div>
  </section>

  <section class="module mt-5" id="services" style="min-height:60vh;">
    <div class="container">
      <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
          <h2 class="module-title font-alt">Site Applications</h2>
          <div class="module-subtitle font-serif"></div>
        </div>
      </div>
      <div class="row multi-columns-row">
        <div class="col-md-4 col-xs-12">
          <div class="features-item">
            <h3 class="features-title font-alt">Create Account</h3>
            <p>Create Accounts for Nurses And Supervisor</p>
          </div>
        </div>
        <div class="col-md-4 col-xs-12">
          <div class="features-item">
            <h3 class="features-title font-alt">Roaster</h3>
            <p>Nurses Can Enter Daily Roaster Activities And Know There Next Shift</p>
          </div>
        </div>
        <div class="col-md-4 col-xs-12">
          <div class="features-item">
            <h3 class="features-title font-alt">Identifing Patient</h3>
            <p>Create Account For Admitted Patients For Easy Identification And Discharge</p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <?php include_once("footer.php"); ?>