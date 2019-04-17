/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


    $(document).ready(function () {
        var droplist = $('#Studentabsent_courseid');
        droplist.change(function () {
             $('#checkall').checked = false;
            $.ajax({
                type: "POST",
                url: "Viewdropdown",
                data: {courseid: $('#Studentabsent_courseid option:selected').val()},
                dataType: "html",
                success: function (data) {
                    if (data == 1)
                    {
                        $('#Batch_daily').hide("slow");
                        $('#Batch_subject').show("slow");
                        $('#subject').show("slow");
                        $('#date').show("slow");
                    }
                    else
                    {
                        $('#Batch_subject').hide("slow");
                        $('#subject').hide("slow");
                        $('#Batch_subject').show("slow");
                        $('#date').show("slow");
                    }
                }
            });
        })
    });

    $(document).ready(function () {
        var droplist = $('#Studentabsent_subjectid');
        droplist.change(function () {
            $('#studentattendence tbody').empty();
            $.ajax({
                type: "POST",
                url: "Attendencelist_sub",
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
        var droplist = $('#Studentabsent_batchid');
        droplist.change(function () {
            $('#studentattendence tbody').empty();
            $.ajax({
                type: "POST",
                url: "Attendencelist",
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
	
	    $(document).ready(function () {
        $('#checkstatus').click(function (event) {  //on click 
            if (this.checked) { // check select status
                $('.checkbox1').each(function () { //loop through each checkbox
                    this.checked = true;  //select all checkboxes with class "checkbox1"               
                });
            } else {
                $('.checkbox1').each(function () { //loop through each checkbox
                    this.checked = false; //deselect all checkboxes with class "checkbox1"                       
                });
            }
        });

    });
	
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
                url: "Conformationfordeletingattendance",
                data: {date: $('#Studentabsent_date').val(), studentids: studentids,subjectid: $('#Studentabsent_subjectid option:selected').val()},
                dataType: "html",
                success: function (data) {
                    if (data == "success") {
                        if (confirm("Student attendance already marked for this day.Are you sure you want to save over existing data?")) {
                            $.ajax({
                                type: "POST",
                                url: "Saveattendence",
                                data: {courseid: $('#Studentabsent_courseid option:selected').val(), batchid: $('#Studentabsent_batchid option:selected').val(), subjectid: $('#Studentabsent_subjectid option:selected').val(), sendarray: sendarray, date: $('#Studentabsent_date').val(), studentabsentarray: studentabsentarray},
                                dataType: "html",
                                success: function (data) {
                                    alert("Successfully saved");
                                    location.reload();

                                }
                            })
                        } else {
                            location.reload();
                        }
                    } else {
                        $.ajax({
                            type: "POST",
                            url: "Saveattendence",
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
        var droplist = $('#Studentabsent_courseid1');
        droplist.change(function () {
            $.ajax({
                type: "POST",
                url: "Viewdropdown1",
                data: {courseid: $('#Studentabsent_courseid1 option:selected').val()},
                dataType: "html",
                success: function (data) {
                    if (data == 1)
                    {
                        $('#Batch_daily1').hide("slow");
                        $('#Batch_subject1').show("slow");
                        $('#subject1').show("slow");
                    }
                    else
                    {
                        $('#Batch_subject1').hide("slow");
                        $('#subject1').hide("slow");
                        $('#Batch_subject1').show("slow");
                    }
                }
            });
        })
    });
    function printDiv(divName) {
        var divToPrint = document.getElementById(divName);
        var popupWin = window.open('', '', 'width=300,height=300');
        popupWin.document.open();
        popupWin.document.write('<html><body onload="window.print()">' + divToPrint.innerHTML + '</html>');
        popupWin.document.close();
    }
