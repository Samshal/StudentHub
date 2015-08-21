<?php
	if (isset($_COOKIE["USERTYPE"]) && (isset($_COOKIE["USERID"])))
	{
		header("Location: ../../index.php");
	}
	require_once("../Shared/index.php");
	require_once("page-parts.php");
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Welcome To <?php echo _APPNAME_; ?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel = "stylesheet" href="<?php echo $_BOOTSTRAPCSS; ?>">
		<link rel = "stylesheet" href="css/style.css">
		<link rel = "stylesheet" href="<?php echo $_FA; ?>">
		<script src = "<?php echo $_JQUERY; ?>"></script>
		<script>
			$(".container").hide();
			$(window).load(function() {
				// Animate loader off screen
				$(".se-pre-con").fadeOut(2000);
				setTimeout(function(){
					$(".container").show().fadeIn("slow");
				}, 4000);
			});
		</script>
	</head>
	<body>
		<div class="se-pre-con"><h1 class='text-center'>Just A Moment! <br/><br/><br/><br/><small>We're trying to make sure everything is perfect</small></h1></div>
		<div class="container">
			<?php display("navbar"); ?>
			<div><hr class="col-md-12"/></div>
			<div class="jumbotron col-md-12" id="jumbo-view">
				<div class="col-md-12" id = "slider">
					<img class="responsive" src = "css/images/bg/20.jpg" />
				</div>
				<?php display("jumbotron"); ?>
			</div>
			<div class="row col-md-12" id="tips">
				<?php display("tips"); ?>
			</div>
			<div class="row col-md-12" id="foot">
				<?php display("foot"); ?>
			</div>
		</div>
	</body>
	<script src = "<?php echo $_BOOTSTRAPJS; ?>"></script>
	<script src = "Server/server.js"></script>
	<script src = "Server/view.js"></script>
	<script src = "Server/registration.js"></script>
</html>