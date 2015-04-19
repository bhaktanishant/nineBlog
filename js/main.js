document.getElementById('buttonBold').onclick = (function () {
	var a = document.getElementById('postContent').innerHTML;
	if (a !== '') {
		document.getElementById('postContent').innerHTML = '##' + a + '##';
	};
});