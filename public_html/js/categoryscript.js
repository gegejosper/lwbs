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
          $('#catedit_name').val($(this).data('name'));
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
              url: 'categories/editcategories',
              data: {
                  //_token:$(this).data('token'),
                  '_token': $('input[name=_token]').val(),
                  'id': $("#fid").val(),
                  'cat_name': $('#catedit_name').val()
              },
              success: function(data) {
                  $('.item' + data.id).replaceWith("<tr class='item" + data.id + "'><td>" + data.id + "</td><td>" + data.cat_name + "</td><td class='td-actions'><button class='edit-modal btn btn-small btn-success' data-id='" + data.id + "' data-name='" + data.cat_name + "'><i class='fa fa-pencil'> </i></button><a class='delete-modal btn btn-danger btn-small' data-id='" + data.id + "' data-name='" + data.cat_name + "'><i class='fa fa-times'> </i></a></td></tr>");
                  console.log("sucess");
                }
          });
      });
      $("#add").click(function() {
  
          $.ajax({
              type: 'post',
              url: 'categories/addcategories',
              data: {
                  '_token': $('input[name=_token]').val(),
                  'cat_name': $('input[name=cat_name]').val()
              },
              success: function(data) {
                  if ((data.errors)){
                    $('.error').removeClass('hidden');
                      $('.error').text(data.errors.name);
                  }
                  else {
                      $('.error').addClass('hidden');
                      $('#table').append("<tr class='item" + data.id + "'><td>" + data.id + "</td><td>" + data.cat_name + "</td><td class='td-actions'><button class='edit-modal btn btn-small btn-success' data-id='" + data.id + "' data-name='" + data.cat_name + "'><i class='fa fa-pencil'> </i></button><a class='delete-modal btn btn-danger btn-small' data-id='" + data.id + "' data-name='" + data.cat_name + "'><i class='fa fa-times'> </i></a></td></tr>");
                  }
              },
  
          });
          $('#name').val('');
      });
      $('.modal-footer').on('click', '.delete', function() {
          $.ajax({
              type: 'post',
              url: 'categories/deletecategories',
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
  