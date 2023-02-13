@extends('layouts.master')

@section('content')
    <div>
        <div class="d-flex justify-between">
            <h4>Plats</h4>
            <!-- Button trigger modal -->
            <button id="btn-modal" class="btn btn-primary">
                Add Plat
            </button>
        </div>
        <hr>
        <div class="table-responsive">
            <table class="table table-hover rounded">
                <thead class="table-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Image</th>
                    <th scope="col">Title</th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody class="table-group-divider">
                @forelse($plats as $plat)
                    <tr>
                        <th>{{ $plat->id }}</th>
                        <td><img src="{{ asset('storage/images/'. $plat->image) }}" alt="image" class="rounded" style="height: 30px"></td>
                        <td>{{ $plat->title }}</td>
                        <td class="d-flex gap-2">
                            <a href="{{ route('plats.edit', $plat->id) }}" class="btn btn-sm btn-primary">Edit</a>
                            <form class="formDelete" action="{{ route('plats.destroy',$plat->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">No Plats Disposable</td>
                    </tr>
                @endforelse

                </tbody>
            </table>
        </div>
        {{ $plats->links() }}
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5">Plat</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="form" method="POST" action="{{ route('plats.store') }}" enctype="multipart/form-data">
                    <div class="modal-body">
                        @csrf
                        <div class="mb-3">
                            <input type="file" class="form-control" id="image" name="image" accept="image/*">
                        </div>
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}">
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea name="description" id="description" class="form-control" rows="5">{{ old('description') }}</textarea>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
