<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
class ProductController extends Controller
{
    //all san pham
    // public function index()
    // {
    //     $list_product = Product::where('status','=',1)
    //     ->orderBy('created_at','desc')
    //     ->paginate(12);
    //     return view("frontend.product",compact('list_product'));
    // }
    public function index(Request $request)
    {
        $keyword = $request->input('keyword'); // Nhận từ khóa tìm kiếm từ request
    
        $query = Product::query();
        $query->where('status', '=', 1);
    
        if (!empty($keyword)) {
            // Thêm điều kiện tìm kiếm theo từ khóa
            $query->where(function ($q) use ($keyword) {
                $q->where('name', 'LIKE', '%' . $keyword . '%')
                  ->orWhere('description', 'LIKE', '%' . $keyword . '%');
            });
        }
    
        $list_product = $query->orderBy('created_at', 'desc')
                              ->paginate(8);
    
        return view("frontend.product", compact('list_product', 'keyword'));
    }
    
      //alldanh mucsan pham
      public function category($slug)
    {
         $row_cat = Category::where([['slug','=',$slug],['status','=','1']])->select("id","name","slug")->first();
        $list_category_id= array();
        array_push($list_category_id, $row_cat->id);
        //xet theo cap

        $list_category1 = Category::where([['parent_id','=',$row_cat->id],['status','=','1']])->get();
        if(count($list_category1) > 0)
        {
            foreach( $list_category1 as  $row_cat1)
            {
                array_push($list_category_id, $row_cat1->id);

                $list_category2 = Category::where([['parent_id','=',$row_cat1->id],['status','=','1']])->get();
                if(count($list_category2) > 0)
                {
                    foreach( $list_category2 as  $row_cat2)
                    {
                        array_push($list_category_id, $row_cat2->id);

                        $list_category3 = Category::where([['parent_id','=',$row_cat2->id],['status','=','1']])->get();
                        if(count($list_category3) > 0)
                        {
                            foreach( $list_category3 as  $row_cat3)
                            {
                                array_push($list_category_id, $row_cat3->id);
                            }
                        }
                    }
                }
            }
        }
// 
          $list_product = Product::where('status','=',1)
          ->whereIn('category_id',$list_category_id)
          ->orderBy('created_at','desc')
          ->paginate(8);
          return view('frontend.product_category',compact('list_product','row_cat'));
        }
    public function product_detail($slug)
    {
        $product = Product::where([['status','=',1],['slug','=',$slug]])->first();
        
        $list_category_id= array();
        array_push($list_category_id, $product->category_id);
        //xet theo cap

        $list_category1 = Category::where([['parent_id','=',$product->category_id],['status','=','1']])->get();
        if(count($list_category1) > 0)
        {
            foreach( $list_category1 as  $row_cat1)
            {
                array_push($list_category_id, $row_cat1->id);

                $list_category2 = Category::where([['parent_id','=',$row_cat1->id],['status','=','1']])->get();
                if(count($list_category2) > 0)
                {
                    foreach( $list_category2 as  $row_cat2)
                    {
                        array_push($list_category_id, $row_cat2->id);

                        $list_category3 = Category::where([['parent_id','=',$row_cat2->id],['status','=','1']])->get();
                        if(count($list_category3) > 0)
                        {
                            foreach( $list_category3 as  $row_cat3)
                            {
                                array_push($list_category_id, $row_cat3->id);
                            }
                        }
                    }
                }
            }
        }
        $product_list = Product::where([['status','=','1'],['id','!=',$product->id]])
        ->whereIn('category_id',$list_category_id)
        ->orderBy('created_at','desc')
        ->take(4)->get();
        return view('frontend.product_detail',compact('product','product_list'));
       
    }
    /// thương Hiệu Sản Phẩm:
    public function brand($slug)
    {
        $row_brand = Brand::where([['slug', '=', $slug], ['status', '=', '1']])
            ->select("id", "name", "slug")
            ->first();
    
        $list_brand_id = array();
        array_push($list_brand_id, $row_brand->id);
    
        $list_product = Product::where('status', '=', 1)
            ->where('brand_id', $row_brand->id)
            ->orderBy('created_at', 'desc')
            ->paginate(8);
    
        return view('frontend.product_brand', compact('list_product', 'row_brand'));
    }
}
