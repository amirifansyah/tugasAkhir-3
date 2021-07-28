@extends('Admin')
@section('tittle', 'Daftar Order Makanan')
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
        <h2 class="card-title">Daftar Order Makanan</h2>
        
        <div class="card-tools">
          <div class="input-group input-group-sm" style="width: 150px;">
            <a href="{{route('promo.create')}}" class="btn btn-success">Create new</a>
             
    
          </div>
        </div>
      </div>
      <!-- /.card-header -->
      <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
          
          <thead>
            <tr>
              <th>No</th>
              <th>Nama</th>
              <th>Nomer HP</th>
              <th>Lokasi Tujuan</th>
              <th>Nama Makanan</th>
              <th>Jumlah Pesanan</th>
              <th>request Pesanan</th>
              <th>Hapus</th>
            </tr>
          </thead>
          <tbody>
              @forelse ($orders as $order)
              <tr @if ($loop->odd) class="bg-success" @endif>
                  <td>{{ $loop->iteration}}</td>
                  <td>{{ $order->nama}}</td>
                  <td>{{ $order->no}}</td>
                  <td>{{ $order->alamat}}</td>
                  <td>{{ $order->namaMakanan}}</td>
                  <td class="text-center">{{ $order->bayar->jumlah}}</td>
                  <td>{{ $order->bayar->req}}</td>
                  <td>
                    <form action="{{route('order.destroy', $order->id)}}" method="POST">
                      @method('DELETE')
                      @csrf
                      <button class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
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