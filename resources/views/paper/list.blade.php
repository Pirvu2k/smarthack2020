@extends('layouts.app')

@section('content')
    <div class="container">
        @foreach($userDocuments as $uDoc)
            @if (!$uDoc->document->hasFiles())
                <div class="card mt-2">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-10">
                                <p>{{$uDoc->name}}</p>
                                <p>Completat la: {{$uDoc->created_at}}</p>
                            </div>
                            <div class="col-md-2">
                                <div class="float-right">
                                    <a href="{{asset('storage/'. $uDoc->path)}}" target="_blank "><button class="btn btn-primary">Vezi Documentul <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-check-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                                <path fill-rule="evenodd" d="M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.236.236 0 0 1 .02-.022z"/>
                                            </svg></button>
                                    </a>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>

            @else

                <div class="card mt-2">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-10">
                                <p>{{$uDoc->name}}</p>
                                <p>Completat la: {{$uDoc->created_at}}</p>
                            </div>
                            <div class="col-md-2">
                                <div class="float-right">
                                    <button aria-controls="collapseExample{{$uDoc->id}}" aria-expanded="false" class="btn btn-primary"
                                            data-target="#collapseExample{{$uDoc->id}}" data-toggle="collapse"
                                            type="button">
                                        Vezi fisiere
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="collapse" id="collapseExample{{$uDoc->id}}">
                            <div class="card card-body">
                                @foreach($uDoc->userAdditionalFiles as $file)
                                    <a href="{{asset('storage/'. $file->path)}}" target="_blank ">
                                        {{$file->name}}
                                    </a>
                                    <br>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

            @endif
        @endforeach
    </div>
@endsection
