
<div class="br-mainpanel">
    <div class="pd-30">
        <h4 class="tx-gray-800 mg-b-5">Add Student</h4>

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
               <form id="student-form" class="addform" action="<?= site_url('Student/addStudent'); ?>" method="post" data-parsley-validate> 
            
                <div class="row">
                    <div class="col-sm-12">
                        <div class="panel panel-default">

                            <div class="panel-body">
                                <div class="col-sm-12">
                                    <div class="row">

                                        <div class="form-group col-sm-4">
                                            <label for="reg_input" class="req">Academic Year</label>
                                            <select class="form-control" name="academicid" id="Student_academicid" required>
                                                <option value="">Select Academic Year</option>                                                
                                                <option value="2019 - 2020">2019 - 2020</option>
                                                <option value="2021 - 2028">2021 - 2022</option>
                                                <option value="2022 - 2023">2022 - 2023</option>
                                                <option value="2020 - 2029">2023 - 2024</option>
                                                
                                              
                                            </select><div class="school_val_error" id="Student_academicid_em_" style="display:none"></div>                        
                                        </div> 
                                        <div class="form-group col-sm-4">
                                            <label for="reg_input_name" class="req">Register Number</label>
                                            <input class="form-control" name="student_admissionno" id="Student_student_admissionno" type="text" maxlength="45" required/>          
                                            <div class="school_val_error" id="Student_student_admissionno_em_" style="display:none"></div>                            </div>
                                        <div class="form-group col-sm-4">
                                            <label for="reg_input_name" class="req">Joining Date</label>
                                            <div data-date-format="yyyy-M-d" class="input-group date">
                                                <input placeholder="Joining Date" class="form-control pickadate" value="2019-04-09" name="student_admissiondate" id="Student_student_admissiondate" type="date" required/>
                                                <div class="school_val_error" id="Student_student_admissiondate_em_" style="display:none"></div>                                    <span class="input-group-addon"><i class="icon-calendar"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-sm-4">
                                            <label for="reg_input" class="req">Course</label>
                                            <select class="form-control" name="courseid" id="Student_courseid" required>
                                                <option value="">Select Course</option>
                                               <?php foreach($courses as $course){ ?>
                                                <option value="<?= $course->id; ?>"><?= strtoupper($course->course_name); ?></option>
                                                <?php } ?>

                                            </select><div class="school_val_error" id="Student_courseid_em_" style="display:none"></div>                            </div>  
                                        <div class="form-group col-sm-4">
                                            <label for="reg_input" class="req">Batch</label>
                                            <select class="form-control" name="batchid" id="Student_batchid" required>
                                                <option value="">Select Batch</option>
                                                    <?php foreach($batches as $batch){ ?>
                                                <option value="<?= $batch->id; ?>"><?= strtoupper($batch->batch_name); ?></option>
                                                <?php } ?>
                                            </select><div class="school_val_error" id="Student_batchid_em_" style="display:none"></div>                            </div>
                                        <div class="form-group col-sm-4">
                                            <label for="reg_input_name">Roll No.</label>
                                            <input class="form-control" name="student_rollno" id="Student_student_rollno" type="text" maxlength="60" /><div class="school_val_error" id="Student_student_rollno_em_" style="display:none"></div>                
                                        </div>
                                    </div>
                                    <div id="count"></div>
                                    <div class="row">

                                        <div class="form-group col-sm-4">
                                            <label for="reg_input_name" class="req">First Name </label>
                                            <input class="form-control" name="student_firstname" id="Student_student_firstname" type="text" maxlength="45" required/><div class="school_val_error" id="Student_student_firstname_em_" style="display:none"></div>                
                                        </div>

                                        <div class="form-group col-sm-4">
                                            <label for="reg_input_name" >Middle Name </label>
                                            <input class="form-control" name="student_middlename" id="Student_student_middlename" type="text" maxlength="45" /><div class="school_val_error" id="Student_student_middlename_em_" style="display:none"></div>                            </div>
                                        <div class="form-group col-sm-4">
                                            <label for="reg_input_name">Last Name</label>
                                            <input class="form-control" name="student_lastname" id="Student_student_lastname" type="text" maxlength="45" required/><div class="school_val_error" id="Student_student_lastname_em_" style="display:none"></div>                            </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-sm-4">
                                            <label for="reg_input_name" class="req">Date of Birth</label>
                                            <div data-date-format="yyyy-M-d" class="input-group date">
                                                <input class="form-control pickadate" name="student_dob" id="Student_student_dob" type="date" maxlength="45" required/><div class="school_val_error" id="Student_student_dob_em_" style="display:none"></div>                                    <span class="input-group-addon"><i class="icon-calendar"></i></span>
                                            </div>
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label for="Gender">Gender</label>
                                            <select class="form-control" data-required="true" name="student_gender" id="Student_student_gender" required>
                                                <option value="">Please Select</option>
                                                <option value="male">Male</option>
                                                <option value="female">Female</option>
                                            </select><div class="school_val_error" id="Student_student_gender_em_" style="display:none"></div>                            </div>
                                        <div class="form-group col-sm-4">
                                            <label for="Blood_Group" >Blood Group</label>
                                            <select class="form-control" name="student_bloodgroup" id="Student_student_bloodgroup" required>
                                                <option value="">Please Select</option>
                                                <option value="A+">A+</option>
                                                <option value="A-">A-</option>
                                                <option value="B+">B+</option>
                                                <option value="B-">B-</option>
                                                <option value="O+">O+</option>
                                                <option value="O-">O-</option>
                                                <option value="AB+">AB+</option>
                                                <option value="AB-">AB-</option>
                                            </select><div class="school_val_error" id="Student_student_bloodgroup_em_" style="display:none"></div>                            </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-sm-4">
                                            <label for="reg_input_name" >Email</label>
                                            <input maxlength="45" class="form-control" name="student_email" id="Student_student_email" type="email" required/><div class="school_val_error" id="Student_student_birthplace_em_" style="display:none"></div>       
                                        </div>
                                        
                                          <div class="form-group col-sm-4">
                                            <label for="reg_input_name" >Mobile Number</label>
                                            <input maxlength="45" class="form-control" name="mobile" id="Student_student_mobile" type="text" required/><div class="school_val_error" id="Student_student_birthplace_em_" style="display:none"></div>       
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label for="reg_input_name" >Birth Place</label>
                                            <input maxlength="45" class="form-control" name="student_birthplace" id="Student_student_birthplace" type="text" required/><div class="school_val_error" id="Student_student_birthplace_em_" style="display:none"></div>       
                                        </div>
                                     
                                        <div class="form-group col-sm-4">
                                            <label for="reg_input_name" >Mother Tongue</label>
                                            <input maxlength="45" class="form-control" name="student_mothertoung" id="Student_student_mothertoung" type="text" required/><div class="school_val_error" id="Student_student_mothertoung_em_" style="display:none"></div>                            </div>

                                    </div> 

                                    <div class="row">

                                        <div class="form-group col-sm-6">
                                            <label for="reg_input_name">Permanent Address</label>
                                            <textarea class="form-control" name="student_p_address" id="Student_student_address2"></textarea><div class="school_val_error" id="Student_student_address2_em_" style="display:none"></div>                            </div>
                                        <div class="form_group col-sm-6">
                                            <label for="reg_input_name" class="req">Present Address</label>
                                            <textarea class="form-control" name="student_c_address1" id="Student_student_address1"></textarea><div class="school_val_error" id="Student_student_address1_em_" style="display:none"></div>                            </div>
                                    </div>

                                </div>
                                <div class="row buttons">
                                    <div class="col-sm-5">
                                        <div class="form_sep">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-layout-footer bd pd-20 bd-t-0">
                                    <button type="submit" class="btn btn-info">Add Student</button>
                                    <button type="reset" class="btn btn-secondary">Cancel</button>
                                </div><!-- form-group -->
                                </form>                 

                            </div><!-- br-section-wrapper -->
                        </div>
                    </div>
                </div>
        </div>
    </div>

        
