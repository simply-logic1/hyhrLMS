//jQuery time
var current_fs, next_fs, previous_fs; //fieldsets
var left, opacity, scale; //fieldset properties which we will animate
var animating; //flag to prevent quick multi-click glitches

   /* validation register form */
   $('.exist_ans:radio').click(function(){
    return false;
});
   jQuery.validator.setDefaults({
  debug: false,
  success: "valid"
});
  

$('#add_test').submit(function(event){
   var empty=true;

    $('input[type="text"],textarea,select' ).each(function(){
       

   if($(this).val()==""){  
      empty =false;
      $('#show_error').css('display','block');
      return false;
    }

   
 });
     
     if($('input[name="ans_correct_q2"]:checked').length <= 0)
    {
         empty =false;
          $('#show_error').css('display','block');
      return false;
    }
   
     if($('input[name="ans_correct_q1"]:checked').length <= 0)
    {
         empty =false;
      return false;
    }
   

   
    console.log(empty);
    if(empty)
    {
         $('#show_error').css('display','none');
        
    }
    else
    {
        $('#show_error').css('display','block');
       
    }
    return empty;

});
  //  $('#add_test').validate({
  //       rules: {
  //   video_id: {
  //     required: true
  //   },
  //   question[]:
  //   {
  //       required:true
  //   },
  //   answer_qno1:
  //   {
  //       required:true
  //   },
  //   ans_correct_q1:
  //   {
  //       required:true
  //   },
  //      answer_qno2:
  //   {
  //       required:true
  //   },
  //   ans_correct_q2:
  //   {
  //       required:true
  //   },



  // },
  //   success:function(label,element)
  //       {
  //           label.remove();
  //       },
  //           errorPlacement: function(error, element) {
  //           if (element.is(":radio")) {
  //           // error.insertafter(element.parent('.radio'));
            
  //          element.parents('.form-group-inner').after(error);
  //           } else { // This is the default behavior of the script for all fields
  //            error.insertAfter(element.parent('.input-group'));
  //           }
  //       },
  //  });
  var test=$('#user_take_test');
$( "#user_take_test" ).validate({
  rules: {
    answer_q1: {
      required: true
    },
     answer_q2: {
      required: true
    },
     answer_q3: {
      required: true
    },
     answer_q4: {
      required: true
    },
     answer_q5: {
      required: true
    },
     answer_q6: {
      required: true
    },
     answer_q7: {
      required: true
    },
    answer_q8: {
      required: true
    },
    answer_q9: {
      required: true
    },
    answer_q10: {
      required: true
    }
    
  },
    success:function(label,element)
        {
            label.remove();
        },
            errorPlacement: function(error, element) {
            if (element.is(":radio")) {
            // error.insertafter(element.parent('.radio'));
            
           element.parents('.form-group-inner').after(error);
            } else { // This is the default behavior of the script for all fields
             error.insertAfter(element.parent('.input-group'));
            }
        },
   
});

var view_q=$('#view_question').val();
console.log(view_q);


if(view_q=='')
{
    console.log("start first");
    $('fieldset').not( "fieldset:first-of-type" ).css('display','none');

}
else
{
  console.log("specfic");
  var nextque=++view_q;
console.log('question'+view_q+'');
  $('fieldset').not('fieldset.question'+nextque).css('display','none').hide();
  $('fieldset.question'+nextque).css('display','block').show();
}


$(".next").click(function(){
    
   var status=test.valid();
    
    if(!status)
    {
        return false;
    }
    
if(animating) return false;
    animating = true;
   
    current_fs = $(this).parent();
    next_fs = $(this).parent().next();
    console.log("next_fs"+next_fs);
    
    //activate next step on progressbar using the index of next_fs
   

    
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
        //easing: 'easeInOutBack'
    });
});

$(".previous").click(function(){
    if(animating) return false;
    animating = true;
    
    current_fs = $(this).parent();
    previous_fs = $(this).parent().prev();
    
    //de-activate current step on progressbar
 
    
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
        // easing: 'easeInOutBack'
    });
});

// $(".submit").click(function(){
    
//   var no_of_lic=$('#no_of_lic').val();
//         var total_price=$('#total_price ').val();
//         var data=$('.register_form').serializeArray();

//         data.push(
//             {name:'no_of_lic',value:no_of_lic},
//             {name:'total_price',value:total_price}


//             );
      
//         console.log("data"+data);
        
//         $.ajax({

//             type:'POST',
//             data:data,
//             url:baseURL+'add_user',
//             success:function(data)
//             {
//                 console.log("data"+data);
                
//                 if(data)
//                 {


//                     $('.full_form').hide();
//                     $('.register-msg').css('display','block').html('<fieldset><h1 class="text-center mb-20"><h1>Lorem Ipsum</h1><p>Thank You registering with us. Please check your email for confirmation</p> <p> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>  </fieldset>');

                    
                    
//                 }
//                 else
//                 {
//                     $('.full_form').hide();
//                     $('.register-msg').css('display','block').html('<fieldset><h1 class="text-center mb-20">Error</h1><p>Sorry DB Error Occured .Please try again</p>   </fieldset>');
                     
//                 }
                
//             },
//             error:function()
//             {
//                 $('.full_form').hide();
//                 $('.register-msg').css('display','block').html('<fieldset><h1 class="text-center mb-20">Error</h1><p>Sorry Error Occured .Please try again</p>   </fieldset>');

//             }
//         });
// })

/* answere store */
$(document).on('click','.answer',function(){

    var answer_id=$(this).val();
    var question_id=$(this).closest('fieldset').find('#question').val();
    var test_id=$('#test_id').val();
    console.log('question'+question_id);
    console.log('answer_id'+answer_id);

         $.ajax({

            type:'POST',
            data:{answer:answer_id,question:question_id,test_id:test_id},
            url:baseURL+'add_emp_tdata',
            success:function(data)
            {
                console.log("data"+data);
                
               
                
            },
            error:function()
            {
                console.log("errror");

            }
        });
})