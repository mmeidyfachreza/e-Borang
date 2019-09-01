@extends('admin.index')
@section('subContent')
<div class="card bg-light">
    <div class="card-header">Profil User</div>
        <div class="card-body">
            <div class="row" >
                <div class="col-lg-2">
                        <img class="card-img-top" src="{{asset('image/contoh_avatar.png')}}" alt="Card image">
                </div>
                
                <div class="col-lg-7">
                    <table class="table table-striped" style="width:100%">
                        <tbody>  
                        <tr>
                            <th>
                                Nama<br>
                                Nomor Identitas<br>
                                Tanggal Lahir<br>
                                Alamat<br>
                                Nomor Hp<br>
                                Jabatan<br>
                                Email
                            </th>
                            <td></td>
                            <td>
                                {{$user->name}}<br>
                                {{$user->no_identitas}}<br>
                                {{date("d-m-Y", strtotime($user->tgl_lahir))}}<br>
                                {{$user->alamat}}<br>
                                {{$user->no_hp}}<br>
                                {{$user->roles->first()->name}}<br>
                                {{$user->email}}
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <a href="{{route('user.index')}}" class="btn btn-primary">Kembali</a>
                </div>
            </div>
        </div> 
    </div>
    
@endsection