 <!-- ########## START: MAIN PANEL ########## -->
   <?php if(!empty($this->uri->segment(3))) { 
     
     $cwhere =array( "cid" =>$this->uri->segment(3) ); 
     $userlocations = $this->BaseModel->featchRow("colleges", '*', $cwhere, '', '', '*');
     $swhere =array( "country_id" =>101 );
     $states=  $this->BaseModel->featchData("states", '*', $swhere, '', '', 50);
    
     $ciwhere=array("state_id" =>$userlocations->state_id );
     $cities=  $this->BaseModel->featchData("cities", '*', $ciwhere, '', '', 300);
     $awhere = array( "city_id" => $userlocations->city_id );
    
    
 } ?>
    <div class="br-mainpanel">
      <div class="pd-30">
        <h4 class="tx-gray-800 mg-b-5">Edit <?php echo $college->college_name; ?> College</h4>
        <p class="mg-b-0">Super admin manages the colleges add or delete.</p>
      </div><!-- d-flex -->

      <div class="br-pagebody">
        <div class="br-section-wrapper">
             <?php if(!empty(validation_errors())) { ?>
      <div class="alert alert-danger mg-t-30" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
      <?php echo validation_errors(); ?>          
          </div>
       <?php } ?>
      <?php   if($this->session->tempdata("message")){ ?>
      <div class="alert alert-success mg-t-30" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
      
    
            <div class="d-flex align-items-center justify-content-start">
              <i class="icon ion-ios-checkmark alert-icon tx-24 mg-t-5 mg-xs-t-0"></i>
              <span><?php echo $this->session->tempdata("message"); ?></span>
            </div><!-- d-flex -->
          </div>
          <?php } ?>
	<form method="post" id="addCollege" action="<?= site_url('Colleges/updateCollege/'.$college->cid); ?>">
          <div class="form-layout form-layout-2">
            <div class="row no-gutters">
              <div class="col-md-4">
                <div class="form-group">
                  <label class="form-control-label">College Name: <span class="tx-danger">*</span></label>
                  <?php //if(form_error("college_name")) echo "Enter College Name";
                   ?>
    <input class="form-control" type="text" name="college_name" value="<?php echo (isset($college->college_name))?$college->college_name:''; ?>" placeholder="Enter College Name">
                </div>
              </div><!-- col-4 -->
                  <div class="col-md-4">
                <div class="form-group">
                  <label class="form-control-label">College Code: <span class="tx-danger">*</span></label>
                  <?php //if(form_error("college_name")) echo "Enter College Name";
                   ?>
                  <input class="form-control" type="text" name="college_code" value="<?php echo (isset($college->college_name))?$college->college_code:''; ?>" placeholder="Enter College Code">
                </div>
              </div><!-- col-4 -->
              <div class="col-md-4 mg-t--1 mg-md-t-0">
                <div class="form-group mg-md-l--1">
                  <label class="form-control-label">Principle Name: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="priniciple_name" value="<?php echo (isset($college->college_name))?$college->priniciple_name:''; ?>" placeholder="Enter Principle Name">
                </div>
              </div><!-- col-4 -->
               <div class="col-md-4 mg-t--1 mg-md-t-0">
                <div class="form-group mg-md-l--1">
                  <label class="form-control-label">Mobile Number: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="mobile" value="<?php echo (isset($college->mobile))?$college->mobile:''; ?>" placeholder="Enter Mobile Number">
                </div>
              </div><!-- col-4 -->
              <div class="col-md-4 mg-t--1 mg-md-t-0">
                <div class="form-group mg-md-l--1">
                  <label class="form-control-label">Email address: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="email" name="college_email" value="<?php echo (isset($college->college_name))?$college->college_email:''; ?>" placeholder="Enter College email">
                </div>
              </div><!-- col-4 -->
              <div class="col-md-4">
                <div class="form-group bd-t-0-force">
                  <label class="form-control-label">College address: <span class="tx-danger"></span></label>
                  <input class="form-control" type="text" name="address" value="<?php echo (isset($college->college_name))?$college->address:''; ?>" placeholder="Enter address">
                </div>
              </div><!-- col-8 -->

               <div class="col-md-4">
                <div class="form-group mg-md-l--1 bd-t-0-force">
                  <label class="form-control-label mg-b-0-force">Country: <span class="tx-danger"></span></label>
                  
   <select id="countryId" name="country" class="countries form-control select2-hidden-accessible" data-placeholder="Choose country" tabindex="-1" aria-hidden="true">  <option value="101" select >India</option></select>
               
                </div>
              </div><!-- col-4 -->
               <div class="col-md-4">
                <div class="form-group mg-md-l--1 bd-t-0-force">
                  <label class="form-control-label mg-b-0-force">State: <span class="tx-danger"></span></label>
                  
 <!--  <select id="stateId" name="state" class="statess form-control select2-hidden-accessible" data-placeholder="Choose state" tabindex="-1" aria-hidden="true">
    <option value="<?php $location[0]->stateid; ?>"><?php echo ($location[0]->state); ?></option>

                 </select> -->
                                                     <select name="state" class="form-control" id="stateId">
                                       
                                          <?php if(!empty($states) ) {foreach($states as $value) { ?> 
                                        <option value="<?= $value->id ?>" <?php if(!empty($userlocations)&& $value->id==$userlocations->state_id) echo "selected"; ?> ><?= $value->name; ?> </option>
                                          <?php } } ?>                            
                                    </select>
                </div>
              </div><!-- col-4 -->
                <div class="col-md-4">
                <div class="form-group mg-md-l--1 bd-t-0-force">
                  <label class="form-control-label mg-b-0-force">City: <span class="tx-danger"></span></label>
                  
  <select name="city" class="form-control citys" id="cityId">
                                                 <?php if(!empty($cities) ) {foreach($cities as $value) { ?> 
                                        <option value="<?= $value->id ?>" <?php if(!empty($userlocations)&& $value->id==$userlocations->city_id) echo "selected"; ?> ><?= $value->name; ?> </option>
                                          <?php } } ?>                                                                   
                                    </select>
                </div>
              </div><!-- col-4 -->
            </div><!-- row -->
            <div class="form-layout-footer bd pd-20 bd-t-0">
              <button type="submit" class="btn btn-info">Update College</button>
              <button type="reset" class="btn btn-secondary">Cancel</button>
            </div><!-- form-group -->
          </div><!-- form-layout -->
      </form>
		

        </div><!-- br-section-wrapper -->
      </div>
	 