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
                <div class="card-header">Edit Kategori Dokumen</div>
                    <div class="card-body">
                        <form action="{{ route('user.update',$user->id) }}" method="POST">
                            {{ csrf_field() }}
                            @method('PUT')
                            <div class="form-group col-md-6">
                                
                                    
                                    <div class="form-group">
                                        <label >No Identitas</label>
                                        <input type="text" class="form-control" name="no_id" value="{{$user->no_identitas}}" required placeholder="masukan No Identitas" >
                                    </div>
                                    <div class="form-group">
                                        <label >Nama Lengkap</label>
                                        <input type="text" class="form-control" name="nama" value="{{$user->name}}" required placeholder="masukan nama" >
                                    </div>
                                    <div class="form-group">
                                        <label >Tanggal Lahir</label>
                                        <input type="text" class="form-control" name="tgl_lahir" value="{{date("d-m-Y", strtotime($user->tgl_lahir))}}" required placeholder="dd-mm-yyyy" >
                                    </div>
                                    <div class="form-group">
                                        <label >No HP</label>
                                        <input type="text" class="form-control" name="no_hp" value="{{$user->no_hp}}" required placeholder="masukan Alamat" >
                                    </div>
                                    <div class="form-group">
                                        <label >Alamat</label>
                                        <textarea class="form-control" name="alamat"  required placeholder="masukan Alamat" cols="30" rows="5">{{$user->alamat}}</textarea>
                                        
                                    </div>
                                    <div class="form-group">
                                        <label >Jabatan</label>
                                        <select name="jabatan" class="custom-select">
                                            {{-- <option selected>Pilih</option> --}}
                                            @foreach ($jabatan as $item)
                                                <option @if ($item->id==$user->roles->first()->id)
                                                   selected 
                                                @endif value="{{$item->id}}">{{$item->name}}</option>    
                                            @endforeach
                                        </select> 
                                    </div>
                                    <p>note: Email dan Password digunakan untuk login ke sistem</p>
                                    <div class="form-group">
                                        <label >Email</label>
                                        <input type="email" class="form-control" name="email" value="{{$user->email}}" required placeholder="masukan Email" >
                                    </div>
                                    <div class="form-group">
                                        <label >Password</label>
                                        <input type="password" class="form-control" name="password" placeholder="masukan Password" >
                                        <p>Note : tidak usah diisi jika tidak merubah password</p>
                                    </div>
                              <button type="submit" class="btn btn-primary">Simpan</button>
                              <a href="{{URL::previous()}}" class="btn btn-danger">Batal</a>
                            </div>
                        </form>       
                    </div> 
            </div>
@endsection