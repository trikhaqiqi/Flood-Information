@extends('layouts.app')
@section('styles')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection   
@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        // In your Javascript (external .js resource or <script> tag)
        $(document).ready(function() {
            $('.select2').select2({
                placeholder: "Select permissions"
            });
        });
    </script>
@endpush

@section('content')

<div class="container mt-4">
    <a href="/post" class="btn btn-sm text-white btn-info float-right mb-5 ">Back</a>
    <h1>Laporkan Banjir!</h1>
    <hr>

    <div class="container">
        <div class=" col-sm-6 mr-5 float-right mt-4 mb-5">
            <div class="card mb-1">
                <div class="card-header">Form New post</div>
                <div class="card-body">
                    <form action="/post" method="POST" enctype="multipart/form-data">
                        @csrf
                        <x-input field="title" Label="Judul Pemberitahuan" type="text" placeholder="Tulis judul disini" />
                        <div class="form-group">
                            <label for="category">Kategori Banjir</label>
                            <br>
                            <select name="category" id="category" class="form-control">
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
                            <select name="tags[]" id=" tags" class="form-control" multiple>
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
                        <x-input field="location" Label="Titik Koordinat Lokasi Banjir" type="text" placeholder="Sertakan titik lokasi banjir" id="location" name="location" />
                        <x-textarea field="subject" Label="Subject" type="text" placeholder="Tulis subject disini" />
                        <x-inputfile />
                        <button type="submit" class="btn btn-primary float-right">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="col-sm-6 ml-5 box-shadow form-group ">
            <div class="card-body mt-0">
                <h6>Cari & Tandai Lokasi Banjir</h6>
                <div>
                    @include('maps.map')
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
