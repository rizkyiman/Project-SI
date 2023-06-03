@Extends('layout')
@section('content')
<div class="container-fluid p-0">

    <h1 class="h3 mb-3"><strong>Import</strong> Dashboard</h1>
    <div class="col-sm-4">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Add New</button>
    </div>
    <div class="card mt-4">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID Import</th>
                    <th scope="col">ID Petikemas</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($import as $value)
                <tr>
                    <th scope="row">{{ $value->id}}</th>
                    <td>{{ $value->id_petikemas}}</td>
                    <td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal{{$value->id}}">Edit</button>
                        <a type="button" class="btn btn-danger" href="{{ route('delete.import',['id'=>$value->id]) }}">Delete</a>
                    </td>
                    </tr>
                    <div class="modal fade" id="exampleModal{{$value->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Import Edit</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="{{route('update.import',['id'=>$value->id])}}" method="POST">
                                    @method('put')
                                    @csrf
                                    <div class="modal-body">
                                            <div class="mb-3">
                                                <label for="recipient-name" class="col-form-label">ID Gudang:</label>
                                                <select class="form-select form-select-sm" name="role" aria-label=".form-select-sm example">
                                                    <option selected disabled>Open this select menu</option>
                                                    @foreach($petikemas as $key)
                                                    <option value="{{$key->id}}">{{$key->id}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Update</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                @endforeach
                </body>
        </table>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Eksport Add</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{route('store.import')}}" method="POST">
                    @csrf
                <div class="modal-body">
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">ID Gudang:</label>
                            <select class="form-select form-select-sm" name="role" aria-label=".form-select-sm example">
                                <option selected disabled>Open this select menu</option>
                                @foreach($petikemas as $key)
                                <option value="{{$key->id}}">{{$key->id}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endsection
