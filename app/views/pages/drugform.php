<?php  require ("includes/customernav.php"); ?>
<?php  require ("includes/header.php"); ?>

<div class="clearfix"></div>
<div class="content-wrapper">
    <div class="container-fluid">
    <!-- Breadcrumb-->
     <div class="row pt-2 pb-2">
        <div class="col-sm-9">
        <h4 class="page-title">Form Layouts</h4>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javaScript:void();">Rocker</a></li>
            <li class="breadcrumb-item"><a href="javaScript:void();">Forms</a></li>
            <li class="breadcrumb-item active" aria-current="page">Form Layouts</li>
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
      <div class="col-lg-10 mx-auto">
         <div class="card">
           <div class="card-body">
           <div class="card-title">Vertical Form</div>
           <hr>
            <form>
           <div class="form-group">
            <label for="input-1">Name</label>
            <input type="text" class="form-control" id="input-1" placeholder="Enter Your Name">
           </div>
           <div class="form-group">
            <label for="input-2">Email</label>
            <input type="text" class="form-control" id="input-2" placeholder="Enter Your Email Address">
           </div>
           <div class="form-group">
            <label for="input-3">Password</label>
            <input type="text" class="form-control" id="input-3" placeholder="Enter Password">
           </div>
           <div class="form-group">
             <div class="icheck-primary">
            <input type="checkbox" id="user-checkbox1" checked=""/>
            <label for="user-checkbox1">Remember me</label>
            </div>
           </div>
           <div class="form-group">
            <button type="submit" class="btn btn-primary shadow-primary px-5"><i class="icon-lock"></i> Login</button>
          </div>
          </form>
         </div>
         </div>
         <div class="card">
           <div class="card-body">
           <div class="card-title">Horizontal Form</div>
           <hr>
            <form>
           <div class="form-group row">
            <label for="input-4" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" id="input-4" placeholder="Enter Your Name">
            </div>
          </div>
          <div class="form-group row">
            <label for="input-5" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" id="input-5" placeholder="Enter Your Email Address">
            </div>
          </div>
          <div class="form-group row">
            <label for="input-6" class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" id="input-6" placeholder="Enter Password">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10">
            <div class="icheck-primary">
            <input type="checkbox" id="user-checkbox2" checked="" />
            <label for="user-checkbox2">Remember me</label>
            </div>
            </div>
          </div>
           <div class="form-group row">
            <label for="input-1" class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10">
            <button type="submit" class="btn btn-primary shadow-primary px-5"><i class="icon-lock"></i> Login</button>
            </div>
          </div>
          </form>
         </div>
         </div>
         <h6 class="text-uppercase">Form With Round Inputs</h6>
         <hr>
         <div class="card">
           <div class="card-body">
           <div class="card-title">Vertical Form with round input</div>
           <hr>
            <form>
           <div class="form-group">
            <label for="input-7">Name</label>
            <input type="text" class="form-control form-control-rounded" id="input-7" placeholder="Enter Your Name">
           </div>
           <div class="form-group">
            <label for="input-8">Email</label>
            <input type="text" class="form-control form-control-rounded" id="input-8" placeholder="Enter Your Email Address">
           </div>
           <div class="form-group">
            <label for="input-9">Password</label>
            <input type="text" class="form-control form-control-rounded" id="input-9" placeholder="Enter Password">
           </div>
           <div class="form-group">
             <div class="icheck-primary">
            <input type="checkbox" id="user-checkbox3" checked="" />
            <label for="user-checkbox3">Remember me</label>
            </div>
           </div>
           <div class="form-group">
            <button type="submit" class="btn btn-primary shadow-primary btn-round px-5"><i class="icon-lock"></i> Login</button>
          </div>
          </form>
         </div>
         </div>
         <div class="card">
           <div class="card-body">
           <div class="card-title">Horizontal Form round input</div>
           <hr>
            <form>
           <div class="form-group row">
            <label for="input-10" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-10">
            <input type="text" class="form-control form-control-rounded" id="input-10" placeholder="Enter Your Name">
            </div>
          </div>
          <div class="form-group row">
            <label for="input-11" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
            <input type="text" class="form-control form-control-rounded" id="input-11" placeholder="Enter Your Email Address">
            </div>
          </div>
          <div class="form-group row">
            <label for="input-12" class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-10">
            <input type="text" class="form-control form-control-rounded" id="input-12" placeholder="Enter Password">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10">
            <div class="icheck-primary">
            <input type="checkbox" id="user-checkbox4" checked="" />
            <label for="user-checkbox4">Remember me</label>
            </div>
            </div>
          </div>
           <div class="form-group row">
            <label class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10">
            <button type="submit" class="btn btn-primary shadow-primary btn-round px-5"><i class="icon-lock"></i> Login</button>
            </div>
          </div>
          </form>
         </div>
         </div>
         <h6 class="text-uppercase">Form With Square Inputs</h6>
         <hr>
         <div class="card">
           <div class="card-body">
           <div class="card-title">Vertical Form with square input</div>
           <hr>
            <form>
           <div class="form-group">
            <label for="input-13">Name</label>
            <input type="text" class="form-control form-control-square" id="input-13" placeholder="Enter Your Name">
           </div>
           <div class="form-group">
            <label for="input-14">Email</label>
            <input type="text" class="form-control form-control-square" id="input-14" placeholder="Enter Your Email Address">
           </div>
           <div class="form-group">
            <label for="input-15">Password</label>
            <input type="text" class="form-control form-control-square" id="input-15" placeholder="Enter Password">
           </div>
           <div class="form-group">
             <div class="icheck-primary">
            <input type="checkbox" id="user-checkbox5" checked="" />
            <label for="user-checkbox5">Remember me</label>
            </div>
           </div>
           <div class="form-group">
            <button type="submit" class="btn btn-primary shadow-primary btn-square px-5"><i class="icon-lock"></i> Login</button>
          </div>
          </form>
         </div>
         </div>
         <div class="card">
           <div class="card-body">
           <div class="card-title">Horizontal Form square input</div>
           <hr>
            <form>
           <div class="form-group row">
            <label for="input-16" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-10">
            <input type="text" class="form-control form-control-square" id="input-16" placeholder="Enter Your Name">
            </div>
          </div>
          <div class="form-group row">
            <label for="input-17" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
            <input type="text" class="form-control form-control-square" id="input-17" placeholder="Enter Your Email Address">
            </div>
          </div>
          <div class="form-group row">
            <label for="input-18" class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-10">
            <input type="text" class="form-control form-control-square" id="input-18" placeholder="Enter Password">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10">
            <div class="icheck-primary">
            <input type="checkbox" id="user-checkbox6" checked="" />
            <label for="user-checkbox6">Remember me</label>
            </div>
            </div>
          </div>
           <div class="form-group row">
            <label class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10">
            <button type="submit" class="btn btn-primary shadow-primary btn-square px-5"><i class="icon-lock"></i> Login</button>
            </div>
          </div>
          </form>
         </div>
         </div>
      </div>
      </div><!--End Row-->

    </div>
    <!-- End container-fluid-->
    
   </div><!--End content-wrapper-->




<?php  require ("includes/footer.php"); ?>
