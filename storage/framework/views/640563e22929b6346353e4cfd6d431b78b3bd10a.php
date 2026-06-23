<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Orders</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel = "icon" href ="<?php echo e(asset('assets/images/logo.jpg')); ?>" type = "image/x-icon">
        <link rel="stylesheet" href="<?php echo e(asset('assets/css/bootstrap.min.css')); ?>">
        <style>
            .table-title {
                color: #fff;
                background: #4b5366;		
                padding: 16px 25px;
                margin-top:10px;
            }
            table.table tr th, table.table tr td {
                border-color: #e9e9e9;
                padding: 12px 15px;
                vertical-align: middle;
                color:white;
            }
            table.table tr th:first-child {
                width: 60px; 
            }
        </style>
    </head>
    <body>
        <?php echo $__env->make('view.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="container-md" id="cont">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-4">
                            <h2>Order <b>Details</b></h2>
                        </div>
                    </div>
                </div>
                
                <table class="table table-striped table-hover text-center table-responsive-md">
                    <thead>
                        <tr>
                            <th>Order Id</th>
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
                        <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                            <tr>
                                <td><?php echo e($order->orderId); ?></td>
                                <td><?php echo e($order->address); ?></td>
                                <td><?php echo e($order->phoneNo); ?></td>
                                <td><?php echo e(number_format($order->amount, 2)); ?></td>
                                <td><?php echo e($order->paymentMode == 0 ? 'Cash on Delivery' : 'Online'); ?></td>
                                <td><?php echo e($order->OrderDate); ?></td>
                                <td>
                                    <a href="#" data-toggle="modal" data-target="#orderStatus<?php echo e($order->orderId); ?>">
                                        <img src="<?php echo e(asset('assets/images/image.png')); ?>" width="20">
                                    </a>
                                </td>
                                <td>
                                    <a href="#" data-toggle="modal" data-target="#orderItem<?php echo e($order->orderId); ?>">
                                        <img src="<?php echo e(asset('assets/images/image.png')); ?>" width="20">
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
        <?php echo $__env->make('order_item_model', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('order_status_model', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </body>
</html>
<?php /**PATH D:\College\Sem-4\Laravel project\pizza_website\resources\views/view_order.blade.php ENDPATH**/ ?>