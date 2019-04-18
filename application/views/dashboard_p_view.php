


    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">
      <div class="pd-30">
        <h4 class="tx-gray-800 mg-b-5">Dashboard</h4>
        <p class="mg-b-0"></p>
      </div><!-- d-flex -->

      <div class="br-pagebody mg-t-5 pd-x-30">
        <div class="row row-sm">
          <div class="col-sm-6 col-xl-3">
            <div class="bg-teal rounded overflow-hidden">
              <div class="pd-25 d-flex align-items-center">
                <i class="ion ion-earth tx-60 lh-0 tx-white op-7"></i>
                <div class="mg-l-20">
                  <p class="tx-10 tx-spacing-1 tx-mont tx-medium tx-uppercase tx-white-8 mg-b-10">Total Employees</p>
                  <p class="tx-24 tx-white tx-lato tx-bold mg-b-2 lh-1"><?= ($employeess) ?></p>
                  
                </div>
              </div>
            </div>
          </div><!-- col-3 -->
          <div class="col-sm-6 col-xl-3 mg-t-20 mg-xl-t-0">
            <div class="bg-primary rounded overflow-hidden">
              <div class="pd-25 d-flex align-items-center">
                <i class="ion ion-monitor tx-60 lh-0 tx-white op-7"></i>
                <div class="mg-l-20">
                  <p class="tx-10 tx-spacing-1 tx-mont tx-medium tx-uppercase tx-white-8 mg-b-10">Total Students</p>
                  <p class="tx-24 tx-white tx-lato tx-bold mg-b-2 lh-1"><?= $students; ?></p>
                </div>
              </div>
            </div>
          </div><!-- col-3 -->
          <div class="col-sm-6 col-xl-3 mg-t-20 mg-xl-t-0">
            <div class="bg-br-primary rounded overflow-hidden">
              <div class="pd-25 d-flex align-items-center">
                <i class="ion ion-clock tx-60 lh-0 tx-white op-7"></i>
                <div class="mg-l-20">
                  <p class="tx-10 tx-spacing-1 tx-mont tx-medium tx-uppercase tx-white-8 mg-b-10">Total Courses</p>
                  <p class="tx-24 tx-white tx-lato tx-bold mg-b-2 lh-1"><?= $courses; ?></p>
                </div>
              </div>
            </div>
          </div><!-- col-3 -->
			<div class="col-sm-6 col-xl-3 mg-t-20 mg-sm-t-0">
            <div class="bg-danger rounded overflow-hidden">
              <div class="pd-25 d-flex align-items-center">
                <i class="ion ion-bag tx-60 lh-0 tx-white op-7"></i>
                <div class="mg-l-20">
                  <p class="tx-10 tx-spacing-1 tx-mont tx-medium tx-uppercase tx-white-8 mg-b-10"> Total Classes</p>
                  <p class="tx-24 tx-white tx-lato tx-bold mg-b-2 lh-1"><?= $classes; ?></p>
                </div>
              </div>
            </div>
          </div><!-- col-3 -->
        </div><!-- row -->

        <div class="row row-sm mg-t-20">
          <div class="col-8">

            <div class="card bd-0 shadow-base pd-30">
              <div class="d-flex align-items-center justify-content-between mg-b-30">
                <div>
                  <h6 class="tx-13 tx-uppercase tx-inverse tx-semibold tx-spacing-1">Newly Registered Students</h6>
                  <p class="mg-b-0"><i class="icon ion-calendar mg-r-5"></i> Total joined Students this year.</p>
                </div>
                <a href="<?= site_url('Student/studentList  '); ?>" class="btn btn-outline-info btn-oblong tx-11 tx-uppercase tx-mont tx-medium tx-spacing-1 pd-x-30 bd-2">View All ..</a>
              </div><!-- d-flex -->

              <table class="table table-valign-middle mg-b-0">
				  <thead>
				  	<th>Student Name</th>
					  <th>Joined Date</th>
					  
				  </thead>
                <tbody>
                    <?php if(!empty($studentList))
                    {
                        foreach($studentList as $stu){ ?>
                        
                  <tr>
                    <td>
                      <h6 class="tx-inverse tx-14 mg-b-0"><?php echo $stu->stu_first_name; ?></h6>
                      <span class="tx-12"><?php echo $stu->email; ?></span>
                    </td>
                    <td><?php echo $stu->stu_admission_date; ?></td>
                    <td class="pd-r-0-force tx-center"><a href="" class="tx-gray-600"><i class="icon ion-more tx-18 lh-0"></i></a></td>
                  </tr>
                    <?php } } ?>
                </tbody>
              </table>
            </div><!-- card -->

          </div><!-- col-9 -->
         
        </div><!-- row -->

      </div><!-- br-pagebody -->
     