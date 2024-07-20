<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreContactRequest;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {  
        $list_userid= User::orderBy("created_at", "DESC")->get();
        $htmluserid="";
        foreach($list_userid as $item)
        {
            $htmluserid .= "<option value='" . $item->id . "'>" . $item->name . "</option>";
        }
        $list= Contact::where('contact.status','!=',0)
        ->join('user','user.id','=','contact.user_id')
        ->select('contact.id','contact.id','contact.name','contact.phone','contact.email','contact.content','user.name as username')
        ->orderBy('contact.created_at','desc')->get();
      
        return view("backend.contact.index",compact("list","htmluserid"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreContactRequest $request)
    {
        $contact=new Contact();
        $contact->name=$request->name; //form
        $contact->email=$request->email; 
        $contact->phone=$request->phone;//form
        // $contact->user_id=$request->user_id;//form
        $contact->title=$request->title;//form
        $contact->content=$request->content;//form
        // $contact->replay_id=$request->replay_id;//form
        $contact->created_at=date('Y-m-d H:i:s');
        // $contact->status=$request->status;//form
        // $contact->image=$request->image;//form
        $contact->save();
        return redirect()->route('site.contact');
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
