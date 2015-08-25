$(document).ready(function(){
	$("#submit").hide();
	$("#course").fadeOut();
	$("#semester").fadeOut();
	$("#tagline").fadeOut();
	$(".se-pre-con").fadeOut("slow");
	var fileInput = document.getElementById("image");
	fileInput.addEventListener("change", function(e){
		var file = fileInput.files[0];
		var imageType = /image.*/;
		if (file.type.match(imageType))
		{
			var reader = new FileReader();
			reader.onload = function(e){
				$(".lockscreen-image > img").attr("src", reader.result);
			}
			reader.readAsDataURL(file);
		}
		$("#image-info").fadeOut(1000);
		setTimeout(function(){
			$("#image-info").html("<i class='fa fa-signal'></i> We are making sure you uploaded a valid image <img src='img/ajax-loader-1.gif' />").fadeIn("slow").removeClass("text-danger").addClass("text-warning");
			$("#refresh > i").removeClass("fa-refresh").addClass("fa-times text-danger");
		}, 1000);
		setTimeout(function(){
			$("#image-info").html("<i class='fa fa-check'></i> Nice Image! Click on the <span class='text-info'>Submit</span> button to save it your profile").fadeIn("slow").removeClass("text-warning").addClass("text-info");
			$("#refresh").hide();
			$("#submit").show();
		}, 3000)
		$("#image-form").on("submit", function(e){
			e.preventDefault();
			$("#image-info").html("<i class='fa fa-spinner'></i> Submitting <img src='img/ajax-loader-1.gif' />").fadeIn("slow");
			$.ajax({
				url : "../../Controller/Student/upload-image.php",
				type : "POST",
				data: new FormData(this),
				contentType: false,
				cache: false,
				processData: false,
				success : function(data){
					if (data != '')
					{
						$("#image-info").html("<i class='fa fa-warning'></i> An Error Occurred, Please Try Again").fadeIn("slow").removeClass("text-info").addClass("text-danger");
						$("#refresh").show();
						$("#submit").hide();
						$("#refresh > i").removeClass("fa-times text-danger").addClass("fa-refresh");
					}
					else
					{
						$("#image-info").html("<i class='fa fa-check'></i> Your Profile Picture Has Been Saved Successfully").fadeIn("slow").removeClass("text-info").addClass("text-success");
						$("#refresh").show();
						$("#submit").hide();
						$("#refresh").attr("disabled", "disabled");
						$("#image").attr("disabled", "disabled");
						$("#refresh > i").removeClass("fa-times text-danger").addClass("fa-check");
						$(".course").on("click", function(){
							var id = $(this).attr("id");
							var name = $(this).attr("name");
							$("#course-text").val(name);
							$("#course-text").attr("val", id);
						})
						$(".semester").on("click", function(){
							var id = $(this).attr("id");
							var name = $(this).attr("name");
							$("#semester-text").val(name);
							$("#semester-text").attr("val", id);
						})
						setTimeout(function(){
							$(".se-pre-con").fadeIn("slow");
						}, 1000);
						setTimeout(function(){
							$(".se-pre-con").fadeOut(2000);
							$("#course").fadeIn();
						}, 3000);
						$("#save-course").on("click", function(){
							var value = $("#course-text").attr("val");
							$.post("../../Controller/Student/save-profile.php", {TABLE: "course", VALUE: value }, function(data){
								if (data)
								{
									$("#save-course").html('<i class="fa fa-check"></i> Saved').removeClass("btn-success").addClass("btn-info");
									$("#save-course").attr("disabled", "disabled");
									$("#semester").fadeIn("slow");
								}
								else
								{
									alert("failure");
								}
							})
						});
						$("#save-semester").on("click", function(){
							var value = $("#semester-text").attr("val");
							$.post("../../Controller/Student/save-profile.php", {TABLE: "semester", VALUE: value }, function(data){
								if (data)
								{
									$("#save-semester").html('<i class="fa fa-check"></i> Saved').removeClass("btn-success").addClass("btn-info");
									$("#save-semester").attr("disabled", "disabled");
									$("#tagline").fadeIn("slow");
								}
								else
								{
									alert("failure");
								}
							})
						});
						$("#save-tagline").on("click", function(){
							var value = $("#tagline-text").val();
							$.post("../../Controller/Student/save-profile.php", {TABLE: "tagline", VALUE: value }, function(data){
								console.log(data);
								if (data)
								{
									$("#save-tagline").html('<i class="fa fa-check"></i> Saved').removeClass("btn-success").addClass("btn-info");
									$("#save-tagline").attr("disabled", "disabled");
									$(".se-pre-con").html(
											'<h1 class="text-center">Great Job! <br/><br/><img src="img/correct.png" /><br/><br/><small>We will let you know when you need to provide some more info</small></h1>'+
											'<br/><p class="text-info text-center"><img src="img/ajax-loader-1.gif" /> You are been redirected to your dashboard ...</p>'										);
									$(".container").fadeOut("slow");
									$(".se-pre-con").fadeIn("slow");
									$.get("../../Controller/Student/complete-profile.php", function(data){
										setTimeout(function(){
											location.href = "index.php";
										}, 3000);
									})
								}
								else
								{
									alert("failure");
								}
							})
						});
					}
				},
				error : function(e){
					alert("An error occurred");
				}
			});
		 })
	});
	$("#refresh").on("click", function(){
		$(".lockscreen-image > img").attr("src", "");
		$(".lockscreen-image > img").fadeOut(3000);
		$("#image-info").html("<i class='fa fa-check'></i> Refresh Successful").removeClass("text-danger").addClass("text-success");	
		$("#image-info").fadeOut(2000);
		setTimeout(function(){
			$("#image-info").text("Upload A Profile Picture.").fadeIn("slow").removeClass("text-success").addClass("text-danger");
			$(".lockscreen-image > img").attr("src", "img/user-bw.png").fadeIn(2000);
			$("#image").removeAttr("disabled");
			$("#refresh > i").removeClass("fa-times text-danger").addClass("fa-refresh");
			$("#image").val("");
		}, 2000);
	});
});