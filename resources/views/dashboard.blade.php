<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Member Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{-- bootsrap --}}
                    <div class="raw col-lg-12">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="Search Product"
                                        aria-label="Search Product" aria-describedby="button-addon2" id="searchInput">
                                    <button class="btn btn-outline-secondary" type="button" id="button-addon2"
                                        onclick="searchProduct()">Search</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="raw col-lg-12">
                        <div class="row">
                            @foreach ($products as $product)
                                <div class="col-md-3 mb-3 product-card">
                                    <div class="card" style="width: 18rem;">
                                        <img src="{{ asset($product->image) }}" class="card-img-top"
                                            alt="{{ $product->name }}">
                                        <div class="card-body">
                                            <h5 class="card-title"><strong>{{ $product->name }}</strong>
                                            </h5>
                                            <p class="card-text">
                                                {{ Str::limit($product->description, 50) }}
                                                <a href="{{ route('dashboard.show.product', $product->id) }}"
                                                    class="text-primary">read more...</a>
                                            </p>
                                            <p class="card-text">Price: {{ $product->sale_price }}
                                                <strike>{{ $product->price }}</strike>
                                            </p>
                                            <p class="card-text">Quantity: {{ $product->quantity }}</p>
                                            <p class="card-text">Category: {{ $product->category->name }}
                                            </p>
                                        </div>
                                        <div class="card-footer d-flex flex-column align-items-start">
                                            <a href="{{ route('dashboard.show.product', $product->id) }}" class="btn btn-secondary mb-2">
                                                Add to Cart
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="mt-3">
                        {{ $products->links() }}
                    </div>

                    <script>
                        function searchProduct() {
                            let searchInput = document.getElementById('searchInput').value.toLowerCase();
                            let productCards = document.getElementsByClassName('product-card');

                            for (let i = 0; i < productCards.length; i++) {
                                let productName = productCards[i].getElementsByTagName('h5')[0].textContent.toLowerCase();
                                let productDescription = productCards[i].getElementsByTagName('p')[0].textContent.toLowerCase();

                                if (productName.includes(searchInput) || productDescription.includes(searchInput)) {
                                    productCards[i].style.display = 'block';
                                } else {
                                    productCards[i].style.display = 'none';
                                }
                            }
                        }
                    </script>

                    {{-- end bootsrap --}}
                </div>
            </div>
        </div>
    </div>


    @php 
        $carts = App\Models\Cart::where('user_id', auth()->user()->id)->get();
    @endphp

    <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 100">
        <div class="btn-group dropup">
            <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa-solid fa-shopping-bag fa-2x"></i>
                @if ($carts->count() == 0)
                    <span class="badge rounded-pill bg-danger">0</span>
                @else
                    <span class="badge rounded-pill bg-danger">{{ $carts->count() }}</span>
                @endif
            </button>
            <ul class="dropdown-menu dropdown-menu-end">
                @if ($carts->count() == 0)
                    <li><a class="dropdown-item" href="#">Empty</a></li>
                @else
                    @foreach ($carts as $cart)
                        <li><a class="dropdown-item" href="{{ route('dashboard.cart') }}">{{ $cart->product->name }} - {{ $cart->quantity }}</a></li>
                    @endforeach
                @endif
            </ul>
        </div>
    </div>

</x-app-layout>
