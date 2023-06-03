@Extends('layout')
@section('content')
<div class="container-fluid p-0">

    <h1 class="h3 mb-3"><strong>Trucking</strong> Dashboard</h1>
    <div class="col-sm-4">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Add New</button>
        <a type="button" class="btn btn-info" href="{{route('print.truck') }}" target="_blank" >Print</a>
    </div>
    <div class="card mt-4">
        <table class="table">
            <tbody>
                <thead>
                    <tr>
                        <th scope="col">ID Trucking</th>
                        <th scope="col">Sopir</th>
                        <th scope="col">NoPol</th>
                        <th scope="col">Tujuan</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">ID Import</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
            <tbody>
                @foreach($trucking as $value)
                <tr>
                    <th scope="row">{{ $value->id}}</th>
                    <td>{{ $value->nama_sopir}}</td>
                    <td>{{ $value->nopol}}</td>
                    <td>{{ $value->tujuan}}</td>
                    <td>{{ $value->keberangkatan}}</td>
                    <td>{{ $value->gudang_id}}</td>
                    <td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal{{$value->id}}">Edit</button>
                        <a type="button" class="btn btn-danger" href="{{ route('delete.trucking',['id'=>$value->id]) }}">Delete</a>
                    </td>
                    <div class="modal fade" id="exampleModal{{$value->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Trucking Edit</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="{{route('update.trucking',['id'=>$value->id])}}" method="POST">
                                    @method('put')
                                    @csrf
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label for="recipient-name" class="col-form-label">Sopir:</label>
                                            <input type="text" name="nama_sopir" class="form-control" id="recipient-name" value="{{$value->nama_sopir}}">
                                        </div>
                                            <div class="mb-3">
                                                <label for="recipient-name" class="col-form-label">Nopol:</label>
                                                <input type="text" name="nopol" class="form-control" id="recipient-name" value="{{$value->nopol}}">
                                            </div>
                                            <div class="mb-3">
                                                <label for="recipient-name" class="col-form-label">Tujuan:</label>
                                                <input type="text" name="tujuan" class="form-control" id="recipient-name" value="{{$value->tujuan}}">
                                            </div>
                                            <div class="mb-3">
                                                <label for="recipient-name" class="col-form-label">Tanggal:</label>
                                                <input type="date" name="keberangkatan" class="form-control" id="recipient-name">
                                            </div>
                                        <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Trucking Add</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{route('store.trucking')}}" method="POST">
                        @csrf
                    <div class="modal-body">
                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">Sopir:</label>
                                <input type="text" name="nama_sopir" class="form-control" id="recipient-name">
                            </div>
                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">Nopol:</label>
                                <input type="text" name="nopol" class="form-control" id="recipient-name">
                            </div>
                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">Tujuan:</label>
                                <input type="text" name="tujuan" class="form-control" id="recipient-name">
                            </div>
                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">Tanggal:</label>
                                <input type="date" name="keberangkatan" class="form-control" id="recipient-name">
                            </div>
                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">ID Impor:</label>
                                <select class="form-select form-select-sm" name="gudang_id" aria-label=".form-select-sm example">
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
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endsection
