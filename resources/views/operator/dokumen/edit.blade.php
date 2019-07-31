@extends('operator.index')
@section('subContent')
    {{-- <div class="alert alert-success col-md-4">
        <strong></strong>
        asdsad
    </div> --}}
          <div class="card bg-light">
                <div class="card-header">Upload Dokumen</div>
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
                    </table>
                </div> 
            </div>
@endsection