<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
	<div class="col-md-11 col-xs-11 col-md-offset-1">
		<div class="navbar-header">
			<a class="navbar-brand" href="#"><?php echo _APPNAME_;?></a>
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#nav-collapse-target">
				<span class="sr-only">Toggle Navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
		</div>
		<div>
			<div class="collapse navbar-collapse" id="nav-collapse-target">
			<form class="navbar-form navbar-left" role="search">
				<div class="form-group">
					<input type="text" class="form-control" placeholder="Search <?php echo _APPNAME_; ?>" />
				</div>
			</form>
				<ul class = "nav navbar-nav">
					<li><a href="#"><i class='fa fa-home'></i> Home</a></li>
					<li><a href="#"><i class='fa fa-info'></i> About</a></li>
					<li><a href="#"><i class='fa fa-user-md'></i> How To</a></li>
					<li><a href="#"><i class='fa fa-question'></i> FAQs</a></li>
				</ul>
				<div class="pull-right">
					<button class="btn btn-success navbar-btn" id="up"><i class='fa fa-users'></i> Sign Up</button>
					<button class="btn btn-default navbar-btn" id="in"><i class='fa fa-sign-in'></i> Sign In</button>
				</div>							
			</div>
		</div>
	</div>
</nav>