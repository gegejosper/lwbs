$(document).ready(function() {
    $(document).on('click', '.edit-modal', function() {
          $('#footer_action_button').text("Update");
          $('#footer_action_button').addClass('glyphicon-check');
          $('#footer_action_button').removeClass('glyphicon-trash');
          $('.actionBtn').addClass('btn-success');
          $('.actionBtn').removeClass('btn-danger');
          $('.actionBtn').addClass('edit');
          $('.modal-title').text('Edit');
          $('.deleteContent').hide();
          $('.form-horizontal').show();
          $('#fid').val($(this).data('id'));
          $('#fedit_name').val($(this).data('fname'));
          $('#ledit_name').val($(this).data('lname'));
          $('#medit_name').val($(this).data('mname'));
          $('#edit_password').val($(this).data('password'));
          $('#edit_email').val($(this).data('email'));
          $('#editcclark').val($(this).data('clark'));
          $('#editcclark').text($(this).data('clark'));
          $('#myModal').modal('show');
          //console.log($(this).data('name') + $(this).data('points'));
      });
      $(document).on('click', '.delete-modal', function() {
          $('#footer_action_button').text(" Delete");
          $('#footer_action_button').removeClass('glyphicon-check');
          $('#footer_action_button').addClass('glyphicon-trash');
          $('.actionBtn').removeClass('btn-success');
          $('.actionBtn').addClass('btn-danger');
          $('.actionBtn').addClass('delete');
          $('.modal-title').text('Delete');
          $('.did').text($(this).data('id'));
          $('.deleteContent').show();
          $('.form-horizontal').hide();
          $('.dname').html($(this).data('name'));
          $('#myModal').modal('show');
      });
  
      $('.modal-footer').on('click', '.edit', function() {
        console.log($('#editposition').val());
          $.ajax({
              type: 'post',
              url: 'concessionaire/editconcessionaire',
              data: {
                    '_token': $('input[name=_token]').val(),
                    'id': $("#fid").val(),
                    'fname': $('#fedit_name').val(),
                    'lname': $('#ledit_name').val(),
                    'mname': $('#medit_name').val(),
                    'password': $('#edit_password').val(),
                    'email': $('#edit_email').val(),
                    'categories': $('select[name=categories]').val(),
                    'meternum' : $('input[name=meternum]').val(),
                    'clark': $('select[name=clark]').val()
              },
              success: function(data) {
                        // $('.item' + data.id).replaceWith("<tr class='item" 
                        //     + data.id + "'><td>" 
                        //     + data.id + "</td><td>" 
                        //     + data.name + "</td><td>" 
                        //     + data.minimum + "</td><td>" 
                        //     + data.rate + "</td><td>" 
                        //     + data.excessrate + "</td><td class='td-actions'><button class='edit-modal btn btn-small btn-success' data-id='" 
                        //     + data.id + "' data-name='" 
                        //     + data.cat_name 
                        //     + "'><i class='fa fa-pencil'> </i></button><a class='delete-modal btn btn-danger btn-small' data-id='" 
                        //     + data.id + "' data-name='" 
                        //     + data.cat_name + "'><i class='fa fa-times'> </i></a></td></tr>");
                           
                        window.location.reload(); 
                  //console.log("sucess");
                }
          });
      });
      $("#add").click(function() {
          
        if($('input[name=password]').val() == $('input[name=repassword]').val()) {
            $.ajax({
                type: 'post',
                url: 'concessionaire/addconcessionaire',
                data: {
                    '_token': $('input[name=_token]').val(),
                    'fname': $('input[name=fname]').val(),
                    'lname': $('input[name=lname]').val(),
                    'mname': $('input[name=mname]').val(),
                    'password': $('input[name=password]').val(),
                    'email': $('input[name=email]').val(),
                    'categories': $('select[name=categories]').val(),
                    'meternum' : $('input[name=meternum]').val(),
                    'clark': $('select[name=clark]').val()
                },
                success: function(data) {
                    if ((data.errors)){
                      //$('.error').removeClass('hidden');
                        //$('.error').text(data.errors.name);
                        if (data.errors.fname){
                            $('<p>'+ data.errors.fname +'</p>').appendTo('.errormessages');
                        }
                        if (data.errors.lname){
                            $('<p>'+ data.errors.lname +'</p>').appendTo('.errormessages');
                        }
                        if (data.errors.mname) {
                            $('<p>'+ data.errors.mname +'</p>').appendTo('.errormessages');
                        }
                        if(data.errors.password) {
                            $('<p>'+ data.errors.password +'</p>').appendTo('.errormessages');
                        }
                        if (data.errors.meternum) {
                            $('<p>'+ data.errors.meternum +'</p>').appendTo('.errormessages');
                        }
                        if (data.errors.categories) {
                            $('<p>'+ data.errors.categories +'</p>').appendTo('.errormessages');
                        }
                        if (data.errors.clark) {
                            $('<p>'+ data.errors.clark +'</p>').appendTo('.errormessages');
                        }
                        if (data.errors.email) {
                            $('<p>'+ data.errors.email +'</p>').appendTo('.errormessages');
                        }
                        
                        
                        
                        $('#errorModal').modal('show');
                    }
                    else {
                        // $('.modal-title').text('Success');
                        // $('<p> Concessionaire Successfully Added!</p>').appendTo('.errormessages');
                        // $('#errorModal').modal('show');
                         $('.error').addClass('hidden');
                        $('#table').append("<tr class='item" + data.id + "'><td>" + data.id 
                        + "</td><td>" 
                        + data.meternum+"</td><td>" 
                        + data.lname +", " + data.fname+" " +data.mname+"</td><td>" 
                        + data.clark + "</td><td>connected</td><td class='td-actions'><button class='edit-modal btn btn-small btn-success' data-id='" + data.id + "' data-name='" + data.cat_name + "'><i class='fa fa-pencil'> </i></button><a class='delete-modal btn btn-danger btn-small' data-id='" + data.id + "' data-name='" + data.cat_name + "'><i class='fa fa-times'> </i></a></td></tr>");
                    }
                    
                },
    
            });
        }
        else {
            
            $('#errormessage').text('Password Did not Match'); 
            $('#errorModal').modal('show');
        }
      });
      $('.modal-footer').on('click', '.delete', function() {
          $.ajax({
              type: 'post',
              url: 'concessionaire/deleteconcessionaire',
              data: {
                  '_token': $('input[name=_token]').val(),
                  'id': $('.did').text()
              },
              success: function(data) {
                  $('.item' + $('.did').text()).remove();
              }
          });
      });
  });
  