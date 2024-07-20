<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreBannerRequest;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = Banner::where('status', '!=', 0)->orderBy('created_at', 'desc')->get();
        $htmlsortorder = "";
        foreach ($list as $item) {
            $htmlsortorder .= "<option value='" . $item->sort_order . "'>" . $item->name . "</option>";
        }
        return view("backend.banner.index", compact('list', 'htmlsortorder'));
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
    public function store(StoreBannerRequest $request)
    {
        $banner = new Banner();
        $banner->name = $request->name;
        $banner->link = $request->link;
        $banner->sort_order = $request->sort_order;
        $banner->position = $request->position;
        $banner->description = $request->description;
        $banner->created_at = date('Y-m-d H:i:s');
        $banner->created_by = Auth::id()??1;
        $banner->status = $request->status;
        if($request->image)
        {
            if(in_array($request->image->extension(),["jpg","png","jpeg","gif"]))
            {
            $fileName=$banner->name . '.' . $request->image->extension();
            $request->image->move(public_path("images/banner"),$fileName);
            $banner->image=$fileName;   
            }          
        }
        $banner->save();
        toastr()->success('Thêm thành công');
        return redirect()->route('admin.banner.index');
    }

    /**
     * Display the specified resource.
     */


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $banner=Banner::find($id);
        if($banner==null)
        {
            toastr()->error('Oops! Something went wrong!', 'Oops!');

        }
        $list= Banner::where('status','!=',0)->orderBy('created_at','desc')->get();
        $htmlsortorder="";
        foreach($list as $item)
        {
            if($banner->sort_order - 1==$item->sort_order)
            {
                $htmlsortorder .="<option selected value='" . ($item->sort_order+1) . "'>Sau " . $item->name . "</option>";
            }
            else
            {
                $htmlsortorder .="<option value='" . ($item->sort_order+1) . "'>Sau " . $item->name . "</option>";
            }
        }
        return view("backend.banner.edit",compact("banner","htmlsortorder"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $banner=Banner::find($id);
        if($banner==null)
        {
            toastr()->error('Lỗi');
        }
        $banner->name = $request->name;
        $banner->link = $request->link;
        $banner->sort_order = $request->sort_order;
        $banner->position = $request->position;
        $banner->description = $request->description;
        $banner->created_at = date('Y-m-d H:i:s');
        $banner->created_by = Auth::id()??1;
        $banner->status = $request->status;
        if($request->image)
        {
            if(in_array($request->image->extension(),["jpg","png","jpeg","gif"]))
            {
            $fileName=$banner->name . '.' . $request->image->extension();
            $request->image->move(public_path("images/banner"),$fileName);
            $banner->image=$fileName;   
            }          
        }
        $banner->save();
        toastr()->success('Cập nhật thành công');

        return redirect()->route('admin.banner.index');
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function trash()
    {
        $list= Banner::where('status','=',0)
        ->orderBy('created_at','desc')
        ->get();
        return view("backend.banner.trash",compact("list"));
    }
    public function status(string $id)
    {
        $banner=Banner::find($id);
        if($banner==null)
        {
            toastr()->error('Oops! Something went wrong!', 'Oops!');
        }
        $banner->status=($banner->status==1)?2:1;
        $banner->updated_at=date('Y-m-d H:i:s');
        $banner->updated_by=Auth::id()??1;
        $banner->save();
        // toastr()->success('Cập nhật thành công');

        return redirect()->route('admin.banner.index');
    }
    public function delete(string $id)
    {
        $banner=Banner::find($id);
        if($banner==null)
        {
            toastr()->error('Oops! Something went wrong!', 'Oops!');
            
        }
        $banner->status=0;
        $banner->updated_at=date('Y-m-d H:i:s');
        $banner->updated_by=Auth::id()??1;
        $banner->save();


        return redirect()->route('admin.banner.index');
    }
    public function restore(string $id)
    {
        $banner=Banner::find($id);
        if($banner==null)
        {
            toastr()->error('Oops! Something went wrong!', 'Oops!');
            
        }
        $banner->status=2;
        $banner->updated_at=date('Y-m-d H:i:s');
        $banner->updated_by=Auth::id()??1;
        $banner->save();
         toastr()->success('Khôi phục thành công');

        return redirect()->route('admin.banner.trash');
    }
    /**
     
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $banner=Banner::find($id);
        if($banner==null)
        {
            toastr()->error('Oops! Something went wrong!', 'Oops!');
        }
        $banner->delete();
        return redirect()->route('admin.banner.trash');
    }
    public function show(string $id)
    {
        $banner=Banner::find($id);
        if($banner==null)
        {
            toastr()->error('Oops! Something went wrong!', 'Oops!');           
        }
        
        $list= Banner::where([['id','=',$id],['status','=',1]])->get();
        return view("backend.banner.show",compact("list"));

    }
}
