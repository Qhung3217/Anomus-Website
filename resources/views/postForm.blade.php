@extends('main')

@section('head')
    <script src="/ckeditor/ckeditor.js"></script>
@endsection

@section('content')

<div class="post-form">

    <div class="post-form-content">

        <h1>Đăng bài</h1>

        <form action="/postForm" method="POST" enctype="multipart/form-data">

            @include('alert')

            <input type="text" name="title" value="{{ old('title') }}"placeholder="Tiêu đề">

            <textarea name="content" id="content">{{ old('content') }}</textarea>

            <input type="file"  id="upload" accept="image/*">
            <div class="img-frame" id="thumb_show"></div>
            <input type="hidden" name="thumb" id="thumb_url">
            <input type="text" class="sign" name="sign" value="{{ old('sign') }}" placeholder="Chữ ký">

            <input type="submit"  value="Đăng">

            @csrf

        </form>

    </div>

</div>

@endsection


@section('footer')
    <script>
         // Replace the <textarea id="editor1"> with a CKEditor 4
        // instance, using default configuration.
        CKEDITOR.replace( 'content' );
    </script>
    <script src="/template/js/post_form.js"></script>
@endsection
