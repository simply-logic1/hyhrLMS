$(document).ready(function(){
let ids, selectedRow,selectedRow1,empid;
let coursetable=$('#coursetable').DataTable();
/*Category tbale */
/* End of Emp table dataTable */
let sampleTable=$('#sampleTable').DataTable();
let catTable= $('#catTable').DataTable({
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
   
      { text: '<i class="fa fa-trash data-fa-btn" id="del_client"></i>Delete',

      className:"btn btn-danger btn-datatable",
       action:function()
      {
          

            $('#del_cenmodel').modal('show');
          
      
          
         $('#del_cenmodel .modal-footer button').on('click',function(event){
             
             var $button=$(event.target);
                $(this).closest('.modal').one('hidden.bs.modal', function() {

              $('.modal-body-del').html('Are You sure want to delete Material ?');
              
              var tname=$('#tname').val();
          
               
              if($button[0].id=='confirm-del-btn')
              {
               
             
                      
                  $.ajax({
                      type:'POST',
                      data:{'ids':ids,'tname':tname},
                      url:baseURL+'admin/del_client',
                      success:function(data)
                      {
                          console.log("del emp");
                          catTable.rows('.selected').remove().draw(false);
                          
                          catTable.button(0).disable();
                                $('#success_message').css('display','block');

              $('#success_message').fadeIn('slow',function(){
                  $('#success_message').delay(5000).slideUp(500);
              })
                            

                              
                      },
                      error:function(data)
                      {
                          console.log("error ");
                      }
                  });
              }
                   else
              {
                  
                catTable.rows('.select-checkbox').deselect();
                   $("th.select-checkbox").removeClass("selected");
               }
              });
         });
              
         
      
  
      }
     },
  
]
});
catTable.on("click", "th.select-checkbox", function() {
  console.log("selectcheckbox");
    if ($("th.select-checkbox").hasClass("selected")) {
      console.log("deselectcheckbox");
        catTable.rows('.select-checkbox').deselect();
        $("th.select-checkbox").removeClass("selected");
    } else {
      console.log("selectcheckbox");
        catTable.rows('.select-checkbox').select();
        $("th.select-checkbox").addClass("selected");
    }
});
catTable.on("select deselect", function() {
    console.log("Some selection or deselection going on");
 ids = $.map(catTable.rows('.selected').data(), function (item) {

        //return item[0];
        return $(item[0]).val();
    });
  /*count select row */
   selectedRow=catTable.rows({selected:true}).count();
  catTable.button(1).enable(selectedRow>0);
    console.log(ids)
    if (catTable.rows({
            selected: true
        }).count() !== catTable.rows().count()) {
        $("th.select-checkbox").removeClass("selected");
    } else {
        $("th.select-checkbox").addClass("selected");
    }
});
/* Start of doc table */
let docTable= $('#docTable').DataTable({
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
   
      { text: '<i class="fa fa-trash data-fa-btn" id="del_client"></i>Delete',

      className:"btn btn-danger btn-datatable",
       action:function()
      {
          

            $('#del_cenmodel').modal('show');
          
      
          
         $('#del_cenmodel .modal-footer button').on('click',function(event){
             
             var $button=$(event.target);
                $(this).closest('.modal').one('hidden.bs.modal', function() {

              $('.modal-body-del').html('Are You sure want to delete Document ?');
              
              var tname=$('#tname').val();
          
               
              if($button[0].id=='confirm-del-btn')
              {
               
             
                      
                  $.ajax({
                      type:'POST',
                      data:{'ids':ids,'tname':tname},
                      url:baseURL+'admin/del_client',
                      success:function(data)
                      {
                          console.log("del emp");
                          docTable.rows('.selected').remove().draw(false);
                          
                          docTable.button(0).disable();
                                $('#success_message').css('display','block');

              $('#success_message').fadeIn('slow',function(){
                  $('#success_message').delay(5000).slideUp(500);
              })
                            

                              
                      },
                      error:function(data)
                      {
                          console.log("error ");
                      }
                  });
              }
                   else
              {
                  
                docTable.rows('.select-checkbox').deselect();
                   $("th.select-checkbox").removeClass("selected");
               }
              });
         });
              
         
      
  
      }
     },
  
]
});
docTable.on("click", "th.select-checkbox", function() {
  console.log("selectcheckbox");
    if ($("th.select-checkbox").hasClass("selected")) {
      console.log("deselectcheckbox");
        docTable.rows('.select-checkbox').deselect();
        $("th.select-checkbox").removeClass("selected");
    } else {
      console.log("selectcheckbox");
        docTable.rows('.select-checkbox').select();
        $("th.select-checkbox").addClass("selected");
    }
});
docTable.on("select deselect", function() {
    console.log("Some selection or deselection going on");
 ids = $.map(docTable.rows('.selected').data(), function (item) {

        //return item[0];
        return $(item[0]).val();
    });
  /*count select row */
   selectedRow=docTable.rows({selected:true}).count();
  docTable.button(1).enable(selectedRow>0);
    console.log(ids)
    if (docTable.rows({
            selected: true
        }).count() !== docTable.rows().count()) {
        $("th.select-checkbox").removeClass("selected");
    } else {
        $("th.select-checkbox").addClass("selected");
    }
});
/* End of doc table dataTable */
let contanttable= $('#ContentTable').DataTable({
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
   
      { text: '<i class="fa fa-trash data-fa-btn" id="del_client"></i>Delete',

      className:"btn btn-danger btn-datatable",
       action:function()
      {
          

            $('#del_cenmodel').modal('show');
          
      
          
         $('#del_cenmodel .modal-footer button').on('click',function(event){
             
             var $button=$(event.target);
                $(this).closest('.modal').one('hidden.bs.modal', function() {

              $('.modal-body-del').html('Are You sure want to delete Material ?');
              
              var tname=$('#tname').val();
          
               
              if($button[0].id=='confirm-del-btn')
              {
               
             
                      
                  $.ajax({
                      type:'POST',
                      data:{'ids':ids,'tname':tname},
                      url:baseURL+'admin/del_client',
                      success:function(data)
                      {
                          console.log("del emp");
                          contanttable.rows('.selected').remove().draw(false);
                          
                          contanttable.button(0).disable();
                                $('#success_message').css('display','block');

              $('#success_message').fadeIn('slow',function(){
                  $('#success_message').delay(5000).slideUp(500);
              })
                            

                              
                      },
                      error:function(data)
                      {
                          console.log("error ");
                      }
                  });
              }
                   else
              {
                  
                contanttable.rows('.select-checkbox').deselect();
                   $("th.select-checkbox").removeClass("selected");
               }
              });
         });
              
         
      
  
      }
     },
  
]
});
contanttable.on("click", "th.select-checkbox", function() {
  console.log("selectcheckbox");
    if ($("th.select-checkbox").hasClass("selected")) {
      console.log("deselectcheckbox");
        contanttable.rows('.select-checkbox').deselect();
        $("th.select-checkbox").removeClass("selected");
    } else {
      console.log("selectcheckbox");
        contanttable.rows('.select-checkbox').select();
        $("th.select-checkbox").addClass("selected");
    }
});
contanttable.on("select deselect", function() {
    console.log("Some selection or deselection going on");
 ids = $.map(contanttable.rows('.selected').data(), function (item) {

        //return item[0];
        return $(item[0]).val();
    });
  /*count select row */
   selectedRow=contanttable.rows({selected:true}).count();
  contanttable.button(1).enable(selectedRow>0);
    console.log(ids)
    if (contanttable.rows({
            selected: true
        }).count() !== contanttable.rows().count()) {
        $("th.select-checkbox").removeClass("selected");
    } else {
        $("th.select-checkbox").addClass("selected");
    }
});
/* ambasstor Table */
 let clienttable= $('#clientTable').DataTable({

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
             
                { text: '<i class="fa fa-trash data-fa-btn" id="del_client"></i>Delete',

                className:"btn btn-danger btn-datatable",
                 action:function()
                {
                    

                      $('#del_cenmodel').modal('show');
                    
                
                    
                   $('#del_cenmodel .modal-footer button').on('click',function(event){
                       
                       var $button=$(event.target);
                          $(this).closest('.modal').one('hidden.bs.modal', function() {

                        $('.modal-body-del').html('Are You sure want to delete Material ?');
                        
                        var tname=$('#tname').val();
                    
                         
                        if($button[0].id=='confirm-del-btn')
                        {
                         
                       
                                
                            $.ajax({
                                type:'POST',
                                data:{'ids':ids,'tname':tname},
                                url:baseURL+'admin/del_client',
                                success:function(data)
                                {
                                    console.log("del emp");
                                        clienttable.rows('.selected').remove().draw(false);
                                    
                                        clienttable.button(0).disable();
                                          $('#success_message').css('display','block');

                        $('#success_message').fadeIn('slow',function(){
                            $('#success_message').delay(5000).slideUp(500);
                        })
                                      

                                        
                                },
                                error:function(data)
                                {
                                    console.log("error ");
                                }
                            });
                        }
                             else
                        {
                            
                              clienttable.rows('.select-checkbox').deselect();
                             $("th.select-checkbox").removeClass("selected");
                         }
                        });
                   });
                        
                   
                
            
                }
               },
            
        ]
  });

