@extends('home.layouts.layout')

@section('title','Laravel Blog :: ' . $post->title)


@section('content')

    <div class="page-wrapper">
        <div class="blog-title-area">
            <ol class="breadcrumb hidden-xs-down">
                <li class="breadcrumb-item"><a href="{{route('home.index')}}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{route('categories.single',['slug' => $post->category->slug])}}">{{$post->category->title}}</a></li>
                <li class="breadcrumb-item active">{{$post->title}}</li>
            </ol>

            <span class="color-yellow"><a href="" title="">{{$post->category->title}}</a></span>

            <h3>{{$post->title}}</h3>

            <div class="blog-meta big-meta">
                <small>{{$post->getPostDate()}}</small>
                <small><i class="fa fa-eye"></i>{{$post->views}}</small>
            </div><!-- end meta -->

        </div><!-- end title -->

        <div class="single-post-media">
            <img src="{{$post->getImage()}}" alt="" class="img-fluid">
        </div><!-- end media -->

        <div class="blog-content">
            <div class="pp">
                <p>{{$post->description}}</p>
                <p>{{$post->content}}</p>
            </div><!-- end pp -->
        </div><!-- end content -->

        <div class="blog-title-area">
            @if($post->tags->count())
            <div class="tag-cloud-single">
                <span>Tags</span>
                @foreach($post->tags as $tag)
                <small><a href="{{route('tag.single',['slug'=>$tag->slug])}}" title="">{{$tag->title}}</a></small>
                @endforeach
            </div><!-- end meta -->
            @endif
        </div><!-- end title -->

        <div class="row">
            <div class="col-lg-12">
                <div class="banner-spot clearfix">
                    <div class="banner-img">
                        <img src="../../../public/assets/home/upload/banner_01.jpg" alt="" class="img-fluid">
                    </div><!-- end banner-img -->
                </div><!-- end banner -->
            </div><!-- end col -->
        </div><!-- end row -->

        <hr class="invis1">



        <div class="custombox clearfix">
            <h4 class="small-title">You may also like</h4>
            <div class="row">
                <div class="col-lg-6">
                    <div class="blog-box">
                        <div class="post-media">
                            <a href="single.blade.php" title="">
                                <img src="../../../public/assets/home/upload/market_blog_02.jpg" alt="" class="img-fluid">
                                <div class="hovereffect">
                                    <span class=""></span>
                                </div><!-- end hover -->
                            </a>
                        </div><!-- end media -->
                        <div class="blog-meta">
                            <h4><a href="single.blade.php" title="">We are guests of ABC Design Studio</a></h4>
                            <small><a href="blog-category-01.html" title="">Trends</a></small>
                            <small><a href="blog-category-01.html" title="">21 July, 2017</a></small>
                        </div><!-- end meta -->
                    </div><!-- end blog-box -->
                </div><!-- end col -->

                <div class="col-lg-6">
                    <div class="blog-box">
                        <div class="post-media">
                            <a href="single.blade.php" title="">
                                <img src="../../../public/assets/home/upload/market_blog_03.jpg" alt="" class="img-fluid">
                                <div class="hovereffect">
                                    <span class=""></span>
                                </div><!-- end hover -->
                            </a>
                        </div><!-- end media -->
                        <div class="blog-meta">
                            <h4><a href="single.blade.php" title="">Nostalgia at work with family</a></h4>
                            <small><a href="blog-category-01.html" title="">News</a></small>
                            <small><a href="blog-category-01.html" title="">20 July, 2017</a></small>
                        </div><!-- end meta -->
                    </div><!-- end blog-box -->
                </div><!-- end col -->
            </div><!-- end row -->
        </div><!-- end custom-box -->


    </div>
@endsection
