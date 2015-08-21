<?php 
    require_once("_headers/__authenticate.php");
    require_once("_headers/page-part.php"); 
?>

<body class="skin-blue">
	 <header class="header">
            <a href="index.php" class="logo">
                <!-- Add the class icon to the logo image or logo icon to add the margining (after designing it of course)-->
                <?php echo _APPNAME_; ?>
            </a>
            <!-- Header Navbar: style is in the header.less available in the less folder -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="navbar-right">
                    <ul class="nav navbar-nav">
                        <!-- Messages: style can be found in dropdown.less-->
                       	<?php display("message-menu"); ?>
                        <!-- Notifications: style can be found in dropdown.less -->
                        <?php display("notifications-menu"); ?>
                      	<!-- Tasks: style can be found in dropdown.less -->
                      	<?php display("tasks-menu"); ?>
                      	<!-- User Account: style can be found in dropdown.less -->
                      	<?php display("profile-menu"); ?>
                    </ul>
                </div>
            </nav>
        </header>