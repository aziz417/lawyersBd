<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Board;
use Illuminate\Http\Request;

class BoardController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $boards = Board::with('createdUser', 'updatedUser')->latest()->paginate(10);
        return view('backend.pages.boards.index', compact('boards'));
    }

    public function create()
    {
        return view('backend.pages.boards.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'board_name' => 'required|max:255|unique:boards,board_name',
        ]);
        Board::create([
            'board_name' => $request->board_name
        ]);

        return redirect()->back()->with('success', 'Board have been successfully created');
    }


    public function edit(Board $board)
    {
        return view('backend.pages.boards.edit', compact('board'));
    }


    public function update(Request $request, Board $board)
    {
        $request->validate([
            'board_name' => 'required|max:255|unique:boards,board_name,' . $board->id,
        ]);
        $board->update([
            'board_name' => $request->board_name
        ]);
        return redirect()->route('boards.index')->with('success', 'Board have been successfully updated');
    }


    public function destroy(Board $board)
    {
        $board->delete();
        return redirect()->back()->with('success', 'Board deleted success');
    }
}
