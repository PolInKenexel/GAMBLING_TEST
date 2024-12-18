@extends('Includes.Layout')

@section('content')
<header>
    <span>Just a normal header, nothing to look at here</span>
</header>
<div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
    <div class="mainContainer" style="color: white;">
        <h1 style="color: cyan;">E.f.C. #459 - Suspect #{{ $Suspect->id }}:</h1>
        <h2 style="color: yellow;">{{ $Suspect->name }}</h2>
        <span class="important">Photo of the suspect</span><br>
        <img src='{{ $Suspect->img }}' class='imagen'><br>
        <span class="important">Age:</span> {{ $Suspect->age }}
        <div>
            <span class="important">Description:</span> {{ $Suspect->lore_desc }}
        </div>
        <hr>
        <a href="/INFO?RZR=<?php echo $Randomizer ?>"><button class='myCoolLookingButton'><-BACK</button></a>
        <form action="/INFO/{{$Suspect->id}}" method="POST">
            @csrf
            @method('DELETE')
            @if($Randomizer == 28)
                <button type="submit" name="submit" class='myCoolLookingButtonAlter'>DELETE</button>
            @endif
        </form>
    </div>
</div>
@endsection