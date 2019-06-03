<?php

namespace App\Http\Controllers;

use App\Army;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BattleController extends Controller
{

    public function start()
    {
        return view('start');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $move = mt_rand(0,1);

        $army1 = DB::table('army1')->where('name', 'like', 'Army1')->get();

        $army2 = DB::table('army1')->where('name', 'like', 'Army2')->get();

        if ($army1[0]->number_of_soliders <= 0 || $army2[0]->number_of_soliders <= 0){
           return redirect()->route('theend');
        }

        return view('battle', compact('army1', 'army2', 'move'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        request()->validate([
            'army1' => ['required', 'digits_between:1,100'],
            'army2' => ['required','digits_between:1,100']]
        );

        $num_of_soliders_army1 = $request->input('army1', false);
        $num_of_soliders_army2 = $request->input('army2', false);

        $army1 = new Army();
        $army1->name = "Army1";
        $army1->number_of_soliders = $num_of_soliders_army1;

        $num_of_generals1 = $num_of_soliders_army1 / 10;

        $army1->number_of_generals = $num_of_generals1;
        $army1->save();


        $army2 = new Army();
        $army2->name = "Army2";
        $army2->number_of_soliders = $num_of_soliders_army2;

        $num_of_generals2 = $num_of_soliders_army2 / 10;

        $army2->number_of_generals = $num_of_generals2;
        $army2->save();

        return redirect()->route('attack');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {
        DB::table('army1')->where('name', 'like', 'Army1')->delete();

        DB::table('army1')->where('name', 'like', 'Army2')->delete();

        return redirect()->route('start');
    }

    public function attack_army1($id)
    {
        $power = rand(1,5);

        $army2 = Army::findOrFail($id);

        $num_of_sol = DB::table('army1')->select('number_of_soliders')->where('name', 'like', 'Army2')->value('number_of_soliders');

        $update_soliders = $num_of_sol - $power;

        $army2->update(['number_of_soliders' => $update_soliders]);

        return redirect()->route('attack');
    }

    public function attack_army2($id)
    {
        $power = rand(1,5);

        $army1 = Army::findOrFail($id);

        $num_of_sol = DB::table('army1')->select('number_of_soliders')->where('name', 'like', 'Army1')->value('number_of_soliders');

        $update_soliders = $num_of_sol - $power;

        $army1->update(['number_of_soliders' => $update_soliders]);

        return redirect()->route('attack');
    }

    public function theend()
    {
        $army1 = DB::table('army1')->where('name', 'like', 'Army1')->get();

        $army2 = DB::table('army1')->where('name', 'like', 'Army2')->get();

        return view('theend', compact('army1', 'army2'));

    }
}
