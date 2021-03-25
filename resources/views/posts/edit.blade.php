@extends('layouts.app')
<link rel="stylesheet" href="../css/main.css">

@section('title', 'Halaman Edit Posts')
@section('content')
<div class="container mt-4">
    <a href="/post" class="btn btn-sm btn-info float-right mb-5 ">Back</a>
    <h1>Edit Laporan Data</h1>
    <hr>
    <div class="container">
        <div class="col-sm-6 mr-5 float-right mt-4 mb-5">
            <div class="card mb-1">
                <div class="card-header">Form Edit post</div>
                <div class="card-body">
                    <form action="/post/{{$post->id}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <x-input field="title" Label="Judul" type="text" placeholder="Tulis judul disini" value="{{$post->title}}" />
                        <x-input field="location" Label="Titik Koordinat Lokasi Banjir" type="text" placeholder="Sertakan titik lokasi banjir" id="location" name="location" value="{{$post->location}}" />

                        <div class="form-group">
                            <label for="category">Kategori Banjir</label>
                            <br>
                            <select name="category" id="category" class="form-control select2">
                                <option disabled selected>Choose One!</option>
                                @foreach($categories as $category)
                                <option {{ $category->id == $post->category_id ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('category')
                            <div class="text-danger mt-2">
                                {{ $message}}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="tags">Tag Penyebab</label>
                            <br>
                            <select name="tags[]" id=" tags" class="form-control select2" multiple>
                                @foreach($post->tags as $tag)
                                <option selected value="{{ $tag->id }}">{{ $tag->name }}</option>
                                @endforeach
                                @foreach($tags as $tag)
                                <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                @endforeach
                            </select>
                            @error('tags')
                            <div class="text-danger mt-2">
                                {{ $message}}
                            </div>
                            @enderror
                        </div>
                        <x-textarea field="subject" Label="Subject" type="text" value="{{$post->subject}}" />
                            @can('post.create')  
                            <x-input field="approve" Label="approve" type="text" placeholder="appove post" id="approve" name="approve" value="{{$post->approve}}" />
                            @endcan
                        @if($post->thumbnail)
                        <img src="/image/{{$post->thumbnail}}" width="150" alt="">
                        @else
                        <p>Kamu belum punya thumbnail</p>
                        @endif
                        <x-inputfile />
                        <button type="submit" class="btn btn-primary float-right">Save & Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="col-sm-5 ml-5 box-shadow form-group ">
            <div class="card-body mt-0">
                <h6>Edit Lokasi Banjir</h6>
                <div>
                    @include('maps.map')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
