
<div class="modal fade" id="exampleModal-{{ $id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Reply Message</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.replies.store') }}" method="post">
                    @csrf
                    <input type="hidden" name="message_id" value="{{ @$message->id }}">
                    <div class="form-group">
                        <label for="name" class="col-form-label">Name</label>
                        <input name="name" value="{{ ucfirst(Str::limit(@$message->name, 50)) }}" type="text" class="form-control" id="name">
                    </div>
                    <div class="form-group">
                        <label for="email" class="col-form-label">To:<span class="required-star">*</span></label>
                        <input name="reply_email" type="text" value="{{ @$message->email }}" class="form-control" id="email">
                    </div>
                    <div class="form-group">
                        <label for="reply_subject" class="col-form-label">Subject:<span class="required-star">*</span></label>
                        <input name="reply_subject" type="text" class="form-control" id="reply_subject">
                    </div>
                    <div class="form-group">
                        <label for="message" class="col-form-label">Message:</label>
                        <textarea name="reply_message" class="form-control" id="message"></textarea>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Send Message</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
