
var linkData = new Object();


$( document ).ready(function() {
	var selem = document.getElementById('search-target')
    
	$('#addItem').click(function(){
		$('#custom-modal').show();
	});

	$('#addLink').click(function(){


		var lcontent = $('#linkvalue').val();
		linkData[lcontent] = {};
		linkData[lcontent]['color'] = "#eb3489";
		linkData[lcontent]['openas'] = "blank";
		console.log(linkData);

		var template = `
		<a class="col-6 col-sm-6 col-md-3" href="`+lcontent+`">
			<div class="offset-1 offset-sm-1 offset-md-1 col-10 col-sm-10 col-md-10 item">
			<div class="row">
				<div class="col-md-12 bc">
				`+lcontent+`
				</div>
				<div class="col-md-12 linktext">
					<span>`+lcontent+`</span>
				</div>
			</div>
			</div>
		</a>`;

		console.log(template);
		$('#link-wrapper').prepend(template);
		$('#linkvalue').val("");
		$('#custom-modal').hide();
	});

	$('#search').click(function(){
		window.location.href = "https://www.google.com/search?q="+selem.value;
		//https://s2.googleusercontent.com/s2/favicons?domain=www.heaviside.fi
	});

	$('.icon-close').click(function(){
		$('.custom-modal').hide();
	});



});


setInterval(function(){
	var today = new Date();
	var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
	$('.Timer').text(time);
}, 1000);


$('body').on('click', '#open-link', function() {
	console.log($(this).data);
 });