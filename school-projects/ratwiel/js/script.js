// var example = 2;
// var example2 = 3;

// if (example == example2) { // false
//     console.log(example)

// }else if (example2 >= example2) {
//     console.log(example2)
// }else{
//  do something else
// }

// // loops
// for (let index = 0; index >= example2; index++) {
//     console.log("Yaman " + index)
// }

// Creating variables and storing HTML elements
var wheel = document.getElementById("wheel");
var clickMeBtn = document.getElementById("wheelbtn");

// Function for rotating the wheel
function rotateWheel (){
    // Storing random degree number (min = 400, max = 5000(4999))
    var random = Math.floor(Math.random()* 5000) + 400;
    // changing the transform rotation using JavaScript to the random variable + "deg"
    // Note, animation time is tranision in CSS code
    wheel.style.transform = "rotate("+random+"deg)";
}

// Listen to the click evnet on the button that we created above 
clickMeBtn.onclick = () =>{
    // Call the rotation function
    rotateWheel ();
}

// thx bro for helping me out and for everything <3 	  