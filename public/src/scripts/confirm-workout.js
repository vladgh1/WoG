const URL = 'http://localhost:3070/WoG/public/users/workoutDone/';

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
			fetch(URL, options)
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