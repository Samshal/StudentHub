$(document).ready(function(){
	//VALIDATE FORM BEFORE SUBMITTING TO THE SERVER
	$("#USERTYPE").on("keypress", function(e){
		e.preventDefault();
		var alert = "<div class=\"alert alert-warning alert-dismissable submit-error\"><button type=\"button\" class=\"close\" formdata-dismiss=\"alert\" aria-hidden=\"true\">"
							+ "&times; </button>Stop! You are not allowed to change that value</div>";
		$("#information").fadeIn(1200).html (alert);
		setTimeout(function(){
			$("#information").fadeOut().html("");
		}, 3000);
	});

	$("#loginform").on("submit", function(e){
		e.preventDefault();
		$.globalEval("continuesubmit = true");
		var formdata = $(this).serializeArray();
		for (var i = formdata.length - 1; i >= 0; i--) {
			if (formdata[i]["value"] == '')
			{
				//we have an empty field
				$("#"+formdata[i]["name"]).parent().addClass("has-error");
				var alert = "<div class=\"alert alert-danger alert-dismissable submit-error\"><button type=\"button\" class=\"close\" formdata-dismiss=\"alert\" aria-hidden=\"true\">"
							+ "&times; </button>Error! "+formdata[i]["name"]+" Cannot Be Left Empty";
				$("#information").fadeIn(1200).append(alert);
				continuesubmit = false;
			}
		};
		setTimeout(function(){
			for (var i = formdata.length - 1; i >= 0; i--) {
					$("#"+formdata[i]["name"]).parent().removeClass("has-error")
					//$(".submit-error")
					$("#information").fadeOut();
			};		
		}, 3000);
		setTimeout(function(){
			$("#information").html("");
		}, 3200);
		if (continuesubmit)
		{
			var def = $(".login-button-input").text();
			$(".login-button-input").html("Validating  <img src = '../../../__External/AjaxLoaders/ajax-loader.gif' />");
			//console.log(formdata);
			$.post("../../../Controller/Login/login.php", formdata, function(response){
				console.log(response);
				var alert = '';
				var ve = false;
				if (response == '1')
				{
					
					alert = "<div class=\"alert alert-success alert-dismissable\"><button type=\"button\" class=\"close\" formdata-dismiss=\"alert\" aria-hidden=\"true\">"
								+ "&times; </button>Your Login Attempt Was Successful. You are been redirected...<img src = '../../../__External/AjaxLoaders/ajax-loader-1.gif' /></div>";

					ve = true;
				}
				else
				{
					alert = "<div class=\"alert alert-danger alert-dismissable\"><button type=\"button\" class=\"close\" formdata-dismiss=\"alert\" aria-hidden=\"true\">"
								+ "&times; </button>Your Login Attempt Was Unsuccessful, Please Try Again</div>";
				}
				$("#information").fadeIn(1200).append(alert);
				setTimeout(function(){
					$("#information").html("");
					$(".login-button-input").html("Redirecting  <img src = '../../../__External/AjaxLoaders/ajax-loader.gif' />");
				}, 4000);
				if (ve)
				{
					setTimeout(function(){
						window.location.replace("../../"+$("#USERTYPE").val());
					}, 4000);
				}
				else
				{
					setTimeout(function(){
						$(".login-button-input").html(def);
					}, 4000);
				}
			})
		}
	});
});