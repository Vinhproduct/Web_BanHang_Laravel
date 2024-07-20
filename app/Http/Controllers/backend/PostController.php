<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StorePostRequest;
use App\Models\Post;
use App\Models\Topic;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $listTopic = Topic::orderBy("created_at", "DESC")->get();
        $htmlTopicId = "";
        foreach ($listTopic as $item) {
            $htmlTopicId .= "<option value='" . $item->id . "'>" . $item->name . "</option>";
        }
        $list= Post::where('post.status','!=',0)
        ->join('topic','topic.id','=','post.topic_id')
        ->select('post.id','post.id','post.title','post.image','post.description','topic.name as topicname','post.status')
        ->orderBy('post.created_at','desc')
        ->get();
        return view("backend.post.index",compact("list","htmlTopicId"));

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
    public function store(StorePostRequest $request)
    {
        $post = new Post();
        $post->topic_id = $request->topic_id;
        $post->title = $request->title;
        $post->slug = Str::of($request->title)->slug('-');
        $post->type = $request->type;
        $post->detail = $request->detail;
        $post->description = $request->description;
        $post->created_at = date('Y-m-d H:i:s');
        $post->created_by = Auth::id() ?? 1;
        $post->status = $request->status;
        if($request->image)
        {
            if(in_array($request->image->extension(),["jpg","png","jpeg","gif"]))
            {
            $fileName=$post->slug . '.' . $request->image->extension();
            $request->image->move(public_path("images/posts"),$fileName);
            $post->image= $fileName;   
            }          
        }   
        $post->save();
        toastr()->success('Thêm thành công');

        return redirect()->route('admin.post.index');
    }

    /**
     * Display the specified resource.
     */
 

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post=Post::find($id);
        if($post==null)
        {
            toastr()->error('Oops! Something went wrong!', 'Oops!');

        }
        $list= Topic::where('status','!=',0)->orderBy('created_at','desc')->get();
        $htmlTopicId="";
        foreach($list as $item)
        {
            if($post->topic_id==$item->id)
            {
                $htmlTopicId .= "<option selected value='" . $item->id . "'>" . $item->name . "</option>";
            }
            else
            {
                $htmlTopicId .= "<option value='" . $item->id . "'>" . $item->name . "</option>";
            }
        }
        
        return view("backend.post.edit",compact("post","htmlTopicId"));
    
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $post=Post::find($id);
        if($post==null)
        {

        }
        $post->topic_id = $request->topic_id;
        $post->title = $request->title;
        $post->slug = Str::of($request->title)->slug('-');
        $post->type = $request->type;
        $post->detail = $request->detail;
        $post->description = $request->description;
        $post->created_at = date('Y-m-d H:i:s');
        $post->created_by = Auth::id() ?? 1;
        $post->status = $request->status;
        if($request->image)
        {
            if(in_array($request->image->extension(),["jpg","png","jpeg","gif"]))
            {
            $fileName=$post->slug . '.' . $request->image->extension();
            $request->image->move(public_path("images/posts"),$fileName);
            $post->image= $fileName;   
            }          
        }   
        $post->save();
        toastr()->success('Cập nhật thành công');

        return redirect()->route('admin.post.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function trash()
    {
        $list= Post::where('status','=',0)
        ->orderBy('created_at','desc')
        ->get();
        return view("backend.post.trash",compact("list"));
    }
    public function status(string $id)
    {
        $post=Post::find($id);
        if($post==null)
        {
            toastr()->error('Oops! Something went wrong!', 'Oops!');
        }
        $post->status=($post->status==1)?2:1;
        $post->updated_at=date('Y-m-d H:i:s');
        $post->updated_by=Auth::id()??1;
        $post->save();
        // toastr()->success('Cập nhật thành công');

        return redirect()->route('admin.post.index');
    }
    public function delete(string $id)
    {
        $post=Post::find($id);
        if($post==null)
        {
            toastr()->error('Oops! Something went wrong!', 'Oops!');
            
        }
        $post->status=0;
        $post->updated_at=date('Y-m-d H:i:s');
        $post->updated_by=Auth::id()??1;
        $post->save();


        return redirect()->route('admin.post.index');
    }
    public function restore(string $id)
    {
        $post=Post::find($id);
        if($post==null)
        {
            toastr()->error('Oops! Something went wrong!', 'Oops!');
            
        }
        $post->status=2;
        $post->updated_at=date('Y-m-d H:i:s');
        $post->updated_by=Auth::id()??1;
        $post->save();
         toastr()->success('Khôi phục thành công');

        return redirect()->route('admin.post.trash');
    }
    /**
     
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post=Post::find($id);
        if($post==null)
        {
            toastr()->error('Oops! Something went wrong!', 'Oops!');
        }
        $post->delete();
        return redirect()->route('admin.post.trash');
    }
    public function show(string $id)
    {
        $post=Post::find($id);
        if($post==null)
        {
            toastr()->error('Oops! Something went wrong!', 'Oops!');           
        }
        $list= Post::where([['id','=',$id],['status','=',1]])->get();
        return view("backend.post.show",compact("list"));

    }
}
