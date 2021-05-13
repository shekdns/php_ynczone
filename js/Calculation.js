var sell_price;
var amount;

function init () {
	sell_price = document.view_form.sell_price.value;
	amount = document.view_form.amount.value;
	document.view_form.sum.value = sell_price;
	change();
}

function add () {
	hm = document.view_form.amount;
	sum = document.view_form.sum;
	hm.value ++ ;

	sum.value = parseInt(hm.value) * sell_price;
}

function del () {
	hm = document.view_form.amount;
	sum = document.view_form.sum;
		if (hm.value > 1) {
			hm.value -- ;
			sum.value = parseInt(hm.value) * sell_price;
		}
}

function change () {
	hm = document.view_form.amount;
	sum = document.view_form.sum;

		if (hm.value < 0) {
			hm.value = 0;
		}
	sum.value = parseInt(hm.value) * sell_price;
}
