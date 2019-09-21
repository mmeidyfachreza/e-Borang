@extends('operator.index')
@section('subContent')
    {{-- <div class="alert alert-success col-md-4">
        <strong></strong>
        asdsad
    </div> --}}
          <div class="card bg-light">
                <div class="card-header">Dokumen Diploma</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Tahun</th>
                                    <th scope="col">File Diupload</th>
                                    <th scope="col">Kategori</th>
                                    <th scope="col">Publikasi</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $x=1?>
                                @foreach ($dok_diploma as $data)
                                    <tr>
                                        <th scope="row">{{ $x++ }}</th>
                                        <td>{{$data->nama}}</td>
                                        <td>{{$data->tahun}}</td>
                                        <td>{{ $data->namafile }}</td>
                                        <td>{{ $data->kat_dokumen->nama }}</td>
                                        <td>{{ $data->publikasi }}</td>
                                        <form action="{{ route('dok_diploma.destroy',$data->uuid) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                        <td><button type="submit" class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
                                          <a class="btn btn-warning" href="{{ route('dok_diploma.edit', $data->uuid) }}"><i class="far fa-edit"></i></a>
                                          <a class="btn btn-primary" href="{{ route('dok_diploma.download', $data->uuid) }}"><i class="fas fa-file-download"></i></a></td>
                                        </form>
                                        
                                    </tr>
                                @endforeach
                            
                            </tbody>
                        </table>
                    </div>
                </div> 
            </div>
@endsection