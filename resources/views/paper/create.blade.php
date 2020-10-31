<!DOCTYPE HTML>

<head>
    <title>TITLE</title>
    <script src="https://cdn.tiny.cloud/1/aupkh13tp29zzawbi8gklyl11bugbkxi7k0s039su44ngymz/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
{{--    <script>--}}
{{--        tinymce.init({--}}
{{--            selector: '#createPaper'--}}
{{--        });--}}
{{--    </script>--}}
</head>

<body>
    <h1>Creeaza </h1>
    <form method="POST" action="{{route('paper.creation')}}">
        @csrf
        <textarea id="createPaper" name="createPaper">
        </textarea>

        <input type="submit" value="Trimite">
    </form>
</body>

@include('paper.scripts')

</html>
