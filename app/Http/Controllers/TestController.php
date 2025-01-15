<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lore;

class TestController extends Controller
{
    //Try maintaining these...
    public function main(){
        $Slots = [null, null, null];
        $potentialResult = [0, 0, 0];
        $numeroDeElementos = Lore::count();
        $repetir = false;

        for($i=0 ; $i<3 ; $i++){
            do{
                $repetir = false;
                $potentialResult[$i] = random_int(1, $numeroDeElementos);
                for($j=0 ; $j<3 ; $j++){
                    if($i != $j){
                        if($potentialResult[$i] == $potentialResult[$j]){
                            $repetir = true;
                        }
                    }
                }
            }while(($potentialResult[$i] == 4) || ($repetir == true));            
        }            

        $infoResult1 = Lore::find($potentialResult[0]);
        $infoResult2 = Lore::find($potentialResult[1]);
        $infoResult3 = Lore::find($potentialResult[2]);

        for($i=0 ; $i<3 ; $i++){
            $Luck = random_int(1, 100);
            if($Luck > 0 && $Luck <= 30){
                $Slots[$i] = $infoResult1->name;
            }elseif($Luck > 30 && $Luck <= 60){
                $Slots[$i] = $infoResult2->name;
            }elseif($Luck > 60 && $Luck <= 90){
                $Slots[$i] = $infoResult3->name;
            }else{
                $Slots[$i] = "BAR";
            }
        }
    
        $Results = [
            'Result1' => $Slots[0],
            'Result2' => $Slots[1],
            'Result3' => $Slots[2]
        ];
    
        return view('SLOT_MACHINE_RESULTS.MAIN', [
            'Results' => $Results,
            'Source' => request('source'),
            'Randomizer' => request('RZR')
        ]);
    }

    public function index(){
        $info = Lore::orderBy('id')->get();

        return view('SLOT_MACHINE_RESULTS.INFO', [
            'info' => $info,
            'Randomizer' => request('RZR')
        ]);
    }

    public function store(){
        $lore = new Lore();

        $lore->name = request('name');
        $lore->age = request('age');
        $lore->img = request('img');
        $lore->lore_desc = request('lore_desc');

        $lore->save();

        return redirect('/')->with('mssg', 'Thanks for the information!');
    }

    public function show($lore_Id){
        $sus_info = Lore::findOrFail($lore_Id);

        return view('SLOT_MACHINE_RESULTS.LORE', [
            'Suspect' => $sus_info,
            'Randomizer' => request('RZR')
        ]);
    }
    
    public function create(){
        return view('SLOT_MACHINE_RESULTS.NEW', [
            'Randomizer' => request('RZR')
        ]);
    }

    public function check(){
        if (isset($_POST['try'])) {
            if(request('password') == "genial101 :)"){
                return view('SLOT_MACHINE_RESULTS.NEW', [
                    'Randomizer' => request('RZR')
                ]);
            }else{
                return redirect('/INFO?RZR=28');
            }
        }
    }

    public function destroy($lore_Id){
        $sus_info = Lore::findOrFail($lore_Id);
        $sus_info->delete();

        return redirect('/INFO?RZR=28');
    }
}
