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
                                Catering
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="{{route('catering.create')}}" methods="post">
                                        <i class="material-icons">group</i>
                                        <span>Tambah catering</span>
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <div class="body table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Judul</th>
                                    <th>Gambar</th>
                                    <th>Deskripsi</th>
                                    <th>Deskripsi lengkap</th>
                                    <th>Foto</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php $no = 1 @endphp
                                @foreach($catering as $c)
                                    <tr>
                                        <th scope="row">{{ $no++ }}</th>
                                        <td>{{$c->judul}}</td>
                                        <td><img src="assets\images\upload\catering\gambar\{{$c->gambar}}" style="height: 100px;width: 100px"></td>
                                        <td>{{$c->deskripsi}}</td>
                                        <td>{{$c->deskripsi_lengkap}}</td>
                                        <td><img src="assets\images\upload\catering\foto\{{$c->foto}}" style="height: 100px;width: 100px"></td>
                                        <td>@php if($c->isAktif == 1)
                                            {
                                                echo "Aktif";
                                            } else if ($c->isAktif == 2)
                                            {
                                                echo  "Tidak Aktif";
                                            }
                                            @endphp
                                        </td>
                                        <td>
                                            <form action="{{ route('catering.destroy', $c->id_catering) }}" method="post">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                <a href="{{ route('catering.edit',$c->id_catering) }}" class=" btn btn-sm btn-primary">Update</a>
                                                @php if($c->isAktif == 1)
                                                    {
                                                @endphp
                                                <button class="btn btn-sm btn-danger" type="submit" name="Aktif" value="Aktif" onclick="return confirm('Yakin ingin mengarsip data?')">Arsip</button>
                                                @php
                                                    } else if($c->isAktif == 2)
                                                    {
                                                @endphp
                                                <button class="btn btn-sm btn-danger" type="submit" name="Aktif" value="Aktif" onclick="return confirm('Yakin ingin mengarsip data?')">Aktif</button>
                                                @php
                                                    }
                                                @endphp
                                                <button class="btn btn-sm btn-danger" name="Hapus" type="submit" value="Hapus" onclick="return confirm('Yakin ingin menghapus data?')">Hapus</button>
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