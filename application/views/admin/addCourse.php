

<!-- ########## START: MAIN PANEL ########## -->
<div class="br-mainpanel">
    <div class="pd-30">
        <h4 class="tx-gray-800 mg-b-5">Add Course</h4>

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

            <form id="course-form" class="addform" action="<?= site_url('Student/addCourse'); ?>" method="post" data-parsley-validate> 
                <div class="row">
                    <div class="col-sm-6">
                        <div class="panel panel-default">

                            <div class="panel-body">
                                <div class="col-sm-12">

                                    <div class="panel-body">
                                        <div class="form-group">
                                            <label for="reg_input_name" class="req">Course Name </label>
                                            <input size="84" maxlength="45" class="form-control" name="course_name" id="Course_course_name" type="text" required/><div class="school_val_error" id="Course_course_name_em_" style="display:none"></div>                
                                        </div>
                                      
                                        <div class="form-group">
                                            <label for="reg_input_name">Code </label>
                                            <input class="form-control" name="course_code" id="Course_course_code" type="text" maxlength="10" required/><div class="school_val_error" id="Course_course_code_em_" style="display:none"></div>                
                                        </div>


                                        <div class="form-group">
                                            <label for="reg_input_name" class="req">Total Working Days</label>
                                            <input class="form-control" name="total_work_days" id="Course_totalworkingdays" type="text" maxlength="4" required=""/><div class="school_val_error" id="Course_totalworkingdays_em_" style="display:none"></div>                
                                        </div>
                                        <div class="form-group">
                                            <label class="req" for="Syllabus_syllabus_name">Syllabus Name</label><select class="form-control" name="syllabus_name" id="Syllabus_syllabus_name" required="">
                                                <option value="">Select Syllabus</option>
                                                <option value="GPA">GPA</option>
                                                <option value="CCE">CCE</option>
                                            </select><div class="school_val_error" id="Syllabus_syllabus_name_em_" style="display:none"></div>                           
                                        </div> 
                                             <div class="form-group">
                                            <label for="reg_input_name">Description</label>
                                            <textarea class="form-control" name="course_description" id="Course_course_description"></textarea>
                                            <div class="school_val_error" id="Course_course_description_em_" style="display:none"></div>   
                                        </div> 
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-5">
                                        <div class="form_sep">
                                            <input class="btn btn-info" name="std_reg_submit" id="std_reg_submit" type="submit" value="Save" />                            </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>

                </div>
            </form>


        </div><!-- br-section-wrapper -->
    </div>

