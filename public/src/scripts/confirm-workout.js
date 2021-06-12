// const URL = 'http://localhost:3070/WoG/public/users/workoutDone/';

// function confirmWorkout() {
// 	const pending = document.getElementById('pending-list').children;
// 	const done = document.getElementById('done-list');

// 	Array.from(pending).forEach(li => {
// 		const params = {
// 			'id': li.dataset['id'],
// 			'done': true
// 		};
// 		const options = {
// 			method: 'PUT',
// 			headers:{
// 				'Content-Type':'application/json'
// 			},
// 			body: JSON.stringify(params)  
// 		};
// 		fetch(URL, options)
// 			.then( response => response.json() )
// 			.then( response => {
// 				if (strlen(response['workoutError']) != 0) {
// 					if (li.firstChild.checked) {
// 						li.removeChild(li.firstChild);
// 						done.insertBefore(li, done.firstChild);
// 					}
// 				}
// 			} );
// 	});
// }
