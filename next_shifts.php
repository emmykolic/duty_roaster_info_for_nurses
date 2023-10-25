<?php include_once("config.php");
$project->bouncer();
if (isset($_GET['uid'])) {
  $uid = $_GET['uid'];
  $nurses = $project->db->query("SELECT * FROM users WHERE uid='$uid' ");
  $nurses = $nurses->fetch_assoc();
} else {
  $project->set_alert("success", "Student not Found");
  die(header("Location: home.php"));
}

?>
<?php include_once("header.php"); ?>
<div class="main">

  <section class="module mt-0 pb-0 background1" data-background="assets/images/nurse3.jpg" style="height: 100vh; ">
    <div class="container">
      <div class="row">
        <div class="col-sm-8 col-sm-offset-2">
          <h2 class="text-center text-white"><?= ucwords($nurses['fullname']) ?></h2><span class="text-center text-white">Display Of Next Shift</span>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-6 col-sm-offset-3 text-center">
          <?php
          $uid = $project->uid;
          $lists = $project->db->query("SELECT * FROM roaster WHERE uid = '$uid' ");
          if ($lists->num_rows > 0) :
          ?>
            <table class="table table-striped table-border checkout-table table-hover table-responsive">
              <thead>
                <th>Name:</th>
                <th>Staff Id:</th>
                <th>Date:</th>
                <th>Action</th>
              </thead>
              <tbody>
                <?php while ($row = $lists->fetch_assoc()) : 
                  $timestamp = $row['entry_date'];
                  $threeDaysAfter = $timestamp + (3 * 24 * 60 * 60);// Add 3 days (3 days * 24 hours * 60 minutes * 60 seconds)

                  // Convert the timestamps to readable dates
                  $date = date('d/m/Y H:i:s a', $threeDaysAfter);
                  ?>
                  <tr>
                    <td class="text-center">
                      <?=substr($row['entry_fullname'], 0, 16) . (strlen($row['entry_fullname']) > 16 ? " " : "")?><br> 
                    </td>
                    
                    <td>
                      <?= $row['staff_id'] ?> 
                    </td>
                    <td>
                      <?= $date; ?>
                    </td>
                    <td>
                      <a href="delete_entry.php?rid=<?= $row['rid'] ?>" class="text-white badge bg-success badge-pills"><i class="fa fa-trash"></i> </a>
                    </td>
                  </tr>
                <?php endwhile; ?>
              </tbody>
            </table>
          <?php else : ?>
            <div class="alert alert-warning">You Have Not Scheduled Any Shift</div>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </section>


  <?php include_once("footer.php"); ?>