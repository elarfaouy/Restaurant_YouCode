@extends('layouts.master')

@section('content')
    <div>
        <form id="form" method="POST" action="{{ route('plats.update', $plat->id) }}" enctype="multipart/form-data">
            <div class="modal-body">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <input type="file" class="form-control" id="image" name="image" accept="image/*">
                </div>
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ $plat->title }}">
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea name="description" id="description" class="form-control" rows="5">{{ $plat->description }}</textarea>
                </div>

            </div>
            <div class="modal-footer d-flex justify-content-center">
                <button type="submit" class="btn btn-primary w-50">Update</button>
            </div>
        </form>
    </div>
@endsection
