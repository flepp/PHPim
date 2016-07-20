
$(document).ready(function(){
	//  Ask confirmation before deleting an element
    $("button.delete").click(function(e){
        if(!confirm('Êtes-vous sûr de vouloir supprimer cet élément ?')){
            e.preventDefault();
            return false;
        }
        return true;
    });
    // close notifications
    var closeMsg = $("span.close");
    closeMsg.click(function(){
    	$(this).parent().remove();
    });
});