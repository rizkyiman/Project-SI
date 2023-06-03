@Extends('layout')
@section('content')
<div class="container-fluid p-0">

    <h1 class="h3 mb-3"><strong>History</strong> Dashboard</h1>
    <div class="col-sm-4">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Add New</button>
        <a type="button" class="btn btn-danger" href="{{ route('print.history') }}" target="_blank">Print</a>
    </div>
    <div class="card mt-4">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Id Shippping</th>
                    <th scope="col">Id Trucking</th>
                    <th scope="col">Nama User</th>
                    <th scope="col">ID User</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($history as $key => $value)
                <tr>
                    <th scope="row">{{ $value->id}}</th>
                    <td>{{ $value->tanggal}}</td>
                    <td>{{ $value->kapal_id}}</td>
                    <td>{{ $value->trucking_id}}</td>
                    <td>{{ $value->user->name}}</td>
                    <td>{{ $value->user->id}}</td>
                    <td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal{{$value->id}}">Edit</button>
                        <a type="button" class="btn btn-danger" href="{{ route('delete.history',['id'=>$value->id]) }}">Delete</a>
                    </td>
                    <div class="modal fade" id="exampleModal{{$value->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Eksport Add</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="{{route('update.history',['id'=>$value->id])}}" method="POST">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label for="recipient-name" class="col-form-label">Date:</label>
                                            <input type="date" name="date" class="form-control" id="recipient-name">
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
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Eksport Add</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{route('store.history')}}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">Date:</label>
                                <input type="date" name="date" class="form-control" id="recipient-name">
                            </div>
                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">ID eksport:</label>
                                <select class="form-select form-select-sm" name="id_ekspor" aria-label=".form-select-sm example">
                                    <option selected disabled>Open this select menu</option>
                                    @foreach($shipping as $key)
                                    <option value="{{$key->id}}">{{$key->id}}</option>
                                    @endforeach
                                </select>
                                <label for="recipient-name" class="col-form-label">ID Import:</label>
                                <select class="form-select form-select-sm" name="id_impor" aria-label=".form-select-sm example">
                                    <option selected disabled>Open this select menu</option>
                                    @foreach($trucking as $key)
                                    <option value="{{$key->id}}">{{$key->id}}</option>
                                    @endforeach
                                </select>
                                <label for="recipient-name" class="col-form-label">ID User:</label>
                                <select class="form-select form-select-sm" name="id_user" aria-label=".form-select-sm example">
                                    <option selected disabled>Open this select menu</option>
                                    @foreach($user as $key)
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
    </div>
    @endsection
