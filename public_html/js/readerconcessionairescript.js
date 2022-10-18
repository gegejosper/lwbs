$(document).ready(function() {
    ($('#newrec').val() === "") ?  $("#submitBill").hide() : $("#submitBill").show(); 
    // if($('#newrec').val() ===""){
    //     $(".submitBill").hide(); 
    // }
    console.log('record', $('#newrec').val());
                           
    // $(".submitBill").show();

    $(document).on('click', '.edit-modal', function() {
          $('#footer_action_button').text("Save");
          $('#footer_action_button').addClass('glyphicon-check');
          $('#footer_action_button').removeClass('glyphicon-trash');
          $('.actionBtn').addClass('btn-success');
          $('.actionBtn').removeClass('btn-danger');
          $('.actionBtn').addClass('edit');
          $('.modal-title').text('Add Bill Record');
          $('.deleteContent').hide();
          $('.form-horizontal').show();
          $('#bildid').val($(this).data('id'));
          let account =  $(this).data('lname') + ", " + $(this).data('fname') + " " + $(this).data('mname');
          //$('<span>'+ $(this).data('lname') + ", " + $(this).data('fname') + " " + $(this).data('mname') +'</span>').appendTo('#account');
          //$('<span>'+ $(this).data('meternum') + '</span>').appendTo('#meternum');
          $('#account').val(account); 
          $('#meternum').val($(this).data('meternum'));
          $('#hiddenmeternum').val($(this).data('meternum'));
          $('#mincub').val($(this).data('mincub'));
          $('#rate').val($(this).data('rate'));
          $('#excessrate').val($(this).data('excessrate'));
          $('#prevrec').val($(this).data('prevbill'));
          
          $('#myModal').modal('show');
          //console.log($(this).data('name') + $(this).data('points'));
      });

    function calc() {

        var $newrec = ($.trim($(".newrec").val()) != "" && !isNaN($(".newrec").val())) ? parseInt($(".newrec").val()) : 0;
        var $prevrec = ($.trim($(".prevrec").val()) != "" && !isNaN($(".prevrec").val())) ? parseInt($(".prevrec").val()) : 0;
        var $mincub = ($.trim($(".mincub").val()) != "" && !isNaN($(".mincub").val())) ? parseInt($(".mincub").val()) : 0;
        var $rate =  ($.trim($(".rate").val()) != "" && !isNaN($(".rate").val())) ? parseInt($(".rate").val()) : 0;
        var $excessrate =  ($.trim($(".excessrate").val()) != "" && !isNaN($(".excessrate").val())) ? parseInt($(".excessrate").val()) : 0;
        var $cubic = $newrec- $prevrec;
        // console.log("Cubic: "+$cubic);
        if($cubic <= $mincub){   
            $(".payment").val($rate);
            $(".minimumrate").val($rate);
            $(".excesspayment").val(0);
        } 
        else {
            $excess = $cubic - $mincub;
            $excessCubic = $excess *  $excessrate;
            $payment = $excessCubic + $rate;
            $(".minimumrate").val($rate);
            $(".excesspayment").val($excessCubic);
            $(".payment").val($payment);  
            // console.log("Excess Cubic"+ $excess);  
            // console.log("Excess Cubic"+ $excess);  
            // console.log("Excess Payment"+ $excessCubic);  
        }
        let cubic =  $newrec - $prevrec;
        (cubic <= 0) ? $("#submitBill").hide() : $("#submitBill").show();
        $(".cubic").val(cubic);   
    }
    $(".key").keyup(function() {
        
        calc();
    });
 
    $('.modal-footer').on('click', '.edit', function() {
        $.ajax({
            type: 'post',
            url: '/reader/concessionaires/recordbill',
            data: {
            '_token': $('input[name=_token]').val(),
            'meternum': $("#hiddenmeternum").val(),
            'prevrec': $('#prevrec').val(),
            'newrec': $('#newrec').val(),
            'payment': $('#payment').val(),
            'billdate': $('#billdate').val(),
            'cubic': $('#cubic').val()
            },
            success: function(data) {
            // $('.item'+ $('#bildid').val()).remove();
            $('#account_name').text($('#account').val());
            $('#meternum_bill').text($('#meternum').val());
            $('#due_date').text(data.monthlyDueDate);
            $('#period_covered').text(data.monthlyBillDate);
            $('#present_rec').text(data.newrec);
            $('#previous_rec').text(data.prevrec);
            $('#amount_rec').text(new Intl.NumberFormat().format(data.billAmount));
            $('#used_rec').text(data.cubicCount);
            $('#printBillModal').modal('show');
        }
        });
    });
      
      
  });
  