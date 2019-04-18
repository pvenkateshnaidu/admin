 

<script>
  var siteUrl ="<?php echo base_url()?>";
</script>
<footer class="br-footer">
        <div class="footer-left">
          <div class="mg-b-2">Copyright &copy; 2019. Web Mobilez. All Rights Reserved.</div>
          <div>Designed by the great pavan, if u want remove it.</div>
        </div>
      </footer>
    </div><!-- br-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->

    <script src="<?php echo base_url()?>assets/lib/jquery/jquery.js"></script>
       <script src="<?php echo base_url()?>assets/js/location.js"></script> 
    <script src="<?php echo base_url()?>assets/lib/popper.js/popper.js"></script>
    <script src="<?php echo base_url()?>assets/lib/bootstrap/bootstrap.js"></script>
    <script src="<?php echo base_url()?>assets/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>
    <script src="<?php echo base_url()?>assets/lib/moment/moment.js"></script>
    <script src="<?php echo base_url()?>assets/lib/jquery-ui/jquery-ui.js"></script>
    <script src="<?php echo base_url()?>assets/lib/jquery-switchbutton/jquery.switchButton.js"></script>
    <script src="<?php echo base_url()?>assets/lib/peity/jquery.peity.js"></script>
    <script src="<?php echo base_url()?>assets/lib/chartist/chartist.js"></script>
    <script src="<?php echo base_url()?>assets/lib/jquery.sparkline.bower/jquery.sparkline.min.js"></script>
    <script src="<?php echo base_url()?>assets/lib/d3/d3.js"></script>
    <script src="<?php echo base_url()?>assets/lib/rickshaw/rickshaw.min.js"></script>
     <script src="<?php echo base_url()?>assets/lib/parsleyjs/parsley.js"></script>
    
    <script src="<?php echo base_url()?>assets/lib/highlightjs/highlight.pack.js"></script>
    <script src="<?php echo base_url()?>assets/lib/datatables/jquery.dataTables.js"></script>  
    <script src="<?php echo base_url()?>assets/js/dataTables.buttons.min.js"></script>
       <script src="<?php echo base_url()?>assets/js/buttons.flash.min.js"></script>
         <script src="<?php echo base_url()?>assets/js/jszip.min.js"></script>
           <script src="<?php echo base_url()?>assets/js/pdfmake.min.js"></script>
             <script src="<?php echo base_url()?>assets/js/vfs_fonts.js"></script>
              <script src="<?php echo base_url()?>assets/js/buttons.html5.min.js"></script>
              <script src="<?php echo base_url()?>assets/js/buttons.print.min.js"></script>
  

    <script src="<?php echo base_url()?>assets/js/bracket.js"></script>
    <script src="<?php echo base_url()?>assets/js/ResizeSensor.js"></script>
