
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">
      <div class="pd-30">
        <h4 class="tx-gray-800 mg-b-5">Students List</h4>
      
      </div><!-- d-flex -->
   
      <div class="br-pagebody">
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
        <div class="br-section-wrapper">

          <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
              <thead>
                <tr>
                    <th class="wd-15p">Name</th>  
                    <th class="wd-15p">Register Number</th>  
                  <th class="wd-15p">Email</th>
                  <th class="wd-15p">Course Name</th>           
                             
                  <th class="wd-25p">Batch Name</th>
                     <th class="wd-10p">Mobile Number</th>
                       <th class="wd-10p">Action</th>

                </tr>
              </thead>
              <tbody>
			  <?php 
//var_dump($colleges); exit;
if(!empty($studentList)){
        foreach ($studentList as $stu) { ?>
			<tr>
        <td><?= $stu->stu_first_name; ?></td>
        <td><?= $stu->stu_unique_id; ?></td>
        <td><?= $stu->email; ?></td>
                 
                  <td><?= $stu->course_name; ?></td>
                   <td><?=  $stu->batch_name; 
                   ?></td>
                  
                  <td><?= $stu->mobile; ?></td>
                    
                  
               <td>

   <?php echo anchor('Student/viewStudent/'.$stu->mid, 'View'); ?>             
               </td>
               
                </tr>
			  <?php } }else{ ?>
          <tr><td>No records</td></tr>
        <?php } ?>
              </tbody>
            </table>
          </div><!-- table-wrapper -->


        </div><!-- br-section-wrapper -->
      </div><!-- br-pagebody -->
	  