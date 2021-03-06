@extends('layouts.eborang2')
@section('content')
    @yield('subContent')
    <div>
        <h1 class="mt-4">Halaman user prodi</h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt pariatur inventore, voluptate exercitationem quam voluptatem necessitatibus doloremque et quisquam. Earum temporibus quo soluta similique magnam, dolor quidem vel mollitia dolorem?</p>
    </div>
@endsection

@section('sidebar')
    <a href="#homeSubmenu" aria-expanded="false" data-toggle="collapse" class="dropdown-toggle list-group-item list-group-item-action bg-light">Dokumen Diploma</a>
    <ul class="list-unstyled collapse" id="homeSubmenu" style="">
        <li>
            <a href="{{route('dok_diploma.index')}}" class="list-group-item list-group-item-action bg-light">Lihat Dokumen</a>
        </li>
        <li>
            <a href="{{route('dok_diploma.create')}}" class="list-group-item list-group-item-action bg-light">Tambah Dokumen</a>
        </li>
    </ul>
    <a href="#homeSubmenu2" aria-expanded="false" data-toggle="collapse" class="dropdown-toggle list-group-item list-group-item-action bg-light">Dokumen Perguruan Tinggi</a>
    <ul class="list-unstyled collapse" id="homeSubmenu2" style="">
        <li>
            <a href="{{route('dok_pt.index')}}" class="list-group-item list-group-item-action bg-light">Lihat Dokumen</a>
        </li>
        <li>
            <a href="{{route('dok_pt.create')}}" class="list-group-item list-group-item-action bg-light">Tambah Dokumen</a>
        </li>
    </ul>
    {{-- <a href="#" class="list-group-item list-group-item-action bg-light">menu tambahan</a>
    <a href="#" class="list-group-item list-group-item-action bg-light">menu tambahan</a> --}}
@endsection