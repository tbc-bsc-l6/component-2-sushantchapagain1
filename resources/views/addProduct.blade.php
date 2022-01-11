<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Product') }}
        </h2>
    </x-slot>

  <section class="p-6">
      <main class="max-w-lg mx-auto mt-10">
          <form  method="POST" action="product" enctype="multipart/form-data"> 
              @csrf
            <div class="text-center p-3">
                <input class="border border-gray-400 p-2 w-96"
                type="text"
                name="productname"
                placeholder="Product Name"
                  ></input>
                  @error('productname')
                  <p class="text-red-500 text-ms mt-2">{{$message}}</p>
                    @enderror
            </div>

            
                      <!-- more info about Author Artist/console -->
                      <div class="text-center p-3">
                <input class="border border-gray-400 p-2 w-80"
                type="text"
                name="creatorinfo"
                placeholder="Author / Artist / Console"
                  ></input>
                  @error('Author Artist Console Info')
                  <p class="text-red-500 text-ms mt-2">{{$message}}</p>
                    @enderror
            </div>

                         <!-- title or slug-->
                         <div class="text-center p-3">
                <input class="border border-gray-400 p-2 w-80"
                type="text"
                name="title"
                placeholder="Title"
                  ></input>
                  @error('Title')
                  <p class="text-red-500 text-ms mt-2">{{$message}}</p>
                    @enderror
            </div>

              <!-- pages/Duration/Gameing Info -->

            <div class="text-center p-3">
                <input class="border border-gray-400 p-2 w-80"
                type="text"
                name="otherinfo"
                placeholder="Pages / Duration / Gaming Info"
                  ></input>
                  @error('Pages/Duration/PEGI')
                  <p class="text-red-500 text-ms mt-2">{{$message}}</p>
                    @enderror
            </div>
                   <!-- Image -->
            <div class="text-center p-3">
                <input class="border border-gray-400 p-2 w-80"
                type="file"
                name="image"
                  ></input>
            </div>


            <div class="text-center p-3">
                <input class="border border-gray-400 p-2 w-80"
                type="text"
                name="productprice"
                placeholder="Product Price"
                  ></input>
                  @error('productprice')
                  <p class="text-red-300 text-ms mt-2">{{$message}}</p>
                    @enderror
            </div>

            <div class="text-center p-3">
                <select name="category_id" class="p-6 w-half bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
                  <option value="Select a Category" disabled >Select a Category</option>
                  @php
                  $categories = App\Models\Category::all();
                  @endphp
                  @foreach($categories as $category)
                  <option value="{{$category->id}}">{{ucwords($category->name)}}</option>
                  @endforeach
                </select>
            </div>

            <div class="text-center mb-6">
            <button class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow">
            Submit
            </button>
            </div>
          </form>
      </main>  
  </section>

</x-app-layout>
