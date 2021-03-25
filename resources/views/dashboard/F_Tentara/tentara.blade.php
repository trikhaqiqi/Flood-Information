@extends('dashboard.dashboard')

@section('content')
<div class="">
                
            <h3 class="ml-2">Form Kontak Koramil</h3>
    
    <div class="col-md-12">
        <div class="mt-4">
            <div class="card mb-4">
                <div class="card-header">Form Kontak Koramil Sekitar</div>
                <div class="card-body">
                    <form action="/tni" method="POST" enctype="multipart/form-data">
                        @csrf
                        <x-input field="namakoramil" Label="Nama Koramil" type="text" placeholder="Tulis nama koramil disini" />
                        <x-input field="nokoramil" Label="Kontak" type="text" placeholder="Tulis kontak koramil disini" />
                        <x-input field="alamat" Label="Alamat" type="text" placeholder="Tulis alamat koramil disini" />
                        <button type="submit" class="btn btn-primary float-right">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


</div>
</div>
@endsection