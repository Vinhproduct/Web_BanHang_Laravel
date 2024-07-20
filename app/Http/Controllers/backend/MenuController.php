<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreMenuRequest;

class MenuController extends Controller     
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list= Menu::where('status','!=',0)->orderBy('created_at','asc')->get();
        $htmlparentid="";
        foreach($list as $item)
        {
            $htmlparentid .= "<option value='" . $item->id . "'>" . $item->name . "</option>";
        }
        return view("backend.menu.index",compact("list","htmlparentid"));

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
    public function store(StoreMenuRequest $request)
    {
        $menu = new Menu();
        $menu->name = $request->name;
        $menu->link = $request->link;
        $menu->parent_id = $request->parent_id;
        $menu->position = $request->position;
        $menu->created_at = date('Y-m-d H:i:s');
        $menu->created_by = Auth::id() ?? 1;
        $menu->status = $request->status;
        $menu->save();
        toastr()->success('Thêm thành công');

        return redirect()->route('admin.menu.index');    
    }
    public function edit(string $id)
    {
        
            $menu=Menu::find($id);
            if($menu==null)
            {
                toastr()->error('Oops! Something went wrong!', 'Oops!');

            }
            $list= Menu::where('status','!=',0)->orderBy('created_at','desc')->get();
            $htmlparentid="";
            foreach($list as $item)
            {
                if($menu->parent_id==$item->id)
                {
                    $htmlparentid .= "<option selected value='" . $item->id . "'>" . $item->name . "</option>";
                }
                else
                {
                    $htmlparentid .= "<option value='" . $item->id . "'>" . $item->name . "</option>";
                }
               
       
         
            return view("backend.menu.edit",compact("menu","htmlparentid"));
        }
    
}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $menu=Menu::find($id);
        if($menu==null)
        {

        }
        $menu->name = $request->name;
        $menu->link = $request->link;
        $menu->parent_id = $request->parent_id;
        $menu->position = $request->position;
        $menu->created_at = date('Y-m-d H:i:s');
        $menu->created_by = Auth::id() ?? 1;
        $menu->status = $request->status;
        $menu->save();
        toastr()->success('Cập nhật thành công');

        return redirect()->route('admin.menu.index');    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function trash()
    { 
        $list= Menu::where('status','=',0)
        ->orderBy('created_at','desc')
        ->get();
        return view("backend.menu.trash",compact("list"));
    }
    public function status(string $id)
    {
        $menu=Menu::find($id);
        if($menu==null)
        {
            toastr()->error('Oops! Something went wrong!', 'Oops!');
        }
        $menu->status=($menu->status==1)?2:1;
        $menu->updated_at=date('Y-m-d H:i:s');
        $menu->updated_by=Auth::id()??1;
        $menu->save();
        // toastr()->success('Cập nhật thành công');

        return redirect()->route('admin.menu.index');
    }
    public function delete(string $id)
    {
        $menu=Menu::find($id);
        if($menu==null)
        {
            toastr()->error('Oops! Something went wrong!', 'Oops!');
            
        }
        $menu->status=0;
        $menu->updated_at=date('Y-m-d H:i:s');
        $menu->updated_by=Auth::id()??1;
        $menu->save();


        return redirect()->route('admin.menu.index');
    }
    public function restore(string $id)
    {
        $menu=Menu::find($id);
        if($menu==null)
        {
            toastr()->error('Oops! Something went wrong!', 'Oops!');
            
        }
        $menu->status=2;
        $menu->updated_at=date('Y-m-d H:i:s');
        $menu->updated_by=Auth::id()??1;
        $menu->save();
         toastr()->success('Khôi phục thành công');

        return redirect()->route('admin.menu.trash');
    }
    /**
     
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $menu=Menu::find($id);
        if($menu==null)
        {
            toastr()->error('Oops! Something went wrong!', 'Oops!');
        }
        $menu->delete();
        return redirect()->route('admin.menu.trash');
    }
    public function show(string $id)
    {
        $menu=Menu::find($id);
        if($menu==null)
        {
            toastr()->error('Oops! Something went wrong!', 'Oops!');           
        }
        
        $list= Menu::where([['id','=',$id],['status','=',1]])->get();
        return view("backend.menu.show",compact("list"));

    }
}
