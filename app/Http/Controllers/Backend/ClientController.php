<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Cases;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    public function index(){
        $id = Auth::user()->id;
        $clients = Cases::with('user', 'register')->where('lawyer_id', $id)->latest()->paginate(10);
//        dd($clients->toArray());
        return view('backend.pages.client.index', compact('clients'));
    }
}
