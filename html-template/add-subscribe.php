<!DOCTYPE html>
<html lang="en">
<?php
   require "config.php";
   $user = $_SESSION['user'];
   $cart = "select course_id from student_course where user_id = ".$user['id'];
   $result = mysqli_query($conn, $cart);

   if ($product = mysqli_fetch_assoc($result)) {

    $course_array = "select name from course where id = '".$product."'";
    $c_a = mysqli_query($conn, $course_array);
    $pro = mysqli_fetch_assoc($c_a);

      $cartProductNumber = sizeof($product);
   } else {
      $cartProductNumber = 0;
   }
   ?>

<!-- Mirrored from preschool.dreamguystech.com/php-template/add-subject.php by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 28 Oct 2021 11:11:50 GMT -->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Preskool - Subject</title>

    <link rel="shortcut icon" href="assets/img/favicon.png">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,500;0,600;0,700;1,400&amp;display=swap">

    <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">

    <link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">

    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>

    <div class="main-wrapper">

        <div class="header">

            <div class="header-left">
                <a href="index.php" class="logo">
                    <img src="assets/img/logo.png" alt="Logo">
                </a>
                <a href="index.php" class="logo logo-small">
                    <img src="assets/img/logo-small.png" alt="Logo" width="30" height="30">
                </a>
            </div>

            <a href="javascript:void(0);" id="toggle_btn">
                <i class="fas fa-align-left"></i>
            </a>

            <div class="top-nav-search">
                <form>
                    <input type="text" class="form-control" placeholder="Search here">
                    <button class="btn" type="submit"><i class="fas fa-search"></i></button>
                </form>
            </div>


            <a class="mobile_btn" id="mobile_btn">
                <i class="fas fa-bars"></i>
            </a>


            <ul class="nav user-menu">

            <li class="nav-item dropdown noti-dropdown">
                    <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                    <i class="bi-cart-fill me-1"></i> Course
                                <span class="badge bg-dark text-white ms-1 rounded-pill"><?php echo $cartProductNumber ?></span>
                    </a>
                    <div class="dropdown-menu notifications">
                        <div class="topnav-dropdown-header">
                            <span class="notification-title">Courses</span>
                            <a href="javascript:void(0)" class="clear-noti"> Clear All </a>
                        </div>
                        <div class="noti-content">
                            <ul class="notification-list">
                                    <?php 
                                    $carta = "select course_id from student_course where user_id = ".$user['id'];
                                    $result = mysqli_query($conn, $carta);
                                    if($prod = mysqli_fetch_assoc($result)){
                                    $sql = "select name from course where id = '".$prod['course_id']."'";
                                            $resultat = mysqli_query($conn, $sql);
                                            if($produkt = mysqli_fetch_assoc($resultat)){ ?>
                                    <li class="notification-message">
                                        <a href="#">
                                            <div class="media">
                                                
                                                <div class="media-body">
                                                    <p class="noti-details"><span class="noti-title"><?php echo $produkt['name'] ?></span>
                                                    </p>
                                                </div>
                                            </div>
                                        </a>      
                                    </li>
                                <?php }} ?>
                            </ul>
                        </div>
                        <div class="topnav-dropdown-footer">
                            <a href="#">View all Notifications</a>
                        </div>
                    </div>
                </li>


                <li class="nav-item dropdown has-arrow">
                    <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                        <span class="user-img"><img class="rounded-circle" src="assets/img/profiles/avatar-01.jpg" width="31" alt="Ryan Taylor"></span>
                    </a>
                    <div class="dropdown-menu">
                        <div class="user-header">
                            <div class="avatar avatar-sm">
                                <img src="assets/img/profiles/avatar-01.jpg" alt="User Image" class="avatar-img rounded-circle">
                            </div>
                            <div class="user-text">
                                <h6>Ryan Taylor</h6>
                                <p class="text-muted mb-0">Administrator</p>
                            </div>
                        </div>
                        <a class="dropdown-item" href="profile.php">My Profile</a>
                        <a class="dropdown-item" href="inbox.php">Inbox</a>
                        <a class="dropdown-item" href="logout.php">Logout</a>
                    </div>
                </li>

            </ul>

        </div>


        <div class="sidebar" id="sidebar">
            <div class="sidebar-inner slimscroll">
                <div id="sidebar-menu" class="sidebar-menu">
                    <ul>
                    <li class="menu-title">
                            <span><?php if($user['role'] == 'Admin'){?> Admin Dashboard<?php }elseif($user['role'] == 'Student'){?>Student Dashboard<?php } ?>
                            </span>
                        </li>
                            <?php if($user['role'] == 'Student' || $user['role'] == 'Admin') {?>

                        <li class="submenu ">
                        <a href="#"><i class="fas fa-user-graduate"></i> <span> Students</span> <span class="menu-arrow"></span></a>
                        <ul>
                           <li><a href="students.php">Student List</a></li>
                           <li><a href="add-student.php" >Student Add</a></li>
                        </ul>
                     </li>
                     <li class="submenu active">
                        <a href="#"><i class="fas fa-book-reader"></i> <span> Subscribe</span> <span class="menu-arrow"></span></a>
                        <ul>
                           <li><a href="subscribes.php" >Subscribe List</a></li>
                           <li><a href="add-subscribe.php" class="active">Subscribe Add</a></li>
                        </ul>
                     </li>
                     <?php }if($user['role'] == 'Admin'){?>

                     <li class="submenu">
                        <a href="#"><i class="fas fa-chalkboard-teacher"></i> <span> Teachers</span> <span class="menu-arrow"></span></a>
                        <ul>
                           <li><a href="teachers.php">Teacher List</a></li>
                           <li><a href="add-teacher.php">Teacher Add</a></li>
                        </ul>
                     </li>
                     <li class="submenu ">
                        <a href="#"><i class="fas fa-book-reader"></i> <span> Subjects</span> <span class="menu-arrow"></span></a>
                        <ul>
                           <li><a href="subjects.php">Subject List</a></li>
                           <li><a href="add-subject.php">Subject Add</a></li>
                        </ul>
                     </li>
                     <li class="submenu ">
                                <a href="#"><i class="fas fa-book-reader"></i> <span> Subscribe Grade</span> <span class="menu-arrow"></span></a>
                                <ul>
                                    <li><a href="subscribes-grade.php">Subscribe List</a></li>
                                </ul>
                            </li>
                     <?php } ?>
                        
                    </ul>
                </div>
            </div>
        </div>


        <div class="page-wrapper">
            <div class="content container-fluid">

                <div class="page-header">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="page-title">Add Subscribe</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="subjects.php">Subscribe</a></li>
                                <li class="breadcrumb-item active">Add Subscribe</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <?php
        if (isset($_POST['subscribe_add'])) {
            $isAccountInDB = "select * from student_course 
                where course_id = '" . $_POST['course'] . "'  && user_id = '" . $_POST['student'] . "'";
            $isAccountQuery = mysqli_query($conn, $isAccountInDB);

            $sql = "select * from course where name = '".$_POST['course']."'";
            $resultat = mysqli_query($conn, $sql);
            $producti = mysqli_fetch_assoc($resultat);
            $cours_id = $producti['id'];

            if (!($product = mysqli_fetch_assoc($isAccountQuery))) {
                $sql = "INSERT into student_course 
                (course_id , user_id, selected_at)
                VALUES ('" . $cours_id . "', '" . $_POST['user_id'] . "', '" . $_POST['date'] . "')";

                $result = mysqli_query($conn, $sql);
                if (!$result) {
                    echo "An error occurred: " . mysqli_error();
                } else {
        ?>
                    <div class="alert alert-success" role="alert">
                        <i class="bi bi-check2-all"></i> Subscribe added successfully!
                    </div>
                <?php
                    // header("Location: add-subscribe.php");
                }
            } else {
                ?>
                <div class="alert alert-danger" role="alert">
                    <i class="bi bi-exclamation-triangle-fill"></i> <?php echo $_POST['name'] ?> already exist!
                </div>
        <?php
            }
        }
        ?>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                            <form method="POST">
                                
                                    <div class="row">
                                        <div class="col-12">
                                            <h5 class="form-title"><span>Subscribe Information</span></h5>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <label>Course</label>
                                                <select class="form-control"  name="course" >
                                                    <?php 
                                                    $courses = "select * from course";
                                                    $result = mysqli_query($conn, $courses);
                                                    if($result -> num_rows > 0){
                                                        while($course = $result -> fetch_assoc()){
                                                    ?>
                                                    <option><?php echo $course['name']; ?></option>
                                                    <?php }} ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <label>Student</label>
                                                <input type="text" name="student" class="form-control" value="<?php echo $user['name']; ?>">
                                                <input type="hidden" name="user_id" value="<?php echo $user['id']; ?>">
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                            <label>Date</label>
                                            <input type="datetime-local" name="date">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <button type="submit" name="subscribe_add" class="btn btn-primary">Add Subscribe</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


    <script src="assets/js/jquery-3.6.0.min.js"></script>

    <script src="assets/js/popper.min.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>

    <script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <script src="assets/js/script.js"></script>
</body>

<!-- Mirrored from preschool.dreamguystech.com/php-template/add-subject.php by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 28 Oct 2021 11:11:50 GMT -->

</html>