clienttable.on("click", "th.select-checkbox", function() {
  console.log("selectcheckbox");
    if ($("th.select-checkbox").hasClass("selected")) {
      console.log("deselectcheckbox");
        clienttable.rows('.select-checkbox').deselect();
        $("th.select-checkbox").removeClass("selected");
    } else {
      console.log("selectcheckbox");
        clienttable.rows('.select-checkbox').select();
        $("th.select-checkbox").addClass("selected");
    }
});
clienttable.on("select deselect", function() {
    console.log("Some selection or deselection going on");
 ids = $.map(clienttable.rows('.selected').data(), function (item) {

        //return item[0];
        return $(item[0]).val();
    });
  /*count select row */
   selectedRow=clienttable.rows({selected:true}).count();
  clienttable.button(1).enable(selectedRow>0);
    console.log(ids)
    if (clienttable.rows({
            selected: true
        }).count() !== clienttable.rows().count()) {
        $("th.select-checkbox").removeClass("selected");
    } else {
        $("th.select-checkbox").addClass("selected");
    }
});
 /* Get video Duration */
 //document.getElementById('cvideo').onchange = setFileInfo;

$('input[type="file"]'). change(function(){
    
  var files = this.files;
  //myVideos.push(files[0]);
  var video = document.createElement('video');
  video.preload = 'metadata';
  var stringDur;

  video.onloadedmetadata = function() {
    window.URL.revokeObjectURL(video.src);
    var duration = video.duration;
   
     stringDur=convertString(duration);
    
  $('#duration').val(stringDur);
   
    //myVideos[myVideos.length - 1].duration = duration;
    //updateInfos();
  }
 
  video.src = URL.createObjectURL(files[0]);;
});

