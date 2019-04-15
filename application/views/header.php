<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Meta -->
        <meta name="description" content="Premium Quality and Responsive UI for Dashboard.">
        <meta name="author" content="ThemePixels">

        <title>Web Mobilez</title>

        <!-- vendor css -->
        <link href="<?php echo base_url() ?>assets/lib/font-awesome/css/font-awesome.css" rel="stylesheet">
        <link href="<?php echo base_url() ?>assets/lib/Ionicons/css/ionicons.css" rel="stylesheet">
        <link href="<?php echo base_url() ?>assets/lib/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet">
        <link href="<?php echo base_url() ?>assets/lib/jquery-switchbutton/jquery.switchButton.css" rel="stylesheet">
        <link href="<?php echo base_url() ?>assets/lib/rickshaw/rickshaw.min.css" rel="stylesheet">
        <link href="<?php echo base_url() ?>assets/lib/chartist/chartist.css" rel="stylesheet">
        <link href="<?php echo base_url() ?>assets/lib/datatables/jquery.dataTables.css" rel="stylesheet">
        <!-- Bracket CSS -->
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/bracket.css">
    </head>

    <body>
        <!-- ########## START: LEFT PANEL ########## -->
        <div class="br-logo"><a href=""><span>[</span>Web Mobilez<span>]</span></a></div>
        <div class="br-sideleft overflow-y-auto">
            <label class="sidebar-label pd-x-15 mg-t-20">Navigation</label>
            <div class="br-sideleft-menu">
                <a href="<?= site_url('Dashboard'); ?>" class="br-menu-link <?php
                if ($this->uri->segment(2) == "") {
                    echo "active";
                }
                ?>">
                    <div class="br-menu-item">
                        <i class="menu-item-icon icon fa fa-dashboard tx-18-force"></i>
                        <span class="menu-item-label">Dashboard</span>
                    </div><!-- menu-item -->
                </a><!-- br-menu-link -->

                <?php if ($this->session->userdata("role_id") == 1) { ?>

                    <a href="#" class="br-menu-link <?php
                    if (($this->uri->segment(2) == "addNewCollege") || ($this->uri->segment(2) == "collegelist")) {
                        echo "active show-sub";
                    }
                    ?>">
                        <div class="br-menu-item">
                            <i class="menu-item-icon icon ion-ios-gear-outline tx-24"></i>
                            <span class="menu-item-label">Colleges</span>
                            <i class="menu-item-arrow fa fa-angle-down"></i>
                        </div><!-- menu-item -->
                    </a><!-- br-menu-link -->
                    <ul class="br-menu-sub nav flex-column">
                        <li class="nav-item">
                            <a href="<?= site_url('Colleges/addNewCollege'); ?>" class="nav-link <?php
                            if ($this->uri->segment(2) == "addNewCollege") {
                                echo "active";
                            }
                            ?>"> Add College
                            </a><!-- br-menu-link -->
                        </li>
                        <li  class="nav-item">
                            <a href="<?= site_url('Colleges/collegelist'); ?>" class="nav-link <?php
                            if ($this->uri->segment(2) == "collegelist") {
                                echo "active";
                            }
                            ?>">College List              
                            </a><!-- br-menu-link -->
                        </li>
                    </ul>

                <?php } ?>

                <?php if ($this->session->userdata("role_id") == 2) { ?>


                    <a href="#" class="br-menu-link <?php
                    if (($this->uri->segment(2) == "addCourse") || ($this->uri->segment(2) == "listCourses")) {
                        echo "active show-sub";
                    }
                    ?>">
                        <div class="br-menu-item">
                            <i class="menu-item-icon ion-ios-redo-outline tx-24"></i>
                            <span class="menu-item-label">Courses</span>
                            <i class="menu-item-arrow fa fa-angle-down"></i>
                        </div><!-- menu-item -->
                    </a><!-- br-menu-link -->
                    <ul class="br-menu-sub nav flex-column">
                        <li class="nav-item">
                            <a href="<?= site_url('Student/addCourse'); ?>" class="nav-link <?php
                            if ($this->uri->segment(2) == "addCourse") {
                                echo "active";
                            }
                            ?>"> Add Course
                            </a><!-- br-menu-link -->
                        </li>
                        <li  class="nav-item">
                            <a href="<?= site_url('Student/listCourses'); ?>" class="nav-link <?php
                            if ($this->uri->segment(2) == "listCourses") {
                                echo "active";
                            }
                            ?>">Courses List              
                            </a><!-- br-menu-link -->
                        </li>
                    </ul>
                    <a href="#" class="br-menu-link <?php
                    if (($this->uri->segment(2) == "addBatch") || ($this->uri->segment(2) == "listBatches")) {
                        echo "active show-sub";
                    }
                    ?>">
                        <div class="br-menu-item">
                            <i class="menu-item-icon icon ion-ios-gear-outline tx-24"></i>
                            <span class="menu-item-label">Class</span>
                            <i class="menu-item-arrow fa fa-angle-down"></i>
                        </div><!-- menu-item -->
                    </a><!-- br-menu-link -->
                    <ul class="br-menu-sub nav flex-column">
                        <li class="nav-item">
                            <a href="<?= site_url('Student/addBatch'); ?>" class="nav-link <?php
                            if ($this->uri->segment(2) == "addBatch") {
                                echo "active";
                            }
                            ?>"> Add Class
                            </a><!-- br-menu-link -->
                        </li>
                        <li  class="nav-item">
                            <a href="<?= site_url('Student/listBatches'); ?>" class="nav-link <?php
                            if ($this->uri->segment(2) == "listBatches") {
                                echo "active";
                            }
                            ?>">Class List              
                            </a><!-- br-menu-link -->
                        </li>
                    </ul>

                    <a href="#" class="br-menu-link <?php
                    if (($this->uri->segment(2) == "addSubject") || ($this->uri->segment(2) == "listSubjects")) {
                        echo "active show-sub";
                    }
                    ?>">
                        <div class="br-menu-item">
                            <i class="menu-item-icon icon ion-ios-briefcase-outline tx-22"></i>
                            <span class="menu-item-label">Subjects</span>
                            <i class="menu-item-arrow fa fa-angle-down"></i>
                        </div><!-- menu-item -->
                    </a><!-- br-menu-link -->
                    <ul class="br-menu-sub nav flex-column">
                        <li class="nav-item">
                            <a href="<?= site_url('Student/addSubject'); ?>" class="nav-link <?php
                            if ($this->uri->segment(2) == "addSubject") {
                                echo "active";
                            }
                            ?>"> Add Subject
                            </a><!-- br-menu-link -->
                        </li>
                        <li  class="nav-item">
                            <a href="<?= site_url('Student/listSubjects'); ?>" class="nav-link <?php
                            if ($this->uri->segment(2) == "listSubjects") {
                                echo "active";
                            }
                            ?>">Subjects List              
                            </a><!-- br-menu-link -->
                        </li>
                    </ul>
                    <a href="#" class="br-menu-link <?php
                    if (($this->uri->segment(2) == "addTeacher") || ($this->uri->segment(2) == "TeachersList")) {
                        echo "active show-sub";
                    }
                    ?>">
                        <div class="br-menu-item">
                            <i class="menu-item-icon icon ion-ios-email-outline tx-24"></i>
                            <span class="menu-item-label">Faculty</span>
                            <i class="menu-item-arrow fa fa-angle-down"></i>
                        </div><!-- menu-item -->
                    </a><!-- br-menu-link -->
                    <ul class="br-menu-sub nav flex-column">
                        <li class="nav-item">
                            <a href="<?= site_url('Teacher/addTeacher'); ?>" class="nav-link <?php
                            if ($this->uri->segment(2) == "addTeacher") {
                                echo "active";
                            }
                            ?>"> Add Faculty
                            </a><!-- br-menu-link -->
                        </li>
                        <li  class="nav-item">
                            <a href="<?= site_url('Teacher/TeachersList'); ?>" class="nav-link <?php
                            if ($this->uri->segment(2) == "TeachersList") {
                                echo "active";
                            }
                            ?>">Faculty List              
                            </a><!-- br-menu-link -->
                        </li>
                    </ul>

                    <a href="#" class="br-menu-link <?php
                    if (($this->uri->segment(2) == "addStudent") || ($this->uri->segment(2) == "studentList")) {
                        echo "active show-sub";
                    }
                    ?>">
                        <div class="br-menu-item">
                            <i class="menu-item-icon icon ion-ios-filing-outline tx-24"></i>
                            <span class="menu-item-label">Students</span>
                            <i class="menu-item-arrow fa fa-angle-down"></i>
                        </div><!-- menu-item -->
                    </a><!-- br-menu-link -->
                    <ul class="br-menu-sub nav flex-column">
                        <li class="nav-item">
                            <a href="<?= site_url('Student/addStudent'); ?>" class="nav-link <?php
                            if ($this->uri->segment(2) == "addStudent") {
                                echo "active";
                            }
                            ?>"> Add Student
                            </a><!-- br-menu-link -->
                        </li>
                        <li  class="nav-item">
                            <a href="<?= site_url('Student/studentList'); ?>" class="nav-link <?php
                            if ($this->uri->segment(2) == "studentList") {
                                echo "active";
                            }
                            ?>">Students List              
                            </a><!-- br-menu-link -->
                        </li>
                        <li  class="nav-item">
                            <a href="<?= site_url('Import/index'); ?>" class="nav-link <?php
                            if ($this->uri->segment(2) == "index") {
                                echo "active";
                            }
                            ?>">Import Students              
                            </a><!-- br-menu-link -->
                        </li>
                    </ul>
                  <!--  <?= site_url('Attendance'); ?> -->
                    <a href="#" class="br-menu-link <?php
                    if (($this->uri->segment(2) == "attendance") || ($this->uri->segment(2) == "att")) {
                        echo "active show-sub";
                    }
                    ?>">
                        <div class="br-menu-item">
                            <i class="menu-item-icon icon ion-ios-filing-outline tx-24"></i>
                            <span class="menu-item-label">Attendance</span>
                            <i class="menu-item-arrow fa fa-angle-down"></i>
                        </div><!-- menu-item -->
                    </a><!-- br-menu-link -->


                <?php } ?>

            </div><!-- br-sideleft-menu -->



            <br>
        </div><!-- br-sideleft -->
        <!-- ########## END: LEFT PANEL ########## -->

        <!-- ########## START: HEAD PANEL ########## -->
        <div class="br-header">
            <div class="br-header-left">
                <div class="navicon-left hidden-md-down"><a id="btnLeftMenu" href=""><i class="icon ion-navicon-round"></i></a></div>
                <div class="navicon-left hidden-lg-up"><a id="btnLeftMenuMobile" href=""><i class="icon ion-navicon-round"></i></a></div>

            </div><!-- br-header-left -->
            <div class="br-header-right">
                <nav class="nav">
                    <div class="dropdown">
                        <a href="" class="nav-link pd-x-7 pos-relative" data-toggle="dropdown">
                            <i class="icon ion-ios-email-outline tx-24"></i>
                            <!-- start: if statement -->
                            <span class="square-8 bg-danger pos-absolute t-15 r-0 rounded-circle"></span>
                            <!-- end: if statement -->
                        </a>
                        <div class="dropdown-menu dropdown-menu-header wd-300 pd-0-force">
                            <div class="d-flex align-items-center justify-content-between pd-y-10 pd-x-20 bd-b bd-gray-200">
                                <label class="tx-12 tx-info tx-uppercase tx-semibold tx-spacing-2 mg-b-0">Messages</label>
                                <a href="" class="tx-11">+ Add New Message</a>
                            </div><!-- d-flex -->

                            <div class="media-list">
                                <!-- loop starts here -->
                                <a href="" class="media-list-link">
                                    <div class="media pd-x-20 pd-y-15">
                                        <img src="http://via.placeholder.com/280x280" class="wd-40 rounded-circle" alt="">
                                        <div class="media-body">
                                            <div class="d-flex align-items-center justify-content-between mg-b-5">
                                                <p class="mg-b-0 tx-medium tx-gray-800 tx-14">Donna Seay</p>
                                                <span class="tx-11 tx-gray-500">2 minutes ago</span>
                                            </div><!-- d-flex -->
                                            <p class="tx-12 mg-b-0">A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring.</p>
                                        </div>
                                    </div><!-- media -->
                                </a>
                                <!-- loop ends here -->
                                <a href="" class="media-list-link read">
                                    <div class="media pd-x-20 pd-y-15">
                                        <img src="http://via.placeholder.com/280x280" class="wd-40 rounded-circle" alt="">
                                        <div class="media-body">
                                            <div class="d-flex align-items-center justify-content-between mg-b-5">
                                                <p class="mg-b-0 tx-medium tx-gray-800 tx-14">Samantha Francis</p>
                                                <span class="tx-11 tx-gray-500">3 hours ago</span>
                                            </div><!-- d-flex -->
                                            <p class="tx-12 mg-b-0">My entire soul, like these sweet mornings of spring.</p>
                                        </div>
                                    </div><!-- media -->
                                </a>
                                <a href="" class="media-list-link read">
                                    <div class="media pd-x-20 pd-y-15">
                                        <img src="http://via.placeholder.com/280x280" class="wd-40 rounded-circle" alt="">
                                        <div class="media-body">
                                            <div class="d-flex align-items-center justify-content-between mg-b-5">
                                                <p class="mg-b-0 tx-medium tx-gray-800 tx-14">Robert Walker</p>
                                                <span class="tx-11 tx-gray-500">5 hours ago</span>
                                            </div><!-- d-flex -->
                                            <p class="tx-12 mg-b-0">I should be incapable of drawing a single stroke at the present moment...</p>
                                        </div>
                                    </div><!-- media -->
                                </a>
                                <a href="" class="media-list-link read">
                                    <div class="media pd-x-20 pd-y-15">
                                        <img src="http://via.placeholder.com/280x280" class="wd-40 rounded-circle" alt="">
                                        <div class="media-body">
                                            <div class="d-flex align-items-center justify-content-between mg-b-5">
                                                <p class="mg-b-0 tx-medium tx-gray-800 tx-14">Larry Smith</p>
                                                <span class="tx-11 tx-gray-500">Yesterday</span>
                                            </div><!-- d-flex -->
                                            <p class="tx-12 mg-b-0">When, while the lovely valley teems with vapour around me, and the meridian sun strikes...</p>
                                        </div>
                                    </div><!-- media -->
                                </a>
                                <div class="pd-y-10 tx-center bd-t">
                                    <a href="" class="tx-12"><i class="fa fa-angle-down mg-r-5"></i> Show All Messages</a>
                                </div>
                            </div><!-- media-list -->
                        </div><!-- dropdown-menu -->
                    </div><!-- dropdown -->
                    <div class="dropdown">
                        <a href="" class="nav-link pd-x-7 pos-relative" data-toggle="dropdown">
                            <i class="icon ion-ios-bell-outline tx-24"></i>
                            <!-- start: if statement -->
                            <span class="square-8 bg-danger pos-absolute t-15 r-5 rounded-circle"></span>
                            <!-- end: if statement -->
                        </a>
                        <div class="dropdown-menu dropdown-menu-header wd-300 pd-0-force">
                            <div class="d-flex align-items-center justify-content-between pd-y-10 pd-x-20 bd-b bd-gray-200">
                                <label class="tx-12 tx-info tx-uppercase tx-semibold tx-spacing-2 mg-b-0">Notifications</label>
                                <a href="" class="tx-11">Mark All as Read</a>
                            </div><!-- d-flex -->

                            <div class="media-list">
                                <!-- loop starts here -->
                                <a href="" class="media-list-link read">
                                    <div class="media pd-x-20 pd-y-15">
                                        <img src="http://via.placeholder.com/280x280" class="wd-40 rounded-circle" alt="">
                                        <div class="media-body">
                                            <p class="tx-13 mg-b-0 tx-gray-700"><strong class="tx-medium tx-gray-800">Suzzeth Bungaos</strong> tagged you and 18 others in a post.</p>
                                            <span class="tx-12">October 03, 2017 8:45am</span>
                                        </div>
                                    </div><!-- media -->
                                </a>
                                <!-- loop ends here -->
                                <a href="" class="media-list-link read">
                                    <div class="media pd-x-20 pd-y-15">
                                        <img src="http://via.placeholder.com/280x280" class="wd-40 rounded-circle" alt="">
                                        <div class="media-body">
                                            <p class="tx-13 mg-b-0 tx-gray-700"><strong class="tx-medium tx-gray-800">Mellisa Brown</strong> appreciated your work <strong class="tx-medium tx-gray-800">The Social Network</strong></p>
                                            <span class="tx-12">October 02, 2017 12:44am</span>
                                        </div>
                                    </div><!-- media -->
                                </a>
                                <a href="" class="media-list-link read">
                                    <div class="media pd-x-20 pd-y-15">
                                        <img src="http://via.placeholder.com/280x280" class="wd-40 rounded-circle" alt="">
                                        <div class="media-body">
                                            <p class="tx-13 mg-b-0 tx-gray-700">20+ new items added are for sale in your <strong class="tx-medium tx-gray-800">Sale Group</strong></p>
                                            <span class="tx-12">October 01, 2017 10:20pm</span>
                                        </div>
                                    </div><!-- media -->
                                </a>
                                <a href="" class="media-list-link read">
                                    <div class="media pd-x-20 pd-y-15">
                                        <img src="http://via.placeholder.com/280x280" class="wd-40 rounded-circle" alt="">
                                        <div class="media-body">
                                            <p class="tx-13 mg-b-0 tx-gray-700"><strong class="tx-medium tx-gray-800">Julius Erving</strong> wants to connect with you on your conversation with <strong class="tx-medium tx-gray-800">Ronnie Mara</strong></p>
                                            <span class="tx-12">October 01, 2017 6:08pm</span>
                                        </div>
                                    </div><!-- media -->
                                </a>
                                <div class="pd-y-10 tx-center bd-t">
                                    <a href="" class="tx-12"><i class="fa fa-angle-down mg-r-5"></i> Show All Notifications</a>
                                </div>
                            </div><!-- media-list -->
                        </div><!-- dropdown-menu -->
                    </div><!-- dropdown -->
                    <div class="dropdown">
                        <a href="" class="nav-link nav-link-profile" data-toggle="dropdown">
                            <span class="logged-name hidden-md-down"><?php echo $this->session->userdata("userid"); ?></span>
                            <img src="http://via.placeholder.com/64x64" class="wd-32 rounded-circle" alt="">
                            <span class="square-10 bg-success"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-header wd-200">
                            <ul class="list-unstyled user-profile-nav">
                                <li><a href=""><i class="icon ion-ios-person"></i> Edit Profile</a></li>
                                <li><a href=""><i class="icon ion-ios-gear"></i> Settings</a></li>
                                <li><a href=""><i class="icon ion-ios-download"></i> Downloads</a></li>
                                <li><a href=""><i class="icon ion-ios-star"></i> Favorites</a></li>
                                <li><a href=""><i class="icon ion-ios-folder"></i> Collections</a></li>
                                <li><a href="<?php echo base_url() ?>dashboard/logout"><i class="icon ion-power"></i> Sign Out</a></li>
                            </ul>
                        </div><!-- dropdown-menu -->
                    </div><!-- dropdown -->
                </nav>

            </div><!-- br-header-right -->
        </div><!-- br-header -->
        <!-- ########## END: HEAD PANEL ########## -->