<div class="row">
    <div class="row">
<div class="col-md-12 text-center" style="color:aqua">
    <h5>TIN TỨC & KHUYẾN MÃI MỚI NHẤT</h5>
    <hr>
</div>
    </div>
    @foreach ($post_new as $post)
    <div class="col-md-3">
        <h4 style="color: blanchedalmond">
                {{$post->title}}
        </h4>
        <a href="{{route('site.post.detail',['slug'=>$post->slug])}}">

        <img src="{{asset('images/posts/'.$post->image)}}" alt="{{$post->image}}">
    </a>
    <a href="{{route('site.post.detail',['slug'=>$post->slug])}}">

      <p class="justify line-cla,p line-clap-1">{{$post->detail}}</p>
    </a>
    </div>
    @endforeach
</div>