const URL = 'http://localhost:3070/WoG/public/users/workoutDone/';

function confirmWorkout() {
	const pending = document.getElementById('pending-list').children;
	const done = document.getElementById('done-list');

	Array.from(pending).forEach(li => {
		// console.log(li.innerText);
		// console.log(li.dataset['time']);
		// console.log(li.firstChild.checked);
		if (li.firstChild.checked) {
			li.removeChild(li.firstChild);
			done.insertBefore(li, done.firstChild);
		}
		console.log(output);

		const params = {
			'id': li.dataset['id'],
			'done': true
		};
		const options = {
			method: 'PUT',
			headers:{
				'Content-Type':'application/json'
			},
			body: JSON.stringify(params)  
		};
		fetch(URL, options )
			.then( response => response.json() )
			.then( response => {
				// Do something with response.
			} );
	})
}