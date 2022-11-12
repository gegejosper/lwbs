<div id="disconnectionModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
    <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Disconnection</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12 invoice-col">
                        <form class="form-horizontal" role="form">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <div class="col-lg-12">
                                    <label class="control-label" for="id">Reason</label>
                                    <input type="text" class="form-control reason" id="reason" placeholder="Enter reason for disconnection" required>
                                    <input type="hidden" class="form-control consumer_id" id="consumer_id">
                                </div>
                            
                            </div>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                        <button type="button" class="btn disconnectBtn btn-success">
  							<span id="footer_action_button" class='glyphicon'> </span>
  						</button>
                        <button type="button" class="btn btn-warning" data-dismiss="modal">
                        <span class='glyphicon glyphicon-remove'></span> Close
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="disconnectionModalSuccess" class="modal fade" role="dialog">
    <div class="modal-dialog">
    <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close closemodify" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Success</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12 invoice-col">
                        <p>Consumer successfully disconnected...</p>
                    </div>
                </div>
                <div class="modal-footer">
                        <button type="button" class="btn btn-warning closemodify">
                        <span class='glyphicon glyphicon-remove'></span> Close
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('js/disconnectionscript.js') }}"></script>
