<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreUserRequest;
use Brian2694\Toastr\Facades\Toastr;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list= User::where('status','!=',0)->orderBy('created_at','desc')->get();
        return view("backend.user.index",compact("list"));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("backend.user.create");

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        $user = new User();
        $user->name = $request->name;
      //  $user->username = $request->username;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = $request->password;
        $user->address = $request->address;
        $user->roles = $request->roles;
        $user->created_at = date('Y-m-d H:i:s');
        $user->created_by = Auth::id() ?? 1;
        $user->status = $request->status;
        if($request->image)
        {
            if(in_array($request->image->extension(),["jpg","png","jpeg","gif"]))
            {
            $fileName=$user->name . '.' . $request->image->extension();
            $request->image->move(public_path("images/users"),$fileName);
            $user->image= $fileName;   
            }          
        }   
        $user->save();
        toastr()->success('Thêm thành công');

        return redirect()->route('admin.user.index');    
    }
    public function edit(string $id)
    {
        $user=User::find($id);
        if($user==null)
        {
            toastr()->error('Oops! Something went wrong!', 'Oops!');
        }
        $list= User::where('status','!=',0)->orderBy('created_at','desc')->get();

        return view("backend.user.edit",compact("user"));
    }
    public function update(Request $request, string $id)
    {
        $user=User::find($id);
        if($user==null)
        {
            

        }     
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = $request->password;
        $user->address = $request->address;
        $user->roles = $request->roles;
        $user->created_at = date('Y-m-d H:i:s');
        $user->created_by = Auth::id() ?? 1;
        $user->status = $request->status;
        if($request->image)
        {
            if(in_array($request->image->extension(),["jpg","png","jpeg","gif"]))
            {
            $fileName=$user->slug . '.' . $request->image->extension();
            $request->image->move(public_path("images/users"),$fileName);
            $user->image= $fileName;   
            }          
        }   
        $user->save();
        toastr()->success('Cập nhật thành công');

        return redirect()->route('admin.user.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function trash()
    {
        $list= User::where('status','=',0)
        ->orderBy('created_at','desc')
        ->get();
        return view("backend.user.trash",compact("list"));
    }
    public function status(string $id)
    {
        $user=User::find($id);
        if($user==null)
        {
            toastr()->error('Oops! Something went wrong!', 'Oops!');
        }
        $user->status=($user->status==1)?2:1;
        $user->updated_at=date('Y-m-d H:i:s');
        $user->updated_by=Auth::id()??1;
        $user->save();
        // toastr()->success('Cập nhật thành công');

        return redirect()->route('admin.user.index');
    }
    public function delete(string $id)
    {
        $user=User::find($id);
        if($user==null)
        {
            toastr()->error('Oops! Something went wrong!', 'Oops!');
            
        }
        $user->status=0;
        $user->updated_at=date('Y-m-d H:i:s');
        $user->updated_by=Auth::id()??1;
        $user->save();


        return redirect()->route('admin.user.index');
    }
    public function restore(string $id)
    {
        $user=User::find($id);
        if($user==null)
        {
            toastr()->error('Oops! Something went wrong!', 'Oops!');
            
        }
        $user->status=2;
        $user->updated_at=date('Y-m-d H:i:s');
        $user->updated_by=Auth::id()??1;
        $user->save();
         toastr()->success('Khôi phục thành công');

        return redirect()->route('admin.user.trash');
    }
    /**
     
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user=User::find($id);
        if($user==null)
        {
            toastr()->error('Oops! Something went wrong!', 'Oops!');
        }
        $user->delete();
        return redirect()->route('admin.user.trash');
    }
    public function show(string $id)
    {
        $user=User::find($id);
        if($user==null)
        {
            toastr()->error('Oops! Something went wrong!', 'Oops!');
            
        }
        $list= User::where([['id','=',$id],['status','=',1]])->get();
        return view("backend.user.show",compact("list"));

    }
}
