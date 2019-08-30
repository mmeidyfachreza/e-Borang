@extends('admin.index')
@section('subContent')
    {{-- <div class="alert alert-success col-md-4">
        <strong></strong>
        asdsad
    </div> --}}
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
                <div class="card-header">Tambah User</div>
                    <div class="card-body">
                            <form action="{{ route('user.store') }}" method="POST">
                                {{ csrf_field() }}
                                    <div class="form-group col-md-6">
                                        <div class="form-group">
                                            <label >No Identitas</label>
                                            <input type="text" class="form-control" name="no_id" aria-describedby="" required placeholder="masukan No Identitas" >
                                        </div>
                                        <div class="form-group">
                                            <label >Nama Lengkap</label>
                                            <input type="text" class="form-control" name="nama" aria-describedby="" required placeholder="masukan nama" >
                                        </div>
                                        <div class="form-group">
                                            <label >Tanggal Lahir</label>
                                            <input type="text" class="form-control" name="tgl_lahir" aria-describedby="" required placeholder="Tahun-Bulan-Tanggal" >
                                        </div>
                                        <div class="form-group">
                                            <label >No HP</label>
                                            <input type="text" class="form-control" name="no_hp" aria-describedby="" required placeholder="masukan Alamat" >
                                        </div>
                                        <div class="form-group">
                                            <label >Alamat</label>
                                            <input type="textarea" class="form-control" name="alamat" aria-describedby="" required placeholder="masukan Alamat" >
                                        </div>
                                        <div class="form-group">
                                            <label >Jabatan</label>
                                            <select name="jabatan" class="custom-select">
                                                <option selected>Pilih</option>
                                                @foreach ($jabatan as $item)
                                                    <option value="{{$item->id}}">{{$item->name}}</option>    
                                                @endforeach
                                            </select> 
                                        </div>
                                        <p>note: Email dan Password digunakan untuk login ke sistem</p>
                                        <div class="form-group">
                                            <label >Email</label>
                                            <input type="email" class="form-control" name="email" aria-describedby="" required placeholder="masukan Email" >
                                        </div>
                                        <div class="form-group">
                                            <label >Password</label>
                                            <input type="password" class="form-control" name="password" aria-describedby="" required placeholder="masukan Password" >
                                        </div>
                                      <button type="submit" class="btn btn-primary">Simpan</button>
                                      <a href="{{URL::previous()}}" class="btn btn-danger">Batal</a>
                                    </div>
                            </form>
                </div> 
            </div>
@endsection