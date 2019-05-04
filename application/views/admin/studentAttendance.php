
<!-- ########## START: MAIN PANEL ########## -->
<div class="br-mainpanel">
    <div class="pd-30">
        <h4 class="tx-gray-800 mg-b-5">Student Attendance</h4>

    </div><!-- d-flex -->

    <div class="br-pagebody">
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
        <div class="br-section-wrapper">

            <div class="row">
                <div class="col-sm-12">


                    <div class="form-group col-sm-3 validating" id="course">
                        <label for="reg_input" class="req">Course</label>
                        <select class="form-control" name="courseid" id="Studentabsent_courseid">
                            <option value="">Select Course</option>
                            <?php foreach ($courses as $course) { ?>
                                <option value="<?= $course->id; ?>"><?= strtoupper($course->course_name); ?></option>
                            <?php } ?>
                        </select>

                    </div>  

                    <div class="form-group col-sm-3 validating" id="Batch_subject" style="display: none">
                        <label for="reg_input" class="req">Class</label>
                        <select class="form-control" name="batchid" id="Studentabsent_batchid">
                            <option value="">Select</option>
                            <?php foreach ($batches as $batch) { ?>
                                <option value="<?= $batch->id; ?>"><?= strtoupper($batch->batch_name); ?></option>
                            <?php } ?>
                        </select>

                    </div> 

                    <div class="form-group col-sm-3 validating" id="subject" style="display: none">
                        <label for="reg_input" class="req">Subject</label>
                        <select class="form-control" name="subjectid" id="Studentabsent_subjectid">
                            <option value="">Select</option>      
                            <?php foreach ($subjects as $batch) { ?>
                                <option value="<?= $batch->id; ?>"><?= strtoupper($batch->subject_name); ?></option>
                            <?php } ?>
                        </select>                        
                    </div> 


                    <div class="form-group col-sm-3" id="date" style="display: none">
                        <label for="reg_input_name" class="req">Date </label>
                        <div data-date-format="dd-mm-yyyy" class="input-group date validating">

                            <input placeholder="Date" class="form-control pickadate picker__input" value="2019-04-16" name="Studentabsent[date]" id="Studentabsent_date" type="date" maxlength="6" readonly="" aria-haspopup="true" aria-expanded="false" aria-readonly="false" aria-owns="Studentabsent_date_root">
                        </div>
                    </div>


                </div>
            </div>
          
            <div class="row">
                <div class="col-sm-12" id="gridview">

                    <div class="panel panel-default" id="attendancediv" style="display: none" >
                        <div class="panel-heading">
                            <h4 class="panel-title">Attendance </h4>
                        </div>
                        <div class="table-responsive">
                            <table class="table responsive table-bordered table-striped" id="studentattendence">
                                <thead>
                                    <tr>
                                        <th data-hide="phone" class="footable-last-column" width="15%"><input type="checkbox" id="checkall">&nbsp;&nbsp;&nbsp;Check all</th>
                                        <th data-hide="phone,tablet" width="10%">Roll No.</th>
                                        <th data-hide="phone,tablet" width="15%">Student Admission No.</th>
                                        <th data-hide="phone,tablet" width="30%">Student Name</th>
                                        <th data-hide="phone,tablet" width="15%">Remarks</th>                       
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                 
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-5">
                    <p>&nbsp;&nbsp; <a href="javascript:saveabsent();" class="btn btn-info" align="right">Save</a></p> 
                </div>
            </div>

        </div><!-- br-section-wrapper -->
    </div><!-- br-pagebody -->
