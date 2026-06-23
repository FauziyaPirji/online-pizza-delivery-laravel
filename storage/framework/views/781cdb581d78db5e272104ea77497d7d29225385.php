<?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<!-- Modal -->
<div class="modal fade" id="orderStatus<?php echo e($order->orderId); ?>" tabindex="-1" role="dialog" aria-labelledby="orderStatus<?php echo e($order->orderId); ?>" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: rgb(111 202 203);">
                <h5 class="modal-title">Order Status and Delivery Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo e(route('orders.updateStatus', $order->orderId)); ?>" method="POST" style="border-bottom: 2px solid #dee2e6;">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>

                    <div class="text-left my-2">    
                        <b><label for="status" class="text-dark">Order Status</label></b>
                        <div class="row mx-2">
                            <input class="form-control col-md-3" id="status" name="status" value="<?php echo e($order->orderStatus); ?>" type="number" min="0" max="6" required>    
                            <button type="button" class="btn btn-secondary ml-1" data-container="body" data-toggle="popover" title="Order Status" data-placement="bottom" data-html="true" data-content="0=Order Placed.<br> 1=Order Confirmed.<br> 2=Preparing your Order.<br> 3=Your order is on the way!<br> 4=Order Delivered.<br> 5=Order Denied.<br> 6=Order Cancelled.">
                                <img src="<?php echo e(asset('assets/images/info-square.png')); ?>" width="50" hight="50">
                            </button>
                        </div>
                    </div>
                    <input type="hidden" name="orderId" value="<?php echo e($order->orderId); ?>">
                    <button type="submit" class="btn btn-success mb-2">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<style>
    .popover {
        top: -77px !important;
    }
</style>

<script>
    $(function () {
        $('[data-toggle="popover"]').popover();
    });
</script>
<?php /**PATH D:\College\Sem-4\Laravel project\pizza_website\resources\views/admin/order_status_model.blade.php ENDPATH**/ ?>