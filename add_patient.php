<?php 
include("config.php");
$project->bouncer();
include("header.php");
?>

<?php include_once("config.php"); ?>
<?php include_once("header.php"); ?>
<div class="main">
    <section class="module bg-dark-60 background">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3">
                    <h2 class="module-title font-alt">Register Patient</h2>
                    <div class="module-subtitle font-serif">fill the form below to create a patient account.</div>
                </div>
            </div>
        </div>
    </section>
    <section class="module">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3">
                <?php $project->get_alert(); ?>
                    <form role="form" method="post" action="add_patient_action.php">
                        <div class="form-group">
                            <label class="sr-only" for="name">First Name</label>
                            <input class="form-control" type="text" id="name" name="firstname" placeholder="Your First Name*" required="required" data-validation-required-message="Please enter your firstname."/>
                            <p class="help-block text-danger"></p>
                        </div>

                        <div class="form-group">
                            <label class="sr-only" for="lastname">Last Name</label>
                            <input class="form-control" type="text" id="name" name="lastname" placeholder="Your Last Name*" required="required" data-validation-required-message="Please enter your lastname."/>
                            <p class="help-block text-danger"></p>
                        </div>

                        <div class="form-group">
                            <label class="sr-only" for="email">Email</label>
                            <input class="form-control" type="email" id="email" name="email" placeholder="Your Email*" required="required" data-validation-required-message="Please enter your email address."/>
                            <p class="help-block text-danger"></p>
                        </div>

                        <div class="form-group">
                            <label class="sr-only" for="card_num">Card Number</label>
                            <input class="form-control" type="text" id="cardNum" name="card_num" placeholder="Card Number*" required="required" data-validation-required-message="Please Enter Card Number."/>
                            <p class="help-block text-danger"></p>
                        </div>

                        <div class="text-center">
                            <button class="btn btn-block btn-round btn-d" type="submit" name="submit">Register Patient</button>
                        </div>
                    </form>
                    <div class="ajax-response font-alt" id="contactFormResponse"></div>
                </div>
            </div>
        </div>
    </section>
    
<?php include("footer.php"); ?>