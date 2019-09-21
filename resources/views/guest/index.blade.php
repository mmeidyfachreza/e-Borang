@extends('layouts.eborang2')
@section('content')
    @yield('subContent')
@endsection

@section('sidebar')
    <a href="#homeSubmenu" aria-expanded="false" data-toggle="collapse" class="dropdown-toggle list-group-item list-group-item-action bg-light">Dokumen Perguruan Tinggi</a>
    <ul class="list-unstyled collapse" id="homeSubmenu" style="">
        <?php  $a=1?>
            @foreach ($submenus1 as $item)
            <li>
                    <a href="{{url('dokumen-perguruan-tinggi',$item->slug_judul)}}" class="list-group-item list-group-item-action bg-light">{{$a++}}. {{$item->nama}}</a>
            </li>    
            @endforeach
    </ul>
    <a href="#homeSubmenu2" aria-expanded="false" data-toggle="collapse" class="dropdown-toggle list-group-item list-group-item-action bg-light">Dokumen Diploma</a>
    <ul class="list-unstyled collapse" id="homeSubmenu2" style="">
        <?php  $b=1?>
        @foreach ($submenus2 as $item)
        <li>
                <a href="{{url('dokumen-diploma',$item->slug_judul)}}" class="list-group-item list-group-item-action bg-light">{{$b++}}. {{$item->nama}}</a>
        </li>    
        @endforeach
    </ul>
    
    {{-- <a href="#" class="list-group-item list-group-item-action bg-light">menu tambahan</a>
    <a href="#" class="list-group-item list-group-item-action bg-light">menu tambahan</a> --}}
@endsection