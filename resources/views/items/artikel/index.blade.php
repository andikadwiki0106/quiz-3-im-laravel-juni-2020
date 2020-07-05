@extends('layouts.master')

@section('title', 'Artikel Page')

@section('content')
    <div class="container">
        <h1 class="text-dark">Artikel</h1>
        <hr>
        <table class="table table-striped text-center">
            <thead>
              <tr>
                <th scope="col">No.</th>
                <th scope="col">Judul</th>
                <th scope="col">Isi</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($articles as $key => $article)        
                    <tr>
                        <th scope="row">{{$key+1}}</th>
                        <td>{{$article->judul}}</td>
                        <td>{{$article->isi}}</td>
                        <td>
                            <a href="/artikel/{{$article->id}}" class="btn btn-info"><span class="fas fa-info"></span></a>
                            <a href="/artikel/{{$article->id}}/edit" class="btn btn-warning"><span class="fas fa-edit"></span></a>
                            <form action="/artikel/{{$article->id}}" method="post" style="display: inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">
                                    <span class="fas fa-trash"></span>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

@push('scripts')
    <script>
        Swal.fire({
            title: 'Berhasil!',
            text: 'Memasangkan script sweet alert',
            icon: 'success',
            confirmButtonText: 'Cool'
        });
    </script>
@endpush