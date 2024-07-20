<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTopicRequest;
use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Str;
class TopicController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $listTopic = Topic::where('status','!=',0)->orderBy("created_at", "DESC")->get();
        $htmlsortOrder = "";
        foreach ($listTopic as $item) {
            $htmlsortOrder .= "<option value='" . $item->id. "'>Sau " . $item->name . "</option>";
        }
        return view("backend.topic.index", compact('listTopic', 'htmlsortOrder'));

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
    public function store(StoreTopicRequest $request)
    {
        $topic = new Topic();
        $topic->name = $request->name;
        $topic->slug = Str::of($request->name)->slug('-');
        $topic->sort_order = $request->sort_order;
        $topic->description = $request->description;
        $topic->created_at = Date('Y-m-d H:i:s');
        $topic->created_by = Auth::id() ?? 1;
        $topic->status = $request->status;
        $topic->save();
        toastr()->success('Thêm thành công');

        return redirect()->route('admin.topic.index');
    }


    /**
     * Display the specified resource.
     */


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $topic=Topic::find($id);
        if($topic==null)
        {
            toastr()->error('Oops! Something went wrong!', 'Oops!');
            
        }
        $list= Topic::where('status','!=',0)->orderBy('created_at','desc')->get();
        $htmlsortorder="";
        foreach($list as $item)
        {
            if($topic->sort_order - 1==$item->sort_order)
            {
                $htmlsortorder .="<option selected value='" . ($item->sort_order+1) . "'>Sau " . $item->name . "</option>";
            }
            else
            {
                $htmlsortorder .="<option value='" . ($item->sort_order+1) . "'>Sau " . $item->name . "</option>";
            }
        }
        return view("backend.topic.edit",compact("topic","htmlsortorder"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $topic=Topic::find($id);
        if($topic==null)
        {

        }          
        $topic->name = $request->name;
        $topic->slug = Str::of($request->name)->slug('-');
        $topic->sort_order = $request->sort_order;
        $topic->description = $request->description;
        $topic->created_at = Date('Y-m-d H:i:s');
        $topic->created_by = Auth::id() ?? 1;
        $topic->status = $request->status;
        $topic->save();
        toastr()->success('Cập nhật thành công');

        return redirect()->route('admin.topic.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function trash()
    {
        $listTopic= Topic::where('status','=',0)
        ->orderBy('created_at','desc')
        ->get();
        return view("backend.topic.trash",compact("listTopic"));
    }
    public function status(string $id)
    {
        $topic=Topic::find($id);
        if($topic==null)
        {
            toastr()->error('Oops! Something went wrong!', 'Oops!');
        }
        $topic->status=($topic->status==1)?2:1;
        $topic->updated_at=date('Y-m-d H:i:s');
        $topic->updated_by=Auth::id()??1;
        $topic->save();
        // toastr()->success('Cập nhật thành công');

        return redirect()->route('admin.topic.index');
    }
    public function delete(string $id)
    {
        $topic=Topic::find($id);
        if($topic==null)
        {
            toastr()->error('Oops! Something went wrong!', 'Oops!');
            
        }
        $topic->status=0;
        $topic->updated_at=date('Y-m-d H:i:s');
        $topic->updated_by=Auth::id()??1;
        $topic->save();


        return redirect()->route('admin.topic.index');
    }
    public function restore(string $id)
    {
        $topic=Topic::find($id);
        if($topic==null)
        {
            toastr()->error('Oops! Something went wrong!', 'Oops!');
            
        }
        $topic->status=2;
        $topic->updated_at=date('Y-m-d H:i:s');
        $topic->updated_by=Auth::id()??1;
        $topic->save();
         toastr()->success('Khôi phục thành công');

        return redirect()->route('admin.topic.trash');
    }
    /**
     
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $topic=Topic::find($id);
        if($topic==null)
        {
            toastr()->error('Oops! Something went wrong!', 'Oops!');
        }
        $topic->delete();
        return redirect()->route('admin.topic.trash');
    }
    public function show(string $id)
    {
        $topic=Topic::find($id);
        if($topic==null)
        {
            toastr()->error('Oops! Something went wrong!', 'Oops!');           
        }
        $list= Topic::where([['id','=',$id],['status','=',1]])->get();
        return view("backend.topic.show",compact("list"));

    }
}
