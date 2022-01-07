<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ReplyRequest;
use App\Models\MailMessages;
use App\Models\MailReplies;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class ReplyController extends Controller
{

    public function messageReplies(MailMessages $message)
    {
        $replies = $message->replies()->paginate(10);
        return view("backend.pages.messages.replies", compact('replies', 'message'));
    }


    public function create()
    {
        return abort(404);
    }


    public function store(Request $request)
    {
        $request->validate([
            'reply_subject' => 'required',
            'reply_message' => 'required',
        ]);

        //Start => send mail to all customers section
        if ($request->mail_to === 'all') {
            $this->sendMailToAllMessages($request);
            return redirect()->back()->with('success', 'Reply Sent Successfully');
        }
        //End => send mail to all customers section

        //Start => send mail to selected customers section
        if ($request->mail_to === 'selected_messages') {
            $this->sendMailToSelectedMessages($request);
            return redirect()->back()->with('success', 'Reply Sent Successfully');
        }
        //End => send mail to selected customers section

        $request->validate([
            'mail_message_id' => 'required|integer',
            'reply_email' => 'required|email',
            'reply_subject' => 'required',
            'reply_message' => 'required',
        ]);

        $reply_details = $request->only(['mail_message_id', 'reply_email', 'reply_subject', 'reply_message', 'name']);

        Mail::to($reply_details['reply_email'])->send(new \App\Mail\ReplyMessage($reply_details));
        MailReplies::create($reply_details);

        return redirect()->back()->with('success', 'Reply Sent Successfully');
    }


    public function show($id)
    {
        return abort(404);
    }


    public function edit($id)
    {
        return abort(404);
    }


    public function update(Request $request, $id)
    {
        return abort(404);
    }


    public function destroy(MailReplies $reply)
    {
        $reply->delete();
        return redirect()->back()->with('success', 'Reply Successfully Deleted');
    }

    protected function sendMailToAllMessages(Request $request)
    {
        $all_messages = MailMessages::all();
        foreach ($all_messages as $message) {
            $details = [
                'mail_message_id' => $message->id,
                'reply_email' => $message->email,
                'reply_subject' => $request->reply_subject,
                'reply_message' => $request->reply_message,
                'name' => $message->name
            ];
            Mail::to($details['reply_email'])->send(new \App\Mail\ReplyMessage($details));
            MailReplies::create($details);
        }
    }

    protected function sendMailToSelectedMessages(Request $request)
    {
        $messages = explode(',', $request->messages[0]);
        $messages = MailMessages::whereIn('id', $messages)->get();
        foreach ($messages as $message) {
            $details = [
                'mail_message_id' => $message->id,
                'reply_email' => $message->email,
                'reply_subject' => $request->reply_subject,
                'reply_message' => $request->reply_message,
                'name' => $message->name
            ];
            Mail::to($details['reply_email'])->send(new \App\Mail\ReplyMessage($details));
            MailReplies::create($details);
        }
    }

}
