 <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">
      <div class="pd-30">
        <h4 class="tx-gray-800 mg-b-5">Add New College</h4>
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
	<form method="post" id="addCollege" action="<?= site_url('Colleges/addCollege'); ?>" data-parsley-validate>
          <div class="form-layout form-layout-2">
            <div class="row no-gutters">
              <div class="col-md-4">
                <div class="form-group">
                  <label class="form-control-label">College Name: <span class="tx-danger">*</span></label>
                  <?php //if(form_error("college_name")) echo "Enter College Name";
                   ?>
                  <input class="form-control" type="text" name="college_name" value="<?php echo set_value('college_name'); ?>" placeholder="Enter College Name" required>
                </div>
              </div><!-- col-4 -->
                  <div class="col-md-4">
                <div class="form-group">
                  <label class="form-control-label">College Code: <span class="tx-danger">*</span></label>
                  <?php //if(form_error("college_name")) echo "Enter College Name";
                   ?>
                  <input class="form-control" type="text" name="college_code" value="<?php echo set_value('college_name'); ?>" placeholder="Enter College Code" required>
                </div>
              </div><!-- col-4 -->
              <div class="col-md-4 mg-t--1 mg-md-t-0">
                <div class="form-group mg-md-l--1">
                  <label class="form-control-label">Principle Name: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="priniciple_name" value="<?php echo set_value('priniciple_name'); ?>" placeholder="Enter Principle Name" required>
                </div>
              </div><!-- col-4 -->
                <div class="col-md-4 mg-t--1 mg-md-t-0">
                <div class="form-group mg-md-l--1">
                  <label class="form-control-label">Mobile Number <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="mobile" value="<?php echo set_value('mobile'); ?>" placeholder="Enter Mobile Number" required>
                </div>
              </div><!-- col-4 -->
              <div class="col-md-4 mg-t--1 mg-md-t-0">
                <div class="form-group mg-md-l--1">
                  <label class="form-control-label">Email address: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="email" name="college_email" value="<?php echo set_value('college_email'); ?>" placeholder="Enter College email" required>
                </div>
              </div><!-- col-4 -->
              <div class="col-md-4">
                <div class="form-group bd-t-0-force">
                  <label class="form-control-label">College address: <span class="tx-danger"></span></label>
                  <input class="form-control" type="text" name="address" value="<?php echo set_value('address'); ?>" placeholder="Enter address">
                </div>
              </div><!-- col-8 -->

               <div class="col-md-4">
                <div class="form-group mg-md-l--1 bd-t-0-force">
                  <label class="form-control-label mg-b-0-force">Country: <span class="tx-danger"></span></label>
                  
   <select id="countryId" name="country" class="countries form-control select2-hidden-accessible" data-placeholder="Choose country" tabindex="-1" aria-hidden="true" >  <option value="<?php echo set_value('country',101); ?>" select >India</option></select>
               
                </div>
              </div><!-- col-4 -->
               <div class="col-md-4">
                <div class="form-group mg-md-l--1 bd-t-0-force">
                  <label class="form-control-label mg-b-0-force">State: <span class="tx-danger"></span></label>
                  
   <select id="stateId" name="state" class="states form-control select2-hidden-accessible" data-placeholder="Choose state" tabindex="-1" aria-hidden="true">

                 </select>
                </div>
              </div><!-- col-4 -->
                <div class="col-md-4">
                <div class="form-group mg-md-l--1 bd-t-0-force">
                  <label class="form-control-label mg-b-0-force">City: <span class="tx-danger"></span></label>
                  
   <select id="city" name="city" class="cities form-control select2-hidden-accessible" data-placeholder="Choose state" tabindex="-1" aria-hidden="true">
      <option>---</option>
                 </select>
                </div>
              </div><!-- col-4 -->
            </div><!-- row -->
            <div class="form-layout-footer bd pd-20 bd-t-0">
              <button type="submit" class="btn btn-info">Add College</button>
              <button type="reset" class="btn btn-secondary">Cancel</button>
            </div><!-- form-group -->
          </div><!-- form-layout -->
      </form>
		

        </div><!-- br-section-wrapper -->
      </div>
	 