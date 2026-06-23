<style>
    .card {
        position: relative;
        display: flex;
        flex-direction: column;
        min-width: 0;
        word-wrap: break-word;
        background-color: #fff;
        background-clip: border-box;
        border: 1px solid rgba(0, 0, 0, 0.1);
        border-radius: 0.10rem;
        color: black;
    }

    .card-header {
        padding: 0.75rem 1.25rem;
        background-color: #fff;
        border-bottom: 1px solid rgba(0, 0, 0, 0.1);
    }

    .track {
        position: relative;
        background-color: #ddd;
        height: 10px;
        display: flex;
        margin-bottom: 50px;
        margin-top: 50px;
    }

    .track .step {
        flex-grow: 1;
        width: 25%;
        margin-top: -18px;
        text-align: center;
        position: relative;
    }

    .track .step.active:before {
        background: #FF5722;
    }

    .track .step::before {
        height: 7px;
        position: absolute;
        content: "";
        width: 100%;
        left: 0;
        top: 18px;
    }

    .track .step.active .icon {
        background: #ee5435;
        color: #fff;
    }

    .track .step.deactive:before {
        background: #030303;
    }

    .track .step.deactive .icon {
        background: #030303;
        color: #fff;
    }

    .track .icon {
        display: inline-block;
        width: 40px;
        height: 40px;
        line-height: 40px;
        position: relative;
        border-radius: 100%;
        background: #ddd;
    }

    .track .step.active .text {
        font-weight: 400;
        color: #000;
    }

    .track .text {
        display: block;
        margin-top: 7px;
    }

    .btn-warning {
        color: #ffffff;
        background-color: #ee5435;
        border-color: #ee5435;
        border-radius: 1px;
    }

    .btn-warning:hover {
        background-color: #ff2b00;
        border-color: #ff2b00;
    }
</style>

<?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php
        $statusTexts = [
            "Order Placed.",
            "Order Confirmed.",
            "Preparing your Order.",
            "Your order is on the way!",
            "Order Delivered.",
            "Order Denied.",
            "Order Cancelled."
        ];
        $tstatus = $statusTexts[$order->orderStatus] ?? "Unknown Status";

        // Mock delivery details
        $trackId = 'xxxxx';
        $deliveryBoyName = 'XYZ';
        $deliveryBoyPhoneNo = '1234509876';
        $deliveryTime = 'xx';
    ?>

    <!-- Modal -->
    <div class="modal fade" id="orderStatus<?php echo e($order->orderId); ?>" tabindex="-1" role="dialog" aria-labelledby="orderStatus<?php echo e($order->orderId); ?>" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-dark">Order Status</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <article class="card">
                            <div class="card-body">
                                <h6><strong>Order ID:</strong> #<?php echo e($order->orderId); ?></h6>
                                <article class="card">
                                    <div class="card-body row">
                                        <div class="col"> <strong>Estimated Delivery time:</strong> <br><?php echo e($deliveryTime); ?> minutes</div>
                                        <div class="col"> <strong>Shipping By:</strong> <br> <?php echo e($deliveryBoyName); ?> | <i class="fa fa-phone"></i> <?php echo e($deliveryBoyPhoneNo); ?> </div>
                                        <div class="col"> <strong>Status:</strong> <br> <?php echo e($tstatus); ?> </div>
                                        <div class="col"> <strong>Tracking #:</strong> <br> <?php echo e($trackId); ?> </div>
                                    </div>
                                </article>
                                <div class="track">
                                    <?php for($i = 0; $i <= 4; $i++): ?>
                                        <div class="step <?php echo e($order->orderStatus >= $i ? 'active' : ''); ?>">
                                            <span class="icon"></span>
                                            <span class="text"><?php echo e($statusTexts[$i]); ?></span>
                                        </div>
                                    <?php endfor; ?>
                                    <?php if($order->orderStatus == 5): ?>
                                        <div class="step deactive">
                                            <span class="icon"></span>
                                            <span class="text">Order Denied</span>
                                        </div>
                                    <?php elseif($order->orderStatus > 5): ?>
                                        <div class="step deactive">
                                            <span class="icon">X</span>
                                            <span class="text">Order Cancelled</span>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </article>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php /**PATH D:\College\Sem-4\Laravel project\pizza_website\resources\views/order_status_model.blade.php ENDPATH**/ ?>