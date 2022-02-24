$(document).ready(function(){



// $('#forgot').validate({



//   rules:{

//      "email_id":

//             {

//                 required:true,

//                 email:true,

//                   remote:

//                 {

//                     url:baseURL+'check_exist_femail',

//                     type:"POST",

//                     data:

//                     {

//                         email:function()

//                         {

//                             return $('#emailid').val();

//                         }

//                     }

//                 }

//             },

//   },

//   messages:

//   {

//     "email_id":

//     {

//       required:"Enter email",

//       email:"Enter valid email",

//       remote:"Email id not there."



//     }

//   },



// });

$('#forgot_submit').on('click',function(){

     $.ajax(

                {

                    url:baseURL+'check_exist_femail',

                    type:"POST",

                    data:

                    {

                        email:function()

                        {

                            return $('#emailid').val();

                        }

                    },
                   success:function(data){

                      if(!data)
                      {
                        $('#forgot_msg').html('<div class="alert alert-danger">Email Id Invalid</div>');
                      }
                      else
                      {
                        $('#forgot_msg').html('<div class="alert alert-danger">Link sent it.Please check your mail.</div>');
                      }

                   },
                   error:function(){

                   }

                });
});



let ids, selectedRow,selectedRow1,empid;

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

						 				alert("Deleted Success");

						 				invite.button(1).disable();

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

							alert("canel btn");

							 invite.rows('.select-checkbox').deselect();

							$("th.select-checkbox").removeClass("selected");

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

	 			

	 				 $('#invite_msg').html(data);

	 				 $('#invite_emp_email').val('');

	 				

	 		},

	 		error:function(data)

	 		{

	 			//console.log("data"+data);

	 		}

	 	});







 	});







});