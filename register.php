<?php include_once("config.php"); ?>
<?php include_once("header.php"); ?>
      <div class="main">
        <section class="module bg-dark-60 about-page-header" data-background="assets/images/nurse2.jpg">
          <div class="container">
            <div class="row">
              <div class="col-sm-6 col-sm-offset-3">
                <h2 class="module-title font-alt">Register</h2>
                <div class="module-subtitle font-serif">fill the form below to create your account.</div>
              </div>
            </div>
          </div>
        </section>
        <section class="module">
          <div class="container">
            <div class="row">
              <div class="col-sm-6 col-sm-offset-3">
                <?php $project->get_alert(); ?>
                <form role="form" method="post" action="register_action.php">
                  <div class="form-group">
                    <label class="sr-only" for="name">Name</label>
                    <input class="form-control" type="text" id="name" name="fullname" placeholder="Your Full Name*" required="required" data-validation-required-message="Please enter your name."/>
                    <p class="help-block text-danger"></p>
                  </div>
                  <div class="form-group">
                    <label class="sr-only" for="email">Email</label>
                    <input class="form-control" type="email" id="email" name="email" placeholder="Your Email*" required="required" data-validation-required-message="Please enter your email address."/>
                    <p class="help-block text-danger"></p>
                  </div>

                  <div class="form-group">
                    <label class="sr-only" for="phone">Phone Number</label>
                    <input class="form-control" type="text" id="phone" name="phone" placeholder="Your Phone*" required="required" data-validation-required-message="Please enter your Phone Number."/>
                    <p class="help-block text-danger"></p>
                  </div>

                  <div class="form-group">
                      <label class="sr-only" for="address">Address</label>
                      <input class="form-control" type="text" id="address" name="address" placeholder="Address*" required="required" data-validation-required-message="Please enter your address."/>
                      <p class="help-block text-danger"></p>
                  </div>

                  <div class="form-group">
                      <label class="sr-only" for="stability">Stability</label>
                      <select name="disability" id="disability" required="required" class="form-control" data-validation-required-message="Please enter your stability.">
                        <option value="">Disability</option>
                          <option value="Yes">Yes</option>
                          <option value="No">No</option>
                      </select>
                      <p class="help-block text-danger"></p>
                  </div>

                  <div class="form-group">
                      <label class="sr-only" for="gender">Gender</label>
                      <select class="form-control" id="gender" name="gender">
                          <option value="">Gender</option>
                          <option value="Male">Male</option>
                          <option value="Female">Female</option>
                      </select>
                      <p class="help-block text-danger"></p>
                  </div>

                  <div class="form-group">
                      <label class="sr-only" for="dob">Date Of Birth</label>
                      <input class="form-control" type="date" id="dob" name="dob" placeholder="date of birth*" required="required" data-validation-required-message="Please enter your dob."/>
                      <p class="help-block text-danger"></p>
                  </div>

                  <div class="form-group">
                      <label class="sr-only" for="staff_id">Staff Number</label>
                      <input class="form-control" type="text" id="staff_id" name="staff_id" placeholder="Staff Number*" required="required" data-validation-required-message="Please enter your staff_id."/>
                      <p class="help-block text-danger"></p>
                  </div>

                  <div class="form-group">
                    <label class="sr-only" for="password">Password</label>
                    <input class="form-control" type="password" id="password" name="password" placeholder="Your password" required="required" data-validation-required-message="Please enter your password."/>
                    <p class="help-block text-danger"></p>
                  </div>

                  <div class="form-group">
                    <label class="sr-only" for="cpassword">Confirm Password</label>
                    <input class="form-control" type="password" id="cpassword" name="cpassword" placeholder="Confirm Your password" required="required" data-validation-required-message="Please confirm your password."/>
                    <p class="help-block text-danger"></p>
                  </div>
                  <div class="text-center">
                    <button class="btn btn-block btn-round btn-d" type="submit" name="submit">Register</button>
                  </div>
                </form>
                <div class="ajax-response font-alt" id="contactFormResponse"></div>
              </div>
            </div>
          </div>
        </section>
       

        <?php include_once("footer.php"); ?>