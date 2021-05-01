let spritePadding = 18;
let counter = 0;

document.addEventListener('touchstart', pushdown, false);

document.addEventListener('touchend', pushup, false);

document.addEventListener('touchcancel', pushup, false);

document.addEventListener('keydown', event => {
	if (event.code === 'Space') {
		pushdown();
	}
});

document.addEventListener('keyup', event => {
	if (event.code === 'Space') {
		pushup();
	}
});



function pushup() {
	document.getElementById("push-up-game-sprite").style.backgroundPosition = "0px 0px";
	document.getElementById("push-up-game-hint").style.visibility = "hidden";
	counter++;
	document.getElementById("error-code").textContent = counter;
}

function pushdown() {
	document.getElementById("push-up-game-sprite").style.backgroundPosition = spritePadding + "px 0px";
}
