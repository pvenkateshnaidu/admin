
<!-- ########## START: MAIN PANEL ########## -->
<div class="br-mainpanel">
    <div class="pd-30">
        <h4 class="tx-gray-800 mg-b-5">College List </h4>
        <p class="mg-b-0">Super admin manages the colleges add or delete.</p>
    </div><!-- d-flex -->

    <div class="br-pagebody" >
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

            <div class="table-wrapper">
                <table id="datatable1" class="table display responsive nowrap">
                    <thead>
                        <tr>
                            <th class="wd-15p">College Name</th>
                            <th class="wd-15p">College Code</th>
                            <th class="wd-20p">Principle</th>
                            <th class="wd-15p">Start date</th>               
                            <th class="wd-25p">E-mail</th>
                            <th class="wd-10p">Payment</th>
                            <th class="wd-10p">Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
//var_dump($colleges); exit;
                        if (!empty($colleges)) {
                            foreach ($colleges as $college) {
                                ?>
                                <tr>
                                    <td><?= $college->college_name; ?></td>
                                    <td><?= $college->college_code; ?></td>
                                    <td><?= $college->priniciple_name; ?></td>
                                    <td><?= $college->created_date; ?></td>
                                    <td><?= $college->college_email; ?></td>
                                    <td>-</td>
                                    <td>
                                        <?php echo anchor('Colleges/editCollege/' . $college->cid, 'Edit'); ?> 
                                        | <?php echo anchor('Colleges/deleteCollege/' . $college->cid, 'Delete'); ?></td>
                                </tr>
                            <?php }
                        } else {
                            ?>
                            <tr><td>No records</td></tr>
<?php } ?>
                    </tbody>
                </table>
            </div><!-- table-wrapper -->


        </div><!-- br-section-wrapper -->
    </div><!-- br-pagebody -->
