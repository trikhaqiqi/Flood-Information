@extends('dashboard.dashboard')
    
@section('content')


        <div class="">
            <h3 class="ml-3">Form Kontak Kepolisian</h3>
                <div class="col-md-12">
                    <div class="mt-4">
                        <div class="card mb-4">
                            <div class="card-header">Form Kontak Kepolisian</div>
                            <div class="card-body">
                                <form action="/kepolisian" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <x-input field="namapolsek" Label="Nama Kepolisian" type="text" placeholder="Tulis nama kepolisian disini" />
                                    <x-input field="nopolsek" Label="Kontak" type="text" placeholder="Tulis kontak kepolisian disini" />
                                    <x-input field="alamat" Label="Alamat" type="text" placeholder="Tulis alamat kepolisian disini" />
                                    <button type="submit" class="btn btn-primary float-right">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>        
@endsection