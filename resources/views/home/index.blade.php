@extends('home.layouts.layout')

@section('title','Laravel Blog :: Home')


@section('header')

    <section id="cta" class="section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12 align-self-center">
                    <h2>My personal blog</h2>
                    <p class="lead"> Aenean ut hendrerit nibh. Duis non nibh id tortor consequat cursus at mattis felis.
                        Praesent sed lectus et neque auctor dapibus in non velit. Donec faucibus odio semper risus
                        rhoncus rutrum. Integer et ornare mauris.</p>

                </div>

            </div>
        </div>
    </section>

@endsection

@section('content')

    <div class="page-wrapper">
        <div class="blog-custom-build">

            @foreach($posts as $post)
            <div class="blog-box wow fadeIn">
                <div class="post-media">
                    <a href="{{route('home.show',['slug'=>$post->slug])}}" title="">
                        <img src="{{$post->getImage()}}" alt=""
                             class="img-fluid">
                        <div class="hovereffect">
                            <span></span>
                        </div>
                        <!-- end hover -->
                    </a>
                </div>
                <!-- end media -->
                <div class="blog-meta big-meta text-center">

                    <h4><a href="{{route('home.show',['slug'=>$post->slug])}}" title="">{{$post->title}}</a></h4>
                    <p>{!! $post->description !!}</p>
                    <small><a href="{{route('categories.single',['slug' => $post->category->slug])}}" title="">{{$post->category->title}}</a></small>
                    <small>{{$post->getPostDate()}}</small>
                    <small><i class="fa fa-eye"></i>{{$post->views}}</small>
                </div><!-- end meta -->
            </div><!-- end blog-box -->

            <hr class="invis">
                @endforeach

        </div>
    </div>

    <hr class="invis">

    <div class="row">
        <div class="col-md-12">
            <nav aria-label="Page navigation">
                <div class="pagination justify-content-center">
                {{$posts->links('pagination::bootstrap-4')}}
                </div>
            </nav>
        </div><!-- end col -->
    </div>

@endsection
