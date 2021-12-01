@extends('main')


@section('content')

<div class="post-form">

    <div class="post-form-content">

        <a href="/manageposted" class="exit" id="exit"><ion-icon name="exit-outline" ></ion-icon></a>

        <h1>Chỉnh sửa</h1>

        <form action="/manageposted/edit" method="POST" enctype="multipart/form-data">

            @include('alert')
            <input type="hidden" name="id" value="{{$post->id}}">
            <input type="text" name="title" value="{{ $post->title }}"placeholder="Tiêu đề">

            <textarea name="content" id="content">{{ $post->content }}</textarea>

            <input type="file"  id="upload" accept="image/*">
            <div class="img-frame" id="thumb_show">
                <a href="{{$post->thumb}}" target="_blank">
                    <img src="{{$post->thumb}}">
                </a>
            </div>
            <input type="hidden" name="thumb" id="thumb_url" value={{$post->thumb}}>
            <input type="text" class="sign" name="sign" value="{{$post->sign}}" placeholder="Chữ ký">

            <input type="submit" style="width: 140px;" value="Chỉnh sửa">

            @csrf

        </form>

    </div>

</div>

@endsection


@section('footer')
    <script src="/ckeditor/ckeditor.js"></script>
    <script>
        // Replace the <textarea id="editor1"> with a CKEditor 4
        // instance, using default configuration.
        CKEDITOR.replace( 'content' );
    </script>
    <script src="/template/js/post_form.js"></script>
@endsection
