$(document).ready(function(){





let ids, selectedRow,selectedRow1,empid;

let testids, selectedTestRow,selectedTestRow1,testid;

let allDoc=$('#docTable').DataTable();

let alltest=$('#allTest').DataTable({



 columnDefs: [ {

         

              orderable: false,

        className: 'select-checkbox',

        targets: 0



        } ],

        select: {

            style:    'multi',

            selector: 'td:first-child',



        },

        order: [[ 1, 'asc' ]],

         dom: 'Bfrtip',

        buttons: [

              { extend: 'csv', text: '<i class="fa fa-download data-fa-btn"></i>Download',



                className:"btn btn-primary btn-datatable"

               },

              {

                extend: 'collection',

                text: '<i class="fa fa-trash data-fa-btn"></i>Delete',

                className:"btn btn-danger btn-datatable confirm-del-emp",

                enabled:false,

                action:function()

                {

                  



                  $('#del_empmodel').modal('show');

                  

                

                  

                  $('#del_empmodel .modal-footer button').on('click',function(event){

                       

                       var $button=$(event.target);

                         $(this).closest('.modal').one('hidden.bs.modal', function() {



                    $('.modal-body-del').html('Are You sure want to delete Test ?');

                  

                         

              if($button[0].id=='confirm-del-btn')

              {

                var remove_ids=testid;

              

                $.ajax({

                type:'POST',

                data:{'ids':remove_ids},

                url:baseURL+'del_test',

                success:function(data)

                {

                  console.log("del emp");

                    alltest.rows('.selected').remove().draw(false);

                  

                    alltest.button(1).disable();

                    $('.analytics-sparkle-area').reload();



                    

                },

                error:function(data)

                {

                  console.log("error ");

                }

              });

            }

            else

            {

              

               alltest.rows('.select-checkbox').deselect();

              $("th.select-checkbox").removeClass("selected");

            }

             });

                        



                  });



          

        

                }

             }

        ]





});

alltest.on("click", "th.select-checkbox", function() {

  console.log("selectcheckbox");

    if ($("th.select-checkbox").hasClass("selected")) {

      console.log("deselectcheckbox");

        alltest.rows('.select-checkbox').deselect();

        $("th.select-checkbox").removeClass("selected");

    } else {

      console.log("selectcheckbox");

        alltest.rows('.select-checkbox').select();

        $("th.select-checkbox").addClass("selected");

    }

});

alltest.on("select deselect", function() {

    console.log("Some selection or deselection going on");

 testid = $.map(alltest.rows('.selected').data(), function (item) {



        //return item[0];

        return $(item[0]).val();

    });

  /*count select row */

   selectedTestRow1=alltest.rows({selected:true}).count();

  alltest.button(1).enable(selectedTestRow1>0);

  console.log("selectedrow".selectedTestRow1);

    console.log(empid)

    if (alltest.rows({

            selected: true

        }).count() !== alltest.rows().count()) {

        $("th.select-checkbox").removeClass("selected");

    } else {

        $("th.select-checkbox").addClass("selected");

    }

});

/* Emp table dataTable */

let allemp=$('#allemp').DataTable({

         columnDefs: [ {

         

              orderable: false,

        className: 'select-checkbox',

        targets: 0



        } ],

        select: {

            style:    'multi',

            selector: 'td:first-child',



        },

        order: [[ 1, 'asc' ]],

         dom: 'Bfrtip',

        buttons: [

              { extend: 'csv', text: '<i class="fa fa-download data-fa-btn"></i>Download',



                className:"btn btn-primary btn-datatable"

               },

              {

                extend: 'collection',

                text: '<i class="fa fa-trash data-fa-btn"></i>Delete',

                className:"btn btn-danger btn-datatable confirm-del-emp",

                enabled:false,

                action:function()

                {

                  



                  $('#del_empmodel').modal('show');

                  

                

                  

                  $('#del_empmodel .modal-footer button').on('click',function(event){

                       

                       var $button=$(event.target);

                         $(this).closest('.modal').one('hidden.bs.modal', function() {



                    $('.modal-body-del').html('Are You sure want to delete employee ?');

                  

                         

              if($button[0].id=='confirm-del-btn')

              {

                var remove_ids=empid;

              

                $.ajax({

                type:'POST',

                data:{'ids':remove_ids},

                url:baseURL+'del_emp',

                success:function(data)

                {

                  console.log("del emp");

                    allemp.rows('.selected').remove().draw(false);

                  

                    allemp.button(1).disable();

                    $('.analytics-sparkle-area').reload();



                    

                },

                error:function(data)

                {

                  console.log("error ");

                }

              });

            }

            else

            {

              

               allemp.rows('.select-checkbox').deselect();

              $("th.select-checkbox").removeClass("selected");

            }

             });

                        



                  });



          

        

                }

             }

        ]



});

allemp.on("click", "th.select-checkbox", function() {

  console.log("selectcheckbox");

    if ($("th.select-checkbox").hasClass("selected")) {

      console.log("deselectcheckbox");

        allemp.rows('.select-checkbox').deselect();

        $("th.select-checkbox").removeClass("selected");

    } else {

      console.log("selectcheckbox");

        allemp.rows('.select-checkbox').select();

        $("th.select-checkbox").addClass("selected");

    }

});

allemp.on("select deselect", function() {

    console.log("Some selection or deselection going on");

 empid = $.map(allemp.rows('.selected').data(), function (item) {



        //return item[0];

        return $(item[0]).val();

    });

  /*count select row */

   selectedRow1=allemp.rows({selected:true}).count();

  allemp.button(1).enable(selectedRow1>0);

  console.log("selectedrow".selectedRow1);

    console.log(empid)

    if (allemp.rows({

            selected: true

        }).count() !== allemp.rows().count()) {

        $("th.select-checkbox").removeClass("selected");

    } else {

        $("th.select-checkbox").addClass("selected");

    }

});



/* End of Emp table dataTable */

 let invite= $('#invite_pending').DataTable({



     columnDefs: [ {

         

              orderable: false,

        className: 'select-checkbox',

        targets: 0



        } ],

        select: {

            style:    'multi',

            selector: 'td:first-child',



        },

        order: [[ 1, 'asc' ]],

         dom: 'Bfrtip',

        buttons: [

              { extend: 'csv', text: '<i class="fa fa-download data-fa-btn"></i>Download',



                className:"btn btn-primary btn-datatable"

               },

              {

                extend: 'collection',

                text: '<i class="fa fa-trash data-fa-btn"></i>Delete',

                className:"btn btn-danger btn-datatable confirm-del-emp",

                enabled:false,

                action:function()

                {

                  



                  $('#del_empmodel').modal('show');

                  var modal_content;

                  if(ids>1)

                  {

                    modal_content="Are You sure want to delete employees ? ";

                  }

                  else

                  {

                    modal_content="Are You sure want to delete employee";

                  }

                  $('#del_empmodel .modal-footer button').on('click',function(event){

                       

                       var $button=$(event.target);

                         $(this).closest('.modal').one('hidden.bs.modal', function() {

                 

                          $('.modal-body').html('<p>'+modal_content+'</p>')

              if($button[0].id=='confirm-del-btn')

              {

                var remove_ids=ids;

                console.log("ree");

                console.log("remove ids"+remove_ids);

              

                $.ajax({

                type:'POST',

                data:{'ids':remove_ids},

                url:baseURL+'del_emp',

                success:function(data)

                {

                  console.log("del emp");

                    invite.rows('.selected').remove().draw(false);  

                    

                    invite.button(1).disable();

                    $('#del_alert').css('display','block');

        $('#del_alert').fadeIn('slow',function(){

          $('#del_alert').delay(5000).slideUp(500);

        })

                    $('.analytics-sparkle-area').reload();



                    

                },

                error:function(data)

                {

                  console.log("error ");

                }

              });

            }

            else

            {

              

               invite.rows('.select-checkbox').deselect();

              $('tr').removeClass("selected");

            }

             });

                        



                  });



          

        

                }

             }

        ]

  });



invite.on("click", "th.select-checkbox", function() {

  console.log("selectcheckbox");

    if ($("th.select-checkbox").hasClass("selected")) {

      console.log("deselectcheckbox");

        invite.rows('.select-checkbox').deselect();

        $("th.select-checkbox").removeClass("selected");

    } else {

      console.log("selectcheckbox");

        invite.rows('.select-checkbox').select();

        $("th.select-checkbox").addClass("selected");

    }

});

invite.on("select deselect", function() {

    console.log("Some selection or deselection going on");

 ids = $.map(invite.rows('.selected').data(), function (item) {



        //return item[0];

        return $(item[0]).val();

    });

  /*count select row */

   selectedRow=invite.rows({selected:true}).count();

  invite.button(1).enable(selectedRow>0);

    console.log(ids)

    if (invite.rows({

            selected: true

        }).count() !== invite.rows().count()) {

        $("th.select-checkbox").removeClass("selected");

    } else {

        $("th.select-checkbox").addClass("selected");

    }

});

$('#invite_emp_email').on('keyup',function(){



 $('#invite_error').html('');

});

  $('#send_invite_emp').on('click',function(){



    console.log("invite email");

    var email=$('#invite_emp_email').val();

    if(email.length ==0)

        {

            $('#invite_error').html('Please enter email id');

            return false;

        }

        

        var filter =  /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

        if (filter.test(email))

        {

            $('#invite_error').html();

           

        }

        else {

            $('#invite_error').html('Enter Valid email ');

           

            return false;

        }

    $.ajax({



      type:'POST',

      data:{'email':email},

      url:baseURL+'check_email',

      success:function(data)

      {

        //console.log("data"+data);

        $('#invite_alert').css('display','block');

        $('#invite_alert').fadeIn('slow',function(){

          $('#invite_alert').delay(5000).slideUp(500);

        })



          

            $('#invite_msg').html(data);





        

          

           $('#invite_emp_email').val('');

          

      },

      error:function(data)

      {

        //console.log("data"+data);

      }

    });







  });



      /* assign video to employee */

      $("#checkAllEmp").on('click',function () {

        $(".checkemp").prop('checked', $(this).prop('checked'));

    });



    var emp_assign_id,cid;

      $(document).on('click','#assign_video_emp',function(){

        //var cid=$(this).closest('.product-buttons').siblings().find("div:hidden").attr("id");

         cid = $(this).closest("div#course").find("input[name='course_id']").val();

        console.log("cid"+cid);

        $('div#assign_video_emp_content').modal('show');

      })

      

      $('#assign_video_emp_content .modal-footer button').on('click',function(event){

                       

                       var $button=$(event.target);

                         $(this).closest('.modal').one('hidden.bs.modal', function() {



                    

                     var empIDs = $("#assign_video_emp_content input:checkbox:checked").map(function(){

              return $(this).val();

            }).get(); // <----

            console.log(empIDs);

                         

              if($button[0].id=='confirm-assign-btn')

              {

                

              

                $.ajax({

                type:'POST',

                data:{'ids':empIDs,'course_id':cid},

                url:baseURL+'assign_video',

                success:function(data)

                {

                  // $('div#confirm_assign_video_emp').show();

                  alert('Assign video to employee.Completed');

                    



                    

                },

                error:function(data)

                {

                  console.log("error ");

                }

              });

            }

            else

            {

              

              

            }

             });

                        



                  });



              /* add answer type */





    // $(document).on('keyup','#answer',function(){

    //     console.log("keyup");

    //     var new_ans_html='<div class="form-group new_answer" id="new_answer"> <div class="input-group-btn"> <div class="input-group-prepend"> <div class="input-group-text"><input type="radio" name="crt_ans" id="crt_ans"></div> <input id="answer" name="answer[]" type="text" class="form-control" placeholder="Answer Choice" /> <div class="input-group-append"> <div class="input-group-text"><i class="fa fa-trash" id="del" name="del"/></div> </div> </div> </div>';



    //    // var clonedChoice=$('#new_answer').clone();

    //     //clonedChoice.find('input').val('');



    //     $(this).closest('#new_answer').after(new_ans_html);

        



    // });

    

   // // $.each($('[id^=answer]'), function (i, item) {

        

   //               $(document).one('keyup', '[id*="answer"]',function () {   

                 

   //              var ans=$(this).val();

   //               console.log("keyup"+ans.length);



   //               // if(ans.length==1)

   //               // {

   //      var new_ans_html='<div class="form-group new_answer" id="new_answer"> <div class="input-group-btn"> <div class="input-group-prepend"> <div class="input-group-text"><input type="radio" name="crt_ans" id="crt_ans"></div> <input id="answer" name="answer[]" type="text" class="form-control" placeholder="Answer Choice" /> <div class="input-group-append"> <div class="input-group-text"><i class="fa fa-trash" id="del" name="del"/></div> </div> </div> </div>';



   //     // var clonedChoice=$('#new_answer').clone();

   //      //clonedChoice.find('input').val('');



   //      $(this).parent().parent().find('#new_answer').after(new_ans_html);

   //    //}



   //              });

   //  //});



   /* Create New Answer */





   var new_option=$('.new_answer').eq(0).html();

   //var new_option='<div class="input-group-btn"> <div class="input-group-prepend"> <div class="input-group-text"><input type="radio" name="crt_ans" id="crt_ans"></div> <input id="answer" name="answer[]" type="text" class="form-control" placeholder="Answer Choice" /> <div class="input-group-append"> <div class="input-group-text"><i class="fa fa-trash" id="del" name="del"/></div> </div> </div>';



   $(document).on('keyup','.option:last input',function(){

      console.log("fsdfsd");

     if($(this).val()!='')

     {

          $('.new_answer .new_option').last().after("<div class='new_option form-group'>"+new_option+"</div>");



     }





   });



    $(document).on('click','#del',function(){

      console.log("del");

         $(this).closest('.new_option').remove();

        



    });





               /* add Questions */

  $(document).on('click','#add_question',function(){



        console.log("addnew level");

      



        var i=parseInt($(this).find('#index').text())+parseInt(1);

        var qno=$(this).closest('div').find('#qno').data('value');

        var prev_no=$(this).closest('div').find('#qno').data('value');

        console.log("qno"+qno);

        var ans=$(this).closest('div').find('#ans_que').data('value');

        var nextno=++qno;

       

     var clonedRow = '<div class="form-group"> <input type="text" class="form-control" name="question" id="question" placeholder="Question"> </div> <div class="form-group new_answer" id="new_answer"> <div class="new_option form-group"> <div class="input-group-btn"> <div class="input-group-prepend option"> <div class="input-group-text"><input type="radio" name="crt_ans" id="crt_ans"></div> <input id="answer" name="answer[]" type="text" class="form-control" placeholder="Answer Choice"> <div class="input-group-append del-icon"> <div class="input-group-text"><i class="fa fa-trash" id="del" name="del"></i></div> </div> </div> </div> </div> </div>';

      //var clonedRow='<div class="new_question" id="new_question"> <div class="form-group"> <input type="text" class="form-control" name="question" id="question" placeholder="Question"> </div> <div class="form-group new_answer" id="new_answer"> <div class="input-group-btn"> <div class="input-group-prepend"> <div class="input-group-text"><input type="radio" name="crt_ans" id="crt_ans"></div> <input id="answer" name="answer[]" type="text" class="form-control" placeholder="Answer Choice" /> </div> </div> </div> </div>';



        // clonedRow.find('input[name="answer_qno'+prev_no+'[]"]').attr('name','answer_qno'+nextno+'[]');

        // clonedRow.find('input[name="ans_correct_q'+prev_no+'"]').attr('name','ans_correct_q'+nextno);



        // clonedRow.find('#qno').html(nextno);

        // clonedRow.find('#ans_que').html(nextno);

        //clonedRow.find('input').val('');

        //data:{'vid':vid,'question':ques,'ans':answer,'crt_ans':crt_ans},

        var answer=[];

        var ques=$('#question').val();

         var val_ans=$('#answer').val();

        

        $('input[name="answer[]"]').each(function(){



            answer.push(this.value);

        });

        console.log("ans"+$('input[name="answer[]"]').val());

        var vans=$('input[name="answer[]"]').val();

        var vvid=$('#video_id').val();

       

        var check=true;

        if($("input:radio[name='crt_ans']:checked").length == 0){

                check = false;

            }

        if((ques!='')&&(check)&&(vans!='')&&(vvid!=''))

        {

             $('#question').removeClass('error');

            $('#video_id').removeClass('error');

            $('#show_error').css('display','none');

           

        }

        else

        {

             $('#question').addClass('error');

               $('#video_id').addClass('error');

               $('#show_error').css('display','block');

             

            return false;

           

        }

        var crt_ans=($('input[name=crt_ans]:checked').parent().parent().find("input[type=text]")).val();

        console.log($($('input[name=crt_ans]:checked').parent().parent().find("input[type=text]")).val());



        var vid=$('#video_id').val();

        var itr1=[];

        var all_answer1=[];

         var new_ques="",answer,itr,all_ans,ans;



             $.ajax({

                type:'POST',

                dataType:'json',

                data:{'vid':vid,'question':ques,'ans':answer,'crt_ans':crt_ans},

                url:baseURL+'add_test_data',

                success:function(data)

                {

                 if(data)

                 {

                

                    new_ques=  '<div class="row questions"> <div class="col-sm-12 col-md-12 mx-auto ques_head"> <label><b>Question : </b> '+data.question+'</label><input type="hidden" name="qid" id="qid" value="'+data.qid+'"><i class="fa fa-trash pull-right" id="ques_delete"></i></div><div class="col-sm-12 col-md-12 mx-auto ques_option"><label><b>Choices : </b></label><br/>';

                        answer=(data.allanswer).split(',');



                      itr=answer.values();

                      console.log(itr);

                      for(let ele of itr)

                      {

                          all_ans=ele.split(":");

                          // itr1=all_ans.values();

                          // for(let ele1 of itr1)

                          //  {

                           

                              if(all_ans[2]=='1')

                              {

                         

                            new_ques +='<label>'+all_ans[1]+'</label><i class="fa fa-check"></i><br/>';

                          }

                          else

                          {

                            new_ques +='<label>'+all_ans[1]+'</label><br>';

                          }

                          



                             // }

                           





                      }

                     

                       

                    new_ques +='</div> </div>';

                    $('#ques_list').append(new_ques);

                 }

                   



                    

                },

                error:function(data)

                {

                  console.log("error ");

                }

              });

      //  var html='<tr ><td> <input type="text" id="level" name="level[]" placeholder="Level" required="required" class="form-control "></td>                  <td> <input type="text" id="learn_unit" name="learn_unit[]" placeholder="Learning Unit" required="required" class="form-control "></td>                  <td><i class="fa fa-plus" id="add_new_level"></i><i class="fa fa-minus" id="remove_new_level"></i></td>/tr>';

        $('#new_question').html(clonedRow);

    });



    $(document).on('click','#ques_delete',function(){

      console.log("ASDa");

         var vid=$(this).closest('div').find('#qid').val();



            $.ajax({

                type:'POST',

                dataType:'json',

                data:{'qid':vid},

                url:baseURL+'del_test_data',

                success:function(data)

                {



                },

                error:function()

                {



                }



    });

  });



    $('#add_test').validate({

    

   

       rules: {

            "question": {

                required: true,

                

            },

            "answer[]": {

                required: true,

                

            },

            "crt_ans": {

                required: true,

                

            },

          }

    });



    $('[data-fancybox="gallery"]').fancybox({
      buttons : [
        'download',
        'play',
        'thumbs',
        'close'
      ]
    });


});