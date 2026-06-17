<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ticket de Compra - Ondas de Sanación</title>
    <style>
        body { font-family: sans-serif; color: #333; }
        .header { text-align: center; border-bottom: 2px solid #2c4c3b; padding-bottom: 10px; margin-bottom: 20px; }
        .header h1 { color: #2c4c3b; margin: 0; }
        .tabla-items { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
        .tabla-items th, .tabla-items td { padding: 10px; border-bottom: 1px solid #ddd; text-align: left; }
        .total { text-align: right; font-size: 1.2rem; font-weight: bold; padding: 10px; background-color: #f7f5ef; }
        .legal { text-align: center; margin-top: 30px; font-size: 0.85rem; color: #666; font-weight: bold; border-top: 1px dashed #ccc; padding-top: 10px; }
    </style>
</head>
<body>

    <div class="header">
        <h1>Ondas de Sanación</h1>
        <p>Comprobante de compra web</p>
        <p>Fecha: <?php echo e(date('d/m/Y')); ?></p>
    </div>

    <table class="tabla-items">
        <thead>
            <tr>
                <th>Producto</th>
                <th>Cant.</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($item['nombre']); ?></td>
                <td><?php echo e($item['cantidad']); ?></td>
                <td>$<?php echo e(number_format($item['subtotal'], 2, ',', '.')); ?></td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>

    <div class="total">
        TOTAL ABONADO: $<?php echo e(number_format($total, 2, ',', '.')); ?>

    </div>

    <div class="legal">
        DOCUMENTO NO VÁLIDO COMO FACTURA
    </div>

    <p style="text-align: center; margin-top: 15px; font-style: italic;">
        ¡Gracias por confiar en nuestra energía!
    </p>

</body>
</html><?php /**PATH C:\Users\Usuario\Herd\grupo21\resources\views/ticket_pdf.blade.php ENDPATH**/ ?>