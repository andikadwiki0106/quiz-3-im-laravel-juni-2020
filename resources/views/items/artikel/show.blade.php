@extends('layouts.master')

@section('title', 'Detail Artikel Page')

@section('content')
    <div class="container">
        <h1 class="text-dark">Detail Artikel</h1>
        <hr>
        <ul class="list-unstyled bg-white">
            <li class="media p-3">
                <div class="media-body">
                    <h5 class="mt-0">judul: {{$article->judul}}</h5>
                    <h6>slug: {{$article->slug}}</h6>
                    <p>{{$article->isi}}</p>
                    @foreach ($tags as $tag)
                        <button type="button" class="btn btn-success">{{$tag->tag}}</button>
                    @endforeach
                </div>
            </li>
        </ul>
    </div>
@endsection