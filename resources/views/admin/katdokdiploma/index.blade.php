@extends('admin.index')
@section('subContent')
      @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
      @endif
          <div class="card bg-light">
                <div class="card-header"><div style="float:left">Kategori Dokumen Diploma</div>  <div style="float:right"><a class="btn btn-primary" href="{{route('katdokdiploma.create')}}">Tambah</a></div></div>
                <div class="card-body" style="clear:both">
                    <div class="table-responsive">
                        <table class="table table-striped" style="width:100%">
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
                                  @foreach ($katdokdiplomas as $data)
                                      <tr>
                                          <th scope="row">{{ $x++ }}</th>
                                          <td>{{$data->nama}}</td>
                                          <td>{{$data->deskripsi}}</td>
                                          <form action="{{ route('katdokdiploma.destroy',$data->id) }}" method="POST">
                                              @csrf
                                              @method('DELETE')
                                          <td><button type="submit" onclick="return confirm('Dokumen yang berkaitan dengan kategori ini akan terhapus semua, tetap hapus?')" class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
                                            <a class="btn btn-warning" href="{{ route('katdokdiploma.edit', $data->id) }}"><i class="far fa-edit"></i></a></td>
                                          </form>
                                      </tr>
                                  @endforeach
                                
                              </tbody>
                        </table>
                    </div>
                </div> 
            </div>
@endsection