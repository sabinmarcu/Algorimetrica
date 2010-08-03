

var len = document.cookie.indexOf( "latime=" ) + 7;
var end = document.cookie.indexOf( ";", len );
if ( end == -1 ) end = document.cookie.length;
var width = unescape( document.cookie.substring( len, end ) );



function toggle(id, buton, text, cat){
        if (document.getElementById(id).style.display == 'none'){
		        $("#"+id).show(1000);
                if (buton){
                if (cat == "normal") document.getElementById(buton).value = 'Ascunde ' + text;
                else document.getElementById(buton).firstChild.data = "Ascunde " + text;}
        }else{  
                $("#"+id).hide(1000);
                if (buton){
                if (cat == "normal") document.getElementById(buton).value = 'Afiseaza ' + text;
                else document.getElementById(buton).firstChild.data = "Afiseaza " + text;
                }
        }
        if (buton)
        if (buton == "butoncom")	document.coment.sub.value = "0";
}
function settinta(tinta, valoare){
       	if (tinta == 'sub')	{
       	if (document.getElementById("formular").style.display == 'none')	{
       	       	document.getElementById(tinta).value = valoare;
       			document.getElementById('butoncom').value = 'Ascunde formularul pentru postare comentariu.';
       	        $('#formular').show(1000);
       	        document.coment.comentariu.focus();
       	       }
       	      }
       	else if (tinta == 'pcat')	{
       			if (cat[0] == 0)	{
       				cat[0] = 1;
       				cat[1] = valoare;
       				document.getElementById("buton" + valoare).className="buton-apasat";
       			}else {
       				ok = 1;
       				for (i = 1; i <= cat[0]; i++)	if (cat[i] == valoare)	{
       					ok = 0;
       					for (j = i+1; j <= cat[0]; j++)	cat[j - 1] = cat[j];
       					cat[0] --;
       					document.getElementById("buton" + valoare).className="categorie";
       				}
       				if (ok) {
       					cat[0]++;
       					cat[cat[0]] = valoare;
       					document.getElementById("buton" + valoare).className="buton-apasat";
       				}
       			}
       			rezultat = "";
       			for (i = 1; i <= cat[0] - 1; i++)
       				rezultat = rezultat + cat[i]+ ", " ;
       			rezultat = rezultat + cat[cat[0]];       			
	       		document.getElementById(tinta).value = rezultat;
	       		document.getElementById('buton').focus();
 		} 
}
function reimprospatare(valoare){
	document.getElementById('link-continuare').innerHTML = valoare;
}

function insereaza(obiect) {
switch (obiect)	{
	case "exemple" : 	exemple ++; 
						document.getElementById("exemple").innerHTML += " <div style='text-align:center'> " + exemple + "<input type='text' class = 'enunt' name = 'exemplu-" + exemple + "' style='width:45%; float:left;'/>" + "<input type='text' class = 'rezultat' name = 'rezultat-" + exemple + "' style='width:45%; float:right;' /> </div><br/>";
						document.getElementById("nrex").value = exemple;
						break;
						
	case "categorii" : 	
						var valoare = parseInt($("#total").val()) + parseInt($("#plus").val()) + 1;	
						$("#categorii").html($("#categorii").html()+"<div class='bloc colorat' id='p"+valoare+"'><div class='element' style='text-size:13pt;'>Deocamdata trebuie sa dai categoriei un nume.</div><div class='subelement'><span id='sterge"+valoare+"' style='color:red; cursor:pointer' onclick=\"sterge('"+valoare+"')\">Sterge </span> / <span onclick=\"descriere('"+valoare+"')\" style='color:green; cursor:pointer'>Numeste Categoria</span><input type='hidden' name='sters"+valoare+"' id='sters"+valoare+"' value='0'/></div></div><div class='descriere' id = 'd"+valoare+"'><textarea name='nume"+valoare+"' style='width:98%'></textarea></div>");	
						valoare = valoare - parseInt($("#total").val());				
						$("#plus").val(valoare);
						break;
					}
					return 0;
}

window.onload=function(){
	$(".subcontinut").hide();
	if (document.getElementById('adauga')) document.getElementById('adauga').style.display = 'none';
	if (document.getElementById('permite')) document.getElementById('permite').style.display = 'none';
	if (document.getElementById('liceu')) document.getElementById('liceu').style.display = 'none';
	if (document.getElementById('clasa0')) document.getElementById('clasa0').style.display = 'none';
	if (document.getElementById('clasa1')) document.getElementById('clasa1').style.display = 'block';
	$("a.log").attr("href", "javascript:login()");
	$("a.reg").attr("href", "javascript:reg()");
	$("a.rss").attr("href", "javascript:rss()");
	$("a.set").attr("href", "javascript:sett()");
}

