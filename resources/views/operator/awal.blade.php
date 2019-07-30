@extends('layouts.app_eborang')
@section('content')
      <table class="table table-striped table-responsive">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">No Identitas</th>
                <th scope="col">Nama</th>
                <th scope="col">Alamat</th>
                <th scope="col">No Hp</th>
              </tr>
            </thead>
            <tbody>
                <?php $x=1?>
                @foreach ($operators as $data)
                    <tr>
                        <th scope="row">{{ $x++ }}</th>
                        <td>{{$data->no_identitas}}</td>
                        <td>{{$data->nama}}</td>
                        <td>{{$data->alamat}}</td>
                        <td>{{$data->no_hp}}</td>
                    </tr>
                @endforeach
              
            </tbody>
          </table>
@endsection

@section('sidebar')
<a href="#submenu1" data-toggle="collapse" aria-expanded="false" class="bg-dark list-group-item list-group-item-action flex-column align-items-start">
        <div class="d-flex w-100 justify-content-start align-items-center">
            <span class="fa fa-dashboard fa-fw mr-3"></span>
            <span class="menu-collapsed">Form  Sarjana</span>
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