function convertString(duration)
{
           var d=100;
     var hrs=Math.floor(duration/3600);
     var min = Math.floor((duration - (hrs * 3600)) / 60);
            var seconds = duration - (hrs * 3600) - (min * 60);
            seconds = Math.round(seconds * 100) / 100
           
            var result = (hrs < 10 ? "0" + hrs : hrs);
            result += ":" + (min < 10 ? "0" + min : min);
            result += ":" + (seconds < 10 ? "0" + seconds : seconds);
            return result;
}


// let clienttable=$('#clientTable').DataTable({
// 		 columnDefs: [ {
         
//               orderable: false,
//         className: 'select-checkbox',
//         targets: 0

//         } ],
//         select: {
//             style:    'multi',
//             selector: 'td:first-child',

//         },
//         order: [[ 1, 'asc' ]],
//          dom: 'Bfrtip',
//         buttons: [
//               { extend: 'csv', text: '<i class="fa fa-download data-fa-btn"></i>Download',

//               	className:"btn btn-primary btn-datatable"
//                },
//               {
//                 extend: 'collection',
//                 text: '<i class="fa fa-trash data-fa-btn"></i>Delete',
//                 className:"btn btn-danger btn-datatable confirm-del-emp",
//                 enabled:false,
              
//              }
//         ]

