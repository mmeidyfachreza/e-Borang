@extends('layouts.app_eborang')
@section('content')

<div class="card col-md-12">
        <div class="card-body">
                <form action="{{ url('operator/edit/'.$files->uuid) }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                        <div class="form-group col-md-6">
                            <div class="form-group">
                                <label for="InputNama">Nama File</label>
                                <input type="text" class="form-control" id="nama" name="nama" aria-describedby="help nama" placeholder="masukan nama" value="{{$files->nama}}">
                            </div>
                            <div class="form-group">
                                <label for="InputTahun">Tahun</label>
                                <input type="text" class="form-control" id="tahun" name="tahun" aria-describedby="help tahun" placeholder="masukan tahun" value="{{$files->tahun}}">
                            </div>
                            <div class="form-group">
                                <label for="InputTahun">Publikasi : ya </label>
                                <input type="checkbox" name="publikasi" id="publikasi" @if ($files->publikasi=="ya") checked @else  @endif value="ya">
                            </div>
                            <div class="form-group">
                                    <label for="exampleFormControlFile1">File saat ini : {{$files->namafile}}</label>
                            </div>
                            <div class="form-group">
                                    <label for="exampleFormControlFile1">Pilih FIle Baru</label>
                                    <input type="file" class="form-control-file" id="exampleFormControlFile1" name="excel">
                            </div>
                          <button type="submit" class="btn btn-primary">Simpan</button>
                          <a href="{{URL::previous()}}" class="btn btn-danger">Batal</a>
                        </div>
                </form>
        </div>
      </div>

@if(count($errors)>0)
    <div class="alert alert-danger col-md-4">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif

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