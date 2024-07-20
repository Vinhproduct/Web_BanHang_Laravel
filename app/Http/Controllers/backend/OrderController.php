<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\User;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $list= Order::where('order.status','!=',0)
        ->join('user','user.id','=','order.user_id')
        ->select('order.id','order.name','order.phone','order.email','order.address','user.name as username')
        ->orderBy('order.created_at','desc')
        ->get();
        // $userid= User::where('status','!=',0)
        // ->orderBy('created_at','asc')
        // ->get();
        // $htmluserid="";
        // foreach($userid as $item)
        // {
        //     $htmluserid .= "<option value='" . $item->id . "'>" . $item->name . "</option>";
        // }
        return view("backend.order.index",compact("list"));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOrderRequest $request)
    {
        $contact=new Contact();
        $contact->user_id=$request->user_id; //form
        $contact->name=$request->name; //form
        $contact->email=$request->email; 
        $contact->phone=$request->parent_id;//form
        $contact->created_at=date('Y-m-d H:i:s');
        $contact->status=$request->status;//form
        // $contact->image=$request->image;//form
        $contact->save();
        return redirect()->route('admin.contact.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
