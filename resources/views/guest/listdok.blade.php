@extends('guest.index')
@section('subContent')
    <div>
        <h1 class="mt-4">Website E-Borang</h1>
                <p>merupakan website yang menyediakan dokumen-dokumen dari univeresitas yang bersifat umum</p>
                <p>pastikan anda login terlebih dahulu agar dapat mendownload dokumen yang tersedia .</p>
    </div>
    <div class="search-panel">
        
    </div>
    {{-- <div class="alert alert-success col-md-4">
        <strong></strong>
    </div> --}}

        <div class="card bg-light">
            <div class="card-header">Dokumen {{$title}}</div>
                <div class="card-body">
                        <form class="form-inline" action="{{ route('guest.searchsarjana') }}" method="POST">
                            {{ csrf_field() }}
                            <label for="email" class="mr-sm-2">Nama:</label>
                            <input type="text" class="form-control mb-2 mr-sm-2" name="nama" value="{{request('nama')}}">
                            <label for="pwd" class="mr-sm-2">Tahun:</label>
                            <input type="text" class="form-control mb-2 mr-sm-2" name="tahun" value="{{request('tahun')}}">
                            <button type="submit" class="btn btn-primary mb-2 mr-sm-2"><i class="fa fa-search" aria-hidden="true"></i></button>
                            @if (!request('nama')==null||!request('tahun')==null)
                            <a href="{{url('/')}}" class="btn btn-danger mb-2">Ulang</a>    
                            @endif
                        </form>
                    <table class="table table-striped" style="width:100%">
                        <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Tahun</th>
                            
                            @if (Auth::user())
                            @if (Auth::user()->roles->first()->name=="dosen"||Auth::user()->roles->first()->name=="admin"||Auth::user()->roles->first()->name=="operator")
                            <th scope="col">Aksi</th>
                            @endif    
                            @endif
                            
                        </tr>
                        </thead>
                        <tbody>
                            <?php $x=1?>
                            @foreach ($dok as $data)
                                <tr>
                                    <th scope="row">{{ $x++ }}</th>
                                    <td>{{$data->nama}}</td>
                                    <td>{{$data->tahun}}</td>
                                    
                                    @if (Auth::user())
                                    @if (Auth::user()->roles->first()->name=="dosen"||Auth::user()->roles->first()->name=="admin"||Auth::user()->roles->first()->name=="operator")
                                    <td><a href="{{ route('dok_sarjana.download', $data->uuid) }}">Download</a></td>    
                                    @endif    
                                    @endif
                                    
                                </tr>
                            @endforeach
                        
                        </tbody>
                </table>
            </div> 
        </div>
        <br>
        
@endsection