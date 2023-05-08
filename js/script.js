// pega valor horario label clicado e coloca no input de cod_horario
function getHorarioValue(cod_horario) {
	$('#cod_horario').val(cod_horario);
}

//AÇÃO QUE ESTAVA NO ARQUIVO 'script.js' QUE O BOOTSTRAP USA -- BOTÃO PARA ESCONDER SIDEBAR
window.addEventListener('DOMContentLoaded', (event) => {
	// Toggle the side navigation
	const sidebarToggle = document.body.querySelector('#sidebarToggle');
	if (sidebarToggle) {
		// Uncomment Below to persist sidebar toggle between refreshes
		// if (localStorage.getItem('sb|sidebar-toggle') === 'true') {
		//     document.body.classList.toggle('sb-sidenav-toggled');
		// }
		sidebarToggle.addEventListener('click', (event) => {
			event.preventDefault();
			document.body.classList.toggle('sb-sidenav-toggled');
			localStorage.setItem(
				'sb|sidebar-toggle',
				document.body.classList.contains('sb-sidenav-toggled')
			);
		});
	}
});

//database
$(document).ready(function () {
	const datatablesSimple = document.getElementById('datatablesSimple');
	if (datatablesSimple) {
		new simpleDatatables.DataTable(datatablesSimple);
		$('#datatablesSimple').DataTable();
	}
});

/* window.addEventListener('load', (event) => {
	loadCalendar();
});

document.addEventListener('readystatechange', (event) => {
	loadCalendar();
});

document.addEventListener('DOMContentLoaded', (event) => {
	loadCalendar();
}); */

//CALEDARIO
function loadCalendar() {
	var calendarEl = document.getElementById('calendar');
	var calendar = new FullCalendar.Calendar(calendarEl, {
		//googleCalendarApiKey: 'PUT_YOUR_API_KEY_HERE',
		initialView: 'dayGridMonth',
		firstDay: 1,
		/*   windowResize: function(arg) {
			  alert('The calendar has adjusted to a window resize. Current view: ' + arg.view.type);
		  }, */
		unselectAuto: true,
		weekends: true,
		selectable: true,
		unselectAuto: false,
		dateClick: function (info) {
			var wd;
			$('#data').val(info.dateStr);
			var weekday = info.date.toString().slice(0, 3);
			if (weekday == 'Sun') {
				console.log('domingo');
				wd = 'Domingos-Feriados';
			} else {
				wd = 'Úteis';
			}
			$('#dia').html(wd + '<br>' + info.dateStr + ' - horarios:');
			$('.' + wd).css('display', 'inline-block');
			$(`label.active:not(".${wd}")`).css('display', 'none');
		},
	});
	calendar.setOption('locale', 'pt-br');
	calendar.render();
	//console.log('teste1');
}
//CONFIGURAÇÃO CARROSSEL
new Glide('.glide', {
	type: 'carousel',
	startAt: 0,
	autoplay: 2000,
	animationTimingFunc: 'ease',
	peek: {
		before: 0,
		after: 80,
	},
	perView: 5,
	breakpoints: {
		800: {
			perView: 3,
		},
	},
}).mount();

/* if (document.readyState !== 'complete') {
	document.addEventListener('DOMContentLoaded', loadCalendar);
} else {
	loadCalendar();
}

$('#staticBackdrop').on('shown.bs.modal', function () {
	loadCalendar();
	$('#calendar').fullCalendar('render');
}); */
