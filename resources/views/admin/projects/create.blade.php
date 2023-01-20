@extends('layouts.admin')
@section('title', 'New project')
@section('content')
    <div class="container text-light">
        <h1 class="text-center">Create new</h1>
        <div class="container-md">

            <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                {{-- img --}}
                <div class="form-group mb-4">
                    <label for="img">Image:</label>
                    <input type="file" name="img" id="img"
                        class="form-control @error('img') is-invalid @enderror">
                    @error('img')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    <div>
                        <p class="mt-2 mb-0">Image preview:</p>
                        <div class="img-wrapper d-flex justify-content-center">
                            <img id="img-preview" src="" alt="" style="max-width: 200px;">
                        </div>

                    </div>
                </div>
                {{-- /img --}}

                {{-- name --}}
                <div class="form-group mb-4">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}"
                        class="form-control @error('name') is-invalid @enderror">
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                {{-- /name --}}

                {{-- types --}}
                <div class="form-group mb-4">
                    <label for="type">Type:</label>
                    <select name="type_id" id="type" class="form-select @error('type_id') is-invalid @enderror">
                        <option value="">Select type</option>
                        @foreach ($types as $type)
                            <option value="{{ $type->id }}" @selected(old('type_id') == $type->id)>{{ $type->name }}</option>
                        @endforeach
                    </select>
                    @error('type_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                {{-- /types --}}

                {{-- technologies --}}
                <div class="form-group mb-4">
                    <p>Technologies:</p>
                    @foreach ($technologies as $technology)
                        <div class="form-check">
                            <input type="checkbox" name="technologies[]" id="technology-{{ $technology->id }}"
                                class="form-check-input" value="{{ $technology->id }}">
                            <label for="technology-{{ $technology->id }}"
                                class="form-check-label">{{ $technology->name }}</label>
                        </div>
                    @endforeach
                </div>
                {{-- /technologies --}}

                {{-- description --}}
                <div class="form-group mb-4">
                    <label for="description">Description:</label>
                    <textarea name="description" id="description" name="description" cols="30" rows="3"
                        class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                {{-- /description --}}

                {{-- submit btn --}}
                <div class="btn-wrapper d-flex justify-content-center">
                    <button class="btn btn-success px-4" type="submit">Save</button>
                </div>
                {{-- submit btn --}}

            </form>
        </div>
    </div>
@endsection
