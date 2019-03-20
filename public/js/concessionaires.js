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
          $('#editfname').val($(this).data('fname'));
          $('#editmname').val($(this).data('mname'));
          $('#editlname').val($(this).data('lname'));
          $('#editclark').val($(this).data('clark'));
          $('#editmeternum').val($(this).data('meternum'));
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
  
          $.ajax({
              type: 'post',
              url: 'concessionaire/editconcessionaire',
              data: {
                  //_token:$(this).data('token'),
                '_token': $('input[name=_token]').val(),
                'id': $("#fid").val(),
                'fname': $('input[name=editfname]').val(),
                'mname': $('input[name=editmname]').val(),
                'lname': $('input[name=editlname]').val(),
                'meternum': $('input[name=editmeternum]').val(),
                'clark': $('select[name=editclark]').val()
              },
              success: function(data) {
                window.location.reload();    
                    //$('.item' + data.id).replaceWith("<tr class='item" + data.id + "'><td>" + data.cat_name + "</td><td>"+ data.points +"</td><td><button class='edit-modal btn btn-info' data-id='" + data.id + "' data-name='" + data.cat_name + "' data-points='" + data.points + "'><span class='glyphicon glyphicon-edit'></span> Edit</button> <button class='delete-modal btn btn-danger' data-id='" + data.id + "' data-name='" + data.name + "' ><span class='glyphicon glyphicon-trash'></span> Delete</button></td></tr>");
                    console.log("success");
                }
          });
      });
      $("#add").click(function() {
  
          $.ajax({
              type: 'post',
              url: 'concessionaire/addconcessionaire',
              data: {
                  '_token': $('input[name=_token]').val(),
                  'fname': $('input[name=fname]').val(),
                  'mname': $('input[name=mname]').val(),
                  'lname': $('input[name=lname]').val(),
                  'meternum': $('input[name=meternum]').val(),
                  'clark': $('select[name=clark]').val()
              },
              success: function(data) {
                  if ((data.errors)){
                    $('.error').removeClass('hidden');
                      $('.error').text(data.errors.name);
                  }
                  else {
                      $('.error').addClass('hidden');
                      $('#table').append("<tr class='item" + data.id + "'><td>" + data.cat_name + "</td><td>"+ data.points +"</td><td><button class='edit-modal btn btn-info' data-id='" + data.id + "' data-name='" + data.name + "'><span class='glyphicon glyphicon-edit'></span> Edit</button> <button class='delete-modal btn btn-danger' data-id='" + data.id + "' data-name='" + data.name + "'><span class='glyphicon glyphicon-trash'></span> Delete</button></td></tr>");
                  }
              },
  
          });
          $('#name').val('');
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
                  //$('.item' + $('.did').text()).remove();
                  window.location.reload();  
            }
          });
      });
  });
  