<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreProductRequest;




class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list= Product::where('product.status','!=',0)
        ->join('category','category.id','=','product.category_id')
        ->join('brand','brand.id','=','product.brand_id')
        ->select('product.id','product.id','product.name','product.image','category.name as categoryname','brand.name as brandname','price','product.description','product.status')
        ->orderBy('product.created_at','desc')
        ->get();
    
        return view("backend.product.index",compact("list"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $list_category= Category::where('status','!=',0)
        ->orderBy('created_at','asc')
        ->get();
        $list_brand= Brand::where('status','!=',0)
        ->orderBy('created_at','asc')
        ->get();
        $htmlcategoryid="";
        $htmlbrandid="";
        foreach($list_category as $item)
        {
            $htmlcategoryid .= "<option value='" . $item->id . "'>" . $item->name . "</option>";
        }
        foreach($list_brand as $item)
        {
            $htmlbrandid .= "<option value='" . $item->id . "'>" . $item->name . "</option>";
        }
        return view("backend.product.create",compact("htmlcategoryid","htmlbrandid"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        $product=new Product();
        $product->name=$request->name; //form
        $product->slug=Str::of($request->name)->slug('-');
        $product->category_id=$request->category_id;//form
        $product->brand_id=$request->brand_id;//form
        $product->price=$request->price;//form
        $product->pricesale=$request->pricesale;//form
        $product->qty=$request->qty;//form
        $product->description=$request->description;//form
        $product->detail=$request->detail;//form
        $product->created_at=date('Y-m-d H:i:s');
        $product->created_by=Auth::id()??1;
        $product->status=$request->status;//form
        if($request->image)
        {
            if(in_array($request->image->extension(),["jpg","png","jpeg","gif"]))
            {
            $fileName=$product->slug . '.' . $request->image->extension();
            $request->image->move(public_path("images/products"),$fileName);
            $product->image= $fileName;   
            }          
        }   
        
             $product->save();
             toastr()->success('Thêm thành công');

        return redirect()->route('admin.product.index');
    }

    /**
     * Display the specified resource.
     */


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product=Product::find($id);
        if($product==null)
        {
            toastr()->error('Oops! Something went wrong!', 'Oops!');

        }
        $list= Category::where('status','!=',0)->orderBy('created_at','desc')->get();
        $htmlcategoryid="";
        foreach($list as $item)
        {
            if($product->category_id==$item->id)
            {
                $htmlcategoryid .= "<option selected value='" . $item->id . "'>" . $item->name . "</option>";
            }
            else
            {
                $htmlcategoryid .= "<option value='" . $item->id . "'>" . $item->name . "</option>";
            }
        }
        $list= Brand::where('status','!=',0)->orderBy('created_at','desc')->get();
        $htmlbrandid="";
        foreach($list as $item)
        {
            if($product->brand_id==$item->id)
            {
                $htmlbrandid .= "<option selected value='" . $item->id . "'>" . $item->name . "</option>";
            }
            else
            {
                $htmlbrandid .= "<option value='" . $item->id . "'>" . $item->name . "</option>";
            }
        }
        return view("backend.product.edit",compact("product","htmlcategoryid","htmlbrandid"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product=Product::find($id);
        if($product==null)
        {

        }      
          $product->name=$request->name; //form
        $product->slug=Str::of($request->name)->slug('-');
        $product->category_id=$request->category_id;//form
        $product->brand_id=$request->brand_id;//form
        $product->price=$request->price;//form
        $product->pricesale=$request->pricesale;//form
        //$product->qty=$request->qty;//form
        $product->description=$request->description;//form
        $product->detail=$request->detail;//form
        $product->created_at=date('Y-m-d H:i:s');
        $product->created_by=Auth::id()??1;
        $product->status=$request->status;//form
        if($request->image)
        {
            if(in_array($request->image->extension(),["jpg","png","jpeg","gif"]))
            {
            $fileName=$product->slug . '.' . $request->image->extension();
            $request->image->move(public_path("images/products"),$fileName);
            $product->image= $fileName;   
            }          
        }   
             $product->save();
             toastr()->success('Cập nhật thành công');

        return redirect()->route('admin.product.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function trash()
    {
        $list= Product::where('product.status','=',0)
         ->join('category','category.id','=','product.category_id')
         ->join('brand','brand.id','=','product.brand_id')
         ->select('product.id','product.id','product.name','product.image','category.name as categoryname','brand.name as brandname','price','product.description')
        ->orderBy('product.created_at','desc')
        ->get();
        return view("backend.product.trash",compact("list"));
    }
    public function status(string $id)
    {
        $product=Product::find($id);
        if($product==null)
        {
            toastr()->error('Oops! Something went wrong!', 'Oops!');
        }
        $product->status=($product->status==1)?2:1;
        $product->updated_at=date('Y-m-d H:i:s');
        $product->updated_by=Auth::id()??1;
        $product->save();
        // toastr()->success('Cập nhật thành công');

        return redirect()->route('admin.product.index');
    }
    public function delete(string $id)
    {
        $product=Product::find($id);
        if($product==null)
        {
            toastr()->error('Oops! Something went wrong!', 'Oops!');
            
        }
        $product->status=0;
        $product->updated_at=date('Y-m-d H:i:s');
        $product->updated_by=Auth::id()??1;
        $product->save();


        return redirect()->route('admin.product.index');
    }
    public function restore(string $id)
    {
        $product=Product::find($id);
        if($product==null)
        {
            toastr()->error('Oops! Something went wrong!', 'Oops!');
            
        }
        $product->status=2;
        $product->updated_at=date('Y-m-d H:i:s');
        $product->updated_by=Auth::id()??1;
        $product->save();
         toastr()->success('Khôi phục thành công');

        return redirect()->route('admin.product.trash');
    }
    /**
     
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product=Product::find($id);
        if($product==null)
        {
            toastr()->error('Oops! Something went wrong!', 'Oops!');
        }
        $product->delete();
        return redirect()->route('admin.product.trash');
    }
    public function show(string $id)
    {
        $product=Product::find($id);
        if($product==null)
        {
            toastr()->error('Oops! Something went wrong!', 'Oops!');           
        }
        $list= Product::where([['id','=',$id],['status','=',1]])
        ->get();
        return view("backend.product.show",compact("list"));

    }
}
