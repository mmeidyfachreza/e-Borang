@extends('admin.index')
@section('subContent')
    <div class="alert alert-success col-md-4">
        <strong></strong>
        asdsad
    </div>
      <table class="table table-striped table-responsive">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">Deskripsi</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>
                <?php $x=1?>
                @foreach ($kat_doks as $data)
                    <tr>
                        <th scope="row">{{ $x++ }}</th>
                        <td>{{$data->nama}}</td>
                        <td>{{$data->deskripsi}}</td>
                        <td><a href="{{ route('kategori-dokumen.destroy', $data->id) }}">Hapus</a> | <a href="{{ route('kategori-dokumen.edit', $data->id) }}">Edit</a></td>
                    </tr>
                @endforeach
              
            </tbody>
          </table>
@endsection
