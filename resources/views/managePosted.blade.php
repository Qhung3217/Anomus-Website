@extends('main')

@section('content')

<div class="content">
    @foreach ($posts as $post)
    {{-- @dd($posts) --}}
    <div class="post">

        <a href="/postdetail/{{ $post->id}}"   class="post-link">

                <div class="post-thumb">
                    @if ($post->thumb != null)
                    <img src='{{ $post->thumb }}'>
                    @endif
                </div>
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
                        data-id="{{ $post->id}}"></ion-icon>
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
        </a>
        <div class="action">
            <a href="/manageposted/edit/{{ $post->id }}"class="edit button" id='edit'>
                <ion-icon name="pencil-outline"></ion-icon>
                {{-- <span>Chỉnh sửa</span> --}}
            </a>
            <div class="delete button" id="delete" onclick="remove({{$post->id}})">
                <ion-icon name="close-outline"></ion-icon>
                {{-- <span>Xóa</span> --}}
            </div>
        </div>
    </div>
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

@section('footer')
    <script src="/template/js/managa_posted.js"></script>
@endsection
