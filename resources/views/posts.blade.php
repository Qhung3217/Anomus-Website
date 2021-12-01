@extends('main')

@section('content')
<div class="manage-posted" id="manage_posted">
    <span>Quản lý bài viết đã đăng</span>
    <a href="/manageposted" class="manage-posted-link">Tại đây</a>
</div>

<div class="content">
    @foreach ($posts as $post)
    {{-- @dd($posts) --}}
        <a href="/postdetail/{{ $post->id}}"  class="post">
            {{-- <div class="post"> --}}
                {{-- <input type="hidden" id="post_id" value="{{ $post->id }}"> --}}
                @if ($post->thumb != null)
                <div class="post-thumb">
                    <img src='{{ $post->thumb }}'>
                </div>
                @endif
                <div class="post-header">
                    <h2>{{ $post->title }}</h2>
                </div>

                <div class="post-body">

                    <div class="post-body-content">
                        {!! $post->content !!}
                    </div>

                    <div class="post-body-sign">
                        <p>{{ '--'.$post->sign }}</p>
                    </div>

                </div>

                <div class="post-footer">

                    <div class="heart-icon">
                        <ion-icon name="heart-circle-outline" id="heart_icon"
                        ></ion-icon>
                        <span>{{ $post->heartNums }}</span>
                    </div>

                    <div class="watch-icoin">
                        <ion-icon name="eye-outline"></ion-icon>
                        <span>{{ $post->viewNums }}</span>
                    </div>

                    <div class="comemnt">
                        {{$post->comments_count}} bình luận
                    </div>

                </div>
            {{-- </div> --}}
        </a>
    @endforeach
</div>
    @if ($posts->hasPages())
        <div class="paginate">
            {{ $posts->links('vendor.custom')}}
        </div>
    @else
    <div class="paginate">
        <span class="pager button">Bạn đã đọc hết tin</span>
    </div>
    @endif

@endsection

