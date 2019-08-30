@extends('admin.index')
@section('subContent')
    {{-- <div class="alert alert-success col-md-4">
        <strong></strong>
        asdsad
    </div> --}}
        @if(count($errors)>0)
        <div class="alert alert-danger col-md-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
        @endif
          <div class="card bg-light">
                <div class="card-header">Edit Kategori Dokumen</div>
                    <div class="card-body">
                            <form action="{{ route('katdoksarjana.update',$katdoksarjana->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                    <div class="form-group col-md-6">
                                        <div class="form-group">
                                            <label for="InputNama">Nama Kategori</label>
                                            <input type="text" class="form-control" name="nama" aria-describedby="help nama" placeholder="masukan nama" value="{{$katdoksarjana->nama}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="InputTahun">Keterangan</label>
                                            <input type="text" class="form-control" name="deskripsi" aria-describedby="help deskripsi" placeholder="masukan keterangan" value="{{$katdoksarjana->deskripsi}}">
                                        </div>
                                      <button type="submit" class="btn btn-primary">Simpan</button>
                                      <a href="{{URL::previous()}}" class="btn btn-danger">Batal</a>
                                    </div>
                            </form>
                    </table>
                </div> 
            </div>
@endsection