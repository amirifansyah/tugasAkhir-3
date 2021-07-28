@extends('Admin')
@section('tittle', 'Edit promo')
@section('content')


<div class="container">
    <div class="row">
        <div class="col-md-12">


            <form action="{{route('promo.update', $promo->id)}}" method="POST" enctype="multipart/form-data">
                @method('PATCH')
                @csrf
                <div class="form-group">
                  <label for="nama" class="form-label">Nama Promo</label>
                  <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" value="{{old('nama') ?? $promo->nama}}">
                  @error('nama')
                        <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="desc" class="form-label">Deskripsi</label>
                  <textarea name="desc" id="desc" rows="3" class="form-control  @error('desc') is-invalid @enderror">{{old('desc') ?? $promo->desc}}</textarea>
                  @error('desc')
                        <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="harga" class="form-label">Harga Diskon</label>
                  <input type="text" name="harga" class="form-control @error('harga') is-invalid @enderror" value="{{old('harga') ?? $promo->harga}}">
                  @error('harga')
                        <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="ringan_id" class="form-label">Pilih Makanan Ringan Promo</label>
                  <select name="ringan_id" id="ringan_id" class="form-control">
                    @foreach ($ringans as $ringan)
                        <option value="{{ $ringan->id }}" {{old('ringan_id') ?? $promo->ringan_id == $ringan->id ? 'selected' : ''}}>
                            {{$ringan->nama}}
                        </option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label for="berat_id" class="form-label">Pilih Makanan Berat Promo</label>
                  <select name="berat_id" id="berat_id" class="form-control">
                    @foreach ($berats as $berat)
                        <option value="{{ $berat->id }}" {{old('berat_id') ?? $promo->berat_id == $berat->id ? 'selected' : ''}}>
                            {{$berat->nama}}
                        </option>
                    @endforeach
                  </select>
                </div>
              <button type="submit" class="btn btn-primary">Simpan</button>
            </form>


        </div>
    </div>
</div>


@endsection