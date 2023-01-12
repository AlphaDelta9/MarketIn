@extends('layouts.app')
@section('stylesheets')

@endsection
@section('title','Homepage')
@section('breadcrumb',Breadcrumbs::render('home'))
@section('content')
<section id="homepage">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Types</h4>
        </div>
        <div class="card-body">
            You are logged in!
        </div>
    </div>
</section>
@endsection

@section('scripts')
@endsection