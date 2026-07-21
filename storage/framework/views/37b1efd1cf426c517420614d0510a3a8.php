<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Jogos Disponíveis</title>
    <!-- Bootstrap core CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="<?php echo e(asset('css/fontawesome.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/templatemo-cyborg-gaming.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/flex-slider.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/owl.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/fontawesome.css')); ?>">
        <!-- Scripts -->
    <!-- Bootstrap core JavaScript -->
    <script src="<?php echo e(asset('js/custom.js')); ?>"></script>
    <script src="<?php echo e(asset('vendor/jquery/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(asset('vendor/bootstrap/js/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/isotope.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/owl-carousel.js')); ?>"></script>
    <script src="<?php echo e(asset('js/tabs.js')); ?>"></script>
    <script src="<?php echo e(asset('js/popup.js')); ?>"></script>
    <?php echo app('Illuminate\Foundation\Vite')(['resources/js/app.js']); ?>
    <style>
        img{
            width: 100%;
            height: auto;
        }
        .game-image {
            width: 90%;
            height: 90%;
            display: block;
        }
    
        .game-info {
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 10px;
            max-height: 300px; 
            overflow: hidden;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
        }
    
        .game-title {
            font-size: 18px;
            margin-bottom: 10px;
        }
    
        /* Adicione espaço entre os jogos */
        .game-box {
            margin-bottom: 20px;

            overflow: hidden; /* Evita que a borda cause problemas de layout */
        }
    
        /* Responsividade para a classe 'game-box' */
        @media (max-width: 768px) {
            .game-box {
                margin-bottom: 20px;
            }
        }




    </style>
    
</head>

