@extends('main1')

@section('title', 'Ingredients')

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
            @endif
            @if (session('delete'))
            <div class="alert alert-danger" role="alert">
                {{ session('delete') }}
            </div>
            @endif
            @if (session('update'))
            <div class="alert alert-info" role="alert">
                {{ session('update') }}
            </div>
            @endif
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Posts</h1>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-sm-6 mt-2">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Create
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="/createpost" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="mb-3">
                                            <label class="form-label">Post title</label>
                                            <input type="text" class="form-control" placeholder="input post title"
                                                name="title">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Post description</label>
                                            <input type="text" class="form-control" placeholder="input post desctiption"
                                                name="description">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Post text</label>
                                            <input type="text" class="form-control" placeholder="input post text"
                                                name="text">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Post Image</label>
                                            <input type="file" class="form-control" placeholder="input post image"
                                                name="img">
                                        </div>
                                        
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" name="ok">create</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-10">
                    <form action="" method="get" class="m-2">
                        @csrf
                        <input type="text" class="form-control" id="searchinput" name="search">
                </div>
                <div class="col-2">
                    <input type="submit" value="search" class="btn btn-outline-success m-2" name="ok">
                    </form>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="table-responsive"> <!-- table-responsive qo'shildi -->
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Text</th>
                                    <th>Img</th>
                                    <th>Update</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody id="userTableBody">
                                @foreach($posts as $post)
                                <tr>
                                    <td>{{ $post->id }}</td>
                                    <td>{{ $post->title }}</td>
                                    <td>{{ $post->description }}</td>
                                    <td>{{ $post->text }}</td>
                                    <td><img src="{{ asset('img_uploaded/' . $post->img) }}" width="100px"></td>
                                    <td>
                                            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal{{$post->id}}">
                                                Update
                                            </button>
                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal{{$post->id}}" tabindex="-1" aria-labelledby="exampleModalLabel{{$post->id}}" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel{{$post->id}}">Edit Post</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="" method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                            <div class="mb-3">
                                                                <label class="form-label">Post Title</label>
                                                                <input type="text" class="form-control" name="title" value="{{$post->title}}">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="form-label">Post Description</label>
                                                                <input type="text" class="form-control" name="description" value="{{$post->description}}">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="form-label">Post Text</label>
                                                                <input type="text" class="form-control" name="text" value="{{$post->text}}">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="form-label">Post Image</label>
                                                                <input type="file" class="form-control" name="img">
                                                            </div>
                                                            <div class="mb-3">
                                                                <img src="" width="100px" alt="Current Image">
                                                            </div>
                                                            
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Update</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td><a href="deletepost/{{$post->id}}" class="btn btn-danger">Delete</a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                
            </div>
        </div>
    </section>
</div>
@endsection