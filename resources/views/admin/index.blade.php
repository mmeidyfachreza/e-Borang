@extends('layouts.eborang2')
@section('content')
    @yield('subContent')
@endsection

@section('sidebar')
    <a href="#homeSubmenu" aria-expanded="false" data-toggle="collapse" class="dropdown-toggle list-group-item list-group-item-action bg-light">Data User</a>
    <ul class="list-unstyled collapse" id="homeSubmenu" style="">
        <li>
            <a href="{{route('user.index')}}" class="list-group-item list-group-item-action bg-light">Lihat Data</a>
        </li>
        <li>
            <a href="{{route('user.create')}}" class="list-group-item list-group-item-action bg-light">Tambah User</a>
        </li>
    </ul>
    <a href="#homeSubmenu2" aria-expanded="false" data-toggle="collapse" class="dropdown-toggle list-group-item list-group-item-action bg-light">Dokumen Sarjana</a>
    <ul class="list-unstyled collapse" id="homeSubmenu2" style="">
        <li>
            <a href="{{route('dok_sarjana.index')}}" class="list-group-item list-group-item-action bg-light">Lihat Dokumen</a>
        </li>
        <li>
            <a href="{{route('dok_sarjana.create')}}" class="list-group-item list-group-item-action bg-light">Tambah Dokumen</a>
        </li>
    </ul>
    <a href="#homeSubmenu3" aria-expanded="false" data-toggle="collapse" class="dropdown-toggle list-group-item list-group-item-action bg-light">Dokumen Perguruan Tinggi</a>
    <ul class="list-unstyled collapse" id="homeSubmenu3" style="">
        <li>
            <a href="{{route('dok_sarjana.index')}}" class="list-group-item list-group-item-action bg-light">Lihat Dokumen</a>
        </li>
        <li>
            <a href="{{route('dok_sarjana.create')}}" class="list-group-item list-group-item-action bg-light">Tambah Dokumen</a>
        </li>
    </ul>
    {{-- <a href="#" class="list-group-item list-group-item-action bg-light">menu tambahan</a>
    <a href="#" class="list-group-item list-group-item-action bg-light">menu tambahan</a> --}}
@endsection

