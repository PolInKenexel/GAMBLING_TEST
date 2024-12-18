@extends('Includes.Layout')

@section('content')
<div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
    <div class="title m-b-md" style="color: white">   
        <div class="mainContainer">  
            <h1 style="color: cyan;">Evidence for case #459: LIST OF SUSPECTS</h1>  
            @php
                $div = 0;
            @endphp
            @foreach($info as $desc)
                @if($div == 0)
                    <div class="autoAcomodoLateral">
                @endif
                    <a href="http://127.0.0.1:8000/INFO/<?php echo $desc->id ?>?RZR=<?php echo $Randomizer ?>">                        
                    <div style="margin: 10px;">
                        <hr>
                        <h2 style="color: yellow;">{{ $desc->name }}</h2>
                        <span class="important">Photo of the suspect:</span><br>
                        <img src='{{ $desc->img }}' class='imagen'><br>
                        <span>(Click for more info)</span>
                        <hr>
                    </div>
                    </a>
                @if($div == 2)
                    </div>
                @endif
                @php
                    if($div < 2){
                        $div++;
                    }else{
                        $div = 0;
                    }
                @endphp
            @endforeach
            @if($div != 0)
                </div>
            @endif
            
        

            @if($Randomizer == 28)
                <h2 class="important" style="color: pink;">You shall never know the secret:</h2>
                <form action="/INFO/create?RZR=<?php echo $Randomizer ?>" method="POST">
                    @csrf
                    <label for="password">Code: </label>
                    <input type="password" id="password" name="password" placeholder="password" class="coolInput">
                    <button type="submit" name="try" class='myCoolLookingButtonAlter'>Try, I dare you</button>
                </form>
            @endif
        </div>
        <a href="/MAIN?source=Coming_Back&RZR=<?php echo $Randomizer ?>"><button class='myCoolLookingButton'><-BACK</button></a>
    </div> 
</div>
@endsection