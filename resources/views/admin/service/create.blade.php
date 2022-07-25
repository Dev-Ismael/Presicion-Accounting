@extends('layouts.admin')

@section('content')
    <div class="py-4 admin-page-info">
        <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
            <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
                <li class="breadcrumb-item " style="margin-top: -1px">
                    <a href="{{ route('home') }}">
                        <svg class="icon icon-xxs" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                            </path>
                        </svg>
                    </a>
                </li>
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Admin</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.service.index') }}">Services</a></li>
                <li class="breadcrumb-item active" aria-current="page">Create</li>
            </ol>
        </nav>

        <div class="row">
            <div class="col-12 col-xl-7 col-xxl-8 mb-4">
                <div class="row">
                    <div class="col-12 mb-4">
                        <div class="card border-0 shadow">
                            <div class="card-header">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <h2 class="fs-5 fw-bold mb-0"> <i class="fa-solid fa-plus text-primary"></i> Create
                                            Service</h2>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <form action="{{ route('admin.service.store') }}" method="POST" enctype="multipart/form-data">


                                        @csrf

                                        <!----------------- title -------------------->
                                        <div class="mb-4 input-content">
                                            <label for="title" class="capitalize"> <i class="fa-solid fa-file-signature"></i> Title </label>
                                            <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" aria-describedby="emailHelp" placeholder="Type Service Title..." autocomplete="nope" />
                                            @error('title')
                                                <small class="form-text text-danger">{{$message }}</small>
                                            @enderror
                                        </div>


                                        <!----------------- Parent Service -------------------->
                                        <div class="mb-4 input-content">
                                            <label for="parent_id" class="capitalize"> <i class="fa-solid fa-code-branch"></i> Parent Service (Optional) </label>
                                            <select class="form-select form-control @error('parent_id') is-invalid @enderror" name="parent_id" id="service"  aria-label="Default select example" >
                                                <option></option>
                                                @foreach ( $services as $service )
                                                    <option value="{{ $service->id }}"  {{ old('parent_id') == $service->id ? "selected" : "" }} >{{ $service->title }}</option>
                                                @endforeach
                                            </select>
                                            @error('parent_id')
                                                <small class="form-text text-danger">{{$message }}</small>
                                            @enderror
                                        </div>


                                        <!----------------- Content -------------------->
                                        <div class="mb-4 input-content">
                                            <label for="content" class="capitalize"> <i class="fa-solid fa-align-left"></i> Content </label>
                                            <textarea type="text" name="content" id="CKEditor_Content" rows="5" class="form-control @error('content') is-invalid @enderror" aria-describedby="emailHelp" placeholder="Type Service Content..." autocomplete="nope" >{{ old('content') }}</textarea>
                                            @error('content')
                                                <small class="form-text text-danger">{{$message }}</small>
                                            @enderror
                                        </div>


                                        <!----------------- Img -------------------->
                                        <div class="mb-3 input-content">
                                            <label for="img" class="form-label"> <i class="fa-solid fa-image"></i> Image </label>
                                            <input name="img" type="file" class="form-control @error('img') is-invalid @enderror" id="img"  />
                                            @error('img')
                                                <small class="form-text text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>


                                        <!----------------- Submit Btn -------------------->
                                        <button type="submit" class="btn btn-primary float-right" > <i class="fa-solid fa-floppy-disk"></i> Submit </button>


                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
