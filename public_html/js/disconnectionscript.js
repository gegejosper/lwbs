$(document).ready(function() {
    $(document).on('click', '.closemodify', function() {
        location.reload();
    });
    $(document).on('click', '.btn-disconnect', function() {
        $('#footer_action_button').text("Save");
        $('#footer_action_button').addClass('glyphicon-check');
        $('#footer_action_button').removeClass('glyphicon-trash');
        $('.form-horizontal').show();
        $('#consumer_id').val($(this).data('id'));
        $('#disconnectionModal').modal('show');
    });

    $('.modal-footer').on('click', '.disconnectBtn', function() {
        $.ajax({
            type: 'post',
            url: '/admin/consumer/disconnect',
            data: {
            '_token': $('input[name=_token]').val(),
            'consumer_id': $("#consumer_id").val(),
            'reason': $('#reason').val()
            },
            success: function(data) {
            $('#disconnectionModal').modal('toggle');
            $('#disconnectionModalSuccess').modal('show');
            }
        });
    });
      
      
  });
  