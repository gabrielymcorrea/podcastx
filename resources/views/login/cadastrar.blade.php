@extends('Main')

@section('conteudo')
    <div class="container">
        <div class="row">

            <div class="col" id="cadastro">
                <img class="img" style="margin-top: 70px" src="{{asset('assets/img/cadastrar.svg')}}"/>
            </div>
           
            <div class="col mt-5">
                <h1 class="title">Cadastrar</h1>
                <form action="{{route('loginEnviar')}}" method="post">
                    @csrf
                    <div class="wrapper">
                        <label  class="label">Email</label>
                        <Input class="input" typy="email" name="email" value="{{ old('email') }}" required/>
                        @if($errors->has('email'))
                            <span style="color:#ff0000 !important;">{{ $errors->first('email') }}</span>
                        @endif 
                    </div>

                    <div class="wrapper">
                        <label  class="label">Usuario</label>
                        <Input class="input" typy="name" name="name" value="{{ old('name') }}" required/> 
                        @if($errors->has('name'))
                            <span style="color:#ff0000 !important;">{{ $errors->first('name') }}</span>
                        @endif 
                    </div>
        
                    <div class="wrapper">
                        <label class="label">Senha</label>
                        <Input class="input" type="password" name="password" required/>
                        @if($errors->has('password'))
                            <span style="color:#ff0000 !important;">{{ $errors->first('password') }}</span>
                        @endif 
                    </div>

    
                    <div class="wrapper">
                        <button type="submit"  class="btn btn-dark text-light" >Cadastar</button>
                    </div>

                </form>
            </div>
            
            
          
        </div>
    </div>
@endsection