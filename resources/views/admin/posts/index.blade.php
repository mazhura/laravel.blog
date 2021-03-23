@extends('admin.layouts.layout')


@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Index</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Home</a></li>
                            <li class="breadcrumb-item active">Blank Page</li>
                        </ol>
                    </div>
                </div>
                @if(session('deleted'))
                    <div class="alert alert-success" role="alert">
                        {{session('deleted')}}
                    </div>
                    @elseif(session('not_deleted'))
                    <div class="alert alert-danger" role="alert">
                        {{session('not_deleted')}}
                    </div>
                @else
                    @endif

                @if(session('success'))
                    <div class="alert alert-success" role="alert">
                        {{session('success')}}
                    </div>
                    @endif

            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Posts list</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                                title="Collapse">
                            <i class="fas fa-minus"></i></button>
                        {{--<button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                            <i class="fas fa-times"></i></button>--}}
                    </div>
                </div>
                <div class="card-body">
                    <a href="{{route('posts.create')}}" class="btn btn-primary mb-3">
                        Add post
                    </a>
                    @if(count($posts))
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Tags</th>
                                <th>Data</th>
                                <th style="width: 40px">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($posts as $post)
                                <tr>
                                    <td>{{$post->id}}</td>
                                    <td>{{$post->title}}</td>
                                    <td>{{$post->category->title}}</td>
                                    <td>{{$post->tags}}</td>
                                    <td>{{$post->slug}}</td>
                                    <td>{{$post->created_at}}</td>
                                    <td class="btn-group">
                                        <a href="{{route('posts.edit',$post->id)}}" class="btn btn-primary btn-info btn-sm float-left">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>
                                        <form action="{{route('posts.destroy',$post->id)}}" method="post" class="float-left">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-primary btn-danger btn-sm"
                                            onclick="confirm('Delete post?')">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @else
                        <div class="alert alert-danger">
                            Empty posts!
                        </div>
                    @endif
                    <div class="mt-3">
                        {{$posts->links('pagination::bootstrap-4')}}
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    Footer
                </div>
                <!-- /.card-footer-->
            </div>
            <!-- /.card -->

        </section>
        <!-- /.content -->
    </div>
@endsection
