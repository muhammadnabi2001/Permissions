@extends('main1')

@section('title', 'Telefonlar')

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
                    <h1 class="m-0">Telefonlar</h1>
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
                                    <form action="/createtelefon" method="POST">
                                        @csrf
                                        <div class="mb-3">
                                            <label class="form-label">Telefon model</label>
                                            <input type="text" class="form-control" placeholder="input phone model"
                                                name="model">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Telefon color</label>
                                            <input type="text" class="form-control" placeholder="input phone color"
                                                name="color">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Telefon price</label>
                                            <input type="number" class="form-control" placeholder="input phone price"
                                                name="price">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Telefon count</label>
                                            <input type="number" class="form-control" placeholder="input phone price"
                                                name="count">
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
                                    <th>Model</th>
                                    <th>Color</th>
                                    <th>Price</th>
                                    <th>Count</th>
                                    <th>Update</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody id="userTableBody">
                                @foreach($telefonlar as $telefon)
                                <tr>
                                    <td>{{ $telefon->id }}</td> 
                                    <td>{{ $telefon->model }}</td> 
                                    <td>{{ $telefon->color }}</td>
                                    <td>{{ $telefon->price }}</td>
                                    <td>{{ $telefon->count }}</td>
                                    
                                    
                                    <td>
                                            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $telefon->id }}">
                                                Update
                                            </button>
                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal{{ $telefon->id }}" tabindex="-1" aria-labelledby="exampleModalLabel{{ $telefon->id }}" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel{{ $telefon->id }}">Edit Post</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="updateuser/{{$telefon->id}}" method="POST">
                                                            @csrf
                                                            <div class="mb-3">
                                                                <label class="form-label">Username</label>
                                                                <input type="text" class="form-control" name="name" value="{{ $telefon->model }}">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="form-label">User email</label>
                                                                <input type="email" class="form-control" name="email" value="{{ $telefon->color }}">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="form-label">User role</label>
                                                                <input type="text" class="form-control" name="role" value="{{ $telefon->price }}">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="form-label">User password</label>
                                                                <input type="password" class="form-control" name="password" value="{{$telefon->count}}">
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
                                    <td><a href="deleteuser/{{$telefon->id}}" class="btn btn-danger">Delete</a></td>
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