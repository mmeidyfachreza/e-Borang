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
                <div class="card-header">Upload Dokumen Perguruan Tinggi</div>
                    <div class="card-body">
                            <form action="{{ route('dok_pt.store') }}" method="POST" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label for="InputNama">Nama File</label>
                                            <input type="text" class="form-control" id="nama" name="nama" aria-describedby="help nama" required placeholder="masukan nama">
                                        </div>
                                        <div class="form-group">
                                            <label for="InputTahun">Tahun</label>
                                            <input type="text" class="form-control" id="tahun" name="tahun" aria-describedby="help tahun" required placeholder="masukan tahun">
                                        </div>
                                        <div class="form-group">
                                                <label >Kategori Dokumen</label>
                                                <select name="kategori_id" class="custom-select">
                                                    <option selected>Pilih</option>
                                                    @foreach ($kat_dok as $item)
                                                        <option value="{{$item->id}}">{{$item->nama}}</option>    
                                                    @endforeach
                                                </select> 
                                        </div>
                                        <div class="form-group">
                                            <label for="InputTahun">Publikasi : ya </label>
                                            <input type="checkbox" name="publikasi" id="publikasi" value="ya">
                                        </div>
                                        <div class="form-group">
                                                <label for="exampleFormControlFile1">Pilih FIle</label>
                                                <input type="file" class="form-control-file" id="exampleFormControlFile1" required name="excel">
                                        </div>
                                      <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                  </form>
                    </table>
                </div> 
            </div>
@endsection