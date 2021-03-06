@extends('admin.layouts.layout')


@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>New post</h1>
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

                    <h3 class="card-title">Create post</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                                title="Collapse">
                            <i class="fas fa-minus"></i></button>
                        {{--<button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                            <i class="fas fa-times"></i></button>--}}
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{route('posts.store')}}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3 row">
                            <label for="id" class="col-sm-2 col-form-label">ID (auto)</label>
                            <div class="col-sm-6">
                                <input type="text" readonly disabled class="form-control" id="id" value="{{$newId}}">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="title" class="col-sm-2 col-form-label">Title</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{old('title')}}">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="description" class="col-sm-2 col-form-label">Description</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control @error('description') is-invalid @enderror" id="description" name="description">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="content" class="col-sm-2 col-form-label">Content</label>
                            <div class="col-sm-6">
                                <textarea name="content" id="content" rows="2" class="form-control
@error('content') is-invalid @enderror"></textarea>
                            </div>
                        </div>


                        <div class="mb-3 row">
                            <label for="category_id" class="col-sm-2 col-form-label">Category</label>
                            <div class="col-sm-6">
                                <select class="form-control" id="category_id" name="category_id">
                                    @foreach($categories as $k => $v)
                                    <option value="{{$k}}">{{$v}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="mb-3 row" data-select2-id="29">
                            <label for="tag" class="col-sm-2 col-form-label">Tag</label>
                            <div class="input-group col-sm-6">
                            <select class="select2 select2-hidden-accessible col-sm-5 form-control"
                                    multiple="multiple" data-placeholder="Select a State" style="width: 100%;"
                                    data-select2-id="7" tabindex="-1" aria-hidden="true" name="tags[]">
                                @foreach($tags as $k => $v)
                                    <option value="{{$k}}">{{$v}}</option>
                                @endforeach
                            </select>  </div></div>


                        <div class="mb-3 row">
                            <label for="thumbnail" class="col-sm-2 col-form-label">Image</label>
                            <div class="input-group col-sm-6">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="thumbnail" name="thumbnail">
                                    <label class="custom-file-label" for="thumbnail">Choose image</label>
                                </div>
                            </div>
                        </div>



                        <button type="submit" class="btn btn-primary mb-3">Create</button>



                    </form>



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