<body>
   
        <!-- ***** Header Area Start ***** -->
        <header class="header-area header-sticky" >
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <nav class="main-nav">
                            <!-- ***** Logo Start ***** -->
                            <a href="<?php echo e(route('catalogo')); ?>" class="logo">
                                <img src="<?php echo e(asset('images/logo.png')); ?>" alt="Logo">
                            </a>
                            <!-- ***** Logo End ***** -->

                            <!-- ***** Search Start ***** -->
                            
                            <div class="search-input">
                                <form id="search" action="<?php echo e(route('detalhes-do-jogo', ['nomeDoJogo' => 'NomeDoJogoAqui'])); ?>" method="GET"> <!-- Corrigir a rota do formulário -->
                                    <input type="text" placeholder="Type Something" id="searchText" name="searchKeyword" />
                                    <i class="fa fa-search"></i>
                                </form>
                                <!-- Div para exibir as sugestões -->
                                <div id="suggestions" class="suggestions"></div>
                            </div>
                            
                            <script>
                                document.getElementById('searchText').addEventListener('input', function(event) {
                                    var searchText = event.target.value.trim();
                                    
                                    if (searchText.length > 0) {
                                        var xhr = new XMLHttpRequest();
                                        xhr.open('GET', '/suggestions?search=' + encodeURIComponent(searchText), true);
                                        xhr.onreadystatechange = function() {
                                            if (xhr.readyState === XMLHttpRequest.DONE) {
                                                if (xhr.status === 200) {
                                                    var suggestions = JSON.parse(xhr.responseText);
                                                    displaySuggestions(suggestions);
                                                } else {
                                                    console.error('Erro ao obter sugestões:', xhr.status);
                                                }
                                            }
                                        };
                                        xhr.send();
                                    } else {
                                        document.getElementById('suggestions').innerHTML = '';
                                    }
                                });
                            
                                function displaySuggestions(suggestions) {
                                    var suggestionsContainer = document.getElementById('suggestions');
                                    suggestionsContainer.innerHTML = '';

                                    suggestions.forEach(function(suggestion) {
                                        // Criar um novo elemento <div> para cada sugestão
                                        var suggestionDiv = document.createElement('div');
                                        suggestionDiv.classList.add('suggestion-item');
                                        
                                        // Criar um link dentro do elemento <div>
                                        var suggestionLink = document.createElement('a');
                                        suggestionLink.href = '/detalhes-do-jogo/' + encodeURIComponent(suggestion);
                                        suggestionLink.textContent = suggestion;

                                        // Adicionar o link ao elemento <div>
                                        suggestionDiv.appendChild(suggestionLink);

                                        // Adicionar o elemento <div> à lista de sugestões
                                        suggestionsContainer.appendChild(suggestionDiv);
                                    });
                                }

                            </script>
                        
                            <!-- ***** Search End ***** -->
                            <style>

                                .suggestions {
                                    position: absolute;
                                    width: calc(100% - 20px);
                                    max-height: 200px;
                                    overflow-y: auto;
                                    border-top: none;
                                    border-radius: 0 0 5px 5px;
                                    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
                                    z-index: 999;
                                    top: calc(100% + 10px); 
                                    left: 0; 
                                }

                                .search-input {
                                    position: relative;
                                }

                            </style>
                            
                                <!-- ***** Menu Start ***** -->
                                <ul class="nav">
                                    <li><a href="<?php echo e(route('catalogo')); ?>" class="active"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
                                    <li><a href="<?php echo e(url('/about')); ?>">About</a></li>
                                    <li><a href="details.html">Details</a></li>
                                    <li><a href="<?php echo e(route('carrinho.index')); ?>"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Carrinho</a></li>
                                    <li class="nav-item dropdown"> <!-- Adicione a classe dropdown aqui -->
                                        <?php if(Auth::check()): ?>
                                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="fa fa-user" aria-hidden="true"></i><?php echo e(Auth::user()->name); ?> <!-- Exibe o nome do usuário logado -->
                                            </a>
                                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                <li><a class="dropdown-item" href="<?php echo e(route('profile.edit')); ?>">Editar Perfil</a></li>
                                                <li><a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                    Logout
                                                </a>
                                                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                                                    <?php echo csrf_field(); ?>
                                                </form>
                                                </li>
                                            </ul>
                                        <?php else: ?>
                                            <a class="nav-link" href="<?php echo e(route('register')); ?>"><i class="fa fa-user" aria-hidden="true"></i>Register/Login</a>
                                        <?php endif; ?>
                                    </li>
                                </ul>

                                <a class='menu-trigger'>
                                    <span>Menu</span>
                                </a>
                                <style>
                                .dropdown-menu {
                                    background-color: transparent;
                                    border: none; 
                                }</style>
                                
                                
                                <script>
                                    // Função para exibir ou ocultar o dropdown ao clicar no nome do usuário
                                    document.addEventListener('DOMContentLoaded', function () {
                                        var dropdownMenu = document.querySelector('.dropdown-menu');
                                        var dropdownToggle = document.querySelector('.dropdown-toggle');
                                
                                        dropdownToggle.addEventListener('click', function (event) {
                                            event.stopPropagation(); // Evita que o evento de clique se propague para fora do dropdownToggle
                                            dropdownMenu.classList.toggle('show'); // Adiciona ou remove a classe 'show' para exibir ou ocultar o dropdown
                                        });
                                
                                        // Fecha o dropdown quando o usuário clicar em qualquer lugar fora dele
                                        document.addEventListener('click', function (event) {
                                            if (!dropdownMenu.contains(event.target)) {
                                                dropdownMenu.classList.remove('show');
                                            }
                                        });
                                    });
                                </script>
                                
                                <!-- ***** Menu End ***** -->
                        </nav>
                    </div>
                </div>
            </div>
        </header>
        <!-- ***** Header Area End ***** -->
    <br>

        <!-- Conteúdo específico da página -->
        <?php echo $__env->yieldContent('content'); ?>

        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <p>Copyright © 2036 <a href="#">Cyborg Gaming</a> Company. All rights reserved.
                            <br>Design: <a href="https://templatemo.com" target="_blank" title="free CSS templates">TemplateMo</a> Distributed By <a href="https://themewagon.com" target="_blank">ThemeWagon</a></p>
                    </div>
                </div>
            </div>
        </footer>
    
    
</body>

</html>
<?php /**PATH C:\xampp\htdocs\lojaOnline\resources\views\layouts\app.blade.php ENDPATH**/ ?>