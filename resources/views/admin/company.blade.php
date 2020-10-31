@extends('layouts.app')

@section('content')
    <div class="container">
    <h3>{{$company->name}}</h3>
    <p>Location: {{$company->city->name}}, {{$company->country()->name}}</p>
    <p>Phone: {{$company->phone}}</p>
    <p>Address: {{$company->address}}</p>

    @foreach($company->documents as $document)
            <div class="card mt-2">
                <div class="card-body">
                    {{$document->title}}

                    <div class="float-right">
                        <a href="#"><button class="btn btn-primary">Vezi Documentul <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-file" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M4 0h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2zm0 1a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H4z"/>
                                </svg></button>
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
