<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Cart</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        
        <link rel = "icon" href ="{{ asset('assets/images/logo.jpg') }}" type = "image/x-icon">
        <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    </head>
    <body>
        @include('view.navbar')

        @if( $cartItems -> isEmpty())
            <div class="col-md-12 my-5 bg-dark text-center">
                <img src="{{ asset('assets/images/cart.jpg') }}" width="130" height="130" class="img-fluid mb-4 mr-3">
                <h3><strong>Your Cart is Empty</strong></h3>
                <h4>Add something to make me happy :)</h4> 
                <a href="/menu" class="btn btn-primary cart-btn-transform m-3" data-abc="true">continue shopping</a> 
            </div>
        @else
            <div class="container" id="cont">
                <div class="row">
                    <div class="alert alert-info mb-0" style="width: -webkit-fill-available;">
                        <strong>Info!</strong> online payment are currently disabled so please choose cash on delivery.
                    </div>
                    <div class="col-lg-12 text-center border rounded my-3">
                        <h1>My Cart</h1>
                    </div>
                    <div class="col-lg-8">
                        <div class="card wish-list mb-6">
                            <table class="table text-center table-responsive-md">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">Item Name</th>
                                        <th scope="col">Item Price</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Total Price</th>
                                        <th scope="col">
                                            <form action="{{ route('cart.clearCart') }}" method="POST">
                                                @csrf
                                                <button name="removeAllItem" class="btn btn-sm btn-outline-danger">Remove All</button>
                                            </form>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($cartItems as $cartItem)
                                        <tr> 
                                            <td>{{ $cartItem->pizza->pizzaName }}</td>
                                            <td>{{ $cartItem->pizza->pizzaPrice }}</td>
                                            <td>
                                                <form action="{{ route('cart.update', $cartItem->pizzaId) }}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="pizzaId" value="{{ $cartItem->pizzaId }}">
                                                    <input type="number" name="quantity" value="{{ $cartItem->itemQuantity }}" class="text-center">
                                                    <input type="submit" value="update" name="update_qty" class="option-btn">
                                                </form>
                                            </td>
                                            <td>{{ $cartItem->itemQuantity * $cartItem->pizza->pizzaPrice }}</td>
                                            <td>
                                                <form action="{{ route('cart.remove', $cartItem->pizzaId) }}" method="POST">
                                                    @csrf
                                                    <button name="removeItem" class="btn btn-sm btn-outline-danger">Remove</button>
                                                </form>
                                            </td>  
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card wish-list mb-3">
                            <div class="pt-4 border bg-light rounded p-3 text-dark">
                                <h5 class="mb-3 text-uppercase font-weight-bold text-center">Order summary</h5>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0 bg-light">Total Price<span>Rs. {{ $totalPrice }}</span></li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center px-0 bg-light">Shipping<span>Rs. 0</span></li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3 bg-light">
                                    <div>
                                        <strong>The total amount of</strong>
                                        <strong><p class="mb-0">(including Tax & Charge)</p></strong>
                                    </div>
                                    <span><strong>Rs. {{ $totalPrice }}</strong></span>
                                    </li>
                                </ul>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" checked>
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Cash On Delivery 
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault1" id="flexRadioDefault1" disabled>
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Online Payment 
                                    </label>
                                </div><br>
                                <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#checkoutModal">go to checkout</button>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="pt-4">
                                <a class="dark-grey-text d-flex justify-content-between text-light" style="text-decoration: none;" data-toggle="collapse" href="#collapseExample"
                                aria-expanded="false" aria-controls="collapseExample">
                                    Add a discount code (optional)
                                    <span><i class="fas fa-chevron-down pt-1"></i></span>
                                </a>
                                <div class="collapse" id="collapseExample">
                                    <div class="mt-3">
                                        <div class="md-form md-outline mb-0">
                                            <input type="text" id="discount-code" class="form-control text-light"
                                            placeholder="Enter discount code">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        <!-- Checkout Modal -->
        <div class="modal fade text-dark" id="checkoutModal" tabindex="-1" role="dialog" aria-labelledby="checkoutModal" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="checkoutModal">Enter Your Details:</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('cart.placeOrder') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <b><label for="address">Address:</label></b>
                            <input class="form-control" id="address" name="address" placeholder="1234 Main St" type="text" required minlength="3" maxlength="500">
                        </div>
                        <div class="form-group">
                            <b><label for="address1">Address Line 2:</label></b>
                            <input class="form-control" id="address1" name="address1" placeholder="near st, Surat, Gujarat" type="text">
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6 mb-0">
                                <b><label for="phone">Phone No:</label></b>
                                <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon">+91</span>
                                </div>
                                <input type="tel" class="form-control" id="phone" name="phone" placeholder="xxxxxxxxxx" required pattern="[0-9]{10}" maxlength="10">
                                </div>
                            </div>
                            <div class="form-group col-md-6 mb-0">
                                <b><label for="zipcode">Zip Code:</label></b>
                                <input type="text" class="form-control" id="zipcode" name="zipcode" placeholder="xxxxxx" required pattern="[0-9]{6}" maxlength="6">                    
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <input type="hidden" name="amount" value="{{ $totalPrice }}">
                            <button type="submit" class="btn btn-info">Order</button>
                        </div>
                    </form>
                </div>
                </div>
            </div>
        </div>
    </body>
</html>
