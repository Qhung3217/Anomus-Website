@extends('main')

@section('content')

        <div class="box-post-detail">

            <div class="detail-post">
                <div class="exit" id="exit">
                    <ion-icon name="exit-outline" ></ion-icon>
                </div>

                <h1>{{$result[0]->title}}</h1>

                <div class="detail-post-content">

                    <span>{!! $result[0]->content !!}</span>

                </div>

                <div class="detail-post-sign">

                    <span>--{{$result[0]->sign}}</span>

                </div>
                @if($result[0]->thumb != null)
                <div class="detail-post-thumb" style="background-image:url(http://anomus.test{{$result[0]->thumb}});">
                </div>
                @endif
                <div class="detail-post-footer">

                    <div class="heart-icon">

                        <ion-icon name="heart-circle-outline" id="heart_icon"></ion-icon>

                        <span id="heart">{{$result[0]->heartNums}}</span>

                    </div>

                    <div class="watch-icon">

                        <ion-icon name="eye-outline"></ion-icon>

                        <span id="view">{{$result[0]->viewNums}}</span>

                    </div>

                    <div class="comemnt" id="cmt">
                        {{$result[0]->comments_count}} bình luận
                    </div>

                </div>

            </div>

            <div class="comment-area">

                <div class="comment-form">

                    <form action="javascript:void(0)" method="POST" id="form">
                        <input type="hidden" name="id" id="post_id" value="{{$result[0]->id}}">
                        <textarea name="comment_field" id="comment_field" type="text" rows="3" placeholder="Bạn đang nghỉ gì?"></textarea>
                        <div class="sign-submit">
                            <input type="text" name="sign" id="sign" placeholder="Chữ ký">
                            @csrf
                            <input type='submit' class="submit" value="Bình luận">
                        </div>
                    </form>

                </div>

                <div class="show-comment" id="show-comment">

                    {{-- @foreach ($cmts as $cmt)

                        <div class="comment-content">

                            <div class="show-comment-content">

                                <span>{{$cmt->content}}</span>

                            </div>

                            <div class="show-comment-sign">

                                <span>--{{$cmt->sign}}</span>

                            </div>

                        </div>

                    @endforeach --}}

                </div>

            </div>

        </div>




@section('footer')
    <script src="/template/js/post_detail.js"></script>
@endsection

@endsection
