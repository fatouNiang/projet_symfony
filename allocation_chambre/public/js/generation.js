// {# scripte pour la generation des champs de lenregistrement des etudiants  #}

$(document).ready(function(){
    $('#etudiant_bourse').hide();
    $('#etudiant_adresse').hide();
    $('#etudiant_Chambre').hide();
    var typeEtudiant= $('etudiant_typeEtudiant').val();
    $(typeEtudiant).change(function(){
        if(typeEtudiant=='Nonboursier'){
            $('#etudiant_bourse').hide();
            $('#etudiant_adresse').show();
            $('#etudiant_Chambre').hide();
        }else if(typeEtudiant=='boursierLoge'){
            $('#etudiant_bourse').show();
            $('#etudiant_adresse').hide();
            $('#etudiant_Chambre').show();
        }else{
            $('#etudiant_bourse').show();
            $('#etudiant_adresse').hide();
            $('#etudiant_Chambre').hide();
        }
        alert('ok');
    });

    
    // Function qui génère le numéro d'une chambre

    // $('#chambre_numbat').keyup(function (){
    //     nbrField= $('#nbrfield').val().toString().padStart(4,'0'); // toString convertit le int récupéré en chaine et padStart ajoute les zeros par exemples en avant du chiffre ( 4 signifie la chaine et 0 le chiffre à ajouter )
    //     numBatiment=$('#chambre_numbat').val();
    //     c=numBatiment.toString().padStart(3,'0');
    //     $('#chambre_numchambre').attr('value',`${c}-${nbrField}`)
    // });
});



// Function qui génère les champs

$(document).ready(function() {
    // alert('ok');

    // $('#etudiant_adresse').hide();
    // $('#etudiant_chambre').hide();
    // $('#addInput').click(function() {

    //     let nbr=0;
    //     $('#etudiant_typeetudiant').change(function () {
    //         $('#addInput').show();
    //         $('#etudiant_adresse').hide();
    //         $('#etudiant_chambre').hide();
    //         nbr=0;
    //     });

    //     nbr++;
    //     let choix = $('#etudiant_typeetudiant').val();
    //     if (choix === "boursiernonloge" || choix === "nonboursier") {
    //         $('#addInput').hide();
    //         $('#etudiant_adresse').show();
    //     }else if (choix === "boursierloge") {
    //         $('#addInput').hide();
    //         $('#etudiant_chambre').show();
    //     }
    // });

    // Function qui génère le numéro d'une chambre

    // $('#chambre_numbat').keyup(function (){
    //     nbrField= $('#nbrfield').val().toString().padStart(4,'0'); // toString convertit le int récupéré en chaine et padStart ajoute les zeros par exemples en avant du chiffre ( 4 signifie la chaine et 0 le chiffre à ajouter )
    //     numBatiment=$('#chambre_numbat').val();
    //     c=numBatiment.toString().padStart(3,'0');
    //     $('#chambre_numchambre').attr('value',`${c}-${nbrField}`)
    // });

    // // Function qui génère le matricule d'un etudiant

    // var matricule= $('#etudiant_matricule');

    // $('#etudiant_datenaissance').change(function (){
    //     date= $('#etudiant_datenaissance').val().split('-');
    //     var prenom=  $('#etudiant_prenom').val();
    //     var nom=  $('#etudiant_nom').val();
    //     matricule.attr(`value`,`${date[0]}${nom.substr(0,2).toUpperCase()}${prenom.substr((prenom.length)-2).toUpperCase()}${$('#matricule').val().toString().padStart(4,'0')}`)
    //     console.log(date[0]);
    // });

});