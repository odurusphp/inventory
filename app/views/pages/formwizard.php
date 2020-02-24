<?php  require ("includes/customernav.php"); ?>
<?php  require ("includes/header.php"); ?>

<div class="clearfix"></div>

<div class="content-wrapper">
    <div class="container-fluid">
     <!-- Breadcrumb-->
     <div class="row pt-2 pb-2">
        <div class="col-sm">
		    <h4 class="page-title">Form Wizard</h4>
		    <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javaScript:void();">Rocker</a></li>
            <li class="breadcrumb-item"><a href="javaScript:void();">Forms</a></li>
            <li class="breadcrumb-item active" aria-current="page">Form Wizard</li>
         </ol>
	   </div>
	   <div class="col-sm-3">
       <div class="btn-group float-sm-right">
        <button type="button" class="btn btn-outline-primary waves-effect waves-light"><i class="fa fa-cog mr-1"></i> Setting</button>
        <button type="button" class="btn btn-outline-primary dropdown-toggle dropdown-toggle-split waves-effect waves-light" data-toggle="dropdown">
        <span class="caret"></span>
        </button>
        <div class="dropdown-menu">
          <a href="javaScript:void();" class="dropdown-item">Action</a>
          <a href="javaScript:void();" class="dropdown-item">Another action</a>
          <a href="javaScript:void();" class="dropdown-item">Something else here</a>
          <div class="dropdown-divider"></div>
          <a href="javaScript:void();" class="dropdown-item">Separated link</a>
        </div>
      </div>
     </div>
     </div>
    <!-- End Breadcrumb-->
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header text-uppercase">
              Basic Form Wizard
            </div>
            <div class="card-body">
               <form id="basic-form" action="#">
                  <div>
                      <h3>Account</h3>
                      <section>
                          <div class="form-group">
                              <label for="userName">User name *</label>
                              <input class="form-control" type="text">
                          </div>
                          <div class="form-group">
                              <label for="password"> Password *</label>
                              <input type="text" class="form-control">
                          </div>
                          <div class="form-group">
                              <label>Confirm Password *</label>
                              <input id="confirm" name="confirm" type="text" class="form-control">
                          </div>
                          <div class="form-group">
                              <label class="col-lg-12 control-label">(*) Mandatory</label>
                          </div>
                      </section>
                      <h3>Profile</h3>
                      <section>
                          <div class="form-group">
                              <label> First name *</label>
                              <input type="text" class="form-control">
                          </div>
                          <div class="form-group">
                              <label> Last name *</label>
                              <input type="text" class="form-control">
                          </div>
                          <div class="form-group">
                              <label>Email *</label>
                              <input type="text" class="form-control">
                          </div>
                          <div class="form-group">
                              <label>Address *</label>
                              <input type="text" class="form-control">
                          </div>
                          <div class="form-group">
                              <label class="col-lg-12 control-label">(*) Mandatory</label>
                          </div>
                      </section>
                      <h3>Hints</h3>
                      <section>
                          <div class="form-group">
                              <div class="col-lg-12">
                                  <ul>
                                      <li>Jonathan Smith </li>
                                      <li>Lab</li>
                                      <li>jonathan@example.com</li>
                                      <li>Your city, Cityname</li>
                                  </ul>
                              </div>
                          </div>
                      </section>
                      <h3>Finish</h3>
                      <section>
                          <div class="form-group">
                              <div class="col-lg-12">
                                  <div class="checkbox checkbox-primary">
                                      <input id="checkbox-h" type="checkbox">
                                      <label for="checkbox-h">
                                          I agree with the Terms and Conditions.
                                      </label>
                                  </div>
                              </div>
                          </div>
                      </section>
                  </div>
              </form> 
            </div>
          </div>
        </div>
      </div><!-- End Row-->

      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header text-uppercase">
              Vertical Form Wizard
            </div>
            <div class="card-body">
              <div id="wizard-vertical">
                    <h3>Account</h3>
                    <section>
                        <div class="form-group">
                            <label>User name *</label>
                            <input class="form-control" type="text">
                        </div>
                        <div class="form-group">
                            <label> Password *</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Confirm Password *</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label class="col-lg-12">(*) Mandatory</label>
                        </div>
                    </section>
                    <h3>Profile</h3>
                    <section>
                        <div class="form-group">
                            <label> First name *</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label> Last name *</label>
                            <input type="text" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Email *</label>
                            <input type="text" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Address *</label>
                            <input type="text" class="form-control">
                        </div>

                        <div class="form-group">
                            <label class="col-lg-12">(*) Mandatory</label>
                        </div>
                    </section>

                    <h3>Hints</h3>
                    <section>
                        <div class="form-group">
                            <div class="col-lg-12">
                                <ul>
                                    <li>Jonathan Smith </li>
                                    <li>Lab</li>
                                    <li>jonathan@example.com</li>
                                    <li>Your city, Cityname</li>
                                </ul>
                            </div>
                        </div>

                    </section>
                    <h3>Finish</h3>
                    <section>
                        <div class="form-group">
                            <div class="col-lg-12">
                                <div class="checkbox checkbox-primary">
                                    <input id="checkbox-v" type="checkbox">
                                    <label for="checkbox-v">
                                        I agree with the Terms and Conditions.
                                    </label>
                                </div>
                            </div>
                        </div>
                    </section>

                </div> <!-- End #wizard-vertical -->
            </div>
          </div>
        </div>
      </div><!-- End Row-->

      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header text-uppercase">
              Validation Form Wizard
            </div>
            <div class="card-body">
             <form id="wizard-validation-form" action="#">
                    <div>
                        <h3>Step 1</h3>
                        <section>
                            <div class="form-group">
                                <label for="userName2">User name </label>
                                <input class="required form-control" id="userName2" name="userName" type="text">
                            </div>
                            <div class="form-group">
                                <label for="password2"> Password *</label>
                                <input id="password2" name="password" type="text" class="required form-control">
                            </div>

                            <div class="form-group">
                                <label for="confirm2">Confirm Password *</label>
                                <input id="confirm2" name="confirm" type="text" class="required form-control">
                            </div>
                            <div class="form-group">
                                <label class="col-lg-12 control-label">(*) Mandatory</label>
                            </div>
                        </section>
                        <h3>Step 2</h3>
                        <section>

                            <div class="form-group">
                                <label for="name2"> First name *</label>
                                    <input id="name2" name="name" type="text" class="required form-control">
                            </div>
                            <div class="form-group">
                                <label for="surname2"> Last name *</label>
                                    <input id="surname2" name="surname" type="text" class="required form-control">
                            </div>

                            <div class="form-group">
                                <label for="email2">Email *</label>
                                <input id="email2" name="email" type="text" class="required email form-control">
                            </div>

                            <div class="form-group">
                                <label for="address2">Address </label>
                                <input id="address2" name="address" type="text" class="form-control">
                            </div>

                            <div class="form-group">
                                <label class="col-lg-12 control-label">(*) Mandatory</label>
                            </div>
                        </section>
                        <h3>Step 3</h3>
                        <section>
                            <div class="form-group">
                                <div class="col-lg-12">
                                    <ul class="list-unstyled w-list">
                                        <li>First Name : Jonathan </li>
                                        <li>Last Name : Smith </li>
                                        <li>Emial: jonathan@example.com</li>
                                        <li>Address: 123 Your City, Cityname. </li>
                                    </ul>
                                </div>
                            </div>
                        </section>
                        <h3>Step Final</h3>
                        <section>
                            <div class="form-group">
                                <div class="col-lg-12">
                                    <input id="acceptTerms-2" name="acceptTerms2" type="checkbox" class="required">
                                    <label for="acceptTerms-2">I agree with the Terms and Conditions.</label>
                                </div>
                            </div>
                        </section>
                    </div>
                </form>
            </div>
          </div>
        </div>
      </div><!-- End Row-->

    </div>
    <!-- End container-fluid-->
    
    </div><!--End content-wrapper-->
    <?php  require ("includes/footer.php"); ?>