// });
// clienttable.on("click", "th.select-checkbox", function() {
// 	console.log("selectcheckbox");
//     if ($("th.select-checkbox").hasClass("selected")) {
//     	console.log("deselectcheckbox");
//         clienttable.rows('.select-checkbox').deselect();
//         $("th.select-checkbox").removeClass("selected");
//     } else {
//     	console.log("selectcheckbox");
//         clienttable.rows('.select-checkbox').select();
//         $("th.select-checkbox").addClass("selected");
//     }
// });
// clienttable.on("select deselect", function() {
//     console.log("Some selection or deselection going on");
//  empid = $.map(clienttable.rows('.selected').data(), function (item) {

//         //return item[0];
//         return $(item[0]).val();
//     });
//  /*count select row */
//    selectedRow=clienttable.rows({selected:true}).count();
//   clienttable.button(1).enable(selectedRow>0);
//     console.log(ids)
//     if (clienttable.rows({
//             selected: true
//         }).count() !== clienttable.rows().count()) {
//         $("th.select-checkbox").removeClass("selected");
//     } else {
//         $("th.select-checkbox").addClass("selected");
//     }
// });
$('#add_video').validate({
    
     rules: {
            "course_title": {
                required: true,
                
            },
            "course_video":
            {
                required:true
            },
            "thumb_img":
            {
                required:true
            }
             
            
     },
});
$('#add_course').validate({
    
     rules: {
            "course_title": {
                required: true,
                
            } 
            
             
            
     },
});
$('#add_content').validate({
  rules: {
    "course_title": {
        required: true,
        
    } 
    
     
    
},
});


