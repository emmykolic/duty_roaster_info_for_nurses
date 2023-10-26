<?php
include_once("config.php");
$project->bouncer();
include_once("header.php"); 
?>
<div class="main">

  <section class="module mt-0 pb-0 background1" data-background="assets/images/nurse3.jpg" style="height: 100vh; ">
    <div class="container">
      <div class="row">
        <div class="col-sm-6">
          <h6 class="font-alt"><span class=" icon-profile-male"></span> Name: <?= $project->fullname ?></h6>
          <h6 class="font-alt"><span class="icon-envelope"></span> Email: <?= $project->email ?></h6>
          <?php if ($project->type == 9) : ?>
            <h6 class="font-alt"><span class="icon-target"></span> Status: <?= $project->status ?></h6>
          <?php endif; ?>
          <?php if($project->type == 5 && $project->supervisor == 1): ?>
            <h6 class="font-alt"><span class="icon-toolbox"></span> Status: <?= $project->status ?></h6>
          <?php endif; ?>
          <?php if($project->type <=1): ?>
            <h6 class="font-alt"><span class=" icon-map"></span> Status: <?= $project->status ?></h6>
          <?php endif; ?>
          <?php if ($project->type == 5):?>
          <a href="view_nurses_update.php" class="shift-button btn btn-danger">Staff's Update</a>
          <?php endif;?>
        </div>
        <?php if($project->type == 1 ): ?>
        <a href="next_shifts.php?uid=<?=$project->uid?>" class="shift-button btn btn-danger">Know Your Next Shift</a>
        <?php endif; ?>
        <?php if ($project->type == 9):?>
        <a href="view_staff_shifts.php" class="shift-button btn btn-danger">Staff's Shift</a>
        <?php endif;?>
        <a href="add_patient.php" class="patient_button btn btn-danger">Register A Patient</a>
      </div>  
    </div>
    <div class="container">
      <div class="col-sm-6 col-sm-offset-3"><?php $project->get_alert(); ?></div>
      <?php if ($project->type == 1) : ?>
        <div class="row">
          <div class="col-sm-8 col-sm-offset-2">
            <h2 class="text-white">My Attendance Entries <a href="add_attendance.php" class="btn btn-primary">Sign In For The Day</a></h2>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-8 col-sm-offset-2">
            <?php $uid = $project->uid; ?>

            <?php 
            $roaster_check = $project->db->query("SELECT * FROM roaster WHERE uid='$uid' GROUP BY entry_date ORDER BY entry_date ASC");
            ?>
            <?php if ($roaster_check->num_rows > 0) : ?>
                <table class="table table-striped table-border checkout-table table-responsive">
                  <thead>
                    <th>Fullname</th>
                    <th>Email</th>
                    <th>Date</th>
                    <th>Action</th>
                   </thead>
                  <tbody>
                 <?php
                    $lists = $project->db->query("SELECT * FROM roaster WHERE uid='$uid' AND entry_date ORDER BY entry_date ");?>
                    <?php while ($row = $lists->fetch_assoc()) :
                      $timestamp = $row['entry_date'];
                     ?>
                      <tr>
                        <td><b style="display:flex; justify-content: space-between;"> <?= $row['entry_fullname'] ?></b></td>
                        <td><?=$row['email']?></td>
                        <td><b> <?= $date = date('d-M-Y', $timestamp) ?></b></td>
                        <td> <a href="delete_attendance.php?rid=<?= $row['rid'] ?>"><i class="fa fa-trash text-danger"></i></a></td>
                      </tr>
                      <?php endwhile; ?>
                  </tbody>
                </table>
            <?php else : ?>
              <div class="alert alert-warning">NO activity logged </div>
            <?php endif; ?>

          </div>
        </div>
      <?php elseif ($project->type == 5 && $project->supervisor == 1) : ?>
        <div class="row">
          <div class="col-sm-6 col-sm-offset-3">
            <h2>Assign Nurses </h2>
            <?php
            $uid = $project->uid;
            $list = $project->db->query("SELECT * FROM roaster ORDER BY uid DESC");
            $unallocted = $project->db->query("SELECT * FROM patients "); //WHERE sid='$sid'
            $unallocted = $unallocted->num_rows;
            if ($list->num_rows > 0) :
            ?>
              <?php if ($unallocted == 0) : ?>
                <div class="alert alert-warning">You have <?= $unallocted ?> unallocated patients please allocate</div>
              <?php else : ?>
                <div class="alert alert-success">You have allocated all your patients welldone!</div>
              <?php endif; ?>
              <table class="table table-striped table-border checkout-table table-responsive">
                <thead>
                  <th>Staff Number</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Action</th>
                </thead>
                <tbody>
                  <?php while ($row = $list->fetch_assoc()) : ?>
                    <tr>
                      <td>
                        <b><?= $row['staff_id'] ?></b>
                      </td>
                      <td>
                        <?= ucwords($row['entry_fullname']) ?>
                      </td>
                      <td>
                        <b><?= $row['email'] ?></b>
                      </td> 
                      <td>
                        <a href="allocate_ward.php?uid=<?= $row['uid'] ?>" class="text-white badge bg-success badge-pills"><i class="fa fa-wrench"></i> Allocate to Ward</a>
                      </td>
                    </tr>
                  <?php endwhile; ?>
                </tbody>
              </table>
            <?php else : ?>
              <div class="alert alert-warning">You Have No Supervisors</div>
            <?php endif; ?>
          </div>
        </div>
        
      <?php elseif ($project->type == 9) : ?>

        <div class="row">
          <div class="col-sm-6 col-sm-offset-3 text-center">
            <h2 class="text-white">Registered Patient And Discharged Patient</h2>
            <?php
            $uid = $project->uid;
            $lists = $project->db->query("SELECT * FROM patients ORDER BY pid DESC LIMIT 5");
            if ($lists->num_rows > 0) :
            ?>
              <table class="table table-striped table-border checkout-table table-hover table-responsive min-height-table">
                <thead>
                  <th>Name:</th>
                  <th>Card Number:</th>
                  <th>Date:</th>
                  <th>Discharged</th>
                </thead>
                <tbody>
                  <?php while ($row = $lists->fetch_assoc()) : 
                    $timestamp = $row['date'];
                    $threeDaysAfter = $timestamp + (3 * 24 * 60 * 60);// Add 3 days (3 days * 24 hours * 60 minutes * 60 seconds)

                  // Convert the timestamps to readable dates
                  $date = date('d/m/Y H:i:s a', $threeDaysAfter);
                    ?>
                    <tr>
                      <td class="text-center">
                        <?=substr($row['firstname'], 0, 16) . (strlen($row['firstname']) > 16 ? " " : "")?><br> 
                      </td>
                      
                      <td>
                        <?= $row['card_num'] ?> 
                      </td>
                      <td>
                        <?= $date; ?>
                      </td>
                      <td>
                        <input type="checkbox" class="discharge" name="pid" value="<?=$row['pid']?>"/>
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
      <?php endif; ?>
    </div>
  </section>

  <?php include_once("footer.php"); ?>