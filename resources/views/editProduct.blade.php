<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Product') }}
        </h2>
    </x-slot>
    <section class="p-6">
      <main class="max-w-lg mx-auto mt-10">
          <form  method="POST" action="{{ url('editproduct/'.$product->id) }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{$product->id}}" ></input>
            <div class="text-center p-6">
                <input class="border border-gray-400 p-2 w-full"
                type="text"
                name="productname"
                value="{{$product->productname}}"
                placeholder="Product Name"
                  ></input>
            </div>

            <div class="text-center p-6">
                <input class="border border-gray-400 p-2 w-full"
                type="text"
                name="creatorinfo"
                value="{{$product->creatorinfo}}"
                placeholder="Author / Artist / Console"
                  ></input>
                  @error('Author Artist Console Info')
                  <p class="text-red-500 text-ms mt-2">{{$message}}</p>
                    @enderror
            </div>

                      <!-- title or slug-->
                      <div class="text-center p-3">
                <input class="border border-gray-400 p-2 w-full"
                type="text"
                name="title"
                value="{{$product->title}}"
                placeholder="Title"
                  ></input>
                  @error('Title')
                  <p class="text-red-500 text-ms mt-2">{{$message}}</p>
                    @enderror
            </div>

                <!-- pages/Duration/Gameing Info -->

                <div class="text-center p-3">
                <input class="border border-gray-400 p-2 w-full"
                type="text"
                name="otherinfo"
                placeholder="Pages / Duration / Gaming Info"
                value="{{$product->otherinfo}}"
                  ></input>
                  @error('Pages/Duration/PEGI')
                  <p class="text-red-500 text-ms mt-2">{{$message}}</p>
                    @enderror
            </div>
                      <!-- Image -->
                      <div class="text-center p-3">
                 <img src="{{ asset('Uploads/products/'.$product->Image) }}" width="70px" height="70px" alt="Product Image">
                <input class="border border-gray-400 p-2 w-full"
                type="file"
                name="image"
                  ></input>
            </div>
                   
            <div class="text-center p-6">
                <input class="border border-gray-400 p-2 w-full"
                type="number"
                min="1"
                name="productprice"
                placeholder="Product Price"
                value="{{$product->productprice}}"
                ></input>
            </div>

            <div class="text-center p-6">
                <select name="category" class="p-6 w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
                <option value="Select a Category" disabled >Select a Category</option>
                <option name="books">Books</option>
                <option name="cd">CD</option>
                <option name="games">Games</option>
                </select>
            </div>

            <div class="text-center mb-6">
            <button class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow"
            type="submit"
            >
            Update
            </button>
            </div>
          </form>
      </main>  
  </section>

</x-app-layout>