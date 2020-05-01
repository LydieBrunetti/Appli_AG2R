/*Pop Up Creation*/

const button = document.getElementsByClassName("registerButtonsIndex");
const names = document.getElementsByClassName("jsName");

for (let c = 0; c < button.length; c++) {
    button[c].addEventListener("click", function () {
        bootbox.dialog({
            message: "Voulez-vous vous inscrire a l'evenement " + names[c].value + "?",
            buttons: {
                Oui: {
                    label: 'Oui',
                    className: 'btn-primary',
                    callback: function () {

                    }
                },
                Non: {
                    label: 'Non',
                    className: 'btn-danger',
                    callback: function () {

                    }
                }
            }
        });
    });
}


/*Pop Up Creation*/