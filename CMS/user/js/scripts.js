bkLib.onDomLoaded(nicEditors.allTextAreas);

// select all posts jquery to change status

$(document).ready(function() {


$('#selectAllBoxes').click(function (event) {
	
if (this.checked) {

	$('.checkBoxes').each(function () {
		
		this.checked = true;

	});

} else {

	$('.checkBoxes').each(function () {
		
		this.checked = false;

	});
}

});

});

//FUNCTION FOR AUTO REFRESH USERS ONLINE
function loadUsersOnline(){

	$.get("functions.php?onlineusers=result", function(data){

		$(".usersonline").text(data);
	});
}

//FETCH DATA FROM DATBASE 
setInterval(function(){

	loadUsersOnline();

},500);			//500 mili second ,1s
