@extends('base')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Admin</h2>
            </div>
            <!-- Input -->
            <form action="{{route('admin.update',$Admin->id_admin)}}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="header">
                                <h2>Nama</h2>
                            </div>
                            <div class="body">
                                <div class="row clearfix">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" class="form-control" value="{{$Admin->nama}}" name="nama" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="header">
                                        <h2>Username</h2>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" class="form-control" value="{{$Admin->username}}" name="username" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="header">
                                        <h2>Password</h2>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="password" class="form-control" value="{{$Admin->password}}" name="password" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div style="text-align: right">
                                    <button type="submit" class="btn btn-sm btn-primary">
                                        Save
                                    </button>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

    </section>
@endsection