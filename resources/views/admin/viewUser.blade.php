@extends('layouts.app')

@section('headscripts')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <p>Nume : {{$user->first_name}}</p>
                <p>Prenume : {{$user->last_name}}</p>
                <p>Telefon : {{$user->phone_number}}</p>
                <p>Adresa : {{$user->address}}</p>
                <p>Email : {{$user->email}}</p>
                <p>Data cererii: {{$user->created_at}}</p>
            </div>
            <div class="col-md-8 text-right">
                <button id="acceptBtn" class="btn btn-lg btn-success">Accepta</button>
                <button class="btn btn-lg btn-danger">Refuza</button>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <img class="img-fluid" src="{{asset('storage/'.$user->id_path)}}" />
            </div>
            <div class="col-md-6">
                <img class="img-fluid" src="{{asset('storage/'.$user->picture_verification_path)}}" />
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    $(document).ready(function(){
        $('#acceptBtn').click(function() {
            $.ajax({
                url: "{{ route('user.activate', ['user_id' => $user->id]) }}",
                type: 'post',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                dataType: 'json',
                success: function(response) {
                    alert('User confirmat cu succes!');
                    window.location.href = '/admin/users/pending';
                }
            }).fail(function() {
                console.log("Error at fetching");
            });
        });
    });

</script>
@endsection
