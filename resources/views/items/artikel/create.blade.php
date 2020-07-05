@extends('layouts.master')

@section('title', 'Buat Artikel Page')

@section('content')
    <div class="container">
        <h1 class="text-dark">Buat Artikel</h1>
        <hr>
        <form method="POST" action="/artikel">
            @csrf
            <div class="form-group">
              <label for="judul">Judul Artikel</label>
              <input type="text" class="form-control" id="judul" name="judul">
            </div>
            <div class="form-group">
                <label for="isi">Isi Artikel</label>
                <textarea class="form-control" id="isi" name="isi" rows="5" style="resize: none;"></textarea>
            </div>
            <div class="form-group">
              <label for="tag">Tag</label>
              <input type="text" class="form-control" id="tag" name="tag" placeholder="Pisahkan tag dengan tanda ' # ' (contoh : php-laravel-web)">
            </div>
            <button type="submit" id="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
{{-- 
@push('scripts')
    <script>
        $('#submit').click(function () {     
            Swal.fire({
                title: 'Berhasil!',
                text: 'Memasangkan script sweet alert',
                icon: 'success',
                confirmButtonText: 'Cool'
            });
        });
    </script>
@endpush --}}