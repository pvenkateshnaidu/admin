


    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">
      <div class="pd-30">
        <h4 class="tx-gray-800 mg-b-5">Dashboard</h4>
        <p class="mg-b-0">Super admin manages the colleges add or delete.</p>
      </div><!-- d-flex -->

      <div class="br-pagebody mg-t-5 pd-x-30">
        <div class="row row-sm">
          <div class="col-sm-6 col-xl-3">
            <div class="bg-teal rounded overflow-hidden">
              <div class="pd-25 d-flex align-items-center">
               
                <i class="ion ion-earth tx-60 lh-0 tx-white op-7"></i>
                <div class="mg-l-20">
                  <p class="tx-10 tx-spacing-1 tx-mont tx-medium tx-uppercase tx-white-8 mg-b-10">Total Colleges</p>
                  <p class="tx-24 tx-white tx-lato tx-bold mg-b-2 lh-1"><?= ($total_college_count) ?></p>
                  
                </div>
              </div>
            </div>
          </div><!-- col-3 -->
          <div class="col-sm-6 col-xl-3 mg-t-20 mg-xl-t-0">
            <div class="bg-primary rounded overflow-hidden">
              <div class="pd-25 d-flex align-items-center">
                <i class="ion ion-monitor tx-60 lh-0 tx-white op-7"></i>
                <div class="mg-l-20">
                  <p class="tx-10 tx-spacing-1 tx-mont tx-medium tx-uppercase tx-white-8 mg-b-10">Active colleges</p>
                  <p class="tx-24 tx-white tx-lato tx-bold mg-b-2 lh-1"><?= $active_colleges; ?></p>
                </div>
              </div>
            </div>
          </div><!-- col-3 -->
          <div class="col-sm-6 col-xl-3 mg-t-20 mg-xl-t-0">
            <div class="bg-br-primary rounded overflow-hidden">
              <div class="pd-25 d-flex align-items-center">
                <i class="ion ion-clock tx-60 lh-0 tx-white op-7"></i>
                <div class="mg-l-20">
                  <p class="tx-10 tx-spacing-1 tx-mont tx-medium tx-uppercase tx-white-8 mg-b-10">Unpaid Colleges</p>
                  <p class="tx-24 tx-white tx-lato tx-bold mg-b-2 lh-1">0</p>
                </div>
              </div>
            </div>
          </div><!-- col-3 -->
			<div class="col-sm-6 col-xl-3 mg-t-20 mg-sm-t-0">
            <div class="bg-danger rounded overflow-hidden">
              <div class="pd-25 d-flex align-items-center">
                <i class="ion ion-bag tx-60 lh-0 tx-white op-7"></i>
                <div class="mg-l-20">
                  <p class="tx-10 tx-spacing-1 tx-mont tx-medium tx-uppercase tx-white-8 mg-b-10">This Month Payments</p>
                  <p class="tx-24 tx-white tx-lato tx-bold mg-b-2 lh-1">0</p>
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
                  <h6 class="tx-13 tx-uppercase tx-inverse tx-semibold tx-spacing-1">Newly Registered Colleges</h6>
                  <p class="mg-b-0"><i class="icon ion-calendar mg-r-5"></i> Total joined colleges this year.</p>
                </div>
                <a href="" class="btn btn-outline-info btn-oblong tx-11 tx-uppercase tx-mont tx-medium tx-spacing-1 pd-x-30 bd-2">View All ..</a>
              </div><!-- d-flex -->

              <table class="table table-valign-middle mg-b-0">
				  <thead>
				  	<th>College Name</th>
					  <th>Joined Date</th>
					  
				  </thead>
                <tbody>
                  <tr>
                    <td>
                      <h6 class="tx-inverse tx-14 mg-b-0">Deborah Miner</h6>
                      <span class="tx-12">@deborah.miner</span>
                    </td>
                    <td>Nov 01, 2017</td>
                    <td class="pd-r-0-force tx-center"><a href="" class="tx-gray-600"><i class="icon ion-more tx-18 lh-0"></i></a></td>
                  </tr>
                  <tr>
                    <td>
                      <h6 class="tx-inverse tx-14 mg-b-0">Belinda Connor</h6>
                      <span class="tx-12">@belinda.connor</span>
                    </td>
                    <td>Oct 28, 2017</td>
                    <td class="pd-r-0-force tx-center"><a href="" class="tx-gray-600"><i class="icon ion-more tx-18 lh-0"></i></a></td>
                  </tr>
                  <tr>
                    <td>
                      <h6 class="tx-inverse tx-14 mg-b-0">Andrew Wiggins</h6>
                      <span class="tx-12">@andrew.wiggins</span>
                    </td>
                    <td>Oct 27, 2017</td>
                    <td class="pd-r-0-force tx-center"><a href="" class="tx-gray-600"><i class="icon ion-more tx-18 lh-0"></i></a></td>
                  </tr>
                  <tr>
                    <td>
                      <h6 class="tx-inverse tx-14 mg-b-0">Brandon Lawrence</h6>
                      <span class="tx-12">@brandon.lawrence</span>
                    </td>
                    <td>Oct 27, 2017</td>
                    <td class="pd-r-0-force tx-center"><a href="" class="tx-gray-600"><i class="icon ion-more tx-18 lh-0"></i></a></td>
                  </tr>
                  <tr>
                    <td>
                      <h6 class="tx-inverse tx-14 mg-b-0">Marilyn Tarter</h6>
                      <span class="tx-12">@marilyn.tarter</span>
                    </td>
                    <td>Oct 27, 2017</td>
                    <td class="pd-r-0-force tx-center"><a href="" class="tx-gray-600"><i class="icon ion-more tx-18 lh-0"></i></a></td>
                  </tr>
                </tbody>
              </table>
            </div><!-- card -->

          </div><!-- col-9 -->
          <div class="col-4">


            <div class="card bd-0 shadow-base pd-30">
              <h6 class="tx-13 tx-uppercase tx-inverse tx-semibold tx-spacing-1">Sales Report</h6>
              <p class="mg-b-25">Total sales this year monthly.</p>

              <label class="tx-12 tx-gray-600 mg-b-10">January (62 Colleges)</label>
              <div class="progress ht-5 mg-b-10">
                <div class="progress-bar wd-25p" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
              </div>

              <label class="tx-12 tx-gray-600 mg-b-10">February (62 Colleges)</label>
              <div class="progress ht-5 mg-b-10">
                <div class="progress-bar bg-teal wd-60p" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
              </div>

              <label class="tx-12 tx-gray-600 mg-b-10">March (62 Colleges)</label>
              <div class="progress ht-5 mg-b-10">
                <div class="progress-bar bg-danger wd-70p" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
              </div>

              <label class="tx-12 tx-gray-600 mg-b-10">April (62 Colleges)</label>
              <div class="progress ht-5 mg-b-10">
                <div class="progress-bar bg-warning wd-50p" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
              </div>

              <label class="tx-12 tx-gray-600 mg-b-10">May (62 Colleges)</label>
              <div class="progress ht-5 mg-b-10">
                <div class="progress-bar bg-info wd-45p" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100"></div>
              </div>

              <label class="tx-12 tx-gray-600 mg-b-10">June (62 Colleges)</label>
              <div class="progress ht-5 mg-b-10">
                <div class="progress-bar bg-purple wd-65p" role="progressbar" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
              </div>

            </div><!-- card -->


          </div><!-- col-3 -->
        </div><!-- row -->

      </div><!-- br-pagebody -->
     