@extends('dashboard.dashboard')

@section('content')
<div class="">
                
            <h3 class="ml-2">Form Kontak Tim SAR</h3>
    
    <div class="col-md-12">
        <div class="mt-4">
            <div class="card mb-4">
                <div class="card-header">Form Kontak Tim SAR Sekitar</div>
                <div class="card-body">
                    <form action="/sar" method="POST" enctype="multipart/form-data">
                        @csrf
                        <x-input field="namatimsar" Label="Nama Tim SAR" type="text" placeholder="Tulis nama tim sar disini" />
                        <x-input field="notimsar" Label="Kontak Tim SAR" type="text" placeholder="Tulis kontak tim sar disini" />
                        <x-input field="alamat" Label="Alamat Tim SAR" type="text" placeholder="Tulis alamat tim sar disini" />
                        <button type="submit" class="btn btn-primary float-right">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


</div>
</div>
@endsection