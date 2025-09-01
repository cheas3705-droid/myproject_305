@extends('layouts.app')
@section('title','Create Category')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col col-8 offset-2">
                <form action="{{ route('category.store') }}" method="post">
                    @csrf
                    <div class="mt-2">
                        <label for="catname" class="form-label">Category Name</label>
                        <input type="text" class="form-control" id="catname" placeholder="Enter Category Name">
                    </div>
                    <div class="mt-2">
                        <label for="note" class="form-label">Note</label>
                        <input type="text" class="form-control" id="note" placeholder="Enter Note">
                    </div>
                    <div class="mt-3">
                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
