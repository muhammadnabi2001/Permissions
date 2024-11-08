@extends('main1')

@section('title', 'Universitets')

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
                    <h1 class="m-0">Universitets</h1>
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
                                    <form action="/createuniversitet" method="POST">
                                        @csrf
                                        <div class="mb-3">
                                            <label class="form-label">Universitet name</label>
                                            <input type="text" class="form-control" placeholder="input universitet"
                                                name="name">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Universitet adress</label>
                                            <input type="text" class="form-control" placeholder="input universitet adress"
                                                name="adress">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Universitet facultet</label>
                                            <input type="text" class="form-control" placeholder="input universitet facultet"
                                                name="facultet">
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
                                    <th>Adress</th>
                                    <th>Facultet</th>
                                    <th>Update</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody id="userTableBody">
                                @foreach($universitets as $universitet)
                                <tr>
                                    <td>{{ $universitet->id }}</td> 
                                    <td>{{ $universitet->name }}</td> 
                                    <td>{{ $universitet->adress }}</td>
                                    <td>{{ $universitet->facultet }}</td>
                                    
                                    
                                    <td>
                                            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $universitet->id }}">
                                                Update
                                            </button>
                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal{{ $universitet->id }}" tabindex="-1" aria-labelledby="exampleModalLabel{{ $universitet->id }}" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel{{ $universitet->id }}">Edit Post</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="updateuser/{{$universitet->id}}" method="POST">
                                                            @csrf
                                                            <div class="mb-3">
                                                                <label class="form-label">Username</label>
                                                                <input type="text" class="form-control" name="name" value="{{ $universitet->name }}">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="form-label">User email</label>
                                                                <input type="email" class="form-control" name="email" value="{{ $universitet->adress }}">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="form-label">User role</label>
                                                                <input type="text" class="form-control" name="role" value="{{ $universitet->facultet }}">
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
                                    <td><a href="deleteuser/{{$universitet->id}}" class="btn btn-danger">Delete</a></td>
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