<?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <!-- Modal -->
        <div class="modal fade text-dark" id="orderItem<?php echo e($order->orderId); ?>" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Order #<?php echo e($order->orderId); ?> Items</h5>
                        <button type="button" class="close" data-dismiss="modal">
                            <span>&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    
                        <div class="container">
                            <div class="row">
                                <!-- Shopping cart table -->
                                <div class="table-responsive">
                                    <table class="table text">
                                        <thead>
                                            <tr>
                                                <th scope="col" class="border-0 bg-light">
                                                    <div class="px-3 text-dark">Item</div>
                                                </th>
                                                <th scope="col" class="border-0 bg-light">
                                                    <div class="text-center text-dark">Quantity</div>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php $__currentLoopData = $order->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($item->pizza): ?> 
                                                <tr>
                                                    <th scope="row">
                                                        <div class="p-2">
                                                            <img src="<?php echo e(asset('/storage/'. $item->pizza->pizzaPhoto)); ?>" alt="" width="70" class="img-fluid rounded shadow-sm">
                                                            <div class="ml-3 d-inline-block align-middle">
                                                                <h5 class="mb-0">
                                                                    <a href="#" class="text-dark d-inline-block align-middle"><?php echo e($item->pizza->pizzaName); ?></a>
                                                                </h5>
                                                                <span class="text-muted font-weight-normal font-italic d-block">Rs. <?php echo e($item->pizza->pizzaPrice); ?>/-</span>
                                                            </div>
                                                        </div>
                                                    </th>
                                                    <td class="align-middle text-center text-dark">
                                                        <strong><?php echo e($item->itemQuantity); ?></strong>
                                                    </td>
                                                </tr>
                                            <?php else: ?>
                                                <tr><td colspan="2">Pizza not found for this order item.</td></tr>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- End -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php /**PATH C:\New\pizza_website\resources\views/order_item_model.blade.php ENDPATH**/ ?>