@extends('layouts.eborang2')
@section('content')
    @yield('subContent')
    @section('content')
    @yield('subContent')
    <div>
        <h1 class="mt-4">Halaman user admin</h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt pariatur inventore, voluptate exercitationem quam voluptatem necessitatibus doloremque et quisquam. Earum temporibus quo soluta similique magnam, dolor quidem vel mollitia dolorem?</p>
    </div>
@endsection

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
            <a href="{{route('katdokdiploma.index')}}" class="list-group-item list-group-item-action bg-light">Diploma</a>
        </li>
    </ul>
    {{-- <a href="#" class="list-group-item list-group-item-action bg-light">menu tambahan</a>
    <a href="#" class="list-group-item list-group-item-action bg-light">menu tambahan</a> --}}
@endsection

