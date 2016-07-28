
$(document).ready(function(){
    /*---------------------------------------------------------------------------------------*/
    /*---------------------------------CONFIRM ALL REQUEST-----------------------------------*/
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
    	$(this).parent().fadeOut('slow');
    });
    //Ask confirmation before updating an element
    $("button.update").click(function(e){
        if(!confirm('Confimez-vous les changements apportés?')){
            e.preventDefault();
            return false;
        }
        return true;
    });
    /*-----Asking to enable or disable a session------*/
    $("button.enableSession").click(function(e){
        if(!confirm('Attention!! Cette action activera tous les étudiants liés à cette session. Êtes-vous sûr?')){
            e.preventDefault();
            return false;
        }
        return true;
    });
    $("button.disableSession").click(function(e){
        if(!confirm('Attention!! Cette action désactivera tous les étudiants liés à cette session. Êtes-vous sûr?')){
            e.preventDefault();
            return false;
        }
        return true;
    });
    /*-----Asking to enable or disable a session------*/
    $("button.enableStudent").click(function(e){
        if(!confirm('Attention!! Cette action réactivera cet étudiant. Êtes-vous sûr?')){
            e.preventDefault();
            return false;
        }
        return true;
    });
    $("button.disableStudent").click(function(e){
        if(!confirm('Attention!! Cette action désactivera cet étudiant. Êtes-vous sûr?')){
            e.preventDefault();
            return false;
        }
        return true;
    });
    /*-----Confirm invitations------*/
    $("button.confirmation").click(function(e){
        if(!confirm('Confirmez-vous les invitations?')){
            e.preventDefault();
            return false;
        }
        return true;
    });

    /*--------------------------------- END CONFIRM ALL REQUEST-----------------------------------*/
    /*---------------------------------------------------------------------------------------*/
    var btnEdit = $(".button_edit");
    btnEdit.click(function(e){
        e.preventDefault();
        $(this).parent().children(".show_edit").fadeIn('slow');
        $(this).fadeOut('slow');
    });
});

/*--------------------------------- API MANAGEMENT -----------------------------------*/

function initMap() {
    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 15,
        center: {lat: 49.50088, lng: 5.98609}
    });
    var geocoder = new google.maps.Geocoder();
        geocodeAddress(geocoder, map);
}

function geocodeAddress(geocoder, resultsMap) {
    var address = document.getElementById('address').value;
    geocoder.geocode({'address': address}, function(results, status) {
        if (status === google.maps.GeocoderStatus.OK) {
            resultsMap.setCenter(results[0].geometry.location);
            var marker = new google.maps.Marker({
                map: resultsMap,
                position: results[0].geometry.location
        });
        } else {
          alert('Geocode was not successful for the following reason: ' + status);
        }
    });

}
