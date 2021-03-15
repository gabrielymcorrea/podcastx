@extends('Main')

@section('conteudo')

    <div class="container-fluid">

        <div class="row">
            <div class="col-5">
                <img class="img"  style="height: 250px; width:250px;"  src="{{asset('assets/img/perfil.svg')}}"/>
            </div>
            <div class="col-7" >
                <h1>Editar perfil</h1>
                <hr>
        
                <form action="{{ route('update', $user) }}" method="post">
                    {{ csrf_field() }}
                    <p class="form-group">
                        <label> Nome  </label> <br>
                        <input type="text" name="name" value="{{$user->name}}"  class="form-control  @if($errors->has('name')) is-invalid @endif">
                        @if($errors->has('name'))
                            <span class="invalid-feedback">{{ $errors->first('name') }}</span>
                        @endif
                    </p >
        
                    <p class="form-group">
                        <label> Email </label> <br>
                        <input type="email" name="email" value="{{$user->email}}"  class="form-control  @if($errors->has('email')) is-invalid @endif">
                        @if($errors->has('email'))
                            <span class="invalid-feedback">{{ $errors->first('email') }}</span>
                        @endif
                    </p>
        
                    <p class="form-group">
                        <label> Senha </label> <br>
                        <input type="password" name="password" class="form-control  @if($errors->has('password')) is-invalid @endif">
                        @if($errors->has('password'))
                            <span class="invalid-feedback">{{ $errors->first('password') }}</span>
                        @endif
                    </p>
                   
        
                    <input type="submit" value="Atualizar" class="btn btn-success btn-lg" >
        
                </form>
            </div>
        </div>
    </div>


@endsection