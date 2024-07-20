<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreBrandRequest;


class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = Brand::where('status', '!=', 0)->orderBy('created_at', 'desc')->get();
        $htmlsortorder = "";
        foreach ($list as $item) {
            $htmlsortorder .= "<option value='" . $item->sort_order . "'>Sau " . $item->name . "</option>";
        }
        return view("backend.brand.index", compact('list', 'htmlsortorder'));

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
    public function store(StoreBrandRequest $request)
    {
        $brand = new Brand();
        $brand->name = $request->name;
        $brand->slug = Str::of($request->name)->slug('-');
        $brand->sort_order = $request->sort_order;
        $brand->description = $request->description;
        $brand->created_at = date('Y-m-d H:i:s');
        $brand->created_by = Auth::id() ?? 1;
        $brand->status = $request->status;
        if($request->image)
        {
            if(in_array($request->image->extension(),["jpg","png","jpeg","gif"]))
            {
            $fileName=$brand->slug . '.' . $request->image->extension();
            $request->image->move(public_path("images/brands"),$fileName);
            $brand->image=$fileName;   
            }          
        }
        $brand->save();
        toastr()->success('Thêm thành công');

        return redirect()->route('admin.brand.index');
    }

    /**
     * Display the specified resource.
     */


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $brand=Brand::find($id);
        if($brand==null)
        {
            toastr()->error('Oops! Something went wrong!', 'Oops!');

        }
        $list= Brand::where('status','!=',0)->orderBy('created_at','desc')->get();
        $htmlsortorder="";
        foreach($list as $item)
        {
            if($brand->sort_order - 1==$item->sort_order)
            {
                $htmlsortorder .="<option selected value='" . ($item->sort_order+1) . "'>Sau " . $item->name . "</option>";
            }
            else
            {
                $htmlsortorder .="<option value='" . ($item->sort_order+1) . "'>Sau " . $item->name . "</option>";
            }
        }
        return view("backend.brand.edit",compact("brand","htmlsortorder"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $brand=Brand::find($id);
        if($brand==null)
        {

        }
        $brand->name = $request->name;
        $brand->slug = Str::of($request->name)->slug('-');
        $brand->sort_order = $request->sort_order;
        $brand->description = $request->description;
        $brand->created_at = date('Y-m-d H:i:s');
        $brand->created_by = Auth::id() ?? 1;
        $brand->status = $request->status;
        if($request->image)
        {
            if(in_array($request->image->extension(),["jpg","png","jpeg","gif"]))
            {
            $fileName=$brand->slug . '.' . $request->image->extension();
            $request->image->move(public_path("images/brands"),$fileName);
            $brand->image=$fileName;   
            }          
        }
        $brand->save();
        toastr()->success('Cập nhật thành công');

        return redirect()->route('admin.brand.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function trash()
    {
        $list= Brand::where('status','=',0)
        ->orderBy('created_at','desc')
        ->get();
        return view("backend.brand.trash",compact("list"));
    }
    public function status(string $id)
    {
        $brand=Brand::find($id);
        if($brand==null)
        {
            toastr()->error('Oops! Something went wrong!', 'Oops!');
        }
        $brand->status=($brand->status==1)?2:1;
        $brand->updated_at=date('Y-m-d H:i:s');
        $brand->updated_by=Auth::id()??1;
        $brand->save();
        // toastr()->success('Cập nhật thành công');

        return redirect()->route('admin.brand.index');
    }
    public function delete(string $id)
    {
        $brand=Brand::find($id);
        if($brand==null)
        {
            toastr()->error('Oops! Something went wrong!', 'Oops!');
            
        }
        $brand->status=0;
        $brand->updated_at=date('Y-m-d H:i:s');
        $brand->updated_by=Auth::id()??1;
        $brand->save();


        return redirect()->route('admin.brand.index');
    }
    public function restore(string $id)
    {
        $brand=Brand::find($id);
        if($brand==null)
        {
            toastr()->error('Oops! Something went wrong!', 'Oops!');
            
        }
        $brand->status=2;
        $brand->updated_at=date('Y-m-d H:i:s');
        $brand->updated_by=Auth::id()??1;
        $brand->save();
         toastr()->success('Khôi phục thành công');

        return redirect()->route('admin.brand.trash');
    }
    /**
     
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $brand=Brand::find($id);
        if($brand==null)
        {
            toastr()->error('Oops! Something went wrong!', 'Oops!');
        }
        $brand->delete();
        return redirect()->route('admin.brand.trash');
    }
    public function show(string $id)
    {
        $brand=Brand::find($id);
        if($brand==null)
        {
            toastr()->error('Oops! Something went wrong!', 'Oops!');           
        }
        $list= Brand::where([['id','=',$id],['status','=',1]])->get();
        return view("backend.brand.show",compact("list"));

    }
}
