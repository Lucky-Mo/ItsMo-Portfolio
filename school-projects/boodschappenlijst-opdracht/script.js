const listContainer = document.getElementById("list-container");

function addTask(){
    const inputBox = document.getElementById("input-Box");
    if(inputBox.value === ''){                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                 
        alert("You must write something!");
    }

    
    else{
        let li = document.createElement("li");
        li.innerText = inputBox.value;
        listContainer.appendChild(li);
        inputBox.value = "";
    }
}


// var hammodi = "17" // =
// add value to variable.

// if (hammodi == "yaman"){ // == 
// answer: false
// checks for value only
// }

// if (hammodi === "17"){ // ===
// answer: false
// -- checks for value and datatype
// }
