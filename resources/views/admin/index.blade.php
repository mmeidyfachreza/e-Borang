@extends('layouts.app_eborang')
@section('content')
    @yield('subContent')
@endsection

@section('sidebar')
<a href="#submenu1" data-toggle="collapse" aria-expanded="false" class="bg-dark list-group-item list-group-item-action flex-column align-items-start">
        <div class="d-flex w-100 justify-content-start align-items-center">
            <span class="fa fa-dashboard fa-fw mr-3"></span>
            <span class="menu-collapsed">Dokumen</span>
            <span class="submenu-icon ml-auto"></span>
        </div>
    </a>
    <div id='submenu1' class="collapse sidebar-submenu">
        <a href="{{route('kategori-dokumen.index')}}" class="list-group-item list-group-item-action bg-dark text-white">
            <span class="menu-collapsed">Lihat File</span>
        </a>
        <a href="{{route('kategori-dokumen.create')}}" class="list-group-item list-group-item-action bg-dark text-white">
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