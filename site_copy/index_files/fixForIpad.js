function fixForIpad(id, dt){
if (dt != 1) {
document.getElementById(id).style.display='none';
} else {
document.getElementById(id).style.display='block';	
}
	
}


function fixForIpadP(id, dt){
if (dt != 1) {
document.getElementById(id).style.visibility='hidden';
} else {
document.getElementById(id).style.visibility='visible';	
}
	
}



function sendformed(id) {
	
var name=document.getElementById(id+'_name').value;
var phone=document.getElementById(id+'_phone').value;
	
			
            $.ajax({
            type: "POST", 
            url: "send.php", 
           data: {name: name, phone: phone, form_id: 1},
            success: function() {
                   alert("Спасибо, Ваше сообщение отправлено!");
				   	
location.reload();


				   }
            ,
            error: function() {
                   alert("Ошибка отправки!");
				   	
location.reload();


            }
    });
	


 }   

 
 
 
function sendform(id) {
	
var name=document.getElementById(id+'_name').value;
var phone=document.getElementById(id+'_phone').value;
var email=document.getElementById(id+'_email').value;
var mess=document.getElementById(id+'_mess').value;
	
			
            $.ajax({
            type: "POST", 
            url: "send.php", 
           data: {name: name, phone: phone, message: mess, email: email, form_id: 2},
            success: function() {
                   alert("Спасибо, Ваше сообщение отправлено!");
				   	
location.reload();


				   }
            ,
            error: function() {
                   alert("Ошибка отправки!");
				   	
location.reload();


            }
    });
	

 }   
 


