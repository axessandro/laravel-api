@extends('layouts.admin')
@section('title', 'Edit')
@section('content')
    <div class="container text-light">
        <h1 class="text-center">Edit</h1>
        <div class="container-md">

            <form action="{{ route('admin.projects.update', $project->slug) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
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
                            <img id="img-preview" src="{{ asset('storage/' . $project->img) }}" alt=""
                                style="max-width: 200px;">
                        </div>
                    </div>
                </div>
                {{-- /img --}}

                {{-- name --}}
                <div class="form-group mb-4">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" value="{{ old('name', $project->name) }}"
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
                                class="form-check-input" value="{{ $technology->id }}" @checked($project->technologies->contains($technology))>

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
                        class="form-control @error('description') is-invalid @enderror">{{ old('description', $project->description) }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                {{-- /description --}}

                {{-- submit btn --}}
                <div class="btn-wrapper px-4 d-flex justify-content-center">
                    <button class="btn btn-success" type="submit">Save</button>
                </div>
                {{-- submit btn --}}

            </form>
        </div>
    </div>
@endsection
