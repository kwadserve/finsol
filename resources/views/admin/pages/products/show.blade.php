@extends('admin.layouts.app')

{{-- @push('custom_styles') --}}
{{-- @endpush --}}

@section('content')
    <h2>Product ID: {{ $item->id }}</h2>
@endsection

{{-- @push('custom_scripts') --}}
{{-- @endpush --}}
