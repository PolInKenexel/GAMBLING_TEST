@extends('Includes.Layout')

@section('content')
<header>
    <span>Welcome, Gambling Master</span>
</header>
<div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
    <div class="title m-b-md" style="color: white">
        <h1 style="color: white; margin-left: 70px">Add a New SUSPECT to the list</h1>
        <form action="/INFO" method="POST" style="margin: 30px">
            @csrf
            <div class="autoAcomodoLateral">
                <div>
                    <span for="name">Name of the suspect: </span><br>
                    <input type="text" id="name" name="name" placeholder="Ex.: Banana" class="coolInput">
                </div>
                <div>
                    <span for="age">Age of the suspect: </span><br>
                    <input type="number" id="age" name="age" class="coolInput">
                </div>
            </div>
            
            <span for="img">File for the image of the suspect: </span><br>
            <div class="autoAcomodoLateral">                
                <input type="text" id="img" name="img" placeholder="Ex.: /img/Banana.png" class="coolInput">
            </div>

            <span for="img">Description of the suspect: </span><br>
            <textarea class="cajaComentario" cols="140" rows="10" name="lore_desc" id="lore_desc"></textarea>

            <button type="submit" name="submit" class='myCoolLookingButtonAlter'>Yep, a suspicious dude</button>
        </form>

        <a href="/INFO?RZR=<?php echo $Randomizer ?>"><button style="margin-left: 30px" class='myCoolLookingButton'><-BACK</button></a>
    </div> 
</div>
@endsection