$(function soma() {
	var totals = $('.valor');
	
	var sum = 0;
	for (var i = 0; i < totals.length; i++) {
	  var v = $(totals[i]).text().replace(/[^\d.]/g, '');
	  var ct = parseFloat(v);
	  sum += ct;
	}
	document.getElementById("resultado").innerHTML = sum.toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' });
    window.localStorage.setItem('total', sum);
});