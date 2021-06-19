const SCORE_BY_MONTH = 'http://localhost:3070/WoG/public/users/getScoreByMonth/';

const options = {
    method: 'GET',
    headers: { 'Content-Type': 'application/json' },
};
fetch(SCORE_BY_MONTH, options).then(response => response.text()).then(body => {
    const response = JSON.parse(body);
    var months = [];
    var points = [];
    response.scoreByMonth.forEach(element => {
        months.push(element.month);
        points.push(element.score)
    });
    createGraph(
        document.getElementById('points-chart').getContext('2d'),
        'line', {
            labels: months,
            datasets: [{
                label: 'Your points',
                data: points,
                fill: true,
                backgroundColor: '#45462A3D',
                borderColor: '#282B28',
                tension: 0.3
            }]
        }, {
            responsive: true,
            maintainAspectRatio: false
        }
    );
});

const FOCUS = 'http://localhost:3070/WoG/public/users/getFocusPoints/';

fetch(FOCUS, options).then(response => response.text()).then(body => {
    const response = JSON.parse(body);
    var points = [];
    var focus = [];
    response.focusPoints.forEach(element => {
        points.push(element.focusPoints);
        focus.push(element.focus);

    });

    createGraph(
        document.getElementById('focus-chart'),
        'pie', {
            labels: focus,
            datasets: [{
                label: 'My First Dataset',
                data: points,
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
});


const INTENDED = 'http://localhost:3070/WoG/public/users/getIntendedPoints/';

fetch(INTENDED, options).then(response => response.text()).then(body => {
    const response = JSON.parse(body);
    var points = [];
    var intended = [];
    response.intendedPoints.forEach(element => {
        points.push(element.intendedPoints);
        intended.push(element.intended);;

    });
    createGraph(
        document.getElementById('intended-chart'),
        'pie', {
            labels: intended,
            datasets: [{
                label: 'My First Dataset',
                data: points,
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
});

const WEEKDAY = 'http://localhost:3070/WoG/public/users/getNrWorkoutsPerWeekDay/';

fetch(WEEKDAY, options).then(response => response.text()).then(body => {
    const response = JSON.parse(body);
    var points = [];
    var day = [];
    response.workoutsPerWeekDay.forEach(element => {
        points.push(element.nrDeZile);
        day.push(element.numeZi);
    })
    console.log(points);
    createGraph(
        document.getElementById('day-chart').getContext('2d'),
        'bar', {
            labels: day,
            datasets: [{
                label: 'Your number of exercises',
                data: points,
                fill: true,
                backgroundColor: '#282B28CD',
                borderColor: '#282B28',
                tension: 0.3
            }]
        }, {
            responsive: true,
            maintainAspectRatio: false
        }
    );
});

const MONTHDAY = 'http://localhost:3070/WoG/public/users/getNrWorkoutsByIntensity/';

fetch(MONTHDAY, options).then(response => response.text()).then(body => {
    const response = JSON.parse(body);
    var nrAntrenamente = [];
    var intensity = [];
    response.workoutsByIntensity.forEach(element => {
        nrAntrenamente.push(element.nrAntrenamente);
        intensity.push("Intensity: " + element.intensity);
    })

    createGraph(
        document.getElementById('intensity-chart'),
        'pie', {
            labels: intensity,
            datasets: [{
                label: 'My First Dataset',
                data: nrAntrenamente,
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
});

function createGraph(element, type, data, options) {
    Chart.defaults.color = "#FBF5F3";
    var myChart = new Chart(element, {
        type: type,
        data: data,
        options: options
    });
}