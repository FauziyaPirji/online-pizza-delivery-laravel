<!doctype html>
<html lang="en">
    <head>
        <title>Menu</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        
        <link rel = "icon" href ="{{ asset('assets/images/logo.jpg') }}" type = "image/x-icon">
        <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    </head>
    <body>
        @include('view.navbar')

        <div>&nbsp;
            <a href="/menu" class="active text-light">
                <i class="fas fa-qrcode"></i>
                <span>All Category</span>
            </a>
        </div>

        <!-- Pizza container starts here -->
        <div class="container my-3" id="cont">
            <div class="col-lg-4 text-center my-3" style="margin:auto;border-top: 2px groove black;border-bottom: 2px groove black;">     
                <h2 class="text-center"><span id="catTitle">Items</span></h2>
            </div>
            <form method="GET" action="{{ route('category.pizzas_filter', $category->id) }}" class="mb-4 flex gap-2">
                <select name="sort" class="px-3 py-1 border rounded">
                    <option value="">Sort by</option>
                    <option value="asc" {{ request('sort') == 'asc' ? 'selected' : '' }}>Price Low to High</option>
                    <option value="desc" {{ request('sort') == 'desc' ? 'selected' : '' }}>Price High to Low</option>
                </select>

                <button type="submit" class="btn px-3 py-1 rounded btn-primary">Filter</button>
            </form>
            <div class="row text-dark">
                @if($pizzas->isEmpty())
                    <div class="jumbotron jumbotron-fluid text-dark">
                        <div class="container">
                            <p class="display-4">Sorry In this category No items available.</p>
                            <p class="lead"> We will update Soon.</p>
                        </div>
                    </div>
                @else
                    @foreach($pizzas as $pizza)
                        <div class="col-xs-3 col-sm-3 col-md-3">
                            <div class="card" style="width: 18rem;">
                                <img src="{{ asset('/storage/'. $pizza->pizzaPhoto) }}" class="card-img-top" alt="image for this pizza" width="249px" height="270px">
                                <div class="card-body">
                                    <h5 class="card-title"> {{ \Illuminate\Support\str::limit($pizza->pizzaName, $limit = 20, $end = "...") }}</h5>
                                    <h6 style="color: #ff0000">Rs. {{ $pizza->pizzaPrice }}/-</h6>
                                    <p class="card-text"> {{ \Illuminate\Support\str::limit($pizza->pizzaDesc, $limit = 29, $end = "...") }}</p>   
                                    <div class="row justify-content-center">
                                        <form action="{{ route('cart.add', $pizza->pizzaId) }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="itemId" value="{{ $pizza->pizzaId }}">
                                            <input type="hidden" name="userId" value="{{ Auth::user()->id }}">
                                            <button type="submit" name="addToCart" class="btn btn-primary mx-2">Add to Cart</button>       
                                        </form>                            
                                        <a href="{{ route('viewPizza', $pizza->pizzaId) }}" class="mx-2"><button class="btn btn-primary">Quick View</button></a> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif  
            </div>
        </div>
    </body>
</html>