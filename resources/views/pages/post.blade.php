<div class="boxed  push-down-60">
    <div class="meta">
        @if($image)
        <img class="wp-post-image" src="{{ $image }}" alt="Blog image" width="1138" height="493">
        @endif
        <div class="row">
            <div class="col-xs-12  col-sm-10  col-sm-offset-1  col-md-8  col-md-offset-2">
                <div class="meta__container--without-image">
                    <div class="row">
                        <div class="col-xs-12  col-sm-8">
                            <div class="meta__info">
                                <span class="meta__date"><span class="glyphicon glyphicon-calendar"></span> &nbsp; {{ $date }}</span>
                            </div>
                        </div>
                        <div class="col-xs-12  col-sm-4">
                            <div class="comment-icon-counter-detail">
                                <span class="glyphicon glyphicon-comment comment-icon"></span>
                                <span class="comment-counter">10</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-xs-10  col-xs-offset-1  col-md-8  col-md-offset-2  push-down-60">

            <div class="post-content">
                <h1>
                    <a href="#">{{ $title }}</a>
                </h1>
                <h3>{{ $tagline ?? ''}}</h3>
                {!! $text !!}
            </div>
            <div class="row">
                <div class="col-xs-12  col-sm-6">

                    <div class="post-comments">
                        <a class="btn  btn-primary" href="single-post-without-image.html">Комментарии (3)</a>
                    </div>

                </div>
                <div class="col-xs-12  col-sm-6">

                    <div class="social-icons">
                        <a href="#" class="social-icons__container"> <span class="zocial-facebook"></span> </a>
                        <a href="#" class="social-icons__container"> <span class="zocial-twitter"></span> </a>
                        <a href="#" class="social-icons__container"> <span class="zocial-email"></span> </a>
                    </div>

                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12">
                    <div class="tags">
                        <h6>Тэги</h6>
                        <hr>
                        @forelse($tagsArr as $tag)
                        <a href="/post/tag/{{ $tag }}" class="tags__link">{{ $tag }}</a>
                        @empty
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

