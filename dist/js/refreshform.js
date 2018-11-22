$(document).ready(function(){  
$("#submit").click(function(){
var id = $("#lan_name").val();
var name = $("#l_name").val();
var p_id = $("#plant_id").val();
var b_id = $("#book_id").val();

if(name ==''|| id==''|| p_id==''|| b_id==''){
alert("Some Fields are Blank....!!");   	
}
else{
// Returns successful data submission message when the entered information is stored in database.
$.post("refreshform.php",{ name1: name, id1: id, p_id1: p_id, b_id1: b_id},
			function(data) {
			alert(data);
			$('#form')[0].reset(); //To reset form fields
			});
    
    }
});
});
