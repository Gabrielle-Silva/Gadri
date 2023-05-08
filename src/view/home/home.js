//FUNÇÃO DE STICKY NO MENU - TRANSPARENCIA - SCROLL
window.addEventListener('scroll', function () {
	var header = document.querySelector('#nav-cima');
	var logo = document.querySelector('#logo');
	header.classList.toggle('sticky', window.scrollY <= 0);
	logo.classList.toggle('sticky', window.scrollY <= 0);
});

window.onload = (event) => {
	var header = document.querySelector('#nav-cima');
	var logo = document.querySelector('#logo');
	header.classList.add('sticky');
	logo.classList.add('sticky');
};
