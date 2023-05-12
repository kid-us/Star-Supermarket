
<?php $__env->startSection('title', 'Gallery'); ?>
<?php $__env->startSection('content'); ?>
    <div class="mt-5">
        <h5 class="border-start border-danger border-5 mb-4"> &nbsp; &nbsp; Gallery</h5>
        <div class="row justify-content-center p-3">
            <?php for($i = 1; $i < 16; $i++): ?>
                <div class="col-lg-4 col-md-3 col-sm-6 col-xs-12 mb-5">
                    <img src="<?php echo e(asset("Img/gallery/$i.jpg")); ?>" alt="" class="gallery rounded shadow">
                </div>
            <?php endfor; ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Layout.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Kid_us\Desktop\Supermarket\resources\views/Pages/admin/gallery.blade.php ENDPATH**/ ?>