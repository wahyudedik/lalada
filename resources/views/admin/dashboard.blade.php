<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Product') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{-- bootsrap --}}
                    <div class="raw col-lg-12">
                        <div class="row">
                            <div class="col-md-9">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="Search Product"
                                        aria-label="Search Product" aria-describedby="button-addon2" id="searchInput">
                                    <button class="btn btn-outline-secondary" type="button" id="button-addon2"
                                        onclick="searchProduct()">Search</button>
                                </div>
                            </div>
                            <div class="col-md-3 ml-end">
                                <a href="/admin/dashboard/create" class="btn btn-primary">Add Product</a>
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
                                <div class="col-md-3 mb-3">
                                    <div class="card" style="width: 18rem;">
                                        <img src="{{ asset($product->image) }}" class="card-img-top"
                                            alt="{{ $product->name }}">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $product->name }}</h5>
                                            <p class="card-text">{{ $product->description }}. read more...</p>
                                            <p class="card-text">Price: {{ $product->price }}</p>
                                            <p class="card-text">Quantity: {{ $product->quantity }}</p>
                                            <p class="card-text">Category: {{ $product->category->name }}</p>
                                        </div>
                                        <div class="card-footer d-flex flex-column align-items-start">
                                            <a href="" class="btn btn-secondary mb-2">Update Product</a>
                                            <form action=""
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger mb-2"
                                                    onclick="return confirm('Apakah Anda yakin ingin menghapus produk ini?')">Hapus
                                                    Produk</button>
                                            </form>
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

                            for (let i = 0; i < categoryCards.length; i++) {
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
</x-app-layout>
