$(function(){
	$(".btn2").click(function(){
		$(".input").toggleClass("active").focus;
		//$(this).toggleClass("animate");
		$(".input").css("right", "11px").val("");
	});
});
