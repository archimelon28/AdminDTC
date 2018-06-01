@extends('base')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>SubCatering</h2>
            </div>
            <!-- Input -->
            <form action="{{route('subcatering.update',$SubCatering->id_subcatering)}}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <div class="row clearfix">
                    <div class="row clearfix">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="card">
                                <div class="header">
                                    <h2>Judul</h2>
                                </div>
                                <div class="body">
                                    <div class="row clearfix">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" class="form-control" value="{{$SubCatering->judul}}" name="judul" />
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
                                                    <input type="text" class="form-control" value="{{$SubCatering->id_catering}}" name="id_catering" />
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
                                                        @foreach($SubCatering1 as $s)
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
                                <div class="body">
                                    <form action="/" id="frmFileUpload" class="dropzone" method="post" enctype="multipart/form-data">
                                        <div class="fallback">
                                            <img src="..\..\assets\images\upload\catering\gambarsub\{{$SubCatering->gambar}}" style="height: 100px;width: 100px">
                                        </div>
                                    </form>
                                </div>
                                <div class="form-group">
                                    <label>Gambar :</label>
                                    <input name="gambar" type="file"/>
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
                                                    <input type="text" class="form-control" value="{{$SubCatering->deskripsi}}" name="deskripsi" />
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