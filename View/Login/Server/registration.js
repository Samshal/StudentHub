$(document).ready(function(){
	$("#registrationform").on("submit", function(e){
		e.preventDefault();
		if (!$("#CONTINUE").is(":checked"))
		{
			var alert = "<div class=\"alert alert-danger alert-dismissable submit-error\"><button type=\"button\" class=\"close\" formdata-dismiss=\"alert\" aria-hidden=\"true\">"
						+ "&times; </button>Error! You Must Check The <span class='text-primary'>'I Know What I'm Doing Checkbox'</span> In Order To Continue";
			$("#information").fadeIn(1200).html(alert);
			setTimeout(function(){
				$("#information").fadeOut();
			}, 3000);
		}
		else
		{

		$.globalEval("continuesubmit = true");
		var counter = 0;
		var formdata = $(this).serializeArray();
		for (var i = formdata.length - 1; i >= 0; i--) {
			if (formdata[i]["value"] == '')
			{
				//we have an empty field
				if (formdata[i]["name"] == "MIDDLENAME" || formdata[i]["name"] == "COUNTRY" || formdata[i]["name"] == "STATE")
				{
					continue;
				}
				else
				{
					$("#"+formdata[i]["name"]).parent().addClass("has-error");
					continuesubmit = false;
					counter += 1;
				}
			}
		};
		if (counter > 0)
		{
			var alert = "<div class=\"alert alert-danger alert-dismissable submit-error\"><button type=\"button\" class=\"close\" formdata-dismiss=\"alert\" aria-hidden=\"true\">"
						+ "&times; </button>Error! The Fields Marked In Red Are All Important, They Can't Be Left Blank";
			$("#information").fadeIn(1200).html(alert);
		}
		setTimeout(function(){
			for (var i = formdata.length - 1; i >= 0; i--) {
					$("#"+formdata[i]["name"]).parent().removeClass("has-error");
					//$(".submit-error")
					$("#information").fadeOut();
			};		
		}, 3000);
		if (continuesubmit)
		{
			var def = $(".registration-submit").text();
			$(".registration-submit").html("Validating  <img src = '../../__External/AjaxLoaders/ajax-loader.gif' />");
			//console.log(formdata);
			$.post("../../Controller/Registration/Student.php", formdata, function(response){
				console.log(response);
				var alert = '';
				var ve = false;
				if (response == '1')
				{
					
					alert = "<div class=\"alert alert-success alert-dismissable\"><button type=\"button\" class=\"close\" formdata-dismiss=\"alert\" aria-hidden=\"true\">"
								+ "&times; </button>Congratulations! Your Basic Info Has Been Saved Successfully. You Have Just One More Step To Go <img src = '../../__External/AjaxLoaders/ajax-loader.gif' /></div>";

					ve = true;
				}
				else
				{
					alert = "<div class=\"alert alert-danger alert-dismissable\"><button type=\"button\" class=\"close\" formdata-dismiss=\"alert\" aria-hidden=\"true\">"
								+ "&times; </button>Your Registration Attempt Was Unsuccessful, Please Try Again <span class='text-primary'>Hint: Make Sure You Entered The Correct Values Into the Fields Above</span></div>";
				}
				$("#information").fadeIn(1200).html(alert);
				setTimeout(function(){
					$("#information").html("");
					if (ve)
					{
						$(".registration-submit").html("Redirecting  <img src = '../../__External/AjaxLoaders/ajax-loader.gif' />");
					}
				}, 4000);
				if (ve)
				{
					setTimeout(function(){
							$("#registrationform").fadeOut();
					}, 2000);
					setTimeout(function(){
						var loginform = "<div class='text-center center-block form-header' ><h2>Fill In The Form Below To Create Your Login Details</h2></div><form role='form' id='registrationloginform'><div class='col-md-12'>" +
										'<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-user"></i> Username</span>' +
										'<input type="text" id="USERNAME" name="USERNAME" class="form-control login-text-input" placeholder="enter your preferred username" />' +
										'</div>' +
										'<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-briefcase"></i> Password</span>' +
										'<input type="password" id="PASSWORD" name="PASSWORD" class="form-control login-text-input" placeholder="enter your preferred password" />' +
										'</div>' +
										'<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-briefcase"></i>Confirm Password</span>' +
										'<input type="password" id="PASSWORD_CNF" class="form-control login-text-input" placeholder="enter your password again" />' +
										'</div></div><button role="submit" class="col-md-4 col-md-offset-4 btn btn-success registrationlogin-submit">Submit Login Info</button></form>';
						$("#registrationform").parent().html(loginform);
						
						$("#registrationloginform").on("submit", function(e){
							e.preventDefault();
							var loginformdata = $(this).serializeArray();
							if ($("#"+loginformdata[1]["name"]).val() != $("#PASSWORD_CNF").val())
							{
								alert = "<div class=\"alert alert-danger alert-dismissable\"><button type=\"button\" class=\"close\" formdata-dismiss=\"alert\" aria-hidden=\"true\">"
								+ "&times; </button>The Passwords You Entered Are Not The Same, Please Try Again And Note That Passwords Are Case Sensitive</span></div>";
								$("#information").fadeIn(1200).html(alert);
								setTimeout(function(){
									$("#information").html("");
								}, 4000);
							}
							else
							{
								$.post("../../Controller/Registration/Login.php", loginformdata, function(response){
									console.log(response);
									if (response == '1')
									{
										
										alert = "<div class=\"alert alert-success alert-dismissable\"><button type=\"button\" class=\"close\" formdata-dismiss=\"alert\" aria-hidden=\"true\">"
													+ "&times; </button>Congratulations! Your Login Info Has Been Saved Successfully. You are been redirected to the login page <img src = '../../__External/AjaxLoaders/ajax-loader.gif' /></div>";

										//ve = true;
									$("#information").fadeIn(1200).html(alert);
									setTimeout(function(){
										$("#information").html("");
										$(".registrationlogin-submit").html("Redirecting  <img src = '../../__External/AjaxLoaders/ajax-loader.gif' />");
									}, 3000);
									setTimeout(function(){
										window.location.href = "index.php";
									}, 3500);
									}
									else
									{
										alert = "<div class=\"alert alert-danger alert-dismissable\"><button type=\"button\" class=\"close\" formdata-dismiss=\"alert\" aria-hidden=\"true\">"
													+ "&times; </button>Your Registration Attempt Was Unsuccessful, Please Try Again <span class='text-primary'>Hint: Make Sure You Entered The Correct Values Into the Fields Above</span></div>";
									
													$("#information").fadeIn(1200).html(alert);
									}


								});
							}
						})
					}, 4000);
				}
				else
				{
					setTimeout(function(){

						$(".registration-submit").html(def);
					}, 2000);
				}
			})
		}
		}
	});
})