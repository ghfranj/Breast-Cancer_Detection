<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
    </head>
    <body class="antialiased">
        <h1>hello this is my first time</h1>
        <form  class='frm' action=" {{ route('What_is_a_mammogram') }}" method='get'>
            {{ csrf_field() }}
            <button style='font-size:40px; cursor: pointer;' type='submit'>get swin result</button>
        </form>
    </body>
</html>
