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
    <form method="POST" action="{{route('paper.creation')}}">
        @csrf
        <div class="form-group">
            <input type="text" class="form-control" id="title" name="title" placeholder="Titlul documentului">
        </div>

        <div class="form-group">
            <select class="form-control" id="company" name="company">
                <option value="" selected disabled hidden>Alege o institutie</option>

            @foreach (Auth::user()->companies as $company)
                    <option value="{{$company->id}}">{{$company->name}}</option>
            @endforeach

            </select>
        </div>

        <div class="form-group">
            <textarea id="createPaper" name="content">
            </textarea>
        </div>

        <div class="form-group">
            <p class="m-0 p-0 text-left">
                Adaugati fisiere aditionale, separate prin virgula. <br>
                (Optional)
            </p>
            <input type="text" class="form-control" name="additional_files">
        </div>

        <div class="w-100 d-flex justify-content-center">
            <input type="submit" class="btn btn-success mt-5" value="Trimite">
        </div>
    </form>
    </div>
@endsection

@section('scripts')
    @include('paper.scripts')
@endsection
