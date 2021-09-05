@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6 mt-5">
            <form action="{{ route('badge.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" id="title" name="title" class="form-control">
                </div>
                <div class="form-group">
                    <label for="required_number">Required Number</label>
                    <input type="number" id="required_number" name="required_number" class="form-control">
                </div>
                <div class="form-group">
                    <label for="icon_url">Icon</label>
                    <input type="text" id="icon_url" name="icon_url" class="form-control">
                </div>
                <div class="form-group">
                    <label for="type">Type</label>
                    <select id="type" name="type" class="form-control">
                        <option value="0">XP</option>
                        <option value="1">Topic</option>
                        <option value="2">Reply</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="description">Icon</label>
                    <textarea id="description" name="description" class="form-control w-100" rows="6"></textarea>
                </div>
                @include('partials.validation-errors')
                <button type="submit" class="btn btn-primary">Send</button>
            </form>
        </div>
    </div>
@endsection
