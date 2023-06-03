@Extends('layout')
@section('content')
<div class="container-fluid p-0">

    <h1 class="h3 mb-3"><strong>Warehouseing</strong> Dashboard</h1>
    <div class="col-sm-4">
        <button type="button" class="btn btn-primary" padding="right" data-bs-toggle="modal" data-bs-target="#exampleModal">Add New</button>
    </div>
    <div class="card mt-4">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Row</th>
                    <th scope="col">Cell</th>
                    <th scope="col">Date</th>
                    <th scope="col">ID Eksport</th>
                    <th scope="col">ID Import</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($warehousing as $value)
                <tr>
                    <th scope="row">{{ $value->id}}</th>
                    <td>{{ $value->row}}</td>
                    <td>{{ $value->cell}}</td>
                    <td>{{ $value->waktu}}</td>
                    <td>{{ $value->id_ekspor}}</td>
                    <td>{{ $value->id_impor}}</td>
                    <td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal{{$value->id}}">Edit</button>
                        <a type="button" class="btn btn-danger" href="{{ route('delete.warehouseing',['id'=>$value->id]) }}">Delete</a>
                    </td>
                    <div class="modal fade" id="exampleModal{{$value->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Warehouseing Add</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="{{route('update.warehouseing',['id'=>$value->id])}}" method="POST">
                                    @method('put')
                                    @csrf
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label for="recipient-name" class="col-form-label">Row:</label>
                                            <input type="text" name="row" class="form-control" id="recipient-name" value="{{$value->row}}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="recipient-name" class="col-form-label">Cell:</label>
                                            <input type="text" name="cell" class="form-control" id="recipient-name" value="{{$value->cell}}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="recipient-name" class="col-form-label">Date:</label>
                                            <input type="date" name="waktu" class="form-control" id="recipient-name">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Update</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div> 
                </tr>
                @endforeach
                </body>
        </table>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Warehouseing Add</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{route('store.warehouseing')}}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Row:</label>
                            <input type="text" name="row" class="form-control" id="recipient-name">
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Cell:</label>
                            <input type="text" name="cell" class="form-control" id="recipient-name">
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Date:</label>
                            <input type="date" name="waktu" class="form-control" id="recipient-name">
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">ID Eksport:</label>
                            <select class="form-select form-select-sm" name="id_ekspor" aria-label=".form-select-sm example">
                                <option selected disabled>Open this select menu</option>
                                @foreach($ekspor as $key)
                                <option value="{{$key->id}}">{{$key->id}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">ID Import:</label>
                            <select class="form-select form-select-sm" name="id_impor" aria-label=".form-select-sm example">
                                <option selected disabled>Open this select menu</option>
                                @foreach($impor as $key)
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
    </main>
    @endsection
