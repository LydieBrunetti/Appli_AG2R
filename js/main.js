let cnt = 1;
let retest = 1;


function createEventRow() {

    let node = document.createElement("tr");
    node.setAttribute("id", "new_tr");

    let node2 = document.createElement("td");
    let node4 = document.createElement("td");
    let node6 = document.createElement("td");
    let node8 = document.createElement("td");
    let node10 = document.createElement("td");

    let node3 = document.createElement("input");
    node3.setAttribute("name", "nom_" + cnt);
    node3.setAttribute("type", "text");
    node3.setAttribute("required", "true");
    let node5 = document.createElement("input");
    node5.setAttribute("name", "location_" + cnt);
    node5.setAttribute("type", "text");
    node5.setAttribute("required", "true");
    let node7 = document.createElement("input");
    node7.setAttribute("name", "datedepart_" + cnt);
    node7.setAttribute("pattern", "^[0-9]{4}-[0-9]{2}-[0-9]{2}\\s[0-9]{2}:[0-9]{2}:[0-9]{2}$");
    node7.setAttribute("type", "text");
    node7.setAttribute("required", "true");
    let node9 = document.createElement("input");
    node9.setAttribute("name", "participants_" + cnt);
    node9.setAttribute("value", '0');
    node9.setAttribute("type", "text");
    node9.setAttribute("required", "true");


    let test = document.createElement("input");
    test.setAttribute("value", "Supprimer");
    test.setAttribute("id", retest.toString() + "_remove");
    retest++;
    test.setAttribute("role", "button");
    test.setAttribute("type", "button");
    test.setAttribute("onclick", "removeElement(this.id);");
    test.style.width = '6.5vw';
    test.setAttribute("class", "btn btn-danger btn-lg");


    node2.appendChild(node3);
    node4.appendChild(node5);
    node6.appendChild(node7);
    node8.appendChild(node9);
    node10.appendChild(test);

    node.append(node2);
    node.append(node4);
    node.append(node6);
    node.append(node8);
    node.append(node10);


    document.getElementById('addSlotDiv').appendChild(node);
    cnt++;
}

function createUserRow() {

    let node = document.createElement("tr");


    let node2 = document.createElement("td");
    let node4 = document.createElement("td");
    let node6 = document.createElement("td");
    let node12 = document.createElement("td");
    let node14 = document.createElement("td");
    let node16 = document.createElement("td");

    let node3 = document.createElement("input");
    node3.setAttribute("name", "email_" + cnt);
    node3.setAttribute("pattern", "([a-zA-Z0-9_\\-.]+)@(([[0-9]{1,3}.[0-9]{1,3}.[0-9]{1,3}.)|(([a-zA-Z0-9-]+.)+))([a-zA-Z]{2,4}|[0-9]{1,3})");
    node3.setAttribute("type", "email");
    node3.setAttribute("required", "true");
    let node5 = document.createElement("input");
    node5.setAttribute("name", "confidentialCode_" + cnt);
    node5.setAttribute("type", "text");
    node5.setAttribute("required", "true");
    let node7 = document.createElement("input");
    node7.setAttribute("name", "event_" + cnt);
    node7.setAttribute("type", "text");
    node7.setAttribute("required", "true");
    let node13 = document.createElement("input");
    node13.setAttribute("name", "surname_" + cnt);
    node13.setAttribute("type", "text");
    node13.setAttribute("required", "true");
    let node15 = document.createElement("input");
    node15.setAttribute("name", "name_" + cnt);
    node15.setAttribute("type", "text");
    node15.setAttribute("required", "true");


    let test = document.createElement("input");
    test.setAttribute("value", "Supprimer");
    test.setAttribute("id", retest.toString() + "_remove");
    retest++;
    test.setAttribute("role", "button");
    test.setAttribute("type", "button");
    test.setAttribute("onclick", "document.getElementById(this.id).parentElement.parentElement.remove();");
    test.style.width = '6.5vw';
    test.setAttribute("class", "btn btn-danger btn-lg");

    node2.appendChild(node3);
    node4.appendChild(node5);
    node6.appendChild(node7);
    node12.appendChild(test);
    node14.appendChild(node13);
    node16.appendChild(node15);

    node.append(node2);
    node.append(node16);
    node.append(node14);

    node.append(node4);
    node.append(node6);
    node.append(node12);

    document.getElementById('addSlotDiv').appendChild(node);
    cnt++;
}


function checkFunction() {
    let mailAdress = document.getElementById('emailEventRegistration').value;
    let name = document.getElementById('nameEventRegistration').value;
    let surname = document.getElementById('surnameEventRegistration').value;
    let mailReg = /^([a-zA-Z0-9_\-\+\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,10})(\]?)$/;
    let nameReg = /^[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]+$/u;
    return (mailReg.test(mailAdress) && nameReg.test(name) && nameReg.test(surname));
}



/*Card Reposition*/

if (window.innerWidth == 768){
    document.addEventListener("DOMContentLoaded", function() {
        document.getElementById("fixResolution").className = 'col-lg-4';
    });
}


/*
var c = document.getElementsByClassName("card");
var windowHeight = window.innerHeight;
var windowWidth = window.innerWidth;

console.log(windowHeight);
if (windowHeight > 700) {
    document.addEventListener("DOMContentLoaded", function () {
        for (let i = 0; i < c.length; i++) {
            c[i].style.marginTop = windowHeight / 7 + "px";
        }
    });
}
*/


/*Card Reposition*/


