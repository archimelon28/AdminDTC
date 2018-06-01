@extends('base')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Catering</h2>
            </div>
            <!-- Input -->
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{route('subcatering.store')}}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="row clearfix">
                    <div class="row clearfix">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="card">
                                <div class="header">
                                    <h2>Kategori</h2>
                                </div>
                                <div class="body">
                                    <div class="row clearfix">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" class="form-control" placeholder="Judul" name="judul" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="body">
                                    <div class="row clearfix">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" class="form-control" placeholder="Id Catering" name="id_catering" />
                                                </div>
                                                <div class="body table-responsive">
                                                    <table class="table table-bordered">
                                                        <thead>
                                                        <tr>
                                                            <th>No.</th>
                                                            <th>Judul</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @php $no = 1 @endphp
                                                        @foreach($subcatering as $s)
                                                            <tr>
                                                                <th scope="row">{{ $no++ }}</th>
                                                                <td>{{$s->judul}}</td>
                                                            </tr>
                                                        </tbody>
                                                        @endforeach
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="card">
                                <div class="header">
                                    <h2>
                                        Gambar
                                    </h2>
                                </div>
                                <div class="body" >
                                    <form action="/" id="frmFileUpload" class="dropzone" method="post" enctype="multipart/form-data">
                                        <div class="dz-message">
                                            <h3 style="text-align: center">Pilih gambar</h3>
                                        </div>
                                        <div class="fallback">
                                            <input name="gambar" type="file"/>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row clearfix">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="card">
                                <div class="header">
                                    <h2>Deskripsi</h2>
                                </div>
                                <div class="body">
                                    <div class="row clearfix">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" class="form-control" placeholder="Deskripsi" name="deskripsi" />
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-default btn-circle-lg waves-effect waves-circle waves-float">
                                                <i class="material-icons">save</i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection