@extends('layouts.app')

@section('headscripts')
    <script src="https://cdn.tiny.cloud/1/aupkh13tp29zzawbi8gklyl11bugbkxi7k0s039su44ngymz/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
@endsection

@section('content')
    <div class="container">
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <h1>Adauga un nou document</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="POST" action="{{route('paper.updateDoc', ['doc'=>$paper])}}">
        @csrf
        <div class="form-group">
            <input type="text" value="{{$paper->title}}"  class="form-control" id="title" name="title" placeholder="Titlul documentului">
        </div>

        <div class="form-group">
            <select class="form-control" id="company" name="company">

            @foreach (Auth::user()->companies as $company)

                    <option @if($paper->company_id == $company->id) selected @endif value="{{$company->id}}">{{$company->name}}</option>
            @endforeach

            </select>
        </div>

        <textarea id="createPaper" name="content">
            {{$paper->content}}
        </textarea>

        <input type="submit" value="Trimite">
    </form>
    </div>
@endsection

@section('scripts')
    @include('paper.scripts')
@endsection
