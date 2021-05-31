$(document).ready(() => {
$("#search").on('propertychange input', () => {
	searchInput = $('#search').val()
	categories = $('#categories');
	$('#categories').empty();
	
	$.post("search.php",
		{search: searchInput},
		function(data){
			results = JSON.parse(data);
			
			for (var i = 0; i < results[0][0].length; i++) {
				
				cat = document.createElement('a');
				cat.className = 'displayPic';

				cat_src = "http://localhost/Binary-Beasts/forum/topic.php?topic_id="+results[0][0][i]+"&topic_subject="+results[0][1][i]
				cat.setAttribute('href', cat_src);
				cat.innerHTML = results[0][1][i];
				div = document.createElement('div')
				div.append(cat)
				
				categories.append(div);
			}
			if ($("#search").val().length == 0){
				$('#categories').empty();
			}
		})
	})


});