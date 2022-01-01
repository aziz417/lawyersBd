{{--    mail send to all talents modal--}}
<div class="modal fade" id="sendMailAllMessagesModal" tabindex="-1" role="dialog"
     aria-labelledby="sendMailAllMessagesModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="sendMailAllMessagesModal">Send Mail To All Message</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('replies.store') }}" method="post">
                @csrf
                <input type="hidden" name="mail_to" value="all">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="reply_subject">Subject</label>
                        <input class="form-control" id="reply_subject" type="text" name="reply_subject">
                        @error('reply_subject')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="reply_message">Message</label>
                        <textarea class="form-control" name="reply_message" id="reply_message" cols="30"
                                  rows="10"></textarea>
                        @error('reply_message')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Send</button>
                </div>
            </form>
        </div>
    </div>
</div>
{{--    mail send to selected talents modal--}}
<div class="modal fade" id="sendMailAllSelectedMessagesModal" tabindex="-1" role="dialog"
     aria-labelledby="sendMailAllSelectedMessagesModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="sendMailAllSelectedMessagesModal">Send Mail To Selected Message</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('replies.store') }}" method="post">
                @csrf
                <input type="hidden" name="mail_to" value="selected_messages">
                <input type="hidden" name="messages[]" id="selectedMessagesField">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="reply_subject">Subject</label>
                        <input class="form-control" id="reply_subject" type="text" name="reply_subject">
                        @error('reply_subject')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="reply_message">Message</label>
                        <textarea class="form-control" name="reply_message" id="reply_message" cols="30"
                                  rows="10"></textarea>
                        @error('reply_message')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Send</button>
                </div>
            </form>
        </div>
    </div>
</div>
