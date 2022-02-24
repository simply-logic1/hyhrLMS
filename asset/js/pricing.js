  $(document).ready(function(){

  

    //$(document).on('click','#get_started',function(e){

    //         console.log("stated month");
    //         var mem=$(this).data('value');
    //         var plan;
    //         if(mem==1)
    //         {
    //           plan="<h1>Professional Plan</h1>";
    //           $('#plan_id').val('1');
    //         }
    //         if(mem==6)
    //         {
    //           plan="<h1>Premium Plan</h1>";
    //              $('#plan_id').val('6');
    //         }
    //         if(mem==12)
    //         {
    //           plan="<h1>Enterprise Plan</h1>";
    //              $('#plan_id').val('12');
    //         }

    //         console.log("mem"+mem);
    //         $('#pricing_menu').hide();
    //         $('#plan_title').html(plan);
    //         $('#pricing_details').show();



    // });

    /* increment and decrement button */

    var quantitiy=0;
   $('.quantity-right-plus').click(function(e){
        
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        var quantity = parseInt($('#no_of_lic').val());
        
        // If is not undefined
            
            $('#no_of_lic').val(quantity + 1);
             var price=$('#price').val();
          var no_of_mem=$('#no_of_lic').val();

          var total=price*no_of_mem;
          $('#total_price').val(total);
          console.log("total"+total);


          
            // Increment
        
    });

     $('.quantity-left-minus').click(function(e){
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        var quantity = parseInt($('#no_of_lic').val());
        
        // If is not undefined
    
            if(quantity==2)
            {
              
              $('.quantity-left-minus').hide();
              return false;
            }
            // Increment
            if(quantity>0){
            $('#no_of_lic').val(quantity - 1);
            }
               console.log("val"+quantity);
        var price=$('#price').val();
          var no_of_mem=$('#no_of_lic').val();

          var total=price*no_of_mem;
          $('#total_price').val(total);
          console.log("total"+total);


    });
      
      /* */
      $('#no_of_lic').on('change',function(){
alert("rrr");
          var price=$('#price').val();
          var no_of_mem=$('#no_of_lic').val();

          var total=price*no_of_mem;
          $('#total_price').val(total);
          console.log("total"+total);

      });
   });