function verifica(id, sender){
		$("#clasa"+sender.options[sender.selectedIndex].value).show(1000);
		$("#clasa"+document.getElementById('nrclase').value).hide(1000);
		document.getElementById('nrclase').value = sender.options[sender.selectedIndex].value;		
}

function redirect(adresa){
window.location=adresa;
}

function descriere(tinta){
	if (document.getElementById("d"+tinta).style.display == 'none')	{
		$("#d"+tinta).show(1000);
		$("#p"+tinta).css("-webkit-border-bottom-right-radius", "0");
		$("#p"+tinta).css("-moz-border-radius-bottomright", "0");
	}
	else {
		$("#d"+tinta).hide(1000);
		$("#p"+tinta).css("-webkit-border-bottom-right-radius", "10px");
		$("#p"+tinta).css("-moz-border-radius-bottomright", "10px");
	}
}

function sterge(id)	{
	if ($("#sters"+id).val() == 0)	{
		$("#sterge"+id).css("font-weight", "bolder");
		$("#sterge"+id).text("Anuleaza Stergerea");
		$("#sters"+id).val(1);
	}	else {
		$("#sterge"+id).css("font-weight", "normal");
		$("#sterge"+id).text("Sterge");
		$("#sters"+id).val(0);
	}
}

function accepta(id){
	$("#acc"+id).html("");
	$("#accept"+id).val(1);
}

function login(){
if ($("#overlays").css("display") == "none")	{
		$("#overlays").css("display", "block");
		$("#overlays").stop().animate({opacity: 0.75}, 1000);
		$("#overlayc").html("<div class='overlay'></div><iframe src='/logare/' class='frame'>Logheaza-te!</iframe>");
		$(".frame").css("left", document.body.clientWidth / 2 - 350);
	}
	else {
		$("#overlays").animate({opacity: 0}, 1000, 'linear', function() {$(this).css("display", "none");});
		$("#overlayc").html("");
	}
}
function setting(url){
		$("#overlayc").html("<div class='overlay'></div><iframe src='"+url+"' class='frame' style='width:0; height:0'>Logheaza-te!</iframe>");
}
function reg(){
if ($("#overlays").css("display") == "none")	{
		$("#overlays").css("display", "block");
		$("#overlays").stop().animate({opacity: 0.75}, 1000);
		$("#overlayc").html("<div class='overlay'></div><iframe src='/inregistrare/' class='frame' id='reg'>Logheaza-te!</iframe>");
		$(".frame").css("left", document.body.clientWidth / 2 - 400);
	}
	else {
		$("#overlays").animate({opacity: 0}, 1000, 'linear', function() {$(this).css("display", "none");});
		$("#overlayc").html("");
	}
}
function sett(){
if ($("#overlays").css("display") == "none")	{
		$("#overlays").css("display", "block");
		$("#overlays").stop().animate({opacity: 0.75}, 1000);
		$("#overlayc").html("<div class='frame'><pre style='width:340px; display:inline-block; zoom: 1; *display:inline; float:left;'>     Latimea Paginii<br>	<a href=\"javascript:setting('/600/')\">Mica / </a><a href=\"javascript:setting('/normal/')\">Normal / </a><a href=\"javascript:setting('/1000/')\">Mare / </a><a href=\"javascript:setting('/85/')\">Fluid</a></pre><pre style='width:340px; display:inline-block; zoom: 1; *display:inline; float:right;'>     Culoarea Fundalului<br>	<a href=\"javascript:setting('/culoare/negru/')\">Negru / </a><a href=\"javascript:setting('/culoare/alb/')\">Alb</a></pre></div></div>");
		$(".frame").css("left", document.body.clientWidth / 2 - 350);
		$(".frame").css("height", 150);
}
else {
	$("#overlays").animate({opacity: 0}, 1000, 'linear', function() {$(this).css("display", "none");});
	$("#overlayc").html("");
}
}
function rss(){
if ($("#overlays").css("display") == "none")	{
		$("#overlays").css("display", "block");
		$("#overlays").stop().animate({opacity: 0.75}, 1000);
		$("#overlayc").html("<div class='overlay'></div><iframe src='http://feeds.feedburner.com/algorimetrica' class='frame' id='reg'>RSS</iframe>");
		$(".frame").css("left", document.body.clientWidth / 2 - 400);
	}
	else {
		$("#overlays").animate({opacity: 0}, 1000, 'linear', function() {$(this).css("display", "none");});
		$("#overlayc").html("");
	}
}
