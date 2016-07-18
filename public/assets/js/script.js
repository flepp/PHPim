
$(document).ready(function(){
    $("button#delete").click(function(e){
        if(!confirm('Êtes-vous sûr de vouloir supprimer cet élément ?')){
            e.preventDefault();
            return false;
        }
        return true;
    });
});