<?php 
   require_once("_req.php");
?>
<!DOCTYPE html>
<html class="bg-black">
    <head>
        <meta charset="UTF-8">
        <title>AdminLTE | Log in</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
        <link href="<?php echo $_BOOTSTRAPCSS; ?>" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="<?php echo $_FONTAWESOMECSS; ?>" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="../_required/css/style.css" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="bg-black">
        <div class="form-box" id="login-box">
            <div id="information"></div>
            <div class="header">Sign In</div>
            <form role="form" method="post" id="loginform">
                <div class="body bg-gray">
                    <div class="form-group">
                        <input type="text" name="USERTYPE" id="USERTYPE" class="form-control" placeholder="User Type" value="Student"/>
                    </div>
                    <div class="form-group">
                        <input type="text" name="USERNAME" id="USERNAME" class="form-control" placeholder="User Name"/>
                    </div>
                    <div class="form-group">
                        <input type="password" name="PASSWORD" id="PASSWORD" class="form-control" placeholder="Password"/>
                    </div>          
                    <div class="form-group">
                        <input type="checkbox" name="REMEMBER" val="1"/> Remember me
                    </div>
                </div>
                <div class="footer">                                                               
                    <button type="submit" id="login-button-input" class="btn bg-olive btn-block">Sign me in</button>  
                    
                    <p><a href="#">I forgot my password</a></p>
                    
                    <a href="register.html" class="text-center">I dont have an account</a>
                </div>
            </form>
        </div>


        <!-- jQuery 2.0.2 -->
        <script src="<?php echo $_JQUERY; ?>"></script>
        <!-- Bootstrap -->
        <script src="<?php echo $_BOOTSTRAPJS; ?>" type="text/javascript"></script>   

        <script type="text/javascript" src="login.js"></script>     

    </body>
</html>