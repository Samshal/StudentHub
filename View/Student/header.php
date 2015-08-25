<?php SESSION_START(); require_once("../../Controller/Student/session.php"); ?>
<!DOCTYPE html>
<html class="lockscreen">
<head>
    <meta charset="UTF-8">
    <title></title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- bootstrap 3.0.2 -->
    <link href="../../__External/Bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- font Awesome -->
    <link href="../../__External/font-awesome/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="style.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>
<body class="skin-blue">
     <header class="header">
            <!-- Header Navbar: style is in the header.less available in the less folder -->
            <nav class="navbar navbar-static-top navbar-inverse" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <h3 class="navbar-text" style="color: #fff;"><i class="fa fa-user"></i> <?php echo FULLNAME; ?>
                    <small><span style="padding-left: 40px"><i class="fa fa-info-circle text-danger"></i> Fill in the form below with valid data. Make sure your uploaded image looks professional and it shows your face</span></small>
                </h3>
                <div class="pull-right">
                    <a href="<?php echo '../'.__CONTROLLER_FOLDER.'\Login\logout.php?LOGOUTREASON=END OF SESSION&USERTYPE=Student'; ?>" class="btn btn-danger navbar-btn">Sign Out</a>
                </div>
            </nav>
        </header>
