<?php

namespace App\Http\Controllers;

use App\Models\Employe;
use Illuminate\Http\Request;
use App\Http\Controllers\EmployeController;

class EmployeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employes = Employe::all();
        $nb_employes = $employes->count();
        return view('employe/index',compact('employes','nb_employes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employe/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'lname'=>'required',
            'email'=>'email'
           
        ]);
        $employe = new Employe();
        $employe->nom = $request->name;
        $employe->prenom = $request->lname;
        $employe->email = $request->email;
        $employe->save();
        return redirect()->route('employe.index')->with('status',$request->name  .' est ajouté à la liste des employés' );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employe = Employe::find($id);
        return view('employe/show',compact('employe'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employe = Employe::findOrFail($id);
        return view('employe/edit',compact('employe'));
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
        $employe = Employe::findOrFail($id);
        $employe->nom = $request->name;
        $employe->prenom = $request->lname;
        $employe->email = $request->email;
        $employe->save();
        return redirect()->route('employe.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employe = Employe::findOrFail($id);
        $employe->delete();
        return redirect()->route('employe.index')->with('employe_delete',$employe->nom  .' est supprimé de la liste des employés' );
    }

     /**
     * Go to homepage.
     * @return \Illuminate\Http\Response
     */

    public function home()
    {
        return view('employe/home');
    }
}
