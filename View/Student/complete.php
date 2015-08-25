<?php
    require_once("header.php");
?>
<script src="../../__External/jQuery/jQuery.min.js"></script>
<body>
        <!-- Automatic element centering using js -->
        <div class="center">  
            <br/>
            <div class="" style="position: absolute; left: 46%; top: 13%;">
                <p class="text-center text-danger" id="image-info"><i class="fa fa-cloud-upload"></i> Upload A Profile Picture.</p><br/>
            </div>            
            
            <!-- START LOCK SCREEN ITEM -->
            <div class="lockscreen-item">
                <!-- lockscreen image -->
                <div class="lockscreen-image">
                    <img src="img/user-bw.png" alt="<?php echo FIRSTNAME; ?>'s image"/>
                </div>
                <!-- /.lockscreen-image -->

                <!-- lockscreen credentials (contains the form) -->
                <div class="lockscreen-credentials"> 
                    <form id="image-form" role="form">
                    <div class="input-group">
                        <input type="file" class="form-control" id="image" name="image"/>
                        <div class="input-group-btn" id="input-group">
                            <button class="btn btn-flat" id="refresh"><i class="fa fa-refresh text-muted"></i></button>
                            <input type="submit" id="submit" class="btn btn-flat text-success" style="border: 1px solid green !important" value="Submit"/>
                        </div>
                    </div>
                    </form>
                </div><!-- /.lockscreen credentials -->

            </div><!-- /.lockscreen-item -->
            <div class="clear"><br/><br/></div>
            <div class="se-pre-con"><h1 class='text-center'>Just A Moment! <br/><br/><img src="../login/css/images/Preloader_3.gif" /><br/><br/><small>We're trying to make sure everything is perfect</small></h1></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-offset-2 col-md-12" id="course">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label class="text-danger"><i class="fa fa-book"></i> What Course Are You Studying?</label>
                                <div class="input-group input-group-lg">
                                    <div class="input-group-btn">
                                        <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown">Select <span class="fa fa-caret-down"></span></button>
                                        <script>
                                            $(document).ready(function(){
                                                $.getJSON("../../Controller/Student/courses.php", function(data){
                                                    for (i=0; i < data.length; i++)
                                                    {
                                                        var name = data[i]["CourseName"];
                                                        var id = data[i]["CourseID"];
                                                        $("#course-dropdown").append("<li><a class='course' href='#' id='"+id+"' name='"+name+"'>"+name+"</a></li>");
                                                    }
                                                });
                                            })
                                        </script>
                                        <ul class="dropdown-menu" id="course-dropdown">
                                        </ul>
                                    </div><!-- /btn-group -->
                                    <input class="form-control input-lg" type="text" id = "course-text" placeholder="Select a course from the orange dropdown button" val="">
                                </div><!-- /input-group -->
                            </div>
                        </div>                        
                        <div class="col-md-2">
                            <br/><button type="button" id="save-course" class="form-control input-lg btn btn-success col-md-12" style="width: 100% !important"> <i class="fa fa-save"></i>&nbsp; Save Course</button>
                         </div>
                    </div>
                    <div class="col-md-offset-2 col-md-12" id="semester">
                    <div><br/><br/></div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <label class="text-danger"><i class="fa fa-calendar"></i>  What semester are you in presently?</label>
                                <div class="input-group input-group-lg">
                                    <div class="input-group-btn">
                                        <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown">Select <span class="fa fa-caret-down"></span></button>
                                         <script>
                                            $(document).ready(function(){
                                                $.getJSON("../../Controller/Student/semesters.php", function(data){
                                                    for (i=0; i < data.length; i++)
                                                    {
                                                        var name = data[i]["SemesterName"];
                                                        var id = data[i]["SemesterID"];
                                                        $("#semester-dropdown").prepend("<li><a class='semester' href='#' id='"+id+"' name='"+name+"'>"+name+"</a></li>");
                                                    }
                                                });
                                                $("#semester-dropdown").append('<li><a href="#">My course is not based on Semesters</a></li>');
                                            })
                                        </script>
                                        <ul class="dropdown-menu" id="semester-dropdown">
                                        </ul>
                                    </div><!-- /btn-group -->
                                <input id="semester-text" val="" class="form-control input-lg" type="text" placeholder="Select a course from the orange dropdown button">
                                </div><!-- /input-group -->
                            </div>
                        </div>                        
                        <div class="col-md-2">
                            <br/><button type="button" id="save-semester" class="form-control input-lg btn btn-success col-md-12" style="width: 100% !important"> <i class="fa fa-save"></i>&nbsp; Save Semester</button>
                        </div>
                    </div>
                    <div class="col-md-offset-2 col-md-12" id="tagline">
                    <div><br/><br/></div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <label class="text-danger"><i class="fa fa-comment"></i> Set a Tagline</label> <span class="text-info" style="padding-left: 10%"><small> <i class="fa fa-info-circle"></i> This is what everybody sees when they view your profile</small></span>
                                    <input id="tagline-text" class="form-control input-lg" type="text" placeholder="Enter your favorite tagline here">
                            </div>
                        </div>                        
                        <div class="col-md-2">
                            <br/><button type="button" id="save-tagline" class="form-control input-lg btn btn-success col-md-12" style="width: 100% !important"> <i class="fa fa-save"></i>&nbsp; Save Tagline</button>
                        </div>
                    </div>
                </div>
            </div>
        <!-- page script -->
        <script src="../../__External/Bootstrap/js/bootstrap.min.js"></script>
        <script src="_required/completed.js"></script>
        <script type="text/javascript">
            /* CENTER ELEMENTS IN THE SCREEN */
            jQuery.fn.center = function() {
                this.css("position", "absolute");
                this.css("top", Math.max(0, (($(window).height() - $(this).outerHeight()) / 2) +
                        $(window).scrollTop()) - 30 + "px");
                this.css("left", Math.max(0, (($(window).width() - $(this).outerWidth()) / 2) +
                        $(window).scrollLeft()) + "px");
                return this;
            }
        </script>
    </body>
</html>