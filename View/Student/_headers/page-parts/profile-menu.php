<li class="dropdown user user-menu">
<a href="#" class="dropdown-toggle" data-toggle="dropdown">
    <i class="glyphicon glyphicon-user"></i>
    <span><?php echo FULLNAME; ?> <i class="caret"></i></span>
</a>
<ul class="dropdown-menu">
    <!-- User image -->
    <li class="user-header bg-light-blue">
        <img src="img/avatar3.png" class="img-circle" alt="User Image" />
        <p>
            <?php echo FULLNAME; ?> <br/> Web Developer
            <small>Member since Nov. 2012</small>
        </p>
    </li>
    <!-- Menu Body -->
    <li class="user-body">
        <div class="col-xs-4 text-center">
            <a href="#">Followers</a>
        </div>
        <div class="col-xs-4 text-center">
            <a href="#">Sales</a>
        </div>
        <div class="col-xs-4 text-center">
            <a href="#">Friends</a>
        </div>
    </li>
    <!-- Menu Footer-->
    <li class="user-footer">
        <div class="pull-left">
            <a href="#" class="btn btn-default btn-flat">Profile</a>
        </div>
        <div class="pull-right">
            <a href="<?php echo '../'.__CONTROLLER_FOLDER.'\Login\logout.php?LOGOUTREASON=END OF SESSION&USERTYPE=Student'; ?>" class="btn btn-default btn-flat">Sign out</a>
        </div>
    </li>
</ul>
</li>