

<?php $__env->startSection('title', 'Carrinho'); ?>

<?php $__env->startSection('content'); ?>
    <section class="container">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1>Carrinho de Compras</h1>
                    <form action="<?php echo e(route('carrinho.remover')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <?php if($carrinhoItens->isEmpty()): ?>
                            <p>O seu carrinho está vazio.</p>
                        <?php else: ?>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th></th> <!-- Cabeçalho para a checkbox -->
                                        <th>Imagem</th>
                                        <th>Nome do Jogo</th>
                                        <th>Quantidade</th>
                                        <th>Preço</th>
                                        <th>Ações</th>
                                    </tr>
                                    <style>
                                        th{
                                            color:palevioletred;
                                        }
                                        td{
                                            color:white;
                                        }
                                        
                                    </style>
                                </thead>
                                <tbody>
                                    <?php
                                        $total = 0;
                                    ?>
                                    <?php $__currentLoopData = $carrinhoItens; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php
                                            $subtotal = $item->jogo->preco * $item->quantidade;
                                            $total += $subtotal;
                                        ?>
                                        <tr>
                                            <td>
                                                <input type="checkbox" name="itens_selecionados[]" value="<?php echo e($item->id_jogo); ?>">
                                            </td>
                                            <td class="game-image-cell">
                                                <img src="<?php echo e(asset($item->jogo->background_image)); ?>" alt="<?php echo e($item->jogo->nome); ?>">
                                            </td>
                                            <style>
                                                .game-image-cell img {
                                                    width: 100px; /* Defina o tamanho desejado para a largura da imagem */
                                                    height: auto; /* Isso manterá a proporção da imagem */
                                                }
                                            </style>
                                            <td><?php echo e($item->jogo->nome); ?></td>
                                            <td><?php echo e($item->quantidade); ?></td>
                                            <td>R$<?php echo e(number_format($item->jogo->preco, 2, ',', '.')); ?></td>
                                            <td>
                                                <!-- Não é mais necessário um formulário aqui -->
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                                <tfoot>
                                    <thead>
                                        <tr>
                                            <th colspan="5" style="text-align: right;">Total:</th>
                                            <th colspan="2">R$<?php echo e(number_format($total, 2, ',', '.')); ?></th>
                                        </tr>
                                    </thead>
                                </tfoot>
                            </table>
                            <button type="submit" class="btn btn-danger">Remover</button>
                        <?php endif; ?>
                    </form>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\lojaOnline\resources\views\carrinho\index.blade.php ENDPATH**/ ?>