$(document).on('click','#video_type',function(){
    
    var vtype=$("input[id='video_type']:checked").val();
    console.log("type"+vtype);
    if(vtype=='file')
    {
        $('.filetype').css('display','block');
         $('.linktype').css('display','none');
    }
    else
    {
        $('.linktype').css('display','block');
         $('.filetype').css('display','none');
    }
});



   /* Create New Answer */


   var new_option=$('.new_answer').eq(0).html();
   //var new_option='<div class="input-group-btn"> <div class="input-group-prepend"> <div class="input-group-text"><input type="radio" name="crt_ans" id="crt_ans"></div> <input id="answer" name="answer[]" type="text" class="form-control" placeholder="Answer Choice" /> <div class="input-group-append"> <div class="input-group-text"><i class="fa fa-trash" id="del" name="del"/></div> </div> </div>';

   $(document).on('keyup','.new_answer:last input',function(){
      console.log("fsdfsd");
     if($(this).val()!='')
     {
          $('.new_answer ').last().after("<div class='input-group  new_answer' id='new_answer'>"+new_option+"</div>");

     }


   });

    $(document).on('click','#del',function(){
      console.log("del");
         $(this).closest('.new_answer').remove();
        

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
      var clonedRow='<div class="form-group"> <input type="text" class="form-control" name="question" id="question" placeholder="Question"> </div> <div class="input-group new_answer" id="new_answer"> <span class="input-group-addon" id="basic-addon1"><input type="radio" name="crt_ans" id="crt_ans"></span> <input id="answer" name="answer[]" type="text" class="form-control" aria-describedby="basic-addon1" placeholder="Answer Choice"> <span class="input-group-addon" id="basic-addon2"><i class="fa fa-trash" id="del" name="del"></i></span> </div>;' 
    // var clonedRow = '<div class="form-group"> <input type="text" class="form-control" name="question" id="question" placeholder="Question"> </div> <div class="form-group new_answer" id="new_answer"> <div class="new_option form-group"> <div class="input-group-btn"> <div class="input-group-prepend option"> <div class="input-group-text"><input type="radio" name="crt_ans" id="crt_ans"></div> <input id="answer" name="answer[]" type="text" class="form-control" placeholder="Answer Choice"> <div class="input-group-append del-icon"> <div class="input-group-text"><i class="fa fa-trash" id="del" name="del"></i></div> </div> </div> </div> </div> </div>';
      //var clonedRow='<div class="new_question" id="new_question"> <div class="form-group"> <input type="text" class="form-control" name="question" id="question" placeholder="Question"> </div> <div class="form-group new_answer" id="new_answer"> <div class="input-group-btn"> <div class="input-group-prepend"> <div class="input-group-text"><input type="radio" name="crt_ans" id="crt_ans"></div> <input id="answer" name="answer[]" type="text" class="form-control" placeholder="Answer Choice" /> </div> </div> </div> </div>';

        // clonedRow.find('input[name="answer_qno'+prev_no+'[]"]').attr('name','answer_qno'+nextno+'[]');
        // clonedRow.find('input[name="ans_correct_q'+prev_no+'"]').attr('name','ans_correct_q'+nextno);

        // clonedRow.find('#qno').html(nextno);
        // clonedRow.find('#ans_que').html(nextno);
        //clonedRow.find('input').val('');
        //data:{'vid':vid,'question':ques,'ans':answer,'crt_ans':crt_ans},
        var answer=[];
        var ques=$('#question').val();
        $('input[name="answer[]"]').each(function(){

            answer.push(this.value);
        });
        var crt_ans=($('input[name=crt_ans]:checked').parent().parent().find("input[type=text]")).val();
        console.log($($('input[name=crt_ans]:checked').parent().parent().find("input[type=text]")).val());

        var vid=$('#video_id').val();
               console.log("ans"+$('input[name="answer[]"]').val());
        var vans=$('input[name="answer[]"]').val();
           var vvid=$('#video_id').val();
   
       
        var check=true;
        var check_type=$('#quiz_type').val();
        var clonedRow;
        var quiz_type=$('#quiz_type').val();
        var survey_title=$('#survey_title').val();
        
        if(check_type=='quiz')
        {
        if($("input:radio[name='crt_ans']:checked").length == 0){
                check = false;
            }
              clonedRow='<div class="form-group"> <input type="text" class="form-control" name="question" id="question" placeholder="Question"> </div> <div class="input-group new_answer" id="new_answer"> <span class="input-group-addon" id="basic-addon1"><input type="radio" name="crt_ans" id="crt_ans"></span> <input id="answer" name="answer[]" type="text" class="form-control" aria-describedby="basic-addon1" placeholder="Answer Choice"> <span class="input-group-addon" id="basic-addon2"><i class="fa fa-trash" id="del" name="del"></i></span> </div>';
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

          }
          else
          {
            clonedRow='<div class="form-group"> <input type="text" class="form-control" name="question" id="question" placeholder="Question"> </div> <div class="input-group new_answer" id="new_answer">  <input id="answer" name="answer[]" type="text" class="form-control" aria-describedby="basic-addon1" placeholder="Answer Choice"> <span class="input-group-addon" id="basic-addon2"><i class="fa fa-trash" id="del" name="del"></i></span> </div>'; 
            if((ques!='')&&(check)&&(vans!='')&&(survey_title!=''))
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
          }
          console.log("check"+check);
        
        var itr1=[];
        var all_answer1=[];
         var new_ques="",answer,itr,all_ans,ans;
        var sid=$('#survey_id').val();

             $.ajax({
                type:'POST',
                dataType:'json',
                data:{'survey_title':survey_title,'survey_id':sid,'quiz_type':quiz_type,'vid':vid,'question':ques,'ans':answer,'crt_ans':crt_ans},
                url:baseURL+'admin/add_test_data',
                success:function(data)
                {
                 if(data)
                 {
                    $('#survey_id').val(data.tid);
                    console.log(data.tid+"dasd");
                    new_ques=  '<div class="row questions"><div class="card quiz_card mb-4"> <div class="card-header   ques_head"> <label>'+data.question+'</label><input type="hidden" name="qid" id="qid" value="'+data.qid+'"><i class="fa fa-trash pull-right" id="ques_delete"></i></div>  <div class="card-body  ques_option">';
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
                         
                            new_ques +='<br/><label>'+all_ans[1]+' <i class="fa fa-check"></i></label>';
                          }
                          else
                          {
                            new_ques +='<br/><label>'+all_ans[1]+'</label>';
                          }

                             // }
                           


                      }
                     
                       
                    new_ques +='<br/> </div></div> </div>';
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
         var remove_ques=$(this).parent().parent().parent('.questions');
         remove_ques.remove();
         
         console.log("vid"+vid);
        var quiz_type=$('#quiz_type').val();


            $.ajax({
                type:'POST',
                dataType:'json',
                data:{'qid':vid,'qtype':quiz_type},
                url:baseURL+'del_test_data',
                success:function(data)
                {
                    console.log("test"+remove_ques);
                  
                    

                },
                error:function()
                {

                }

    });
  });
  /* search function */
  
    /* previww image before upload  - register*/
   function readImg(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#preview').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $('#add_logo').on('change',function(){
 readImg(this);

    });
       
	  $('#search').on('keyup',function(){
   // console.log("sss"+$(this).val());
      // entable.search(this.value).draw();  
     
         var enq = $(this).val();
          console.log("search"+enq);

    // Hide all table tbody rows
    $('table tbody tr').hide();

    // Count total search result
    var len1 = $('.back1:contains("'+enq+'")').length;

    if(len1 > 0){
      // Searching text in columns and show match row
      $('.back1:contains("'+enq+'")').each(function(){
        $(this).closest('tr').show();
         $('.notfound').hide();
      });
    }else{

     $('.notfound').show();
    } 
 });
/*client validation */
$('#add_partner').validate({
    
     rules: {
            "name": {
                required: true,
                
            },
            "email":
            {
                required:true,
                 remote:
                {
                    url:baseURL+'check_exist_email',
                	type:"POST",
                	data:
                	{
                		email:function()
                		{
                			return $('#email').val();
                		}
                	}
                }
            },
            "mobile":
            {
                required:true
            },
                 "ablity":
            {
                required:true
            }
             
            
     },
});
/*client validation */
$('#add_user').validate({
    
     rules: {
            "name": {
                required: true,
                
            },
            "email":
            {
                required:true,
                 remote:
                {
                    url:baseURL+'check_exist_email',
                  type:"POST",
                  data:
                  {
                    email:function()
                    {
                      return $('#email').val();
                    }
                  }
                }
            },
            "mobile":
            {
                required:true
            },
                 "user_type":
            {
                required:true
            },
            "password" :
            {
              required:true
            }
             
            
     },
            
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

    $(document).on('click','#video_model',function(){

         $('#videoModal').modal('show');
         var vtitle=$('#title').val();
           var vsrc=$('#filename').val();
           console.log(vsrc);
           var video_src;

         // var valid_you = /^(?:https?:\/\/)?(?:www\.)?youtube\.com\/watch\?(?=.*v=((\w|-){11}))(?:\S+)?$/;
         // if(vsrc.match(valid_you))
         // {

         //    video_src=vsrc;

         // }
         // else
         // {
         //  video_src=baseURL+'asset/course_video/'+vsrc;

         // }

         var regExp = /^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|\&v=)([^#\&\?]*).*/;
    var match = vsrc.match(regExp);

    if (match && match[2].length == 11) {
        var ysrc= match[2];
        video_src='//www.youtube.com/embed/'+ysrc ;

    } else {
       video_src=baseURL+'asset/course_video/'+vsrc;

    }

           
                  console.log("dfs"+vtitle);
         console.log("test"+vsrc);
         $('.video-title').html(vtitle);
         $('#video_src').attr('src', video_src);
                    
                
    });

     $(document).on('click','#del_video',function(){
      var vid=$(this).parent().parent().find('video_id').val();
      console.log("vid"+vid);

       $.ajax({
                                type:'POST',
                                data:{'ids':vid},
                                url:baseURL+'admin/del_video',
                                success:function(data)
                                {
                                    console.log("del emp");
                                       

                                        
                                },
                                error:function(data)
                                {
                                    console.log("error ");
                                }
                            });


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
    $('#add_media').on('click',function(){



      console.log("Add Nedia");
 
      var media_file=$("#media_add")[0].files;
      
      console.log(media_file);
      var frmdta = new FormData();
      if(media_file.length > 0 ){
      frmdta.append ('uploadfile', media_file[0]);
      console.log("image file");
      }
      else
      {
        console.log("file not there");
      }
    
      console.log(frmdta);
      $.ajax({
  
  
  
        type:'POST',
        
        data: frmdta,
        contentType: false,
        processData: false,
        url:baseURL+'admin/add_media',
  
        success:function(data)
  
        {
  
          var media_status;
        console.log("data"+data);
   
           if(data)
           {
            media_status="Add Successfully";
               
           }
           else
           {
             media_status="Error Occur.Try Again";
           }
           $('#invite_alert').css('display','block');
  
           $('#invite_alert').fadeIn('slow',function(){
   
             $('#invite_alert').delay(5000).slideUp(500);
   
           })
   
   
   
             
   
               $('#invite_msg').html(media_status);
   
   
   
   
   
           
   
             
   
              $('#invite_emp_email').val('');
            
  
        },
  
        error:function(data)
  
        {
  
          //console.log("data"+data);
  
        }
  
      });
  
  
  
  
  
  
  
    });


    /*edit content remove image */

    $('.featured_img').on('click',function(){

      $('.img_view').css('display','none');
      $('.upload_img').css('display','block');
    });
    $('.featured_video').on('click',function(){

      $('.video_view').css('display','none');
      $('.upload_view').css('display','block');
    });
    $('.remove_file').on('click',function(){
      
      $('.file_view').css('display','none');
      $('.file_upload').css('display','block');
    });
   
     $('#new_category').on('click',function(){
      var status=$('.cat_view').hasClass('active');
      if(status)
      {
      $('.cat_view').removeClass('active');
      }
      else
    {
      $('.cat_view').addClass('active');
    }

     });

     $('#add_category').on('click',function(){

      var cat_name=$('#category_name').val();
      var desc=$('#description').val();
      var slug=$('#slug').val();
      var count='-';
      $.ajax({
        type:'POST',
        
        data:{'name':cat_name,'description':desc,'slug':slug},
        url:baseURL+'admin/add_category',
        success:function(data)
        {
            console.log(data);
            console.log("tere");
            $('#category_name').val('');
             $('#description').val('');
            $('#slug').val('');
            var html="<div class='category_block'><input type='checkbox' name='cat_id[]' id='cat_id' value='"+data+"'>"+cat_name+"</div>";
            $('.category_new').prepend(html);
            catTable.row.add( [
               " ",
               cat_name,
             desc,
              slug,
              count
          ] ).draw( false );
            
            

        },
        error:function()
        {
          console.log("error")

        }

});

     });

     var emp_assign_id,cid,ctype;

     $(document).on('click','#assign_video_emp',function(){

       //var cid=$(this).closest('.product-buttons').siblings().find("div:hidden").attr("id");

        cid = $(this).closest("div#course").find("input[name='course_id']").val();
          ctype=$('#assign_type').val();

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

               data:{'ids':empIDs,'course_id':cid,'ctype':ctype},

               url:baseURL+'assign_video',

               success:function(data)

               {

                 // $('div#confirm_assign_video_emp').show();
                if(ctype=='video')
                { 
                 
              
                  $(".assign-status").html("Video Assigned to Ambassador");
                  $('.assign-status').fadeIn('slow',function(){
 
                   $('.assign-status').delay(5000).slideUp(500);
               });
                }
                else   if(ctype=='document')
                {
                
                 $(".assign-status").html("Document Assigned to Ambassador");
                 $('.assign-status').fadeIn('slow',function(){

                  $('.assign-status').delay(5000).slideUp(500);
              });
                }
                else
                {
                  
                  $(".assign-status").html("Education Material Assigned to Ambassador");
                  $('.assign-status').fadeIn('slow',function(){
 
                   $('.assign-status').delay(5000).slideUp(500);
               });

                }

                   



                   

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
                 $('[data-fancybox="gallery"]').fancybox({
                  buttons : [
                    'download',
                    'play',
                    'thumbs',
                    'close'
                  ]
                });
                $('.toast-title').html("hi welcome");

});

