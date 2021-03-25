@extends('dashboard.dashboard')
@section('title', 'edit table tentara')
    

@section('content')
        <div class="">
                <div class="col-md-12">
                    <div class="mt-4">
                        <div class="card mb-4">
                            <div class="card-header">Form Edit Kontak Tim SAR Sekitar</div>
                            <div class="card-body">
                                <form action="/sar/{{$sars->id}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <x-input field="namatimsar" Label="Nama Tim SAR" type="text" placeholder="Tulis nama tim sar disini" value="{{ $sars->namatimsar }}" />
                                    <x-input field="notimsar" Label="Kontak Tim SAR" type="text" placeholder="Tulis kontak tim sar disini" value="{{ $sars->notimsar}}" />
                                    <x-input field="alamat" Label="Alamat Tim SAR" type="text" placeholder="Tulis alamat tim sar disini" value="{{ $sars->alamat }}" />
                                    <button type="submit" class="btn btn-primary float-right">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>        
@endsection