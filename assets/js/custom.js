$("#searchBox").keyup(function(){

	var data = document.getElementById('searchBox').value;
	$.post('http://localhost/social/search/', {keyword : data}, function(returnData, status){
		
		if(returnData == ""){
			document.getElementById('searchResultBox').innerHTML = "<ul></ul>";	
		}
		document.getElementById('searchResultBox').innerHTML = returnData;

	});	
});

$("#notiBtn").click(function(){	
	$("#notificationBox").toggle();
});