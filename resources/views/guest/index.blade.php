@extends('layouts.eborang2')
@section('content')
    @yield('subContent')
@endsection

@section('sidebar')
    <a href="#homeSubmenu" aria-expanded="false" data-toggle="collapse" class="dropdown-toggle list-group-item list-group-item-action bg-light">Dokumen Perguruan Tinggi</a>
    <ul class="list-unstyled collapse" id="homeSubmenu" style="">
        <li>
            <a href="{{url('/')}}" class="list-group-item list-group-item-action bg-light">Lihat Dokumen</a>
        </li>
    </ul>
    <a href="#homeSubmenu2" aria-expanded="false" data-toggle="collapse" class="dropdown-toggle list-group-item list-group-item-action bg-light">Dokumen Sarjana</a>
    <ul class="list-unstyled collapse" id="homeSubmenu2" style="">
        <li>
            <a href="#" class="list-group-item list-group-item-action bg-light">Lihat Dokumen</a>
        </li>
    </ul>
    {{-- <a href="#" class="list-group-item list-group-item-action bg-light">menu tambahan</a>
    <a href="#" class="list-group-item list-group-item-action bg-light">menu tambahan</a> --}}
@endsection