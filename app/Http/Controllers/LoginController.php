<?php

namespace App\Http\Controllers;

use App\Http\Requests\CadastroRequest;
use App\Http\Requests\LoginRequest;
use App\Models\Usuario;
use GrahamCampbell\ResultType\Result;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller{

    private function checkSession(){
        return session()->has('name'); // a sessao tem um usuario? s ou n
    }

    public function home(){
        // $user = Usuario::where('name', Auth::user()->name)->get();
        return view('home');
    }

    //apresenta o formulario de login
    public function index(){
        
        //verifica se ja existe sessao(usuario logado)
        if($this->checkSession()){
            return redirect()->route('home');
        }

        //validacao do erro
        $erro = session('erro'); // existe uma variavel erro na sessao ?
        $data = [];

        if(!empty($erro)){ //a variavel esta vazia? se não ...
            $data = [
                'erro' => $erro
            ];
        }
        return view('login.Entrar', $data);
    }
    
    //logar
    public function loginValidar(LoginRequest $request){
         //verifica se houve submissao de formulario
         if(!$request -> isMethod('post')){
            return redirect()->route('home');
        }

        //verificacao se ja existe sessao
        if($this->checkSession()){
            return redirect()->route('home');
        }

        //validação
        $request->validated();

        //verificar dados do login
        $name = trim($request->input('name')); //buscar o valor que foi inserido no input text_usuario
        $password = trim($request->input('password')); //trim tirar/ignora o espaço no começo e no final

        //buscando o usuario no banco de dados
        $name = Usuario::where('name', $name)->first();

        //if se nao tiver o usuario na base de dados, verifica primeiro o usuario
        if(!$name){
            //nosso erro, o validate nao mexe
            //flash permite colocar a varialvel na sessao temporariamente, e assim apenas usar uma unica vez
            session()->flash('erro', 'Não existe o usuario.'); // erro variavel, outro paramentro mensagem
            return redirect()->route('entrar');
        }


        //verificar se a senha esta correta
        //hash::check verifica, valor cripficado, a $senha é de $senha,e  usario->senha é do if acima verficando o usuario
        if(!Hash::check($password, $name->password)){ 
            session()->flash('erro', 'Senha inválida.'); // erro variavel, outro paramentro mensagem
            return redirect()->route('entrar');
        }

        //criar a sessao (se login ok)
        session()->put('name', $name);
        return redirect()->route('home');
    }


    public function sair(){
        session()->forget('name');
        return redirect()->route('home');
    }


    //cadastro
    public function loginEnviar (CadastroRequest $request){
        //pegando todos os dados 
        $dataUsuario = $request->all();
        
        $request->validated();

        $dataUsuario['password'] = bcrypt($dataUsuario['password']);
        
        $usuario = new Usuario();  //model  
    
        $usuario->create($dataUsuario); //criando na base de dados

        return redirect()->route('entrar');

    }

}
