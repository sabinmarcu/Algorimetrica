$(function() { 
$("#header-hover").hide();
     $("#header").hover( 
          function() { $("#header-hover").stop().show("drop", { direction: "up" }, 1000); } , function(){}
     ); 
     $("#header-hover").hover( function(){}, 
     	function()	{	$("#header-hover").stop().hide("drop", { direction: "up" }, 1000);	}
     );
$("#footer").find(".ft").css("opacity", 0);
$("#footer").hover( 
  function() { $(this).find(".ft").stop().animate({ opacity: 1 }, 500); } , function(){ $(this).find(".ft").stop().animate({ opacity: 0 }, 500); }
     ); 
$(".bg").click(function () {
	if ($(this).parent('.sub').find(".subcontinut").css("display") == 'none')
	$(this).parent('.sub').find(".subcontinut").show(1000);
	else $(this).parent('.sub').find(".subcontinut").hide(1000);
})
$("#div2").children(".home").css("height", 170);
$("#div2").children(".home").append("<span style='position:absolute; width:100%; text-align:center; top: 50px; display:none'>Apasa pe icoana din dreapta pentru a citi tot : </span>");
$("#div2").children(".home").hover(
	function() {$(this).children("span").show(750);}, 
	function() {$(this).children("span").hide(750);}
);

$("#div2").children(".home").children(".home-img").click(
		function()	{
			if ($(this).parent(".home").css("height") == "170px") 
				 $(this).parent(".home").css("height", "auto");
			else $(this).parent(".home").css("height", 170);
		}
);
$("#div1").children(".home").css("height", 110);
$("#div1").children(".home").append("<span style='position:absolute; width:100%; text-align:center; top: 0; display:none'>Apasa pe icoana din stanga pentru a citi tot : </span>");
$("#div1").children(".home").hover(
	function() {$(this).children("span").show(750);}, 
	function() {$(this).children("span").hide(750);}
);
$("#div1").children(".home").children(".home-img").click(
		function()	{
			if ($(this).parent(".home").css("height") == "110px") 
				 $(this).parent(".home").css("height", "auto");
			else $(this).parent(".home").css("height", 110);
		}
);
var height_element= new Array();
$('.subart').each(function(index){$(this).attr("id", index);});
  for(i=0;i<=$(".subart").length - 1;i++)
  {
    height_element[i]=$(".subart#"+i).height();
  }
$(".subart").css("height", 0).hide();
$('.art').css("width", "15%");
var currentFocus = null; 
$(':input').focus( function() { 
    currentFocus = this; 
}).blur( function() { 

    currentFocus = null; 
}); 

$('textarea').focus( function() { 
    currentFocus = this; 
}).blur( function() { 

    currentFocus = null; 
}); 
$('.menu').focus( function() { 
    currentFocus = this; 
}).blur( function() { 

    currentFocus = null; 
}); 



$(".art").click(function()	{	
	if (currentFocus != "[object HTMLInputElement]" && currentFocus != "[object HTMLTextAreaElement]")	{
	$("#info").animate({opacity: 0, height: 0}, 1000, 'linear', function() {$(this).css("display", "none");});
if ($(this).find(".subart").css("display") == "none")	{
	$(this).find(".subart").show().css("opacity", 0);
	$(this).animate({width: "100%"}, 1000);
	$(this).css("-webkit-border-top-right-radius", "0");
	$(this).css("-webkit-border-bottom-right-radius", "0");
	$(this).css("-moz-border-radius-topright", "0");
	$(this).css("-moz-border-radius-bottomright", "0");
  	$(this).find(".subart").animate({opacity: 1, height: height_element[$(this).find(".subart").attr("id")] + "px"}, 1000);
  	$(this).find(".text").animate({opacity: 0}, 1000);
 }
  else  {
  $(this).animate({width: "15%"}, 1000);
  $(this).css("-webkit-border-top-right-radius", "10px");
  $(this).css("-webkit-border-bottom-right-radius", "10px");
  $(this).css("-moz-border-radius-topright", "10px");
  $(this).css("-moz-border-radius-bottomright", "10px");
  $(this).find(".subart").animate({opacity: 0, height: 0}, 1000, 'linear', function() {$(this).css("display", "none");});
  $(this).find(".text").animate({opacity: 1}, 1000);
  }
 }
});





$("textarea").tabby();
$("#menu li").find("ul").hide();
$("#menu > li").hover(
	function()	{	if ($(this).find("ul").length) {
						if ($("body").hasClass("negru"))	$(this).stop().find("div").css("color", "#111616");
						else $(this).find("div").css("color", "#FFFFF0");
						$(this).find("ul:first").css("color", "#AEAEAE");
						$(this).find("ul:first").show();
					}
				},
	function()	{	if ($(this).find("ul").length) {
						$(this).find("div").css("color", "#AEAEAE");
						$(this).find("ul:first").hide();
					}
				}
);
$("#menu > li li").hover(
	function()	{	if ($(this).find("ul").length) {
						$(this).parent("ul:first").css("position", "static");
						$(this).find("ul:first").show();
						$(this).find("ul:first").css("opacity", 1);
					}
				},
	function()	{	if ($(this).find("ul").length) {
						$(this).find("ul:first").hide();
					}
				}
);
if (!$("body").hasClass("admin")){
menu = $("#menu").css("height");
$("#menu").css("opacity", "0");
$("#menu").css("height", "0");
if ($("body").hasClass("negru"))	$("#navinfo").stop().css("color", "#CCC");
$("#nav").hover(
	function()	{		$("#navinfo").stop().animate({opacity: 0, height: 0}, 500).hide();
						$(this).find("#menu").stop().animate({opacity: 1, height: menu, }, 500, 'linear', function() {$(this).css("overflow", "visible").css("overflow", "visible")} );
						if ($("body").hasClass("negru"))	$(this).stop().css("background-color", "#111616");
						else $(this).stop().css("background-color", "#FFFFF0");
						$(this).find("div").css("color", "#AEAEAE");
				},
	function()	{		$("#navinfo").stop().show().css("opacity", 0).animate({opacity: 1, height: 25}, 500);
						$(this).find("#menu").stop().animate({opacity: 0, height: 0}, 500);
						if ($("body").hasClass("negru"))	$(this).stop().css("background-color", "#112F3F");
						else $(this).stop().css("background-color", "#FFFFC0");
						$(this).find("div").css("color", "#AEAEAE");
				}
);}


}); 