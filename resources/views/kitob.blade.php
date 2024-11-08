@extends('main1')

@section('title', 'Kitoblar')

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
                    <h1 class="m-0">Kitoblar</h1>
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
                                    <form action="/createkitob" method="POST">
                                        @csrf
                                        <div class="mb-3">
                                            <label class="form-label">Kitob name</label>
                                            <input type="text" class="form-control" placeholder="input kitob name"
                                                name="name">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Kitob author</label>
                                            <input type="text" class="form-control" placeholder="input kitob author"
                                                name="author">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Kitob Price</label>
                                            <input type="number" class="form-control" placeholder="input talaba adress"
                                                name="price">
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
                                    <th>Name</th>
                                    <th>Author</th>
                                    <th>Price</th>
                                    <th>Update</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody id="userTableBody">
                                @foreach($kitoblar as $talaba)
                                <tr>
                                    <td>{{ $talaba->id }}</td> 
                                    <td>{{ $talaba->name }}</td>
                                    <td>{{ $talaba->author}}</td>
                                    <td>{{ $talaba->price }}</td>
                                    <td>
                                            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $talaba->id }}">
                                                Update
                                            </button>
                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal{{ $talaba->id }}" tabindex="-1" aria-labelledby="exampleModalLabel{{ $talaba->id }}" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel{{ $talaba->id }}">Edit Post</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="updatetalaba/{{$talaba->id}}" method="POST">
                                                            @csrf
                                                            <div class="mb-3">
                                                                <label class="form-label">Talaba name</label>
                                                                <input type="text" class="form-control" name="name" value="{{ $talaba->name }}">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="form-label">Talaba age</label>
                                                                <input type="number" class="form-control" name="age" value="{{ $talaba->age }}">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="form-label">Talaba adress</label>
                                                                <input type="text" class="form-control" name="adress" value="{{ $talaba->adress }}">
                                                            </div>
                                                            <div class="mb-3">
                                                             
                                                            
                                                            
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
                                    <td><a href="deletetalaba/{{$talaba->id}}" class="btn btn-danger">Delete</a></td>
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