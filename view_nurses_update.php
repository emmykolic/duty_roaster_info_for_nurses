<?php
include_once("config.php");
$project->bouncer();
include_once("header.php"); 
?>
    <section class="module mt-0 pb-0 background1">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2">
                    <h2>Nurses Resumption</h2>
                </div>
                <div class="row">
                    <div class="col-sm-8 col-sm-offset-2">
                    <?php
                    $uid = $project->uid;
                    $list = $project->db->query("SELECT * FROM roaster ORDER BY rid DESC LIMIT 5");
                    if ($list->num_rows > 0) :
                    ?>
                        <table class="table table-striped table-border checkout-table table-responsive min-height-footer">
                        <thead>
                            <th>Name:</th>
                            <th>Staff Id:</th>
                            <th>Date:</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            <?php while ($row = $list->fetch_assoc()) :
                            $timestamp = $row['entry_date'];

                            // Format the timestamp as a date and time
                            $date = date('d-m-y H:i:s', $timestamp);
                            ?>
                            <tr>
                                <td><?= ucwords($row['entry_fullname']) ?></td>
                                <td><?= $row['staff_id'] ?></td>
                                <td><?= $date ?></td>
                                <td>
                                <a href="view_log.php?rid=<?= $row['rid'] ?>" class="badge bg-success badge-pills"> <i  class="fa fa-trash text-white"></i></a>
                                </td>
                            </tr>
                            <?php endwhile; ?>
                        </tbody>
                        </table>
                    <?php else : ?>
                        <div class="alert alert-warning">You Have No Shifts And Resumption</div>
                    <?php endif; ?>

                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-8 col-sm-offset-2">
                <h2>Nurses Shifts</h2>
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
                        <th>Action</th>
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
                            <td>
                            <a href="view_log.php?rid=<?= $row['rid'] ?>" class="badge bg-success badge-pills"> <i  class="fa fa-trash text-white"></i></a>
                            </td>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                    </table>
                <?php else : ?>
                    <div class="alert alert-warning">You Have No Shifts And Resumption</div>
                <?php endif; ?>

                </div>
            </div>
        </div>
    </section>

<?php include("footer.php"); ?>