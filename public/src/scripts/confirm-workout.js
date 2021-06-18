const URL_CONFIRM = 'http://localhost:3070/WoG/public/users/workoutDone/';
const URL_SUBMIT  = 'http://localhost:3070/WoG/public/users/addUserWorkout/' 

function confirmWorkout() {
	const pending = document.getElementById('pending-list').children;
	const done = document.getElementById('done-list');

	Array.from(pending).forEach(li => {
		if (li.children[0].checked) {
			const params = {
				'id': li.dataset['id'],
				'done': true
			};
			const options = {
				method: 'PUT',
				headers: {'Content-Type': 'application/json'},
				body: JSON.stringify(params)
			};
			fetch(URL_CONFIRM, options)
			.then(response => response.text())
			.then(body => {
				var response = JSON.parse(body);
				if (response.workoutError === "") {
					li.removeChild(li.firstChild);
					done.insertBefore(li, done.firstChild);
				}
			});
		}
	});
}

function submitWorkout() {
	const workout = document.getElementsByClassName('exercise--checkbox');

	Array.from(workout).forEach(el => {
		const params = {
			'workout': el.dataset['id'],
			'time': el.dataset['time'],
			'intensity': el.dataset['intensity'],
			'finished': el.checked
		};
		const options = {
			method: 'POST',
			headers: {'Content-Type': 'application/json'},
			body: JSON.stringify(params)
		};
		fetch(URL_SUBMIT, options)
		.then(response => response.text())
		.then(body => {
			console.log(JSON.parse(body));
		});
	});
	location.href = '../users/workout';
}