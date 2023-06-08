@extends('site.template.layout')

@section('title', 'Inbox')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card mb-4 box-shadow">
                <div class="card-body">
                    @include('internal.template.partials.errors')
                    @include('internal.template.partials.success')
                    Hi, here is inbox
                </div>
            </div>
        </div>
    </div>
@endsection
