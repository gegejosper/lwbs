$(document).ready(function() {

      $("#SaveDuedate").click(function() {
          $.ajax({
              type: 'post',
              url: 'setting/duedate',
              data: {
                  '_token': $('input[name=_token]').val(),
                  'id': $("#fid").val(),
                  'duedate': $('input[name=duedate]').val()
              },
              success: function(data) {
              }, 
          });
          $('#myModal').modal('show');
      });

      $("#SavePenalty").click(function() {
        $.ajax({
            type: 'post',
            url: 'setting/penalty',
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $("#fid").val(),
                'penalty': $('input[name=penalty]').val()
            },
            success: function(data) {
            }, 
        });
        $('#myModal').modal('show');
    });
    $("#SaveNotice").click(function() {
        $.ajax({
            type: 'post',
            url: 'setting/notice',
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $("#fid").val(),
                'days': $('input[name=days]').val()
            },
            success: function(data) {
            }, 
        });
        $('#myModal').modal('show');
    });
    $("#SaveDiscount").click(function() {
        $.ajax({
            type: 'post',
            url: 'setting/discount',
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $("#fid").val(),
                'discount': $('input[name=discount]').val()
            },
            success: function(data) {
            }, 
        });
        $('#myModal').modal('show');
    });
  });
  