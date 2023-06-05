@Extends('layout')
@section('content')
<div class="container-fluid p-0">

    <h1 class="h3 mb-3"><strong>Shipping</strong> Dashboard</h1>
    <div class="col-sm-4">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Add New</button>
        <a type="button" class="btn btn-danger" href="{{ route('print.shipping') }}" target="_blank">Print</a>
    </div>
    <div class="card mt-4">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID Kapal</th>
                    <th scope="col">Nama Kapal</th>
                    <th scope="col">Tujuan</th>
                    <th scope="col">ID Eksport</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($shipping as $value)
                <tr>
                    <th scope="row">{{ $value->id}}</th>
                    <td>{{ $value->nama_kapal}}</td>
                    <td>{{ $value->tujuan}}</td>
                    <td>{{ $value->gudang->id_ekspor}}</td>
                    <td>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal{{$value->id}}">Edit</button>
                        <a type="button" class="btn btn-danger" href="{{ route('delete.shipping',['id'=>$value->id]) }}">Delete</a>
                    </td>
                    <div class="modal fade" id="exampleModal{{$value->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Shipping Add</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="{{route('update.shipping',['id'=>$value->id])}}" method="POST">
                                    @method('put')
                                    @csrf
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label for="recipient-name" class="col-form-label">Nama Kapal:</label>
                                            <input type="text" name="nama_kapal" class="form-control" id="recipient-name" value="{{$value->nama_kapal}}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="recipient-name" class="col-form-label">Tujuan:</label>
                                            <input type="text" name="tujuan" class="form-control" id="recipient-name" value="{{$value->tujuan}}">
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
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Shipping Add</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{route('store.shipping')}}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Nama Kapal:</label>
                            <input type="text" name="nama_kapal" class="form-control" id="recipient-name">
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Tujuan:</label>
                            <input type="text" name="tujuan" class="form-control" id="recipient-name">
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">ID Eksport:</label>
                            <select class="form-select form-select-sm" name="gudang_id" aria-label=".form-select-sm example">
                                <option selected disabled>Open this select menu</option>
                                @foreach($pergudangan as $key)
                                <option value="{{$key->id}}">{{$key->id_ekspor}}</option>
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
