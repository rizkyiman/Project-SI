@Extends('layout')
@section('content')
<div class="container-fluid p-0">

    <h1 class="h3 mb-3"><strong>Petikemas</strong> Dashboard</h1>
    <div class="col-sm-4">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Add New</button>
    </div>
    <div class="card mt-4">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID Petikemas</th>
                    <th scope="col">Muatan</th>
                    <th scope="col">Golongan</th>
                    <th scope="col">Warna</th>
                    <th scope="col">Berat Muatan</th>
                    <th scope="col">Perusahaan</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($petikemas as $value)
                <tr>
                    <th scope="row">{{ $value->id}}</th>
                    <td>{{ $value->muatan}}</td>
                    <td>{{ $value->golongan}}</td>
                    <td>{{ $value->warna}}</td>
                    <td>{{ $value->berat_muatan}}</td>
                    <td>{{ $value->user->company}}</td>
                    <td>
                      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal{{$value->id}}">Edit</button>
                      <a type="button" class="btn btn-danger" href="{{ route('delete.petikemas',['id'=>$value->id]) }}">Delete</a>
                      <div class="modal fade" id="exampleModal{{$value->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Petikemas Edit</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="{{route('update.petikemas')}}" method="POST">
                                    @method('put')
                                    @csrf
                                <div class="modal-body">
                                  <div class="mb-3">
                                    <input type="text" name="id" hidden value="{{$value->id}}" class="form-control" id="recipient-name">
                                    <label for="recipient-name" class="col-form-label">Muatan:</label>
                                    <input type="text" name="muatan" class="form-control" id="recipient-name"  value="{{$value->muatan}}" >
                                </div>
                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">Golongan:</label>
                                    <input type="text" name="golongan" class="form-control" id="recipient-name" value="{{$value->golongan}}">
                                </div>
                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">Warna:</label>
                                    <input type="text" name="warna" class="form-control" id="recipient-name" value="{{$value->warna}}">
                                </div>
                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">Berat Muatan:</label>
                                    <input type="text" name="berat_muatan" class="form-control" id="recipient-name" value="{{$value->berat_muatan}}">
                                </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Petikemas Add</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{route('store.petikemas')}}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Muatan:</label>
                            <input type="text" name="muatan" class="form-control" id="recipient-name">
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Golongan:</label>
                            <input type="text" name="golongan" class="form-control" id="recipient-name">
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Warna:</label>
                            <input type="text" name="warna" class="form-control" id="recipient-name">
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Berat Muatan:</label>
                            <input type="text" name="berat_muatan" class="form-control" id="recipient-name">
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">User ID:</label>
                            <select class="form-select form-select-sm" name="role" aria-label=".form-select-sm example">
                                <option selected disabled>Open this select menu</option>
                                @foreach($profile as $key)
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
    @endsection
