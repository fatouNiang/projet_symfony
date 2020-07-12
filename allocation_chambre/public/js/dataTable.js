 $(document).ready( function () {
    //  datatable
   $('#dataTable').DataTable({
    "language": {
        "paginate": {
          "next": "suivant",
          "previous": "Precedent",
        }
      },
        "info":     false,
    });
   






    
    // numero de chambre
   $('#chambre_numeroBat').keyup(function (){
    numero= $('#numero').val().toString().padStart(4,'0'); // toString convertit le int récupéré en chaine et padStart ajoute les zeros par exemples en avant du chiffre ( 4 signifie la chaine et 0 le chiffre à ajouter )
    numeroBat=$('#chambre_numeroBat').val();
    c=numeroBat.toString().padStart(3,'0');
    $('#chambre_numero').attr('value',`${c}-${numero}`)
    });

    //  generation des matricule   

    var matricule= $('#etudiant_matricule');

    $('#etudiant_dateNaiss').change(function (){
        date= $('#etudiant_dateNaiss').val().split('-');
        var prenom=  $('#etudiant_prenom').val();
        var nom=  $('#etudiant_nom').val();
        matricule.attr(`value`,`${date[0]}${nom.substr(0,2).toUpperCase()}${prenom.substr((prenom.length)-2).toUpperCase()}${$('#matricule').val().toString().padStart(4,'0')}`)
        console.log(date[0]);
    });



    // generation des champs
    $('#etudiant_bourse').hide();
    $('#etudiant_adresse').hide();
    $('#etudiant_Chambre').hide();
    $('#btn').click(function(){ 

        let nbr=0;
        var typeEtudiant= $('#etudiant_typeEtudiant').val();
        $('#etudiant_typeEtudiant').change(function(){
            $('#btn').show();
            $('#etudiant_bourse').hide();
            $('#etudiant_adresse').hide();
            $('#etudiant_Chambre').hide();
            nbr=0;
        });

            nbr++;
            if(typeEtudiant=='Nonboursier'){
                $('#btn').hide();
                $('#etudiant_bourse').hide();
                $('#etudiant_adresse').show();
                $('#etudiant_Chambre').hide();
            }else if(typeEtudiant=='boursierLoge'){
                $('#btn').hide();
                $('#etudiant_bourse').show();
                $('#etudiant_adresse').hide();
                $('#etudiant_Chambre').show();
            }else{
                $('#btn').hide();
                $('#etudiant_bourse').show();
                $('#etudiant_adresse').hide();
                $('#etudiant_Chambre').hide();
            }
        });
    
    
});
    



