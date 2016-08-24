// Default content to be loaded
$(document).ready(function(){
	$('#content-pane').load('nothing.php');
	
	// Handle Clicks
	$('button#btnsearch').on('click',function(){
		alert("wow");
		var key = $('input#txtsearch').val();
		var criteria = $('input[name=txtchoice]:checked').val();
		var str = key + ":" + criteria;
		
		$.post('php/search.php',{txtsearch:str},function(data){
			$('div#content-pane').html(data);
			
		});
		
	});
	
	
	//$('button#btnsearch').click(function(){
	//	$('#content-pane').load('php/search.php');
	//	alert("wow");
	//});
});

