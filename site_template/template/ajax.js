jQuery(document).ready( function($) {

//pavel
	//ready
	$("#category").ready(function(){
		id = $('#category').val();
	    id_marka = $('#sid_marka').val();
	    id_model = $('#sid_model').val();
	    $("#marka").load("includes/ajax.php", {'task': 'marka','id':id,'id_marka':id_marka});
	    $("#model").load("includes/ajax.php", {'task': 'model','id':id_marka,'id_model':id_model});
	});	
	
	$("#category").change(function(){
	    id = $('#category').val();
	    $("#marka").load("includes/ajax.php", {'task': 'marka','id':id});
	    /*$.ajax({
   			type: "GET",
   			url: "includes/ajax.php",
   			data: "task=marka&id="+id,
   			success: function(msg){
     			alert( "Data Saved: " + msg );
   			}
 		});*/
		$("#dop_complect").load("includes/ajax.php", {'task': 'complect1','id':id});
		$("#dop_complect2").load("includes/ajax.php", {'task': 'complect2','id':id});
	    id = $('#marka').val();
		$("#model").load("includes/ajax.php", {'task': 'model','id':id});		
	});
	
	$("#marka").change(function(){
	    id = $('#marka').val();
		$("#model").load("includes/ajax.php", {'task': 'model','id':id});
	});
	
      var button = $('#button1'), interval;
      var status = $('#status'), interval;
	  new Ajax_upload('#button1',{
		//action: 'upload-test.php', // I disabled uploads in this example for security reasons
		action: 'includes/upload.php', 
		name: 'myfile',
		onSubmit : function(file, ext){
			// change button text, when user selects file			
		    status.text('Загрузка');
			
			// If you want to allow uploading only 1 file at time,
			// you can disable upload button
			this.disable();
			// Uploding -> Uploading. -> Uploading...
			interval = window.setInterval(function(){
				var text = status.text();
				if (text.length < 13){
					status.text (text + '.');					
				} else {
					status.text('Загрузка');				
				}
			}, 200);			
			
		},
		onComplete: function(file, response){

			status.text('Загружен');
						
			window.clearInterval(interval);
						
			// enable upload button
			this.enable();
			
			// add file to the list
			//$('<li></li>').appendTo('.files').text(response);									
			$('<li></li>').appendTo('.files').html(response);
		}
	});		  
      var button2 = $('#button_2'), interval;
      var status2 = $('#status'), interval;
	  new Ajax_upload('#button_2',{
		//action: 'upload-test.php', // I disabled uploads in this example for security reasons
		action: 'includes/upload_company.php', 
		name: 'myfile',
		onSubmit : function(file, ext){
			// change button text, when user selects file			
		    status2.text('Загрузка');
			
			// If you want to allow uploading only 1 file at time,
			// you can disable upload button
			this.disable();
			// Uploding -> Uploading. -> Uploading...
			interval = window.setInterval(function(){
				var text = status2.text();
				if (text.length < 13){
					status2.text (text + '.');					
				} else {
					status2.text('Загрузка');				
				}
			}, 200);			
			
		},
		onComplete: function(file, response){

			status2.text('Загружен');
						
			window.clearInterval(interval);
						
			// enable upload button
			this.enable();
			
			// add file to the list
			//$('<li></li>').appendTo('.files').text(response);		
			$('#files').append(response);
			//$('').appendTo('.files').html(response);
		}
	});	  
//pavel
});