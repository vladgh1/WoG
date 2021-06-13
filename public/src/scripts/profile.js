var inputs = document.getElementsByClassName('profile-input');
var index = 0;

let buttonsGroups = [
    document.getElementsByClassName('buttons-group-1'),
    document.getElementsByClassName('buttons-group-2')
];

function toggleInputsVisible() {
    for (let input of inputs) {
        input.disabled = !input.disabled;
    }

    showButtons(1 - index);
    hideButtons(index);
    index = 1 - index;
}

function showButtons(index) {
    for (let button of buttonsGroups[index]) {
        button.classList.remove('hidden-button');
        button.classList.add('visible-button');
    }
}

function hideButtons(index) {
    for (let button of buttonsGroups[index]) {
        button.classList.remove('visible-button');
        button.classList.add('hidden-button');
    }
}