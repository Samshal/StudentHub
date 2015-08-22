$(document).ready(function(){
	$("#up").on("click", function(){
		//alert("clicked");
		$("#jumbo-view").fadeOut("slow").load("page-parts/register.php").fadeIn(1200);
	});
	$("#in").on("click", function(){
		$("html").fadeOut("slow");
		location.reload(true);
	});
	$("#down").hide();

	$("#go-down").on("mouseover", function(){
		$("#down").show();
	});

	$("#go-down").on("mouseleave", function(){
		$("#down").hide();
	});
	(function randomize()
	{
		setTimeout(function(){
			$("#slider > img").fadeOut(2000);
			setTimeout(function(){
				var max = 20;
				var min = 1;
				var rand = (Math.floor(Math.random() * (max - min + 1)) + min);
				console.log(rand);
				var img = "css/images/bg/"+rand+".jpg";
				$("#slider > img").fadeIn(4000).attr("src", img);
			}, 2000)
			randomize();
		}, 10000)
	})();
})