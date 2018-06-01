@extends('base')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
            </div>
            <!-- Basic Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Informasi
                            </h2>
                            <ul class="header-dropdown m-r--5">

                            </ul>
                        </div>

                        <div class="body table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Logo</th>
                                    <th>Nama Perusahaan</th>
                                    <th>Alamat</th>
                                    <th>Telepon</th>
                                    <th>Hp</th>
                                    <th>Website</th>
                                    <th>Email1</th>
                                    <th>Email2</th>
                                    <th>Alamat2</th>
                                    <th>Longitude</th>
                                    <th>Latitude</th>
                                    <th>About</th>
                                    <th>Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php $no = 1 @endphp
                                @foreach($informasi as $i)
                                    <tr>
                                        <th scope="row">{{ $no++ }}</th>
                                        <td><img src="assets\images\upload\catering\logo\{{$i->logo}}" style="height: 100px;width: 100px"></td>
                                        <td>{{$i->nama_perusahaan}}</td>
                                        <td>{{$i->alamat}}</td>
                                        <td>{{$i->telepon}}</td>
                                        <td>{{$i->hp}}</td>
                                        <td>{{$i->website}}</td>
                                        <td>{{$i->email1}}</td>
                                        <td>{{$i->email2}}</td>
                                        <td>{{$i->alamat2}}</td>
                                        <td>{{$i->longtitude}}</td>
                                        <td>{{$i->latitude}}</td>
                                        <td>{{$i->about}}</td>
                                        <td>
                                            <form action="{{ route('informasi.destroy', $i->id_informasi) }}" method="post">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                <a href="{{ route('informasi.edit',$i->id_informasi) }}" class=" btn btn-sm btn-primary">Update</a>
                                            </form>
                                        </td>
                                    </tr>
                                </tbody>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection