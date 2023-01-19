@extends('layouts.admin')
@section('title', 'Projects list')
@section('content')
    <div class="bg-dark">
        @if (session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif

        <table class="table mb-0 table-striped table-dark">
            <thead>
                <tr>
                    <th>Img</th>
                    <th>Name</th>
                    <th>Type</th>
                    <th>Technologies</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                {{-- rows --}}
                @foreach ($projects as $project)
                    <tr>
                        <td>
                            @if ($project->img)
                                <img src="{{ asset('storage/' . $project->img) }}" alt="" style="max-height: 80px;">
                            @else
                                <img src="{{ Vite::asset('resources/img/not-found.png') }}" alt=""
                                    style="max-height: 80px;">
                            @endif
                        </td>
                        <td>{{ $project->name }}</td>
                        <td>
                            @if ($project->type)
                                <span class="bg-white text-dark p-1 rounded-3">
                                    {{ $project->type->name }}
                                </span>
                            @else
                                <span>Not assigned</span>
                            @endif
                        </td>
                        <td>
                            @forelse ($project->technologies as $technology)
                                <span class="bg-danger text-white p-1 rounded-3">{{ $technology->name }}</span>
                            @empty
                                <span>Not assigned</span>
                            @endforelse
                        </td>
                        {{-- actions --}}
                        <td>
                            <div class="d-flex">
                                <a class="btn btn-primary text-light text-decoration-none mx-1"
                                    href="{{ route('admin.projects.show', $project->slug) }}"><i
                                        class="fa-solid fa-circle-info"></i></a>
                                <a class="btn btn-warning text-light mx-1"
                                    href="{{ route('admin.projects.edit', $project->slug) }}"><i
                                        class="fa-solid fa-pencil"></i></a>
                                <form action="{{ route('admin.projects.destroy', $project->slug) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-danger text-light mx-1"
                                        href="{{ route('admin.projects.edit', $project->slug) }}"><i
                                            class="fa-solid fa-trash"></i></button>
                                </form>
                            </div>
                        </td>
                        {{-- actions --}}
                    </tr>
                @endforeach
                {{-- rows --}}
            </tbody>
        </table>
    </div>
@endsection
