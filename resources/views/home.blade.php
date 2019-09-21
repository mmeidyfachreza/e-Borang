@extends('layouts.app_eborang')
@section('content')
    <div class="alert alert-success col-md-4">
        <strong></strong>
        
    </div>
      <table class="table table-striped table-responsive">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">Tahun</th>
                <th scope="col">File Diupload</th>
                <th scope="col">Publikasi</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>
                <?php $x=1?>
                @foreach ($files as $data)
                    <tr>
                        <th scope="row">{{ $x++ }}</th>
                        <td>{{$data->nama}}</td>
                        <td>{{$data->tahun}}</td>
                        <td>{{ $data->namafile }}</td>
                        <td>{{ $data->publikasi }}</td>
                        @if (Auth::user()->roles->first()->name=="dosen"||Auth::user()->roles->first()->name=="admin"||Auth::user()->roles->first()->name=="operator")
                        <td><a href="{{ route('files.download', $data->uuid) }}">Download</a></td>    
                        @endif
                        
                    </tr>
                @endforeach
              
            </tbody>
          </table>
@endsection

@section('sidebar')
<a href="#submenu1" data-toggle="collapse" aria-expanded="false" class="bg-dark list-group-item list-group-item-action flex-column align-items-start">
        <div class="d-flex w-100 justify-content-start align-items-center">
            <span class="fa fa-dashboard fa-fw mr-3"></span>
            <span class="menu-collapsed">Form  Diploma</span>
            <span class="submenu-icon ml-auto"></span>
        </div>
    </a>
    <div id='submenu1' class="collapse sidebar-submenu">
        <a href="{{url('operator\indexfile')}}" class="list-group-item list-group-item-action bg-dark text-white">
            <span class="menu-collapsed">Lihat File</span>
        </a>
        <a href="{{url('operator\tambahfile')}}" class="list-group-item list-group-item-action bg-dark text-white">
            <span class="menu-collapsed">Tambah File</span>
        </a>
    </div>
    <a href="#submenu2" data-toggle="collapse" aria-expanded="false" class="bg-dark list-group-item list-group-item-action flex-column align-items-start">
        <div class="d-flex w-100 justify-content-start align-items-center">
            <span class="fa fa-user fa-fw mr-3"></span>
            <span class="menu-collapsed">Form Perguruan Tinggi</span>
            <span class="submenu-icon ml-auto"></span>
        </div>
    </a>
    <div id='submenu2' class="collapse sidebar-submenu">
        <a href="{{url('operator\indexfile2')}}" class="list-group-item list-group-item-action bg-dark text-white">
            <span class="menu-collapsed">Lihat File</span>
        </a>
        <a href="{{url('operator\tambahfile2')}}" class="list-group-item list-group-item-action bg-dark text-white">
            <span class="menu-collapsed">Tambah File</span>
        </a>
    </div>
@endsection