@extends('admin.index')
@section('subContent')
      @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
      @endif
          <div class="card bg-light">
                <div class="card-header">Data User</div>
                <div class="card-body">
                        <form class="form-inline" action="{{ route('user.search') }}" method="POST">
                                {{ csrf_field() }}
                                <label for="email" class="mr-sm-2">Nama:</label>
                                <input type="text" class="form-control mb-2 mr-sm-2" name="nama" value="{{request('nama')}}">
                                <label for="pwd" class="mr-sm-2">Tahun:</label>
                                <input type="text" class="form-control mb-2 mr-sm-2" name="email" value="{{request('email')}}">
                                <label for="pwd" class="mr-sm-2">No HP:</label>
                                <input type="text" class="form-control mb-2 mr-sm-2" name="no_hp" value="{{request('no_hp')}}">
                                {{-- <label for="pwd" class="mr-sm-2">Jabatan:</label>
                                <input type="text" class="form-control mb-2 mr-sm-2" name="jabatan" value="{{request('jabatan')}}"> --}}
                                <button type="submit" class="btn btn-primary mb-2 mr-sm-2"><i class="fa fa-search" aria-hidden="true"></i></button>
                                @if (!request('nama')==null||!request('email')==null||!request('no_hp')==null)
                                <a href="{{url('/admin/user')}}" class="btn btn-danger mb-2">Ulang</a>    
                                @endif
                            </form>
                    <div class="table-responsive">
                        <table class="table table-striped" style="width:100%">
                            <thead>
                                <tr>
                                  <th scope="col">No</th>
                                  <th scope="col">Nama</th>
                                  <th scope="col">email</th>
                                  <th scope="col">No HP</th>
                                  <th scope="col">Jabatan</th>
                                  <th scope="col">Aksi</th>
                                </tr>
                              </thead>
                              <tbody>
                                  <?php $x=1?>
                                  @foreach ($users as $data)
                                      <tr>
                                          <th scope="row">{{ $x++ }}</th>
                                          <td>{{$data->name}}</td>
                                          <td>{{$data->email}}</td>
                                          <td>{{$data->no_hp}}</td>
                                          <td>{{$data->jabatan}}</td>
                                          <form action="{{ route('user.destroy',$data->id) }}" method="POST">
                                              @csrf
                                              @method('DELETE')
                                          <td><button type="submit" class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
                                            <a class="btn btn-warning" href="{{ route('user.edit', $data->id) }}"><i class="far fa-edit"></i></a></td>
                                          </form>
                                      </tr>
                                  @endforeach
                                
                              </tbody>
                        </table>
                    </div>
                </div> 
            </div>
@endsection