<script>
    $('.fc-datepicker').datepicker({
        
    });
      $(function(){
        'use strict';

        $('.addform').parsley();
   
      });
    </script>
    <script>
      $(function(){
        'use strict'

        // FOR DEMO ONLY
        // menu collapsed by default during first page load or refresh with screen
        // having a size between 992px and 1299px. This is intended on this page only
        // for better viewing of widgets demo.
        $(window).resize(function(){
          minimizeMenu();
        });

        minimizeMenu();

        function minimizeMenu() {
          if(window.matchMedia('(min-width: 992px)').matches && window.matchMedia('(max-width: 1299px)').matches) {
            // show only the icons and hide left menu label by default
            $('.menu-item-label,.menu-item-arrow').addClass('op-lg-0-force d-lg-none');
            $('body').addClass('collapsed-menu');
            $('.show-sub + .br-menu-sub').slideUp();
          } else if(window.matchMedia('(min-width: 1300px)').matches && !$('body').hasClass('collapsed-menu')) {
            $('.menu-item-label,.menu-item-arrow').removeClass('op-lg-0-force d-lg-none');
            $('body').removeClass('collapsed-menu');
            $('.show-sub + .br-menu-sub').slideDown();
          }
        }
      });
    </script>
    
   <script>
      $(function(){
        'use strict';

        $('#datatable1').DataTable({
          responsive: true,
           dom: 'Bfrtip',
        buttons: [
            'excel', 'pdf', 'print'
        ],
          language: {
            searchPlaceholder: 'Search...',
            sSearch: '',
            lengthMenu: '_MENU_ items/page',
          }
        });

        $('#datatable2').DataTable({
          bLengthChange: false,
          searching: false,
          responsive: true
        });
      
      
      });
    </script>
   <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script>
   /*
     
     $("#addCollege").validate({
    rules: {
      
      
        college_email: {
        required: true,
        college_email: true,
        
      }, 
      priniciple_name: {
        required: true,
        
        
      },
      college_name: {
        required: true,
        
        
      },
    },
    messages: {
       
        college_email: { 
         required: "Please enter your email address.",
            college_email: "Please enter a valid email address.",
            
      },
      priniciple_name: { 
         required: "Please enter your Priniciple Name.",
            
      },
      college_name: { 
         required: "Please enter your College Name.",
            
      },
    },
    errorElement: "em",
  }); */
      function saveabsent() {
        var date = $('#Studentabsent_date').val();
        var date = new Date(date).setHours(0, 0, 0, 0);
        var now = (new Date()).setHours(0, 0, 0, 0);
        if (date > now) {
            alert("Date must be less than or equal to current date");
            return;
        } else {
            var student = [];
            var studentabsent = [];
            var studentids = [];
            $('#studentattendence tbody tr').each(function (row, tr) {

              if ($(this).find(".checkbox").prop("checked")) {
                    //var amount = $(tr).find('td:eq(3)').text();
                    var studentid = $(tr).find('td:eq(0)').data('id');

                    var remark = $(tr).find('td:eq(4) input').val();

                    student.push(studentid);
                    student.push(remark);
                    if ($(this).find(".checkbox1").prop("checked")) {
                        student.push(1);
                    } else {
                        student.push(0);
                    }

                    studentids.push(studentid);
                } else {
                    var studentid = $(tr).find('td:eq(0)').data('id');
                    studentabsent.push(studentid);
                    studentids.push(studentid);
                }

            });
            var sendarray = JSON.stringify(student);
            var studentabsentarray = JSON.stringify(studentabsent);
            var studentids = JSON.stringify(studentids);
            
            $.ajax({
                type: "POST",
                url: siteUrl+"Attendance/Conformationfordeletingattendance",
                data: {date: $('#Studentabsent_date').val(), studentids: studentids,subjectid: $('#Studentabsent_subjectid option:selected').val()},
                dataType: "html",
                success: function (data) {
                    if (data == "success") {
                        if (confirm("Student attendance already marked for this day.Are you sure you want to save over existing data?")) {
                            $.ajax({
                                type: "POST",
                                url: siteUrl+"Attendance/Saveattendence",
                                data: {courseid: $('#Studentabsent_courseid option:selected').val(), batchid: $('#Studentabsent_batchid option:selected').val(), subjectid: $('#Studentabsent_subjectid option:selected').val(), sendarray: sendarray, date: $('#Studentabsent_date').val(), studentabsentarray: studentabsentarray},
                                dataType: "html",
                                success: function (data) {
                                    alert("Successfully saved");
                                  //  location.reload();

                                }
                            })
                        } else {
                            location.reload();
                        }
                    } else {
                        $.ajax({
                            type: "POST",
                            url: siteUrl+"Attendance/Saveattendence",
                            data: {courseid: $('#Studentabsent_courseid option:selected').val(), batchid: $('#Studentabsent_batchid option:selected').val(), subjectid: $('#Studentabsent_subjectid option:selected').val(), sendarray: sendarray, date: $('#Studentabsent_date').val(), studentabsentarray: studentabsentarray},
                            dataType: "html",
                            success: function (data) {
                                alert("Successfully saved");
                                location.reload();

                            }
                        })
                    }

                }
            })

        }
    }

    	$(document).ready(function () {
        var droplist = $('#Studentabsent_date');
        droplist.change(function () {
            var date = $('#Studentabsent_date').val();
            var date = new Date(date).setHours(0,0,0,0);
			var now = ( new Date() ).setHours(0,0,0,0);
			if (date > now) {
				alert("Date must be less than or equal to current date");
				document.getElementById('Studentabsent_date').value='';
				return;
				}
			})
    });
          $(document).ready(function () {
        var droplist = $('#Student_courseid');
        droplist.change(function () {
            
         $("#Student_batchid").val('');
            $.ajax({
                type: "POST",
                url: siteUrl+"Attendance/Viewdropdown",
                data: {courseid: $('#Student_courseid option:selected').val()},
                dataType: "html",
                success: function (data) {
                    
                 $("#Student_batchid").empty();
                 $("#Student_batchid").append(data);
                       // $('#Batch_daily').hide("slow");
                       
                   
                }
            }); 
        })
    });
      $(document).ready(function () {
        var droplist = $('#Studentabsent_courseid');
        droplist.change(function () {
            $('#studentattendence tbody').empty();
         $("#Studentabsent_subjectid").val('');
            $.ajax({
                type: "POST",
                url: "Attendance/Viewdropdown",
                data: {courseid: $('#Studentabsent_courseid option:selected').val()},
                dataType: "html",
                success: function (data) {
                      $("#Batch_subject").show();
                     $("#subject").show();
                     $("#date").show();
                 $("#Studentabsent_batchid").empty();
                 $("#Studentabsent_batchid").append(data);
                       // $('#Batch_daily').hide("slow");
                       
                   
                }
            }); 
        })
    });
    $(document).ready(function () {
        var droplist = $('#Studentabsent_batchid');
        droplist.change(function () {
            $('#studentattendence tbody').empty();
             $("#Studentabsent_subjectid").val('');
        });
    });
        $(document).ready(function () {
        var droplist = $('#Studentabsent_subjectid');
        droplist.change(function () {
           
           
            $("#attendancediv").show();
           $('#studentattendence tbody').empty();
            
            $.ajax({
                type: "POST",
                url: "Attendance/Attendencelist_sub",
                data: {courseid: $('#Studentabsent_courseid option:selected').val(), batchid: $('#Studentabsent_batchid option:selected').val(), subjectid: $('#Studentabsent_subjectid option:selected').val()},
                dataType: "html",
                success: function (data) {
                    $('#studentattendence tbody').append(data);
                    $('#attendancediv').show("slow");
                }
            }); 
        })
    });
    
     $(document).ready(function () {
        $('#checkall').click(function (event) {  //on click 
            if (this.checked) { // check select status
                $('.checkbox').each(function () { //loop through each checkbox
                    this.checked = true;  //select all checkboxes with class "checkbox1"               
                });
            } else {
                $('.checkbox').each(function () { //loop through each checkbox
                    this.checked = false; //deselect all checkboxes with class "checkbox1"                       
                });
            }
        });

    });
  </script>
  
  </body>
</html>


