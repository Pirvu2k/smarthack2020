@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row mx-auto text-center">
            @if (isset($error) && $error != null)
                <div class="alert-danger">
                    Toate campurile sunt obligatorii;
                </div>

            @endif

            <form action="{{route('paper.submit', ['doc' => $paper])}}" class="w-100" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card p-5">
                     {!! $content !!}
                </div>

                @foreach($additional_files as $file)

                    <div class="card my-2">
                        <div class="card-body form-group d-flex flex-column justify-content-start">
                            <p class="text-bold text-left m-0 mb-2">{{str_replace("_", " ", $file->name)}}</p>
                            <input class="text-left" required name="file_{{$file->id}}" type="file" >
                        </div>
                    </div>
                @endforeach

                <input type="submit" class="btn btn-success mx-auto mt-3" value="Trimite">
            </form>
        </div>
    </div>

@endsection
