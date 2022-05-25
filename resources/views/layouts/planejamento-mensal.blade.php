<!doctype html>
<html lang="pt-br">
    <head>
        <!-- Título-->
        <title>BandejApp - Planejamento Mensal</title>

        <!--Meta Tags -->
        @include('comuns.metatags')

        <!-- Bootstrap CSS -->
        @include('comuns.bootstrap')

        <!--Favicon-->
        @include('comuns.favicon')

        <!-- Estilos (path do arquivo css) -->
        @include('comuns.styles')
        <link rel="stylesheet" href="{{ asset('css/dashboard-usuario.css') }}">
    </head>

    <body>
        <!--Navbar-->
        @include('dashboard-usuario.navbar1')

        @include('dashboard-usuario.navbar2')

        <nav class="navbar navbar2 navbar-expand-md fixed-top">
            <div class="row" style="width: 100%; height: 45px; padding: 0; margin: 0; position: relative;">
                <div class="col botoes-menu border position-relative">
                    <p class="centraliza" style="color: #fff;">Próximas Refeições</p>
                    <a href="/dashboard" class="stretched-link"></a>
                </div>
                <div class="col botoes-menu border position-relative">
                    <p class="centraliza" style="color: #fff;"> Planejamento Mensal</p>
                    <a href="/planejamentomensal" class="stretched-link"></a>
                </div>    
            </div>
        </nav>

        <div class="container-fluid">
            <div class="container container-pm">
                <br>
                <h2 style="text-align: center; color: #fff;">Planejamento Mensal</h2>
                <div class="container container2-pm" style="overflow: auto">
                    <br>
                    
                    
                    <input type='checkbox' class='checkall' onClick='toggle(this)' style="margin-left: 15px;"> <span class="card-title">Selecionar/desselecionar todos</span>
                    
                        @foreach($calendario_dias as $event)
                        
                        <div class="card">
                            <div class="card-header">
                                <span class="card-title" style="text-align: center; color: #fff;">{{$event->dia_da_semana}} - {{$event->data_visual}}</span>
                            </div>
                            
                            <div class="card-body">
                                <form id="registrarRefeicaoAlmoco" action="{{ route('refeicao') }}" method="POST">
                                @csrf
                                    <input type="checkbox" onchange="document.getElementById('registrarRefeicaoAlmoco').submit()">
                                    <label for="tipo" class="text-shadow">Almoço - {{ $unidade_bandejao }}</label>
                                    <input type="hidden" name="tipo" value="Almoço">
                                    <input type="hidden" name="unidade_bandejao" value="{{ $unidade_bandejao }}">
                                    <input type="hidden" name="id_usuario" value="{{ $user_id }}">
                                    <br>
                                </form>
                                <hr>
                                <form id="registrarRefeicao" action="{{ route('refeicao') }}" method="POST">
                                @csrf
                                    <input type="checkbox" id="tipo" name="tipo" value="Jantar" onchange="document.getElementById('registrarRefeicao').submit()">
                                    <input type="hidden" name="unidade_bandejao" value="{{ $unidade_bandejao }}">
                                    <label for="tipo" class="text-shadow">Janta - {{ $unidade_bandejao }}</label>
                            
                                </form>      
                            </div>                       
                        </div>
                                
                        @endforeach 
                    </div>
                </div>
            </div>
       
    </body>
</html>