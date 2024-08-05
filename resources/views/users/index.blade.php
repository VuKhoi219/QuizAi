@extends('layouts.app')

@section('content')
    {{--    Header content--}}
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>UserData</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">UserData</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Data USERS</h3>
                            <form action="{{ route('users.searchByUsername') }}" method="GET">
                                <input class="form-control form-control-sidebar" name="username" placeholder="Search by UserName" aria-label="Search">
                                <button type="submit">Submit</button>
                            </form>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>UserName</th>
                                    <th>Email</th>
                                    <th>Password</th>
                                    <th>Created At</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $user->username }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{$user->password}}</td>
                                        <td>{{$user->created_at}}</td>
                                        <td>{{$user->status}}</td>

                                        <td>
                                            <a href="{{ route('users.show', $user->id) }}" class="btn btn-info btn-sm">View</a>
                                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary btn-sm">Lock, Unlock</a>
                                            <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    @include('paginate.default', ['paginator' => $users])
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
@endsection
