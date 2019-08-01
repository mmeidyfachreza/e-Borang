@extends('admin.index')
@section('subContent')
@if(count($errors)>0)
    <div class="alert alert-danger col-md-4">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="{{ route('kategori-dokumen.store') }}" method="POST">
    {{ csrf_field() }}
        <div class="form-group">
            <div class="form-group">
                <label for="InputNama">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" aria-describedby="help nama" placeholder="masukan nama">
            </div>
            <div class="form-group">
                <label for="Inputdeskripsi">Deskripsi</label>
                <input type="text" class="form-control" id="deskripsi" name="deskripsi" aria-describedby="help deskripsi" placeholder="masukan deskripsi">
            </div>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </form>
@endsection

