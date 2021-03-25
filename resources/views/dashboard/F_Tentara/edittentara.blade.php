@extends('dashboard.dashboard')
@section('title', 'edit table tentara')
    

@section('content')
        <div class="">
                <div class="col-md-12">
                    <div class="mt-4">
                        <div class="card mb-4">
                            <div class="card-header">Form Edit Kontak Koramil Sekitar</div>
                            <div class="card-body">
                                <form action="/tni/{{$tentaras->id}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <x-input field="namakoramil" Label="Nama Koramil" type="text" placeholder="Tulis nama koramil disini" value="{{ $tentaras->namakoramil }}" />
                                    <x-input field="nokoramil" Label="Kontak Koramil" type="text" placeholder="Tulis kontak koramil disini" value="{{ $tentaras->nokoramil}}" />
                                    <x-input field="alamat" Label="Alamat Koramil" type="text" placeholder="Tulis alamat koramil disini" value="{{ $tentaras->alamat }}" />
                                    <button type="submit" class="btn btn-primary float-right">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>        
@endsection