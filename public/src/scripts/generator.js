const wtime = document.getElementById("workout-time");
const wtimeContent = document.getElementById("workout-minutes-content");
const wintensity = document.getElementById("workout-intensity");
const wintensityContent = document.getElementById("workout-intensity-content");

const intensityList = [
	"Relaxing workout",
	"Easy workout",
	"Medium workout",
	"Hard workout",
	"Master workout"
];

const intensityColor = [
	"#74bde8",
	"#28e659",
	"#a2d523",
	"#ffb735",
	"#e74c3c"
];

function timeChange() {
	wtimeContent.innerHTML = wtime.value + " minutes";
	wtime.style.backgroundColor = '#' + generateColor('#e74c3c', '#a2d523', (120 - 15) / 5 + 1)[(wtime.value - 15) / 5];
}

function intensityChange() {
	wintensityContent.innerHTML = intensityList[wintensity.value - 1];
	wintensity.style.backgroundColor = intensityColor[wintensity.value - 1];
}

wtime.addEventListener("input", timeChange);
wintensity.addEventListener("input", intensityChange);

timeChange();
intensityChange();


function hex (c) {
  var s = "0123456789abcdef";
  var i = parseInt (c);
  if (i == 0 || isNaN (c))
    return "00";
  i = Math.round (Math.min (Math.max (0, i), 255));
  return s.charAt ((i - i % 16) / 16) + s.charAt (i % 16);
}

/* Convert an RGB triplet to a hex string */
function convertToHex (rgb) {
  return hex(rgb[0]) + hex(rgb[1]) + hex(rgb[2]);
}

/* Remove '#' in color hex string */
function trim (s) { return (s.charAt(0) == '#') ? s.substring(1, 7) : s }

/* Convert a hex string to an RGB triplet */
function convertToRGB (hex) {
  var color = [];
  color[0] = parseInt ((trim(hex)).substring (0, 2), 16);
  color[1] = parseInt ((trim(hex)).substring (2, 4), 16);
  color[2] = parseInt ((trim(hex)).substring (4, 6), 16);
  return color;
}

function generateColor(colorStart,colorEnd,colorCount){

	// The beginning of your gradient
	var start = convertToRGB (colorStart);    

	// The end of your gradient
	var end   = convertToRGB (colorEnd);    

	// The number of colors to compute
	var len = colorCount;

	//Alpha blending amount
	var alpha = 0.0;

	var saida = [];
	
	for (i = 0; i < len; i++) {
		var c = [];
		alpha += (1.0/len);
		
		c[0] = start[0] * alpha + (1 - alpha) * end[0];
		c[1] = start[1] * alpha + (1 - alpha) * end[1];
		c[2] = start[2] * alpha + (1 - alpha) * end[2];

		saida.push(convertToHex (c));
		
	}
	
	return saida;
	
}
