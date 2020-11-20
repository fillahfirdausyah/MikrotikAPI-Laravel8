@extends('layouts.master')

@section('title', 'User')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">User</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ '/home' }}">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
   
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                          <h3 class="card-title">Data User</h3><br>
                          <form action="{{ '/hotspot/user/store' }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-primary">Tambah User Baru</button>
                          </form>  
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                          <table class="table table-striped">
                            <thead>
                              <tr>
                                <th>No</th>
                                <th>User</th>
                                <th>Password</th>
                                <th>Aksi</th>
                              </tr>
                            </thead>
                            @foreach ($user as $u)
                            <tbody>
                              <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>Username : {{ $u['name'] }}</td>
                                <td>Password : {{ $u['password'] }}</td>
                                <td>
                                    <a href="{{ '/hotspot/user/remove/' }}{{ $u['.id'] }}" class="btn btn-danger">Hapus</a>
                                </td>
                              </tr>
                            </tbody>
                            @endforeach
                          </table>
                        </div>
                        <!-- /.card-body -->
                      </div>
                      <!-- /.card -->
                </div>
            </div>
        </div>
    </section>

</div>
    
@endsection