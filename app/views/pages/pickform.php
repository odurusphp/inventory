<?php  require ("includes/customernav.php"); ?>
<?php  require ("includes/header.php"); ?>
<style>
 .card-img-top{
  height: 100px;
 }

</style>

<div class="clearfix"></div>
  <div class="content-wrapper">
    <div class="container-fluid">
    <!-- Breadcrumb-->
     <div class="row pt-2 pb-2">
        <div class="col-sm-9">
		    <h4 class="page-title">Registration Forms (Pick a Registration Form)</h4> 
	   </div>
	   <div class="col-sm-3">
       
     </div>
     </div>
  
       <hr>

      <div class="row">
        <div class="col-lg-6">
         <div class="card">
          
          <div class="card-body">
            <h5 class="card-title text-dark">Drug Division</h5>
          
          </div>
           <ul class="list-group list-group-flush list shadow-none">
            
            <?php foreach($data['drugdata'] as $get ):   ?>

            <li class="list-group-item d-flex justify-content-between align-items-center">
               <a href="#"><?php   echo ucfirst(strtolower($get->appname))   ?></a>
              <span class="badge badge-dark badge-pill">14</span></li>
           <?php endforeach;  ?>
           
          </ul>
          <div class="card-body">
           
          </div>
        </div>
        </div>
        <div class="col-lg-6">
         <div class="card">
          
          <div class="card-body">
            <h5 class="card-title text-dark">Food Division</h5>
          </div>
            <ul class="list-group list-group-flush list shadow-none">
            <?php foreach($data['fooddata'] as $get ):   ?>

            <li class="list-group-item d-flex justify-content-between align-items-center">
              <a href="<?php echo URLROOT.'/backoffice/registrations/'.$get->alias ?>"><?php  echo ucfirst(strtolower($get->appname))  ?></a>
              <span class="badge badge-success badge-pill">14</span></li>
           <?php endforeach;  ?>
      
          </ul>
          <div class="card-body">
           
          </div>
        </div>
        </div>
        
      </div><!--End Row-->
    
  
    
    

    </div>
    <!-- End container-fluid-->
    
   </div><!--End content-wrapper-->



<?php  require ("includes/footer.php"); ?>
