$(document).ready(function(){
	
	$("#delete").on('click', function(e){
		
		confirm('Are you sure you want to delete this store?', function(response){
			if (response == true) {
				 return true;
			}
		});
	});

})