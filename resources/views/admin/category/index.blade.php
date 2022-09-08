@extends('layouts.dashboard.main_panel')
@section('content')
    <div class="card">
        <div class="card-body">
            <h1> Categories </h1>
            <a href="{{ route('categories.create')}}">
                <i class="material-icons">add_circle</i>
                <span>Create new Category</span>
            </a>
        </div>
    </div>
@endsection

@section('scripts')
@endsection
