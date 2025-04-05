@extends('layouts.master')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Welcome {{ Auth::user()->name }}, anda login sebagai {{ Auth::user()->role->name }}
        </h1>

        {{-- {{ Auth::user() }} --}}
        {{ Auth::user()->role }}

    </div>
@endsection
