<div class="col-md-12" id="information">
</div>
<a href="#tips"><img src="css/images/362.GIF" id="down" /><p id="go-down"><i class="fa fa-angle-down"></i></p></a>
<div class="col-md-6" id="introduction">
	<br/><br/><!--<h1>Make your academic life easier &amp; stay connected!</h1>-->
	<p>
		Keep track of your current academic progress, have access to an e-library with materials in different formats such as slides, pdfs, videos, lecture notes and so on, work on a project virtually, ask questions and answer the ones you can.
		<span class="text-default"> Need More Information?</span> <br/>	
	</p>
	<span class="btn btn-primary"><a href = "#">Follow This Link To Learn More</a></span>
</div>
<br/><br/>
<div class="col-md-4 col-md-offset-2">
	<form role = "form" id="loginform">
		<div class="row">
			<div class="input-group">
				<span class="input-group-btn">
					<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
						User Type
						<span class="caret"></span>
					</button>
					<ul class="dropdown-menu">
						<li class="LOGINFORM-DROPDOWN-USERTYPE"><a href="#">Student</a></li>
						<li class="LOGINFORM-DROPDOWN-USERTYPE"><a href="#">Faculty</a></li>
						<li class="LOGINFORM-DROPDOWN-USERTYPE"><a href="#">Administrator</a></li>
					</ul>
				</span>
				<input type="text" id="USERTYPE" name="USERTYPE" class="form-control login-text-input" placeholder="select user type from the dropdown"/>
			</div>
			<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i> Username</span>
				<input type="text" id="USERNAME" name="USERNAME" class="form-control login-text-input" placeholder="enter your username" />
			</div>
			<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-briefcase"></i> Password</span>
				<input type="text" id="PASSWORD" name="PASSWORD" class="form-control login-text-input" placeholder="enter your password" />
			</div>
			<div class="checkbox">
				<label>
					<input type="checkbox" name="REMEMBER" value="1"/> Remember Me From This Computer
				</label>
			</div><br/>
			<button role="submit" class="col-md-12 btn btn-success login-button-input"> <i class="fa fa-sign-in"></i> Log Into <?php echo _APPNAME_; ?></button>
		</div>
	<!-- 	<span class="help-block">Select Student, Administrator or Faculty From the <i class="text-primary">User Type</i> Dropdown Button Above If You Are A Student, An Administrator Or A Faculty, Respectively</span>
	 --></form>
	</div>
