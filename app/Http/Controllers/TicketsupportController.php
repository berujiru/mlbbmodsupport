<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;

class TicketsupportController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = Ticket::where('user',auth()->user()->id)->orderBy('created_at','ASC')->paginate(50);
        return view('tickets.index',compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 50);
    }
}
