let spritePadding = 2;
let counter = 0;

document.addEventListener('touchstart', pushDown, false);

document.addEventListener('touchend', pushUp, false);

document.addEventListener('touchcancel', pushUp, false);

document.addEventListener('keydown', event => {
	if (event.code === 'Space') {
		pushDown();
	}
});

document.addEventListener('keyup', event => {
	if (event.code === 'Space') {
		pushUp();
	}
});



function pushUp() {
	document.getElementById("push-up-game-sprite-hands").style.animation = "game-hands-move-backward 0.1s cubic-bezier(.15,1.01,.62,1.27) 1 normal forwards";
	document.getElementById("push-up-game-hint").style.visibility = "hidden";
	document.getElementById("error-code").textContent = (++counter).toString();
}

function pushDown() {
	document.getElementById("push-up-game-sprite-hands").style.animation = "game-hands-move-forward 0.1s cubic-bezier(.15,1.01,.62,1.27) 1 normal forwards";
}
