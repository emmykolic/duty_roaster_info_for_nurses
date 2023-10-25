<?php include_once("config.php");
$project->bouncer_admin();
// if (isset($_GET['uid'])) {
//   $uid = $_GET['uid'];
//   $nurses = $project->db->query("SELECT * FROM users WHERE uid='$uid' ");
//   $nurses = $nurses->fetch_assoc();
// } else {
//   $project->set_alert("success", "Student not Found");
//   die(header("Location: home.php"));
// }

?>
    <?php include("header.php") ?> 
    <section class="module mt-0 pb-0 background1" data-background="assets/images/nurse3.jpg" style="height: 100vh; ">
        <div class="row">
          <div class="col-sm-8 col-sm-offset-2">
            <h2>All Nurses Shifts</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-8 col-sm-offset-2 min-height-200">
            <?php
            $uid = $project->uid;
            $list = $project->db->query("SELECT * FROM roaster ORDER BY rid DESC LIMIT 5");
            if ($list->num_rows > 0) :
            ?>
              <table class="table table-striped table-border checkout-table table-responsive">
                <thead>
                  <th>Name:</th>
                  <th>Staff Id:</th>
                  <th>Date:</th>
                  <!-- <th>Action</th> -->
                </thead>
                <tbody>
                  <?php while ($row = $list->fetch_assoc()) :
                    $timestamp = $row['entry_date'] * 72;

                  // Format the timestamp as a date and time
                  $date = date('d-m-y H:i:s', $timestamp);
                   ?>
                    <tr>
                      <td><?= ucwords($row['entry_fullname']) ?></td>
                      <td><?= $row['staff_id'] ?></td>
                      <td><?= $date ?></td>
                    </tr>
                  <?php endwhile; ?>
                </tbody>
              </table>
            <?php else : ?>
              <div class="alert alert-warning">You Have No Shifts And Resumption</div>
            <?php endif; ?>

          </div>
        </div>
    </section>
        <?php include("footer.php");?>