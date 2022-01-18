<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\MailMessages;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index(Request $request){
        $perPage = $request->perPage ?: 10;
        $keyword = $request->keyword;

        //get all Messages
        $messages = MailMessages::where('email', Auth()->user()->email)->latest();

        if ($keyword) {
            $keyword = '%' . $keyword . '%';
            $messages = $messages->where('email', 'like', $keyword)
                ->orWhere('name', 'like', $keyword)
                ->orWhere('message', 'like', $keyword)
                ->orWhere('subject', 'like', $keyword)
            ;
        }

        $messages = $messages->paginate($perPage);
        //Show All Messages
        return view('backend.pages.messages.index', compact('messages'));
    }

    // message show admin panel
    public function show(MailMessages $message){
        return view('backend.pages.messages.details', compact('message'));
    }

    public function destroy(MailMessages $message)
    {
        $message->delete();
        return redirect()->back()->with('success', 'Message successfully deleted');
    }
}
