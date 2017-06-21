<?php

namespace App\Http\Controllers\Admin;

use App\Hotel;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class HotelController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        if (Auth::user()->id == 1){
            return view('admin.hotel.create');
        } else {
            return redirect()->back();
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        if (Auth::user()->id != 1){
            return redirect()->back();
        }

        $this->validate($request, [
            'name' => 'required',
            'owner' => 'required',
            'email' => 'required|string|email|max:255|unique:hotels',
            'contact' => 'required|numeric|unique:hotels',
        ]);

        $hotel = new Hotel();
        $hotel->name = $request->name;
        $hotel->owner = $request->owner;
        $hotel->email = $request->email;
        $hotel->contact = $request->contact;
        $hotel->address = $request->address ? $request->address : "";

        $hotel->save();

        return redirect('/');

    }

}
