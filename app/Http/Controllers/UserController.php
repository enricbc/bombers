<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Region;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class UserController extends Controller
{

  public function __construct()
  {
      $this->middleware('auth');
  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $users = User::all();

      return view('parcs.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Passem un usuari buid a la pagina de creacio de Parcs
        $user=new User;
        $regions= Region::get();
        return view('parcs._form')->with(['user'=>$user,'regions'=>$regions]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      // Validar dades obtingudes del formulari.
      $data = $request->validate([
          'codi_parc' => 'required',
          'name'      => 'required|string|max:255',
          'password'  => 'required|string|min:6|confirmed',
          'region_id'=> 'required',
      ]);

      // Crear l'usuari (la validació ha sortit bé).
      User::create([
        'codi_parc' => $data['codi_parc'],
          'name'     => $data['name'],
          'region_id'     => $data['region_id'],
          'password' => bcrypt($data['password']) // Encriptat.
      ]);
      $missatge=session()->flash('success', 'S\'ha creat el nou parc '.$data['name'].'.');
      return redirect()->action('UserController@index')->with($missatge);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      // Obtenir l'usuari.
      $user= User::findOrFail($id);
      $regions= Region::get();
      return view('parcs._form', ['user' => $user,'regions'=>$regions]);
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
      $user = User::findOrFail($id);
      $data = request()->validate([
        'name'     => 'required|string|max:255',
        'region_id'=> 'required',
        'codi_parc' => 'required',
        'password' => 'confirmed' // No obligatori
      ]);

      // Si el camp Password és null (no és required).
      if ($data['password'] != null) {
          // Encriptar password en cas de que s'hagi inserit.
          $data['password'] = bcrypt($data['password']);
      } else {
          // Treiem del array $data en cas de que no s'hagi inserit.
          unset($data['password']);
      }

      // Actualitzar l'usuari.
      $user->update($data);
      // Vista on es llisten els usuaris.
      // Vista on es llisten els usuaris.

        return redirect()->action('UserController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

      // Obtenir l'usuari.
      $user = User::findOrFail($id);
      // No permetem esborrar l'usuari amb id 1 (administrador)
      if ($user->id === 1) {
          // back() crea una redirecció a la última localització de l'usuari
          // abans d'arribar aquí.
          $missatge=session()->flash('warning', 'No pots esborrar l\'usuari amb ID = 1.');
          return back()->with($missatge);
      } else {
          // Eliminar l'usuari.
          $user->delete();

          // Vista on es llisten els usuaris.
          $missatge=session()->flash('success', 'Usuari esborrat!');
          return back()->with($missatge);
      }
    }
}
