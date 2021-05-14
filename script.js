//Define linkData for ajax handling. (Not implemented.)
//var linkData = new Object();

function modifyLink(id,link,displayname,color) {
	$('#link').val(link);
	$('#displayname').val(displayname);
	$('#color').val(color);
	$('#custom-modal').show();
}

//When document is ready start running javascript things.
$( document ).ready(function() {


	$('#addItem').click(function(){
		$('#custom-modal').show();
	});




	//Find the search box.
	var selem = document.getElementById('search-target')

	//If search button is clicked open google with wanted search query.
	$('#search').click(function(){
		window.location.href = "https://www.google.com/search?q="+selem.value;
		//https://s2.googleusercontent.com/s2/favicons?domain=www.heaviside.fi
	});

	//If user clicks X button in modal.
	$('.icon-close').click(function(){
		$('.custom-modal').hide();
	});
    
	/*
	//This is code for possible ajax implementation. I was supposed to do it but i ran out of time as this is a schoolproject.
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
	*/
});

//Update the clock in frontpage.
setInterval(function(){
	var today = new Date();
	//var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
	var minutes = today.getMinutes();
	var hours = today.getHours();

	//Get minutes and hours sometimes returns only 1 letter. This looks bad on page.
	//If it only has one letter add 0 before it.
	if (String(today.getMinutes()).length == 1) {
		minutes = "0" + today.getMinutes();
	}

	if (String(today.getHours()).length == 1) {
		hours = "0" + today.getHours();
	}

	//Create the sting for the website.
	var time = hours + "|" + minutes;

	//Place the clock time into a element whitch has .Timer class.
	$('.Timer').text(time);
}, 1000);
