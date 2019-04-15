

<!-- ########## START: MAIN PANEL ########## -->
<div class="br-mainpanel">
    <div class="pd-30">
        <h4 class="tx-gray-800 mg-b-5">Add Subject</h4>

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
            <form id="subject-form" class="addform" action="<?= site_url('Student/addSubject'); ?>" method="post" data-parsley-validate> 
              
                <div class="row">
                    <div class="col-sm-6">
                        <div class="panel panel-default">
                            
                            <div class="panel-body">
                                <div class="col-sm-12">

                                    <div class="panel-body">
                                        <div class="form-group">
                                            <label for="reg_input_name" class="req">Subject Name </label>
                                            <input size="84" maxlength="45" class="form-control" name="subject_name" id="Subject_subject_name" type="text" required=""><div class="school_val_error" id="Subject_subject_name_em_" style="display:none"></div>                
                                        </div>
                                        <div class="form-group">
                                            <label for="reg_input_name" class="req">Subject Code </label>
                                            <input size="84" maxlength="45" class="form-control" name="subject_code" id="Subject_subject_code" type="text" required=""><div class="school_val_error" id="Subject_subject_code_em_" style="display:none"></div>                
                                        </div>
                                        <div class="form-group">
                                            <label for="reg_input_name">Description </label>
                                            <textarea size="84" maxlength="45" class="form-control" name="subject_description" id="Subject_subjectdescription"></textarea><div class="school_val_error" id="Subject_subjectdescription_em_" style="display:none"></div>                
                                        </div>
                 
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-5">
                                        <div class="form_sep">
                                            <input class="btn btn-info" name="std_reg_submit" id="std_reg_submit" type="submit" value="Save">
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </form>

        </div><!-- br-section-wrapper -->
    </div>

