<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome'=> ['string','required','max:255'],
            'email'=> ['string','required','max:255'],
            'password'=> ['string','required','max:255'],
        ]);

        Usuario::create($validated);
        return redirect()->route('login.cadastro')->with('success','Usuário criado com sucesso');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $validated= $request->validate([
            'email'=>['string','required','max:255'],
            'password'=>['string','required','max:255'],
        ]);
        $request= Usuario::where('email',$validated['email'])->first();
        $senha=$request['password'];
        if($request && Hash::check($senha, $request->senha)){
            return redirect()->route('login.login')->with('success','Login efetuado com sucesso');
        }

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Usuario $usuario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Usuario $usuario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Usuario $usuario)
    {
        //
    }
}
