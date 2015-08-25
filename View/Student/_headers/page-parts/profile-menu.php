<li class="dropdown user user-menu">
<a href="#" class="dropdown-toggle" data-toggle="dropdown">
    <i class="glyphicon glyphicon-user"></i>
    <span><?php echo FULLNAME; ?> <i class="caret"></i></span>
</a>
<ul class="dropdown-menu">
    <!-- User image -->
    <li class="user-header bg-light-blue">
        <img src="<?php echo "../../__TempFiles/__Uploads/Students/".IMAGESRC;?>" class="img-circle" alt="User Image" />
        <p>
            <?php echo FULLNAME; ?> <br/> <?php echo COURSENAME; ?>
            <small><?php echo SEMESTERNAME; ?></small>
        </p>
    </li>
    <!-- Menu Body -->
    <li class="user-body">
         <div class="col-xs-12 text-center">
            <span class="text-info"><?php echo TAGLINE; ?></span>
        </div>
    </li>
    <!-- Menu Footer-->
    <li class="user-footer">
        <div class="pull-left">
            <a href="#" class="btn btn-default btn-flat btn-info"><i class="fa fa-edit"></i> Edit Your Profile</a>
        </div>
        <div class="pull-right">
            <a href="<?php echo '../'.__CONTROLLER_FOLDER.'\Login\logout.php?LOGOUTREASON=END OF SESSION&USERTYPE=Student'; ?>" class="btn btn-default btn-flat btn-danger"><i class="fa fa-sign-out"></i> Sign out</a>
        </div>
    </li>
</ul>
</li>