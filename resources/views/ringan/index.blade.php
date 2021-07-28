@extends('Admin')
@section('tittle', 'Makanan Ringan')
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
        <h2 class="card-title">Daftar Makanan Ringan</h2>
       
        <div class="card-tools">
          <div class="input-group input-group-sm" style="width: 150px;">
            <a href="{{route('ringan.create')}}" class="btn btn-success">Create new</a>
             
    
          </div>
        </div>
      </div>
      <!-- /.card-header -->
      <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
          
          <thead>
            <tr>
              <th>No</th>
              <th>Gambar</th>
              <th>Harga</th>
              <th>Nama Makanan</th>
              <th>Deskripsi</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
              @forelse ($ringans as $ringan)
              <tr>
                  <td>{{ $loop->iteration}}</td>
                  <td><img src="{{asset('storage/ringan/'.$ringan->gambar)}}" width="80px" alt=""></td>
                  <td>Rp. {{number_format($ringan->harga) }}</td>
                  <td>{{$ringan->nama}}</td>
                  <td>{{$ringan->desc}}</td>
                  <td>
                    <a href="{{route('ringan.edit', $ringan->id)}}" class="btn btn-success"> <i class="fas fa-edit"></i> </a>
                    

                 
                      {{-- <i class="fas fa-trash-alt"></i> --}}
                      <form action="{{route('ringan.destroy', $ringan->id)}}" method="POST">
                        @method('DELETE')
                        @csrf
                        <td>
                          <button class="btn btn-danger" onclick="return confirm('Apakah Kamu Yakin Menghapus Menu Makanan Ini ?')" style="font-size: 14px"><i class="far fa-trash-alt"></i></button>
                      </td>
                      </form>
                   
                  </td>
                  
                   
                  
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