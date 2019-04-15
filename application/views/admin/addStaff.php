<!-- ########## START: MAIN PANEL ########## -->
<div class="br-mainpanel">
    <div class="pd-30">
        <h4 class="tx-gray-800 mg-b-5">Add Faculty</h4>
        <p class="mg-b-0">Super admin manages the Staff add or delete.</p>
    </div><!-- d-flex -->

    <div class="br-pagebody">
        <div class="br-section-wrapper">
            <?php if (!empty(validation_errors())) { ?>
                <div class="alert alert-danger mg-t-30" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <?php echo validation_errors(); ?>          
                </div>
            <?php } ?>
            <?php if ($this->session->tempdata("message")) { ?>
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
            <form method="post" id="addstaff" action="<?= site_url('Teacher/addTeacher'); ?>">
                <div class="form-layout form-layout-2">
                    <div class="row no-gutters">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-control-label">Faculty Type: <span class="tx-danger">*</span></label>
                                <?php //if(form_error("college_name")) echo "Enter College Name";
                                ?>
                                <select id="employee_type" name="employee_type" class=" form-control select2-hidden-accessible" data-placeholder="Staff Type" tabindex="-1" aria-hidden="true"> 

                                    <!--  <?php foreach ($roles as $role) { ?>
                                              <option value="<?php echo $role->rid; ?>" ><?= ucwords($role->role_name); ?></option>
                                    <?php } ?> -->
                                    <option value="3">Teacher</option>
                                    <option value="4">Staff_advisor</option>
                                    
                                </select>
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-control-label">Full Name: <span class="tx-danger">*</span></label>
                                <?php //if(form_error("college_name")) echo "Enter College Name";
                                ?>
                                <input class="form-control" type="text" name="employee_name" value="<?php echo set_value('employee_name'); ?>" placeholder="Enter Full Name">
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-control-label">Faculty Code: <span class="tx-danger">*</span></label>
                                <?php //if(form_error("college_name")) echo "Enter College Name";
                                ?>
                                <input class="form-control" type="text" name="employee_code" value="<?php echo set_value('employee_code'); ?>" placeholder="Enter Employee Code">
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-md-4 mg-t--1 mg-md-t-0">
                            <div class="form-group mg-md-l--1">
                                <label class="form-control-label">Join Date : <span class="tx-danger"></span></label>
                                <input class="form-control" type="date" name="join_date" value="<?php echo set_value('join_date'); ?>" >
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-md-4 mg-t--1 mg-md-t-0">
                            <div class="form-group mg-md-l--1">
                                <label class="form-control-label">Date of Birth : <span class="tx-danger"></span></label>
                                <input class="form-control" type="date" name="date_of_birth" value="<?php echo set_value('date_of_birth'); ?>" >
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-md-4 mg-t--1 mg-md-t-0">
                            <div class="form-group mg-md-l--1">
                                <label class="form-control-label">Mobile Number <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="mobile" value="<?php echo set_value('mobile'); ?>" placeholder="Enter Mobile Number">
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-md-4 mg-t--1 mg-md-t-0">
                            <div class="form-group mg-md-l--1">
                                <label class="form-control-label">Email address: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="email" name="email" value="<?php echo set_value('email'); ?>" placeholder="Enter Email">
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-md-4 mg-t--1 mg-md-t-0">
                            <div class="form-group mg-md-l--1">
                                <label class="form-control-label">Total Experience: <span class="tx-danger"></span></label>
                                <input class="form-control" type="text" name="total_exp" value="<?php echo set_value('total_exp'); ?>" placeholder="Enter Total Experience">
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-md-4 mg-t--1 mg-md-t-0">
                            <div class="form-group mg-md-l--1">
                                <label class="form-control-label">Gender: <span class="tx-danger">*</span></label>
                                <select id="gender" name="gender" class=" form-control select2-hidden-accessible" data-placeholder="gender" tabindex="-1" aria-hidden="true"> 
                                    <option value="">Select</option>
                                    <option value="male" select >Male</option><option value="female"  >Female</option></select>
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-md-4 mg-t--1 mg-md-t-0">
                            <div class="form-group mg-md-l--1">
                                <label class="form-control-label">Qualification: <span class="tx-danger"></span></label>
                                <input class="form-control" type="text" name="qualification" value="<?php echo set_value('qualification'); ?>" placeholder="Enter Qualification">
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-md-4 mg-t--1 mg-md-t-0">
                            <div class="form-group mg-md-l--1">
                                <label class="form-control-label">Department: <span class="tx-danger">*</span></label>
                                <select id="department" name="department" class=" form-control select2-hidden-accessible" data-placeholder="Department" tabindex="-1" aria-hidden="true"> 
                                    <option value="">Select Department</option>
                                    <?php foreach ($departments as $department) { ?>
                                        <option value="<?php echo $department->emp_department_id; ?>" ><?= ucwords($department->emp_department_name); ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-md-4 mg-t--1 mg-md-t-0">
                            <div class="form-group mg-md-l--1">
                                <label class="form-control-label">Designation: <span class="tx-danger">*</span></label>
                                <select id="designation" name="designation" class=" form-control select2-hidden-accessible" data-placeholder="Designation" tabindex="-1" aria-hidden="true"> 
                                    <option value="">Select Designation</option>                   
                                    <?php foreach ($designations as $designation) { ?>
                                        <option value="<?php echo $designation->emp_designation_id; ?>" ><?= ucwords($designation->emp_designation_name); ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-md-6">
                            <div class="form-group bd-t-0-force">
                                <label class="form-control-label">Personal address: <span class="tx-danger"></span></label>
                                <textarea class="form-control"  name="paddress"><?php echo set_value('paddress'); ?></textarea>

                            </div>
                        </div><!-- col-8 -->
                        <div class="col-md-6">
                            <div class="form-group bd-t-0-force">
                                <label class="form-control-label">Current address: <span class="tx-danger"></span></label>
                                <textarea class="form-control"  name="caddress"><?php echo set_value('caddress'); ?></textarea>

                            </div>
                        </div><!-- col-8 -->



                    </div><!-- row -->
                    <div class="form-layout-footer bd pd-20 bd-t-0">
                        <button type="submit" class="btn btn-info">Save</button>
                        <button type="reset" class="btn btn-secondary">Cancel</button>
                    </div><!-- form-group -->
                </div><!-- form-layout -->
            </form>


        </div><!-- br-section-wrapper -->
    </div>
