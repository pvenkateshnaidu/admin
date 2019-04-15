
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
            <a href="<?php echo site_url("Import/downloadFile"); ?>">Sample Import Excel File Download</a>
            <br>
            
            <?php
            $output = '';
            $output .= form_open_multipart('import/save');
            $output .= '<div class="row">';
            $output .= '<div class="col-lg-12 col-sm-12"><div class="form-group">';
            $output .= form_label('Import Students', 'image');
            $data = array(
                'name' => 'uploadFile',
                'id' => 'uploadFile',
                'class' => 'form-control filestyle',
                'value' => '',
                'data-icon' => 'false'
            );
            $output .= form_upload($data);
            $output .= '</div> <span style="color:red;">*Please choose an Excel file(.xls or .xlxs) as Input</span></div>';
            $output .= '<div class="col-lg-12 col-sm-12"><div class="form-group text-right">';
            $data = array(
                'name' => 'importfile',
                'id' => 'importfile-id',
                'class' => 'btn btn-primary',
                'value' => 'Import',
            );
            $output .= form_submit($data, 'Import Data');
            $output .= '</div>
                        </div></div>';
            $output .= form_close();
            echo $output;
            ?>


        </div><!-- br-section-wrapper -->
    </div>

