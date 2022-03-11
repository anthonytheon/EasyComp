<?php

namespace App\Http\Controllers\Admin;

use App\Models\Competition;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;

class CompetitionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$this->authorize('index', $competition);
        $competitions = Competition::latest()->paginate(5);
  
        
        return view('admin.dashboard', compact('competitions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.crud.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Competition $competition)
    {
        //dd(auth()->user()->name);

        $data = $request->validate([
            'name' => 'required|max:255',
            'category' => 'required',
            'date' => 'required|max:255',
            'description' => 'required|max:255'
        ]);

        $data['user_id'] = auth()->user()->id;
        
        Competition::create($data);

        return redirect()->route('competitions.index')->with('success', 'Success !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Competition $competition)
    {
        return view('admin.crud.show', compact('competition'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Competition $competition)
    {
        return view('admin.crud.edit', compact('competition'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Competition $competition)
    {
        $request->validate([
            'name' => 'required|max:255',
            'category' => 'required',
            'date' => 'required|max:255',
            'description' => 'required|max:255'
        ]);
  
        $competition->update($request->all());
  
        return redirect()->route('competitions.index')->with('success', 'Competition updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Competition $competition)
    {
        $competition->delete();
  
        return redirect()->route('competitions.index')->with('success', 'Competition deleted successfully');
    }
}
