<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreCategoryRequest;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $list= Category::where('status','!=',0)->orderBy('created_at','desc')->get();
        $htmlparentid="";
        $htmlsortorder="";
        foreach($list as $item)
        {
            $htmlparentid .= "<option value='" . $item->id . "'>" . $item->name . "</option>";
            $htmlsortorder .="<option value='" . $item->sort_order . "'>Sau " . $item->name . "</option>";
        }
        return view("backend.category.index",compact("list","htmlparentid","htmlsortorder"));
    }

    /**
     * Show the form for creating a new resource.
     */

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        $category=new Category();
        $category->name=$request->name; //form
        $category->slug=Str::of($request->name)->slug('-');
        $category->parent_id=$request->parent_id;//form
        $category->sort_order=$request->sort_order;//form
        $category->description=$request->description;//form
        $category->created_at=date('Y-m-d H:i:s');
        $category->created_by=Auth::id()??1;
        $category->status=$request->status;//form
        /////
        if($request->image)
        {
            if(in_array($request->image->extension(),["jpg","png","jpeg","gif"]))
            {
            $fileName=$category->slug . '.' . $request->image->extension();
            $request->image->move(public_path("images/categorys"),$fileName);
            $category->image=$fileName;   
            }          
        }
        $category->save();
        toastr()->success('Thêm thành công');

        return redirect()->route('admin.category.index');
    }

    /**
     * Display the specified resource.
     */
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category=Category::find($id);
        if($category==null)
        {
            toastr()->error('Oops! Something went wrong!', 'Oops!');

        }
        $list= Category::where('status','!=',0)->orderBy('created_at','desc')->get();
        $htmlparentid="";
        $htmlsortorder="";
        foreach($list as $item)
        {
            if($category->parent_id==$item->id)
            {
                $htmlparentid .= "<option selected value='" . $item->id . "'>" . $item->name . "</option>";
            }
            else
            {
                $htmlparentid .= "<option value='" . $item->id . "'>" . $item->name . "</option>";
            }
            if($category->sort_order - 1==$item->sort_order)
            {
                $htmlsortorder .="<option selected value='" . ($item->sort_order+1) . "'>Sau " . $item->name . "</option>";
            }
            else
            {
                $htmlsortorder .="<option value='" . ($item->sort_order+1) . "'>Sau " . $item->name . "</option>";
            }
        }
        return view("backend.category.edit",compact("category","htmlparentid","htmlsortorder"));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $category=Category::find($id);
        if($category==null)
        {
            toastr()->error('Oops! Something went wrong!', 'Oops!');

        }
        $category->name=$request->name; //form
        $category->slug=Str::of($request->name)->slug('-');
        $category->parent_id=$request->parent_id;//form
        $category->sort_order=$request->sort_order;//form
        $category->description=$request->description;//form
        $category->created_at=date('Y-m-d H:i:s');
        $category->created_by=Auth::id()??1;
        $category->status=$request->status;//form
        /////
        if($request->image)
        {
            if(in_array($request->image->extension(),["jpg","png","jpeg","gif"]))
            {
            $fileName=$category->slug . '.' . $request->image->extension();
            $request->image->move(public_path("images/categorys"),$fileName);
            $category->image= $fileName;   
            }          
        }
        $category->save();
        toastr()->success('Cập nhật thành công');

        return redirect()->route('admin.category.index');
    }

    public function trash()
    {
        $list= Category::where('status','=',0)
        ->orderBy('created_at','desc')
        ->get();
        return view("backend.category.trash",compact("list"));
    }
    public function status(string $id)
    {
        $category=Category::find($id);
        if($category==null)
        {
            toastr()->error('Oops! Something went wrong!', 'Oops!');
        }
        $category->status=($category->status==1)?2:1;
        $category->updated_at=date('Y-m-d H:i:s');
        $category->updated_by=Auth::id()??1;
        $category->save();
        // toastr()->success('Cập nhật thành công');

        return redirect()->route('admin.category.index');
    }
    public function delete(string $id)
    {
        $category=Category::find($id);
        if($category==null)
        {
            toastr()->error('Oops! Something went wrong!', 'Oops!');
            
        }
        $category->status=0;
        $category->updated_at=date('Y-m-d H:i:s');
        $category->updated_by=Auth::id()??1;
        $category->save();


        return redirect()->route('admin.category.index');
    }
    public function restore(string $id)
    {
        $category=Category::find($id);
        if($category==null)
        {
            toastr()->error('Oops! Something went wrong!', 'Oops!');
            
        }
        $category->status=2;
        $category->updated_at=date('Y-m-d H:i:s');
        $category->updated_by=Auth::id()??1;
        $category->save();
         toastr()->success('Khôi phục thành công');

        return redirect()->route('admin.category.trash');
    }
    /**
     
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category=Category::find($id);
        if($category==null)
        {
            toastr()->error('Oops! Something went wrong!', 'Oops!');
        }
        $category->delete();
        return redirect()->route('admin.category.trash');
    }
    public function show(string $id)
    {
        $category=Category::find($id);
        if($category==null)
        {
            toastr()->error('Oops! Something went wrong!', 'Oops!');           
        }
        $list= Category::where([['id','=',$id],['status','=',1]])->get();
        return view("backend.category.show",compact("list"));


    }
}
