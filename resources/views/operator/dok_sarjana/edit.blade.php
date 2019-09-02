@extends('operator.index')
@section('subContent')
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
          <div class="card bg-light">
                <div class="card-header">Edit Dokumen Sarjana</div>
                    <div class="card-body">
                            <form action="{{ route('dok_sarjana.update',$dok_sarjana->uuid) }}" method="POST" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                @method('PUT')
                                    <div class="form-group col-md-6">
                                        <div class="form-group">
                                            <label for="InputNama">Nama File</label>
                                            <input type="text" class="form-control" id="nama" name="nama" aria-describedby="help nama" required placeholder="masukan nama" value="{{$dok_sarjana->nama}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="InputTahun">Tahun</label>
                                            <input type="text" class="form-control" id="tahun" name="tahun" aria-describedby="help tahun" required placeholder="masukan tahun" value="{{$dok_sarjana->tahun}}">
                                        </div>
                                        <div class="form-group">
                                                <label >Kategori Dokumen</label>
                                                <select name="kategori_id" class="custom-select">
                                                    {{-- <option selected>Pilih</option> --}}
                                                    @foreach ($katdok_sarjana as $item)
                                                        <option @if ($item->id==$dok_sarjana->katdokpt_id)
                                                           selected 
                                                        @endif value="{{$item->id}}">{{$item->nama}}</option>    
                                                    @endforeach
                                                </select> 
                                        </div>
                                        <div class="form-group">
                                            <label for="InputTahun">Publikasi : ya </label>
                                            <input type="checkbox" name="publikasi" id="publikasi" @if ($dok_sarjana->publikasi=="ya") checked @else  @endif value="ya">
                                        </div>
                                        <div class="form-group">
                                                <label for="exampleFormControlFile1">File saat ini : {{$dok_sarjana->namafile}}</label>
                                        </div>
                                        <div class="form-group">
                                                <label for="exampleFormControlFile1">Pilih FIle Baru</label>
                                                <input type="file" class="form-control-file" id="exampleFormControlFile1" name="excel">
                                        </div>
                                      <button type="submit" class="btn btn-primary">Simpan</button>
                                      <a href="{{URL::previous()}}" class="btn btn-danger">Batal</a>
                                    </div>
                            </form>
                    </table>
                </div> 
            </div>
@endsection