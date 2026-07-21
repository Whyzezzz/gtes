

<?php $__env->startSection('title', 'About'); ?>

<?php $__env->startSection('content'); ?>
<br>
<br>
<section class="container">
    <div class="row">
        <div class="col-lg-7 order-lg-2" style="position: relative;">
            <!-- Vídeo -->
            <video controls autoplay style="max-width: 600px; max-height:600px; border-radius: 15px;">
                <source src="<?php echo e(asset('videos/pap.mp4')); ?>" type="video/mp4">
                Your browser does not support the video tag.
            </video>
            <div class="header-text" style="position: absolute; top: 20px; left: 20px;">
                <h6>Welcome To Cyborg</h6>
                <h4><em>Browse</em> Our Popular Games Here</h4>
            </div>
        </div>
        
        <br>
        <div class="col-lg-5 order-lg-1">
            <div class="logo text-lg-left">    
                <img src="<?php echo e(asset('images/logo.png')); ?>" alt="Logo" style="width: 50%">
            </div>
            <br>
            <br>
            <div class="container">
                <p>Cyborg é a derradeira plataforma para jogar, criar e falar sobre jogos.</p>
                <br>
                <br>
                <div class="main-button" style="text-align: center">
                    <a href="<?php echo e(route('catalogo')); ?>">Browse Now</a>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\lojaOnline\resources\views/about/index.blade.php ENDPATH**/ ?>