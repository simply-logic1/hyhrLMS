//jQuery time
var current_fs, next_fs, previous_fs; //fieldsets
var left, opacity, scale; //fieldset properties which we will animate
var animating; //flag to prevent quick multi-click glitches

   /* validation register form */
   jQuery.validator.setDefaults({
  debug: false,
  success: "valid"
});
  var register=$('.register_form');
// $( ".register_form" ).validate({
//   rules: {
//     field: {
//       required: true
//     }
//   }
// });
$('#change_password').validate({
    
   
    	 rules: {
            "password": {
                required: true,
                
            },
            "cpassword":
            {
            	required:true,
            	equalTo:'#password'
            }

          },
           messages: {
            "password": {
                required: "Please enter password"
            },
            "last_name": {
                required: "Please enter confirm password",
                equalTo:"Password not match"
               
            },
        },
});
$('.register_form').validate({
    
   
    	 rules: {
            "first_name": {
                required: true,
                
            },
            "last_name": {
                required: true,
                
            },
            "primary_email":
            {
                required: true,
                email: true,
                remote:
                {
                	url:baseURL+'check_exist_email',
                	type:"POST",
                	data:
                	{
                		email:function()
                		{
                			return $('#primary_email').val();
                		}
                	}
                }
            },
             "confirm_email":
            {
                required: true,
                email: true,
                equalTo:'#primary_email'
               
            },
            "phone":
            {
            	number:true
            },

              "company_name":
            {
                required: true
               
            },
              "no_of_emp":
            {
                required: true,
                number:true
                
            },
            "no_of_mem":
            {
            	required:true
            },
            "no_of_month":
            {
            	required:true
            }
          

        },
        messages: {
            "first_name": {
                required: "Please enter a First Name"
            },
            "last_name": {
                required: "Please enter an Last Name",
               
            },
             "primary_email":
            {
                required: "Please enter an Primary Mail",
                email: "Enter valid Mail",
                remote:"Email address already there"
            },
             "confirm_email":
            {
                 required: "Please enter an Confirm Mail",
                email: "Enter valid Mail",
            
                equalTo:"Email address not match"
            },
              "company_name":
            {
                required: "Please enter an Company Name"
               
            },
              "no_of_emp":
            {
                required: "Please enter an no of employee"
                
            },
             "no_of_mem":
            {
            	required:"Please select on option"
            },
            "no_of_month":
            {
            	required:"Please select on option"
            }
          

           
        }

    

});

$(".next").click(function(){
	
	var status=register.valid();
    var rname=$('#first_name').val();
    var lname=$('#last_name').val();
    var comp=$('#company_name').val();
    var remail=$('#primary_email').val();
    var rphone=$('#phone').val();
    
    $('#name').html(rname+' '+ lname);
     $('#cname').html(comp);
      $('#email').html(remail);
       $('#mobile').html(rphone);
    
	
	if(!status)
	{
		return false;
	}
	
if(animating) return false;
	animating = true;
	
	current_fs = $(this).parent();
	next_fs = $(this).parent().next();

	
	//activate next step on progressbar using the index of next_fs
	$("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

	
	//show the next fieldset
	next_fs.show(); 

	//hide the current fieldset with style
	current_fs.animate({opacity: 0}, {
		step: function(now, mx) {
			//as the opacity of current_fs reduces to 0 - stored in "now"
			//1. scale current_fs down to 80%
			scale = 1 - (1 - now) * 0.2;
			//2. bring next_fs from the right(50%)
			left = (now * 50)+"%";
			//3. increase opacity of next_fs to 1 as it moves in
			opacity = 1 - now;
			current_fs.css({
        'transform': 'scale('+scale+')',
        'position': 'absolute'
      });
			next_fs.css({'left': left, 'opacity': opacity});
		}, 
		duration: 800, 
		complete: function(){
			current_fs.hide();
			animating = false;
		}, 
		//this comes from the custom easing plugin
		easing: 'easeInOutBack'
	});
});

$(".previous").click(function(){
	if(animating) return false;
	animating = true;
	
	current_fs = $(this).parent();
	previous_fs = $(this).parent().prev();
	
	//de-activate current step on progressbar
	$("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
	
	//show the previous fieldset
	previous_fs.show(); 
	//hide the current fieldset with style
	current_fs.animate({opacity: 0}, {
		step: function(now, mx) {
			//as the opacity of current_fs reduces to 0 - stored in "now"
			//1. scale previous_fs from 80% to 100%
			scale = 0.8 + (1 - now) * 0.2;
			//2. take current_fs to the right(50%) - from 0%
			left = ((1-now) * 50)+"%";
			//3. increase opacity of previous_fs to 1 as it moves in
			opacity = 1 - now;
			current_fs.css({'left': left});

			previous_fs.css({'transform': 'scale('+scale+')','opacity': opacity});
		}, 
		duration: 800, 
		complete: function(){
			previous_fs.css({'position':''});
			current_fs.hide();
			animating = false;
		}, 
		//this comes from the custom easing plugin
		easing: 'easeInOutBack'
	});
});

$(".submit").click(function(){
	
  var no_of_lic=$('#no_of_lic').val();
        var total_price=$('#total_price ').val();
	 	var data=$('.register_form').serializeArray();

        data.push(
            {name:'no_of_lic',value:no_of_lic},
            {name:'total_price',value:total_price}


            );
      
	 	console.log("data"+data);
	 	
	 	$.ajax({

	 		type:'POST',
	 		data:data,
	 		url:baseURL+'add_user',
	 		success:function(data)
	 		{
	 			console.log("data"+data);
	 			
	 			if(data)
	 			{


	 				$('.full_form').hide();
	 				$('.register-msg').css('display','block').html('<fieldset><p>Thank You registering with us. Please check your email for confirmation</p>  </fieldset>');

	 				
	 				
	 			}
	 			else
	 			{
	 				$('.full_form').hide();
	 				$('.register-msg').css('display','block').html('<fieldset><h1 class="text-center mb-20">Error</h1><p>Sorry DB Error Occured .Please try again</p>   </fieldset>');
	 				 
	 			}
	 			
	 		},
	 		error:function()
	 		{
	 			$('.full_form').hide();
	 			$('.register-msg').css('display','block').html('<fieldset><h1 class="text-center mb-20">Error</h1><p>Sorry Error Occured .Please try again</p>   </fieldset>');

	 		}
	 	});
})