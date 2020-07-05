@extends('layouts.master')

@section('title', 'Edit Artikel Page')

@section('content')
    <div class="container">
        <h1 class="text-dark">Edit Artikel</h1>
        <hr>
        <form method="POST" action="/artikel/{{$id}}">
            @csrf
            @method('PUT')
            <div class="form-group">
              <label for="judul">Judul Artikel</label>
              <input type="text" class="form-control" id="judul" name="judul" value="{{$judul}}">
            </div>
            <div class="form-group">
                <label for="isi">Isi Artikel</label>
                <textarea class="form-control" id="isi" name="isi" rows="5" style="resize: none;">{{$isi}}</textarea>
            </div>
            <div class="form-group">
              <label for="tag">Tag</label>
                <input type="text" class="form-control" id="tag" name="tag" placeholder="Pisahkan tag dengan tanda ' # ' (contoh : php-laravel-web)" value="{{$tag}}">
            </div>
            <button type="submit" id="submit" class="btn btn-warning">Edit</button>
        </form>
    </div>
@endsection