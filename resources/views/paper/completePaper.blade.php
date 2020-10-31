@extends('layouts.app')

@section('content')

    <div class="container-fluid">
        <div class="row mx-auto text-center">
            <form action="{{route('paper.submit', ['doc' => $paper])}}" class="w-100" method="POST">
                @csrf

                {!! $content !!}

                <input type="submit" class="btn btn-info mx-auto" value="Trimite">
            </form>

        </div>
    </div>

@endsection
