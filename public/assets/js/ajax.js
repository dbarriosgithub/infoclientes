$(function(){

	$.ajaxSetup({
   			headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
		});

	addAndEditUsingAjax();
	deleteUsingAjax();

});

function addAndEditUsingAjax(){

	$('#btn-form').click(function(event) {
       event.preventDefault();
      ajaxSave('#jobForm');
       
	});

	$('#btnguardarcompany').click(function(event) {
       event.preventDefault();
        ajaxSave('#companyForm');
	});

	function ajaxSave(Id){
     

          alert($(Id).attr('action'));
	    
		   $.ajax({
			url: $(Id).attr('action'),
			type: 'POST',
			data: $(Id).serialize(),
			dataType: 'html',
			success: function(result){
				
				if ($(Id).find("input:first-child").attr('value') == 'PUT') {
					redirectPage(result);
				}
				else{
					$(Id)[0].reset();
					printSuccessMessage(result);
				}
			},
			error: function(){
				console.log('Error');
			}
		});
    }
} 





function printSuccessMessage(message){

	$("#success_message").append(
	'<div id="myAlert" class="alert alert-success">'+
		'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>'+
	'</button>'+
	'<div id="message">'+ jQuery.parseJSON(message).message +'</div>'+
'</div>'
	);

    
    if(jQuery.parseJSON(message).empresa!="undefined")	
     $("#con_Idcorporation").attr("value",jQuery.parseJSON(message).empresa);

	 $("#myAlert").delay(3000).fadeOut();
}

function redirectPage(result){
	var $jsonObject = jQuery.parseJSON(result);
	$(location).attr('href',$jsonObject.url);
}
