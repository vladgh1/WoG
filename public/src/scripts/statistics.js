function createGraph(element, type, data, options) {
	Chart.defaults.color = "#FBF5F3";
	var myChart = new Chart(element, {
		type: type,
		data: data,
		options: options
	});
}

createGraph(
	document.getElementById('points-chart').getContext('2d'),
	'line',
	{
		labels: ['Januray', 'February', 'March', 'April', 'May', 'June', 'July'],
		datasets: [{
			label: 'Your points',
			data: [65, 59, 80, 81, 56, 55, 40],
			fill: true,
			backgroundColor: '#45462A3D',
			borderColor: '#282B28',
			tension: 0.3
		}]
	},
	{
		responsive: true,
		maintainAspectRatio: false
	}
);

createGraph(
	document.getElementById('focus-chart'),
	'pie',
	{
		labels: [
			'Arms',
			'Legs',
			'Chest',
			'Abdomen',
			'Upper back',
			'Lower back'
		],
		datasets: [{
			label: 'My First Dataset',
			data: [300, 50, 100, 50, 10, 200],
			borderColor: '#282B28',
			backgroundColor: [
			'#264653',
			'#2a9d8f',
			'#e9c46a',
			'#f4a261',
			'#e76f51',
			'#0081a7'
			],
			hoverOffset: 4
		}]
	}
);

createGraph(
	document.getElementById('intended-chart'),
	'pie',
	{
		labels: [
			'Flexibility',
			'Strength',
			'Speed',
			'Mobility',
			'Cardio'
		],
		datasets: [{
			label: 'My First Dataset',
			data: [300, 50, 100, 70, 120],
			borderColor: '#282B28',
			backgroundColor: [
				'#2a9d8f',
				'#e9c46a',
				'#f4a261',
				'#e76f51',
				'#0081a7'
			],
			hoverOffset: 4
		}]
	}
);

createGraph(
	document.getElementById('day-chart').getContext('2d'),
	'bar',
	{
		labels: ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'],
		datasets: [{
			label: 'Your points',
			data: [65, 59, 80, 81, 56, 55, 40],
			fill: true,
			backgroundColor: '#282B28CD',
			borderColor: '#282B28',
			tension: 0.3
		}]
	},
	{
		responsive: true,
		maintainAspectRatio: false
	}
);

createGraph(
	document.getElementById('month-chart').getContext('2d'),
	'bar',
	{
		labels: ['Januray', 'February', 'March', 'April', 'May', 'June', 'July'],
		datasets: [{
			label: 'Your points',
			data: [65, 59, 80, 81, 56, 55, 40],
			fill: true,
			backgroundColor: '#282B28CD',
			borderColor: '#282B28',
			tension: 0.3
		}]
	},
	{
		responsive: true,
		maintainAspectRatio: false
	}
);

createGraph(
	document.getElementById('year-chart').getContext('2d'),
	'bar',
	{
		labels: ['2019', '2020', '2021'],
		datasets: [{
			label: 'Your points',
			data: [65, 59, 80],
			fill: true,
			backgroundColor: '#282B28CD',
			borderColor: '#282B28',
			tension: 0.3
		}]
	},
	{
		responsive: true,
		maintainAspectRatio: false
	}
);