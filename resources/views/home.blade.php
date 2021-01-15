@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <h2>Welcome...  {{ Auth::user()->name }} </h2>
    </div>
</div>
@endsection
