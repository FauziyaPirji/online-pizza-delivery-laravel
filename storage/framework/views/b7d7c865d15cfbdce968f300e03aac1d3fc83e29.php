<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Menu</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        
		<link rel = "icon" href ="<?php echo e(asset('assets/images/logo.jpg')); ?>" type = "image/x-icon">
        <link rel="stylesheet" href="<?php echo e(asset('assets/css/bootstrap.min.css')); ?>">
    </head>
    <body>
        <?php echo $__env->make('admin.view.admin_navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

		<div class="container-fluid" style="margin-top:98px">
            <div class="form-row d-flex" style="margin-right:10px">
                <div class="col">
                    <form action="<?php echo e(route('item.trash')); ?>" method="get">
                        <button class="btn btn-primary float-right btn-sm">Go to trash items</button>
                    </form>
                </div>
            </div>
	        <div class="col-lg-12">
		        <div class="row">
			    <!-- FORM Panel -->
			        <div class="col-md-4 text-dark">
			            <form action="<?php echo e(route('admin_item_list')); ?>" method="post" enctype="multipart/form-data">
							<?php echo csrf_field(); ?>
				            <div class="card mb-3">
					            <div class="card-header" style="background-color: rgb(111 202 203);">
						            Create New Item
				  	            </div>
					            <div class="card-body">
							        <div class="form-group">
								        <label class="control-label">Name: </label>
								        <input type="text" class="form-control" name="pizzaName" id="pizzaName" required>
										<?php $__errorArgs = ['pizzaName'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="text-danger"><?php echo e($message); ?></span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
							        </div>
							        <div class="form-group">
								        <label class="control-label">Description: </label>
								        <textarea cols="30" rows="3" class="form-control" name="pizzaDesc" id="pizzaDesc" required></textarea>
										<?php $__errorArgs = ['pizzaDesc'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="text-danger"><?php echo e($message); ?></span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
							        </div>
                                    <div class="form-group">
								        <label class="control-label">Price</label>
								        <input type="number" class="form-control" name="pizzaPrice" id="pizzaPrice" required min="1">
										<?php $__errorArgs = ['pizzaPrice'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="text-danger"><?php echo e($message); ?></span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
							        </div>	
							        <div class="form-group">
								        <label class="control-label">Category: </label>
								        <select name="pizzaCategorieId" id="pizzaCategorieId" class="custom-select browser-default" required>
								            <option hidden disabled selected value>None</option>
											<?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categorie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($categorie->id); ?>"><?php echo e($categorie->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								        </select>
										<?php $__errorArgs = ['pizzaCategorieId'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="text-danger"><?php echo e($message); ?></span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
							        </div>
							        <div class="form-group">
								        <label for="image" class="control-label">Image</label>
								        <input type="file" name="pizzaPhoto" id="pizzaPhoto" accept=".jpg" class="form-control" required style="border:none;">
								        <small id="Info" class="form-text text-muted mx-3">Please .jpg file upload.</small>
										<?php $__errorArgs = ['pizzaPhoto'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="text-danger"><?php echo e($message); ?></span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
							        </div>
					            </div>
					            <div class="card-footer">
						            <div class="row">
							            <div class="col-md-12">
								            <button type="submit" name="submit" class="btn btn-lg btn-primary btn-block"> Create </button>
							            </div>
						            </div>
					            </div>
				            </div>
			            </form>
			        </div>
			    <!-- FORM Panel -->
                    <!-- Table Panel -->
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-body">
                                <table class="table table-bordered table-hover mb-0">
                                    <thead style="background-color: rgb(111 202 203);">
                                        <tr>
                                            <th class="text-center" style="width:3%;">Cat. Id</th>
                                            <th class="text-center">Img</th>
											<th class="text-center" style="width:15px;">Item Name</th>
                                            <th class="text-center" style="width:50%;">Item Detail</th>
                                            <th class="text-center" style="width:18%;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $pizzas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pizza): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<tr>
												<td><?php echo e($pizza->pizzaCategorieId); ?></td>
												<td><img src="<?php echo e(asset('/storage/'. $pizza->pizzaPhoto)); ?>" class="card-img-top" alt="image for this item" width="100px" height="100px"></td>
												<td><?php echo e($pizza->pizzaName); ?></td>
												<td><?php echo e($pizza->pizzaDesc); ?> <br> <b>price :</b> <?php echo e($pizza->pizzaPrice); ?></td>
												<td>
													<button class="btn btn-primary btn-sm" style="margin-left:35px;" data-toggle="modal" data-target="#editModal<?php echo e($pizza->pizzaId); ?>">Edit</button> 
													<form action="<?php echo e(route('item.delete', ['id' => $pizza->pizzaId])); ?>" method="get">
                                                        <button name="removeItem" class="btn btn-sm btn-danger" style="margin-left:35px;margin-top:4px;">Trash</button>
                                                    </form> 
												</td>
											</tr>
											<!-- Modal -->
											<div class="modal fade text-dark" id="editModal<?php echo e($pizza->pizzaId); ?>" tabindex="-1" role="dialog" aria-labelledby="editModal<?php echo e($pizza->pizzaId); ?>" aria-hidden="true">
												<div class="modal-dialog" role="document">
													<div class="modal-content">
														<div class="modal-header" style="background-color: rgb(111 202 203);">
															<h5 class="modal-title" id="editModal<?php echo e($pizza->pizzaId); ?>">Item Id: <?php echo e($pizza->pizzaId); ?></h5>
															<button type="button" class="close" data-dismiss="modal" aria-label="Close">
															<span aria-hidden="true">&times;</span>
															</button>
														</div>
														<div class="modal-body">
															<form action="<?php echo e(route('pizzas.update', $pizza->pizzaId)); ?>" method="post" enctype="multipart/form-data">
																<?php echo csrf_field(); ?>
																<div class="form-group row my-0">
                                                                    <div class="form-group col-md-6">
                                                                        <b><label for="image">Upload Photo:</label></b>
                                                                        <input type="file" name="image" id="image">

                                                                        <?php if($categorie->image): ?>
                                                                            <img src="<?php echo e(asset('/storage/'. $pizza->pizzaPhoto)); ?>" width="100">
                                                                        <?php endif; ?>
                                                                    </div>
																</div>
																<div class="text-left my-2">
																	<b><label for="name">Name</label></b>
																	<input class="form-control" id="name" name="name" value="<?php echo e($pizza->pizzaName); ?>" type="text" required>
																</div>
																<div class="text-left my-2 row">
																	<div class="form-group col-md-6">
																		<b><label for="price">Price</label></b>
																		<input class="form-control" id="price" name="price" value="<?php echo e($pizza->pizzaPrice); ?>" type="number" min="1" required>
																	</div>
																	<div class="form-group col-md-6">
																		<b><label for="catId">Category Id</label></b>
																		<!-- <input class="form-control" id="catId" name="catId" value="<?php echo e($pizza->pizzaCategorieId); ?>" type="number" min="1" required> -->
																		<select name="catId" id="catId" class="custom-select browser-default" required>
																			<option hidden disabled selected value><?php echo e($pizza->pizzaCategorieId); ?></option>
																			<?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categorie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
																				<option value="<?php echo e($categorie->id); ?>"><?php echo e($categorie->id); ?></option>
																			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
																		</select>
																	</div>
																</div>
																<div class="text-left my-2">
																	<b><label for="desc">Description</label></b>
																	<textarea class="form-control" id="desc" name="desc" rows="2" required minlength="6"><?php echo e($pizza->pizzaDesc); ?></textarea>
																</div>
																<button type="submit" class="btn btn-success" name="updateItem">Update</button>
															</form>
														</div>
													</div>
												</div>
											</div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- Table Panel -->
                </div>
            </div>
        </div>
	</body>
</html>
<?php /**PATH D:\College\Sem-4\Laravel project\pizza_website\resources\views/admin/admin_item_list.blade.php ENDPATH**/ ?>