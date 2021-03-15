<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Podcast</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
   

    <style>
        body {
            background: #599fd9;
            background-image: linear-gradient( 135.9deg,  rgba(109,25,252,1) 16.4%, rgba(125,31,165,1) 56.1% );
            min-height: 100vh;
            overflow-x: hidden;
        }
        .vertical-nav {
            min-width: 17rem;
            width: 17rem;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            box-shadow: 3px 3px 10px rgba(0, 0, 0, 0.1);
            transition: all 0.4s;
        }
        .page-content {
            width: calc(100% - 17rem);
            margin-left: 17rem;
            transition: all 0.4s;
        } 
        
        #sidebar.active {
            margin-left: -17rem;
        }
        
        #content.active {
            width: 100%;
            margin: 0;
        }
        
        .separator {
            margin: 3rem 0;
            border-bottom: 1px dashed #fff;
        }
        
        .text-uppercase {
            letter-spacing: 0.1em;
        }
        .text-gray {
            color: #aaa;
        }
        .nav-link{
            text-transform: capitalize;
        }
        .nav-link:hover{
            background:#f3f2f2;
        }
        .text-primary{
            color:#7579e7 !important;
        }

        .col:hover{
            transform: scale(1.1);
            box-shadow: 2x 2x 2x #000;
            z-index: 2;
            cursor: pointer;
        }
        @media (max-width: 768px) {
            #sidebar {
            margin-left: -17rem;
            }
            #sidebar.active {
            margin-left: 0;
            }
            #content {
            width: 100%;
            margin: 0;
            }
            #content.active {
            margin-left: 17rem;
            width: calc(100% - 17rem);
            }
        }
    </style>
    
</head>
<body>
   
    {{--Menu --}}
    <div class="vertical-nav bg-white" id="sidebar">
        <div class="py-4 px-3 mb-4 bg-light">
            <div class="media d-flex align-items-center">
                @if(session()->has('name'))
                    <img loading="lazy" src="" alt="..." width="80" height="80" class="mr-3 rounded-circle img-thumbnail shadow-sm">
                    <div class="media-body">
                        <h6 class="m-0">{{session('name')['name']}}</h6>
                    </div>
                @else
                    <img loading="lazy"  src="{{asset('assets/img/sem.jpg')}}" alt="..." width="80" height="80" class="mr-3 rounded-circle img-thumbnail shadow-sm">
                    <h6 class="m-0"><a href="{{route('entrar')}}" style="text-decoration: none; color: rgb(36, 35, 35);">Entrar</a></h6>
                @endif
            </div>
        </div>
      
    
        <ul class="nav flex-column bg-white mb-0">
          <li class="nav-item">
            <a href="{{route('home')}}" class="nav-link text-dark bg-light">
                <i class="fa fa-home mr-3 text-primary fa-fw"></i>
                início
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link text-dark">
                      <i class="fa fa-user mr-3 text-primary fa-fw"></i>
                      Perfil
                  </a>
          </li>
          <li class="nav-item">
            <a href="{{route('categorias')}}" class="nav-link text-dark">
                      <i class="fa fa-hand-o-up mr-3 text-primary fa-fw"></i>
                      Categorias
                  </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link text-dark">
                      <i class="fa fa-sign-out mr-3 text-primary fa-fw"></i>
                      Sair
                  </a>
          </li>
        </ul>
    </div>

                
    <!-- CONTEUDO -->
    <div class="page-content p-5" id="content">
        <!-- ESCONDER MENU -->
        <button id="sidebarCollapse" type="button" class="btn btn-light bg-white rounded-pill shadow-sm px-4 mb-4"><i class="fa fa-bars mr-2"></i></button>
        {{--CATEGORIAS--}}
        <h3 class="mb-4 mt-2 ml-2" style="color: #fff">Categorias</h3>
        <div class="row">
            @foreach ($categoria as $c)
                <div class="col p-5 m-3 " style="background-color: #3F3D56; color: #fff">
                    <center>
                        <p>{{$c->nome}}</p>
                    </center>
                </div>
            @endforeach
        </div>
    </div>
    

    @yield('conteudo')

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
 
    
    <script type="text/javascript">
        $(document).ready(function(){
            $('.col').click(function(){
                window.location="{{route('home')}}";
            });
        });

        $(function() { 
            $('#sidebarCollapse').on('click', function() {
                $('#sidebar, #content').toggleClass('active');
            });
        });


    </script>
</body>
</html>

