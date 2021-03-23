@extends('admin.layouts.layout')


@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Edit tag</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Home</a></li>
                            <li class="breadcrumb-item active">Blank Page</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="list-unstyled">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
        @endif
        <!-- Default box -->
            <div class="card">

                <div class="card-header">

                    <h3 class="card-title">Tag: "{{$Tag->title}}"</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                                title="Collapse">
                            <i class="fas fa-minus"></i></button>
                        {{--<button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                            <i class="fas fa-times"></i></button>--}}
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{route('tags.update',['tag'=>$Tag->id])}}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="mb-3 row">
                            <label for="id" class="col-sm-2 col-form-label">ID</label>
                            <div class="col-sm-10">
                                <input type="text" readonly disabled class="form-control" id="id" value="{{$Tag->id}}">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="title" class="col-sm-2 col-form-label">Tag name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{$Tag->title}}">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mb-3">Edit</button>
                    </form>

                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    Футер
                </div>
                <!-- /.card-footer-->
            </div>
            <!-- /.card -->

        </section>
        <!-- /.content -->
    </div>
@endsection
