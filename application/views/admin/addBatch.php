

<!-- ########## START: MAIN PANEL ########## -->
<div class="br-mainpanel">
    <div class="pd-30">
        <h4 class="tx-gray-800 mg-b-5">Add Class</h4>

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
             <form id="batch-form" class="addform" action="<?= site_url('Student/addBatch'); ?>" method="post" data-parsley-validate> 
            
                <div class="row">
                    <div class="col-sm-6">
                        <div class="panel panel-white">

                            <div class="panel-body">
                                <div class="col-sm-12">

                                    <div class="panel-body">

                                        <div class="form-group">
                                            <label for="reg_input" class="req">Course</label>
                                            <select class="form-control" name="courseid" id="Batch_courseid" required="">
                                                <option value="">Please Select</option>
                                                <?php foreach($courses as $course){ ?>
                                                <option value="<?= $course->id; ?>"><?= strtoupper($course->course_name); ?></option>
                                                <?php } ?>
                                            </select><div class="school_val_error" id="Batch_courseid_em_" style="display:none"></div>                                    </div>
                                        <div class="form-group">
                                            <label for="reg_input_name" class="req">Class Name  </label>
                                            <input class="form-control" name="batch_name" id="Batch_batch_name" type="text" maxlength="20" required=""/><div class="school_val_error" id="Batch_batch_name_em_" style="display:none"></div>                
                                        </div>

                                        <div class="form-group">
                                            <label for="reg_input_name" >Start Date</label>
                                            <div data-date-format="yyyy-m-dd" class="input-group date">
                                                <input placeholder="Start Date" class="form-control pickadate" name="batch_startdate" id="Batch_batch_startdate" type="date" required=""/><div class="school_val_error" id="Batch_batch_startdate_em_" style="display:none"></div>                                            <span class="input-group-addon"><i class="icon-calendar"></i></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="reg_input_name">End Date</label>
                                            <div data-date-format="yyyy-m-dd" class="input-group date">
                                                <input placeholder="End Date" class="form-control pickadate" name="batch_enddate" id="Batch_batch_enddate" type="date" required=""/><div class="school_val_error" id="Batch_batch_enddate_em_" style="display:none"></div>                                            <span class="input-group-addon"><i class="icon-calendar"></i></span>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="reg_input_name" class="req">Maximum Number of Students</label>
                                            <input class="form-control" name="maxnoofstudents" id="Batch_maxnoofstudents" type="text" maxlength="4" required=""/><div class="school_val_error" id="Batch_maxnoofstudents_em_" style="display:none"></div>                
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-5">
                                        <div class="form_sep">
                                            <input class="btn btn-info" onclick="return datevalidation();" type="submit" name="yt0" value="Save" />                                    </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </form>      


        </div><!-- br-section-wrapper -->
    </div>

