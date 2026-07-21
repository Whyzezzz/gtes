

<?php $__env->startSection('title', $jogo->nome); ?>

<?php $__env->startSection('content'); ?>
    <br><br><br><br>
    <!-- Conteúdo específico da página -->
    <div class="container">
        <div class="row">
            
            <div class="col-lg-6 order-lg-2">
                <img src="<?php echo e($jogo->background_image); ?>" alt="<?php echo e($jogo->nome); ?>" class="game-image img-fluid">
            </div>
            
            <div class="col-lg-6 order-lg-1">
                <h1 style="color: palevioletred;"><?php echo e($jogo->nome); ?></h1>
                <p style="color: palevioletred;">Data de Lançamento: <span style="color: gray;"><?php echo e($atributos['released']); ?></span></p>
                <p style="color:palevioletred;">Ratings:</p>
                <ul style="color: gray;">
                    <?php $__currentLoopData = $atributos['ratings']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rating): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><span style="color: gray;"><?php echo e($rating['title']); ?>:</span> <?php echo e($rating['percent']); ?>%</li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
                <p style="color: palevioletred;">Plataformas:</p>
                <ul style="color: palevioletred;">
                    <?php $__currentLoopData = $atributos['platforms']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $platform): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><span style="color: gray;"><?php echo e($platform['platform']['name']); ?></span></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
            
        </div>
        
        <!-- Adicionar screenshots -->
        <div class="row mt-5">
            <div class="col-lg-12">
                <h2 style="color: palevioletred;">Screenshots</h2>
                <div class="row">
                    <?php $__currentLoopData = $atributos['short_screenshots']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $screenshot): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($index > 0): ?> <!-- Verifica se o índice é maior que 0 para ignorar a primeira imagem -->
                            <div class="col-lg-3 col-md-6 mb-4">
                                <img src="<?php echo e($screenshot['image']); ?>" class="img-fluid" alt="Screenshot">
                            </div>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
        
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\lojaOnline\resources\views\jogos\atributos.blade.php ENDPATH**/ ?>