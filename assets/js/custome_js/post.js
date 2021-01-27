$(document).on('click','#post_modal',function(e){
e.preventDefault();
$('#myModal').modal('toggle');

});


$(document).on('change','#category',function(e){
e.preventDefault();
var cat_id = $(this).val();

hitURL = baseURL + "get_subcategory";
	$.ajax({
	     type: "POST",
	     url: hitURL,
	     data:{ category_id : cat_id },
	     success: function (data) {
	     	var obj = JSON.parse(data);
			if(obj.status){
				$('#subCat').html(obj.data);
			}
			return false;
	     }
	 });
	 return false; 
});


function filePreview(input) {
    if (input.files && input.files[0]) { 
        var reader = new FileReader();
        reader.onload = function (e) {
			$('#category_img_preview + img').remove();
            $('#category_img_preview').after('<img src="'+e.target.result+'" width="250" height="100"/>');
        };
        reader.readAsDataURL(input.files[0]);
    }

}

$("#image").change(function () {
    filePreview(this);
});

var addPostForm = $("#myform");
	
var validator = addPostForm.validate({
	
	rules:{
		title :{ required : true },
		cat: { required : true },
		subCat: { required : true },
		image: { required : true },
		content: { required : true }
	},
	messages:{
		title :{ required : "The Post title field is required" },
		cat : { required : "The Post category field is required" },
		subCat : { required : "The Post subcategory field is required" },
		image : { required : "The Post image field is required" },
		content : { required : "The Post content field is required" }
	},
	submitHandler: function (form) {
             
			hitURL = baseURL + "add_post";
			var data = new FormData(document.getElementById("myform"));
			$.ajax({
                 type: "POST",
                 url: hitURL,
                 data:data,
			     processData:false,
			     contentType:false,
			     cache:false,
			     async:false,
			     beforeSend: function () {
				$("#posting").prop("disabled", true);
				$("#posting").text("POSTING...");
				},
                 success: function (data) {
                 	$("#posting").prop("disabled", false);
                 	$("#posting").text("POST");
                 	var obj = JSON.parse(data);
					if(obj.status){
						$('#error_box').removeClass('alert-danger');
						$('#error_box').addClass('alert-success');
                 		$('#error_box').css('display','block');
                 		$('.error_text').text(obj.msg);

                 		window.setTimeout(function(){
                 			window.location.href = baseURL + "home";
                 		},3000)
                 	}else{
                 		$('#error_box').css('display','block');
                 		$('.error_text').text(obj.msg);
                 	}    
                 }
             });
             return false; // required to block normal submit since you used ajax
         }
});


$(document).on('click','.update_like',function(e){
e.preventDefault();

var post_id = $(this).attr('id');
var like = $('#like_counter_'+post_id).text();
	
	hitURL = baseURL + "update_like";
	$.ajax({
	     type: "POST",
	     url: hitURL,
	     data:{ post_id : post_id },
	     success: function (data) {
	     	var obj = JSON.parse(data);
			if(obj.status){
				
			document.getElementById('like_counter_'+post_id).innerHTML = obj.updated_count;
				
			}
			return false;
	     }
	 });
	 return false;
});


$(document).on('click','.delete_post',function(e){
e.preventDefault();
var post_id = $(this).attr('id');

	hitURL = baseURL + "delete_post";
	$.ajax({
	     type: "POST",
	     url: hitURL,
	     data:{ post_id : post_id },
	     success: function (data) {
	     	var obj = JSON.parse(data);
			if(obj.status){
				$('#error_post_del_'+post_id).removeClass('alert-danger');
				$('#error_post_del_'+post_id).addClass('alert-success');
         		$('#error_post_del_'+post_id).css('display','block');
         		$('.error_post_del_text_'+post_id).text(obj.msg);


         		window.setTimeout(function(){
         			$('#error_post_del_'+post_id).css('display','none');
         			$('#post_card_'+post_id).remove();
         		},3000)
			}else{

			}
			return false;
	     }
	 });
	 return false;
});
