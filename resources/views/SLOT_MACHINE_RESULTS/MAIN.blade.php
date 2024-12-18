@extends('Includes.Layout')

@section('content')
<header>
    @if($Randomizer <= 0 || $Randomizer > 100)
        <span>- WE KNOW O _ O -</span>
    @else
        @if($Source == 'First_Panel')
            <span>- Oh, seems like you came from the first panel, how unoriginal... -</span>
        @elseif($Source == 'Second_Panel')
            <span>- Ah, so you selected the second panel this time, very interesting, wouldn't you agree? -</span>
        @elseif($Source == 'Third_Panel')
            <span>- Yep, I knew you wouldn't stand a chance against the intrigue of the third panel, it is just that good. -</span>
        @elseif($Source == 'Coming_Back')
            <span>- Welcome back, I hope you weren't expecting to see the same result as the one you left behind! -</span>
        @else
            <span>What?! You came here without using any of the 3 panels?! Teach me your ways, master.</span>
        @endif
    @endif
</header>

<div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
    
    <div class="title m-b-md" style="color: white">
        
        @if($Randomizer <= 50 && $Randomizer > 0)
            <div style="font-size: 50px;">Slot machine time, baby!</div>
        @elseif($Randomizer > 50 && $Randomizer <= 60)
            <div style="font-size: 50px;">Gambling Game :D</div>
        @elseif($Randomizer > 60 && $Randomizer <= 100)
            <div style="font-size: 50px;">The Amazing Slot Machine</div>
        @else
            <div style="font-size: 50px;">WE KNOW O _ O</div>
        @endif
        
        @if($Randomizer <= 0 || $Randomizer > 100)
            <div style="font-size: 20px;" class="autoAcomodoLateral"><font color = white>WE KNOW:<br>
                <img src='/img/O.png' alt='We Know' class='imagen' style='border-radius: 12px;'>
                <img src='/img/_.png' alt='We Know' class='imagen' style='border-radius: 12px;'>
                <img src='/img/O.png' alt='We Know' class='imagen' style='border-radius: 12px;'>
            </div>
            @php
                $Result1 = 'WE KNOW';
                $Result2 = 'WE KNOW';
                $Result3 = 'WE KNOW';
            @endphp
        @else
            <div style="font-size: 20px;" class="autoAcomodoLateral"><font color = white>Your results are: <br>
                @foreach($Results as $Result)
                        @if(($Randomizer > 30 && $Randomizer <= 35) || ($Randomizer > 70 && $Randomizer <= 75) || ($Randomizer > 50 && $Randomizer <= 55))
                            @php
                                echo "<img src='/img/".$Result.".jpg' alt='A random fruit' class='imagen' style='border-radius: 12px;'>"
                            @endphp
                        @else
                            @php
                                echo "<img src='/img/".$Result.".png' alt='A random fruit' class='imagen'>"
                            @endphp
                        @endif
                    @if($loop->first)
                        @php
                            $Result1 = $Result
                        @endphp
                    @elseif($loop->last)
                        @php
                            $Result3 = $Result
                        @endphp
                    @else
                        @php
                            $Result2 = $Result
                        @endphp
                    @endif
                @endforeach
            </font></div>
        @endif
        
        @if($Result1 == 'WE KNOW' && $Result2 == 'WE KNOW' && $Result3 == 'WE KNOW')
            <p style = "font-size: 50px; color: red">WE KNOW O _ O</p>
        @elseif($Result1 == $Result2 && $Result1 == $Result3 && $Result2 == $Result3)
            <p style = "font-size: 30px; color: yellow">YOU WIN IT ALL DAMN IT!!!</p>
            @unless($Result1 != 'BAR' && $Result2 != 'BAR' && $Result3 != 'BAR')
                <p style = "font-size: 30px; color: pink">+BAR BONUS, LETS GO!!!!</p>
            @endunless
        @elseif($Result1 != $Result2 && $Result1 != $Result3 && $Result2 != $Result3)
            <p style = "font-size: 20px; color: orange">Look, lil win!</p>
            @if($Result1 == 'BAR' || $Result2 == 'BAR' || $Result3 == 'BAR')
                <p style = "font-size: 20px; color: purple">+Bar Bonus!!</p>
            @endif
        @else
            <p style = "font-size: 20px; color: cyan">You lose, loser</p>
        @endif                

        <p style="font-size: 20px;">>RESULT LIST:<p>

        @if($Randomizer > 0 && $Randomizer <= 100)
            @if($Randomizer > 80 && $Randomizer <= 90)
                <ul type="circle">
            @elseif($Randomizer == 44)
                <ul type="square">
            @else
                <ul type="disc">
            @endif
                <li>All the same fruit: WIN IT ALL DAMN IT</li>
                <li>All diferent fruit: Lil Win</li>
                <li>At least a Bar included: +Bonus</li>
                <li>None of the above: loser</li>
            </ul>
        @else
            <ul type="disc">
                <li>WHY DID YOU DO THAT?</li>
                <li>WHY DID YOU CHANGE THE URL MANUALLY?</li>
                <li>IS IT THAT FUNNY TO YOU?</li>
                <li>GO BACK FROM WHERE YOU CAME O _ O</li>
            </ul>
        @endif

        @if(($Randomizer % 2) == 0 && ($Randomizer > 0 && $Randomizer <= 100))
            <button class='myCoolLookingButton'><a href='/INFO?RZR=<?php echo $Randomizer ?>'>Wanna learn more about the results? click here!</a></button>
        @elseif($Randomizer == 61 || $Randomizer == 73 || $Randomizer == 87 || $Randomizer == 99)
            <button class='myCoolLookingButton'><a href='https://www.youtube.com/watch?v=dQw4w9WgXcQ'>Wanna learn more about the results? click here!</a></button>
        @endif

        @if($Source == 'Coming_Back')
            <br>
            <a href="/"><button class='myCoolLookingBack'><-BACK</button></a>
        @endif
    </div> 
</div>
@endsection