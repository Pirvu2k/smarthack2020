@extends('layouts.app')

@section('content')
    <div class="container">
        @foreach($userDocuments as $uDoc)
                <div class="card mt-2">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8">
                                <p>{{$uDoc->name}}</p>
                                <p>Completat la: {{$uDoc->created_at}}</p>
                            </div>
                            <div class="col-md-4">
                                <div class="float-right">
                                    <a href="{{asset('storage/'. $uDoc->path)}}" target="_blank "><button class="btn btn-primary">Vezi Documentul</button>
                                    </a>
                                    @if ($uDoc->document->hasFiles())
                                    <button aria-controls="collapseExample{{$uDoc->id}}" aria-expanded="false" class="btn btn-success"
                                            data-target="#collapseExample{{$uDoc->id}}" data-toggle="collapse"
                                            type="button">
                                        Vezi fisiere
                                    </button>
                                    @endif
                                </div>
                            </div>
                        </div>
                        @if ($uDoc->document->hasFiles())
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
                        @endif
                    </div>
                </div>

        @endforeach
    </div>
@endsection
