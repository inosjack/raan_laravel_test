<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Hotel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HotelController extends Controller
{
    /**
    * Show the application dashboard.
    *
    * @return \Illuminate\Http\Response
    */
    public function index($id)
    {
        $hotel = Hotel::with('comments')->first();
        return view('hotel')->with(['hotel'=>$hotel]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function comment(Request $request)
    {
        if (Auth::check()) {
            $this->validate($request, [
                'comment' => 'required'
            ]);

            $comment = new Comment();
            $comment->comment = $request->comment;
            $comment->user_id = Auth::user()->id;
            $comment->hotel_id = $request->hotel_id;
            $comment->save();

            return redirect()->back();
        }
    }
}
