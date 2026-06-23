<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Order</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel = "icon" href ="<?php echo e(asset('assets/images/logo.jpg')); ?>" type = "image/x-icon">
        <link rel="stylesheet" href="<?php echo e(asset('assets/css/bootstrap.min.css')); ?>">
    </head>
    <body>
        <?php echo $__env->make('admin.view.admin_navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <form method="GET" action="<?php echo e(route('admin.orders.report')); ?>" class="card p-3 mb-4 bg-light shadow-sm text-dark">
            <div class="row">
                <div class="col-md-3">
                    <label>Customer Name</label>
                    <input type="text" name="customer" class="form-control" value="<?php echo e(request('customer')); ?>">
                </div>
                <div class="col-md-3">
                    <label>Product Name</label>
                    <input type="text" name="product" class="form-control" value="<?php echo e(request('product')); ?>">
                </div>
                <div class="col-md-3">
                    <label>Category</label>
                    <input type="text" name="category" class="form-control" value="<?php echo e(request('category')); ?>">
                </div>
                <div class="col-md-3">
                    <label>Payment Mode</label>
                    <select name="payment_mode" class="form-control">
                        <option value="">-- All --</option>
                        <option value="0" <?php echo e(request('payment_mode') == '0' ? 'selected' : ''); ?>>Cash on Delivery</option>
                        <option value="1" <?php echo e(request('payment_mode') == '1' ? 'selected' : ''); ?>>Online</option>
                    </select>
                </div>
            </div>
            
            <div class="row mt-3">
                <div class="col-md-3">
                    <label>Status</label>
                    <select name="status" class="form-control">
                        <option value="">-- All --</option>
                        <?php for($i = 0; $i <= 6; $i++): ?>
                            <option value="<?php echo e($i); ?>" <?php echo e(request('status') == $i ? 'selected' : ''); ?>>
                                <?php echo e(['Placed', 'Confirmed', 'Preparing', 'On the Way', 'Delivered', 'Denied', 'Cancelled'][$i]); ?>

                            </option>
                        <?php endfor; ?>
                    </select>
                </div>
                <div class="col-md-3">
                    <label>From Date</label>
                    <input type="date" name="from" class="form-control" value="<?php echo e(request('from')); ?>">
                </div>
                <div class="col-md-3">
                    <label>To Date</label>
                    <input type="date" name="to" class="form-control" value="<?php echo e(request('to')); ?>">
                </div>
                <div class="col-md-3 d-flex align-items-end">
                    <button type="submit" class="btn btn-primary w-100">Filter Report</button>
                </div>
            </div>
        </form>

        <div class="container-md card bg-body-tertiary" style="margin-top:98px;">
            <div class="table-wrapper">
                <div class="table-title card bg-body-tertiary">
                    <div class="form-row d-flex">
                        <div class="col-sm-4 text-dark">
                            <h2>Order <b>Details</b></h2>
                        </div>
                        <div class="col">
                            <a href="#" onclick="window.print()" class="btn btn-light mx-2" style="float:right;">
                                <img src="<?php echo e(asset('assets/images/print.png')); ?>"> 
                                <span>Print</span>
                            </a>
                        </div>
                    </div>
                </div>

                <table class="table table-striped table-hover table-center table-responsive-md" id="NoOrder">
                    <thead style="background-color: rgb(111 202 203);">
                        <tr>
                            <th>Order Id</th>
                            <th>User Id</th>
                            <th>Address</th>
                            <th>Phone No</th>
                            <th>Amount</th>                      
                            <th>Payment Mode</th>
                            <th>Order Date</th>
                            <th>Status</th>                      
                            <th>Items</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td><?php echo e($order->orderId); ?></td>
                                <td><?php echo e($order->userId); ?></td>
                                <td title="<?php echo e($order->address); ?>"><?php echo e(Str::limit($order->address, 20)); ?></td>
                                <td><?php echo e($order->phoneNo); ?></td>
                                <td><?php echo e($order->amount); ?></td>
                                <td><?php echo e($order->paymentMode == 0 ? 'Cash on Delivery' : 'Online'); ?></td>
                                <td><?php echo e($order->OrderDate); ?></td>
                                <td>
                                    <a href="#" data-toggle="modal" data-target="#orderStatus<?php echo e($order->orderId); ?>" class="view">
                                        <img src="<?php echo e(asset('assets/images/image.png')); ?>" width="30">
                                    </a>
                                </td>
                                <td>
                                    <a href="#" data-toggle="modal" data-target="#orderItem<?php echo e($order->orderId); ?>" class="view" title="View Details">
                                        <img src="<?php echo e(asset('assets/images/image.png')); ?>" width="30">
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan="9" class="text-center">No orders received yet.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <?php echo $__env->make('order_item_model', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('admin.order_status_model', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </body>
</html>
<?php /**PATH C:\New\pizza_website\resources\views/admin/admin_order.blade.php ENDPATH**/ ?>