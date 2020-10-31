@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row mx-auto text-center">
            <form action="{{route('paper.submit', ['doc' => $paper])}}" class="w-100" method="POST">
                @csrf
                <div class="card p-5">
                     {!! $content !!}
                </div>
                <input type="submit" class="btn btn-success mx-auto mt-3" value="Trimite">
            </form>
        </div>
    </div>

@endsection
