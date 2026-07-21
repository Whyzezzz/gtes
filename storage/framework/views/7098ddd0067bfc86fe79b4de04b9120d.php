

<?php $__env->startSection('title', 'Catálogo'); ?>

<?php $__env->startSection('content'); ?>
<!-- Conteúdo específico da página Home -->
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="page-content">
                <!-- ***** Banner Start ***** -->
                <div class="main-banner">
                    <div class="row">
                        <div class="col-lg-7">
                            <div class="header-text">
                                <h6>Welcome To Cyborg</h6>
                                <h4><em>Browse</em> Our Popular Games Here</h4>
                                <div class="main-button">
                                    <a href="browse.html">Browse Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="mt-5">Jogos Disponíveis</h1>

                            <div class="row">
                                <?php $__currentLoopData = $jogos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jogo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-lg-3 col-md-6">
                                    <div class="game-info game-box h-100">
                                        <img class="game-image" src="<?php echo e(asset($jogo->background_image)); ?>" alt="<?php echo e($jogo->nome); ?>">
                                        <br>
                                        <a href="<?php echo e(route('detalhes-do-jogo', str_replace(' ', '%20', $jogo->nome))); ?>">
                                            <h2 class="game-title"><?php echo e($jogo->nome); ?></h2>
                                        </a>
                                                                                    
                                        <p>Preço: R$ <?php echo e($jogo->preco); ?></p>
                                        <div class="main-button">
                                            <a href="#" class="add-to-cart-btn" data-jogo-id="<?php echo e($jogo->id_jogo); ?>">Add to Cart</a>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('.add-to-cart-btn').click(function(event) {
            event.preventDefault();
            var jogoId = $(this).data('jogo-id');
            $.ajax({
                url: '/carrinho/adicionar',
                method: 'POST',
                data: {
                    _token: '<?php echo e(csrf_token()); ?>',
                    id_jogo: jogoId,
                    quantidade: 1 // você pode ajustar a quantidade conforme necessário
                },
                success: function(response) {
                    alert('Jogo adicionado ao carrinho!');
                    // Você pode redirecionar o usuário para a página de carrinho ou fazer outra coisa após adicionar o jogo ao carrinho
                },
                error: function(xhr, status, error) {
                    alert('Ocorreu um erro ao adicionar o jogo ao carrinho. Por favor, tente novamente.');
                    console.error(error);
                }
            });
        });
    });
</script>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\lojaOnline\resources\views/jogos/catalogo.blade.php ENDPATH**/ ?>