@extends('operator.index')
@section('subContent')
    {{-- <div class="alert alert-success col-md-4">
        <strong></strong>
        asdsad
    </div> --}}
          <div class="card bg-light">
                <div class="card-header">Dokumen Sarjana</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Tahun</th>
                                    <th scope="col">File Diupload</th>
                                    <th scope="col">Publikasi</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $x=1?>
                                @foreach ($files as $data)
                                    <tr>
                                        <th scope="row">{{ $x++ }}</th>
                                        <td>{{$data->nama}}</td>
                                        <td>{{$data->tahun}}</td>
                                        <td>{{ $data->namafile }}</td>
                                        <td>{{ $data->publikasi }}</td>
                                        <td><a href="{{ route('files.download', $data->uuid) }}">Download</a> | <a href="{{ route('files.hapus', $data->uuid) }}">Hapus</a> | <a href="{{ route('files.edit', $data->uuid) }}">Edit</a></td>
                                    </tr>
                                @endforeach
                            
                            </tbody>
                        </table>
                    </div>
                </div> 
            </div>
@endsection