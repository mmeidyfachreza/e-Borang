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
    <a href="#homeSubmenu2" aria-expanded="false" data-toggle="collapse" class="dropdown-toggle list-group-item list-group-item-action bg-light">Kategori Dokumen</a>
    <ul class="list-unstyled collapse" id="homeSubmenu2" style="">
        <li>
            <a href="{{route('katdokpt.index')}}" class="list-group-item list-group-item-action bg-light">Perguruan Tinggi</a>
        </li>
        <li>
            <a href="{{route('katdoksarjana.index')}}" class="list-group-item list-group-item-action bg-light">Sarjana</a>
        </li>
    </ul>
    {{-- <a href="#" class="list-group-item list-group-item-action bg-light">menu tambahan</a>
    <a href="#" class="list-group-item list-group-item-action bg-light">menu tambahan</a> --}}
@endsection

