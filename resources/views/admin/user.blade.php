@extends('Admin')
@section('tittle', 'Daftar User')
@section('content')


<div class="row">
  <div class="col-12">
    <div class="card">
        @if (session('pesan'))
            <div class="alert alert-success">
                {{ session('pesan') }}
            </div>
        @endif
        @if (session('delete'))
        <div class="alert alert-danger">
            {{ session('delete') }}
        </div>
        @endif

      <div class="card-header">
        <h2 class="card-title">Daftar User</h2>
        {{-- <a href="{{route('landing.index')}}" class="btn btn-info">Landing Page</a> --}}
        {{-- <a href="{{route('masuk.index')}}" class="btn btn-info">sign</a> --}}
        
        {{-- <div class="card-tools">
          <div class="input-group input-group-sm" style="width: 150px;">
            <a href="{{route('berat.create')}}" class="btn btn-success">Create new</a>
             
    
          </div>
        </div> --}}
      </div>
      <!-- /.card-header -->
      <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
          
          <thead>
            <tr>
              <th>No</th>
              <th>nama</th>
              <th>Email</th>
              <th>Role</th>
            </tr>
          </thead>
          <tbody>
              @forelse ($users as $user)
              <tr>
                  <td>{{ $loop->iteration}}</td>
                  <td>{{$user->name}}</td>
                  <td>{{$user->email}}</td>
                  <td>{{$user->role}}</td>
                  {{-- <td> --}}
                    {{-- <a href="{{route('berat.edit', $berat->id)}}" class="btn btn-success"> <i class="fas fa-edit"></i> </a> --}}
                    

                 
                      {{-- <i class="fas fa-trash-alt"></i> --}}
                      {{-- <form action="{{route('berat.destroy', $berat->id)}}" method="POST">
                        @method('DELETE')
                        @csrf
                        <td>
                          <button class="btn btn-danger" onclick="return confirm('Apakah Kamu Yakin Menghapus Menu Makanan Ini ?')" style="font-size: 14px"><i class="far fa-trash-alt"></i></button>
                      </td>
                      </form> --}}
{{--                    
                  </td> --}}
              </tr>    
              @empty
                  <td colspan="8" class="text-center" >Data Kosong</td>
              @endforelse
              
          </tbody>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
</div>
@endsection