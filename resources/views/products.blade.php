<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Products') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-indigo-900">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
            <a href="addProduct" class="my-6 p-6 add-product-btn">Add Product</a>
            <div class="mar-top-bott bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <table class="w-full whitespace-nowrap table-auto">
                    <thead>
                        <tr class="font-bold text-left">
                            <!--Re usable component defined in component table-column -->
                            <x-table-column>Name</x-table-column>
                            <x-table-column>Creator Info</x-table-column>
                            <x-table-column>Title</x-table-column>
                            <x-table-column>Other info</x-table-column>
                            <x-table-column>Image</x-table-column>
                            <x-table-column>Price</x-table-column>
                            <x-table-column>Category</x-table-column>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                        <tr>
                            <x-table-column>{{$product->productname}}</x-table-column>
                            <x-table-column>{{$product->creatorinfo}}</x-table-column>
                            <x-table-column>{{$product->title}}</x-table-column>
                            <x-table-column>{{$product->otherinfo}}</x-table-column>
                            <x-table-column> <img src="{{ asset('Uploads/products/'.$product->Image) }}" width="70px" height="70px" alt="Product Image"></x-table-column>
                            <x-table-column>{{$product->productprice}}</x-table-column>
                            <x-table-column>{{$product->category}}</x-table-column>
                            <x-table-column><a href={{"product/edit/".$product['id']}}>Edit</a></x-table-column>
                            <x-table-column>
                             <form action="products/{{$product->id}}" method="POST" >
                                 @csrf
                                 @method('DELETE')
                                 <button>Delete</button>
                             </form>   
                            </x-table-column>
                        </tr>
                        @endforeach   
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
