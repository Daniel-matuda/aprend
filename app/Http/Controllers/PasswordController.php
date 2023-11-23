<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PasswordController extends Controller
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'password' => 'required|confirmed',
            'password_confirmation' => 'required',
        ]);

        // o método tradicional sem usar Model bind
        // $user = User::find($id);
        // Usando assim por parametro passamos o String $id

        $user->password = $validated['password'];
        $updated = $user->save();

        ($updated) ?
            Session::flash('password_success', 'Atualizado com sucesso'):
            Session::flash('password_error', 'Erro ao atualizar');

        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
