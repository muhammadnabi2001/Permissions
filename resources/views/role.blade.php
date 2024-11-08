@extends('main1')

@section('title', 'Roles')

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
                    <h1 class="m-0">Roles</h1>
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
                                    <form action="/createrole" method="POST">
                                        @csrf
                                        <div class="mb-3">
                                            <label class="form-label">Role name</label>
                                            <input type="text" class="form-control" placeholder="input rolename"
                                                name="name">
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Permissions</label>
                                                <select name="permissions[]" class="select2" multiple="multiple" data-placeholder="Select a Role" style="width: 100%;">
                                                    @foreach($permissions as $permission)
                                                        <option value="{{ $permission->id }}" 
                                                            >
                                                            {{ $permission->key }}
                                                        </option>
                                                    @endforeach
                                                </select>            
                                            </div>
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
                    <div class="table-responsive">
                        <!-- table-responsive qo'shildi -->
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Is_active</th>
                                    <th>Permissions</th>
                                    <th>Update</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody id="userTableBody">
                                @foreach($roles as $role)
                                <tr>
                                    @if($role->name !=='admin')
                                        
                                    <td>{{ $role->id }}</td>
                                    <td>{{ $role->name }}</td>
                                    <td>
                                        @if($role->is_active)
                                            <a href="isactive/{{$role->id}}" class="btn btn-primary">True</a>
                                        @else
                                            <a href="noactive/{{$role->id}}"  class="btn btn-danger">False</a>
                                        @endif
                                    </td>
                                    <td>
                                        <!-- Modalni ochuvchi tugma -->
                                        <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                            data-bs-target="#roleModal{{ $role->id }}">
                                            Permissions
                                        </button>

                                        <!-- Modal oyna -->
                                        <div class="modal fade" id="roleModal{{ $role->id }}" tabindex="-1"
                                            aria-labelledby="roleModalLabel{{ $role->id }}" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="roleModalLabel{{ $role->id }}">User
                                                            Roles</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <ul class="list-group">
                                                            @foreach($role->permissions as $permittion)
                                                            <li class="list-group-item">{{ $permittion->key }}</li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $role->id }}">
                                            Update
                                        </button>
                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal{{ $role->id }}" tabindex="-1" aria-labelledby="exampleModalLabel{{ $role->id }}" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel{{ $role->id }}">Edit Post</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="/updaterole/{{$role->id}}" method="POST">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="mb-3">
                                                                <label class="form-label">Rolename</label>
                                                                <input type="text" class="form-control" name="name" value="{{ $role->name }}">
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label>User Permissions</label>
                                                                    <select name="permissions[]" class="select2" multiple="multiple" data-placeholder="Select a Role" style="width: 100%;">
                                                                        @foreach($permissions as $permission)
                                                                            <option value="{{ $permission->id }}" 
                                                                                @if(in_array($permission->id, $role->permissions->pluck('id')->toArray())) selected @endif>
                                                                                {{ $permission->key }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>            
                                                                </div>
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
                                    
                    <td><a href="deleterole/{{$role->id}}" class="btn btn-danger">Delete</a></td>
                    @endif
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