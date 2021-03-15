@extends('Main')

@section('conteudo')
    <section class="container">
        <div class="row">

            <div class="col" id="login" >
                <img  class="img mt-5" style="margin-top: 70px" src="{{asset('assets/img/login2.svg')}}"/>
            </div>

            <div class="col mt-5">
                <h1 class="title">Conecte-se</h1>
                <form action="{{route('loginValidar')}}" method="post">
                    @csrf
                    <div class="wrapper">
                        <label  class="label">Usuário</label>
                        <Input class="input" typy="text" name="name"/> 
                        @if($errors->has('name'))
                            <span style="color:#ff0000 !important;">{{ $errors->first('name') }}</span>
                        @endif 
                    </div>
        
                    <div class="wrapper">
                        <label class="label">Senha</label>
                        <Input class="input" type="password" name="password"/>
                        @if($errors->has('password'))
                            <span style="color:#ff0000 !important;">{{ $errors->first('password') }}</span>
                        @endif 
                    </div>
    
                    <div class="wrapper">
                        <button type="submit"  class="btn btn-dark text-light"> 
                            Entrar
                        </button>
                    </div>
                       
                </form>
                <a class="perdeu" href="#">Esqueceu sua senha?</a>
                <p class="mt-2">Ainda não possui conta? <a href="/cadastrar" class="perdeu">Cadastre-se.</a></p>
            </div>
            
        </div>
    </section>
@endsection