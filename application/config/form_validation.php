<?php

$config = array(
        'checkEmail' => array(
        array(
            'field' => 'email',
            'label' => 'Email',
            'rules' => 'trim|required|is_unique[members.email]'
        )
    ),
	   'login' => array(
        array(
            'field' => 'email',
            'label' => 'Email',
            'rules' => 'trim|required'
        )
    ),
       'addBatch' => array(
        array(
            'field' => 'batch_name',
            'label' => 'Batch Name',
            'rules' => 'trim|required'
        ),
              array(
            'field' => 'courseid',
            'label' => 'Course',
            'rules' => 'trim|required'
        ),
              array(
            'field' => 'maxnoofstudents',
            'label' => 'Max number of students',
            'rules' => 'trim|required'
        )
    ),
         'addSubject' => array(
        array(
            'field' => 'subject_name',
            'label' => 'Subject Name',
            'rules' => 'trim|required'
        ),
              array(
            'field' => 'subject_code',
            'label' => 'Subject code',
            'rules' => 'trim|required'
        ),
         
    ),
       'addCourse' => array(
        array(
            'field' => 'course_name',
            'label' => 'Course Name',
            'rules' => 'trim|required'
        ),
              array(
            'field' => 'course_code',
            'label' => 'Course Code',
            'rules' => 'trim|required'
        ),
              array(
            'field' => 'total_work_days',
            'label' => 'Total working Days',
            'rules' => 'trim|required'
        )
    ),
           'addStudent' => array(
        array(
            'field' => 'academicid',
            'label' => 'Acadamic Year',
            'rules' => 'trim|required'
        ),
              array(
            'field' => 'student_admissionno',
            'label' => 'Register Number',
            'rules' => 'trim|required|is_unique[stu_info.stu_unique_id]'
        ),
              array(
            'field' => 'student_email',
            'label' => 'Student Email',
            'rules' => 'trim|required|is_unique[members.email]'
        ),
              array(
            'field' => 'student_firstname',
            'label' => 'First Name',
            'rules' => 'trim|required'
        ),
              array(
            'field' => 'student_lastname',
           'label' => 'Last Name',
            'rules' => 'trim|required'
        ),
              array(
            'field' => 'student_bloodgroup',
            'label' => 'Blood Group',
            'rules' => 'trim|required'
        ),
              array(
            'field' => 'student_admissiondate',
            'label' => 'Join Date',
            'rules' => 'trim|required'
        )
    ),
    'addCollege' => array(
        array(
            'field' => 'college_name',
            'label' => 'College Name',
            'rules' => 'trim|required'

        ),
         array(
            'field' => 'college_code',
            'label' => 'College Code',
            'rules' => 'trim|required|is_unique[colleges.college_code]'

        ),
		  array(
            'field' => 'priniciple_name',
            'label' => 'Principle Name',
            'rules' => 'trim|required'

        ),
		  array(
            'field' => 'address',
            'label' => 'Address',
            'rules' => 'trim|required'

        ),
          array(
            'field' => 'college_email',
            'label' => 'Email',
            'rules' => 'trim|required|valid_email|is_unique[colleges.college_email]'
        )
       
    ),
  
   'addStaff' => array(
        array(
            'field' => 'employee_type',
            'label' => 'Staff Type',
            'rules' => 'trim|required'

        ),
         array(
            'field' => 'employee_name',
            'label' => 'Staff  Name',
            'rules' => 'trim|required'

        ),
          array(
            'field' => 'employee_code',
            'label' => 'Employee Code',
            'rules' => 'trim|required|is_unique[emp_info.emp_unique_id]',

        ),
          array(
            'field' => 'mobile',
            'label' => 'Mobile Number',
            'rules' => 'trim|required|is_unique[members.mobile]',

        ),
            array(
            'field' => 'gender',
            'label' => 'Gender',
            'rules' => 'trim|required'

        ),
               array(
            'field' => 'department',
            'label' => 'Department',
            'rules' => 'trim|required'

        ),
                  array(
            'field' => 'designation',
            'label' => 'Dsignation',
            'rules' => 'trim|required'

        ),
          array(
            'field' => 'email',
            'label' => 'Email',
            'rules' => 'trim|required|valid_email|is_unique[members.email]'
        )
       
    ),
    
      
      
);
