<?php

namespace App\Http\Controllers;

use App\Http\Requests\CadastroRequest;
use App\Models\Usuario;
use Illuminate\Http\Request;

class PerfilController extends Controller
{

    public function edit(Usuario $user){
        return view('perfil', compact('user'));
    }
   

    public function update(CadastroRequest $request, $id){
        $userData = $request->all();

        $request ->validated();

        if($userData['password']){
            $userData['password'] = bcrypt($userData['password']);
        }

        $user = Usuario::findOrFail($id);
        $user->update($userData);

        // flash('Atualizado com sucesso!')->success();
        return redirect('home');
    }

}
