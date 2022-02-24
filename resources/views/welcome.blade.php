@extends('layouts.app')
@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-sm-8 offset-sm-2">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-3">Laravel Filter Query</h4>
                        <form action="/" method="get">
                            @csrf
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <label for="" class="form-label">Name</label>
                                    <input name="name" type="text" class="form-control" placeholder="Name" value="{{isset($_GET['name']) ? $_GET['name'] : ''}}">  
                                </div>
                                <div class="col-sm-3">
                                    <label for="" class="form-label">Age</label>
                                    <input name="number" type="number" class="form-control" placeholder="Age" value="{{isset($_GET['age']) ? $_GET['age'] : ''}}">  
                                </div>
                                <div class="col-sm-3">
                                    <label for="" class="form-label">Gender</label>
                                    <select name="gender" class="form-select">
                                        <option value="">-</option>
                                        <option value="male" selected="{{isset($_GET['gender']) && $_GET['gender'] == 'male'}}">Male</option>
                                        <option value="female" selected="{{isset($_GET['gender']) && $_GET['gender'] == 'male'}}">Female</option>
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <button type="submit" class="btn btn-primary mt-4">Search</button>
                                </div>
                            </div>
                        </form>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Age</th>
                                    <th scope="col">Gender</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($users as $user)
                                    <tr>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->age}}</td>
                                        <td>
                                            @if ($user->gender == 'male')
                                                <span class="badge bg-primary w-100">Male</span>
                                            @else
                                                <span class="badge bg-warning w-100">Female</span>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center">No user found</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection