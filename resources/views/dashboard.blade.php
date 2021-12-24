
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

  <section class="p-6 px-6 py-8">
      <main class="max-w-lg mx-auto mt-10">
          <h1 class="text-center font-bold text-xl">Add Product</h1>
          <form  method="post" action="addproduct">
              @csrf
            <div class="mb-6 p-6 text-center">
                <input class="border border-gray-400 p-2 w-half"
                type="text"
                name="productname"
                placeholder="Product Name"
                required
                  ></input>
            </div>
       <div class="text-center">
                <input class="border border-gray-400 p-2 w-half"
                type="number"
                min="1"
                name="productprice"
                placeholder="Product Price"
                required
                  ></input>
            </div>
            <div class="text-center p-6">
                <select name="category" class="p-6 w-half bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
                <option value="Select a Category" disabled >Select a Category</option>
                <option name="books" value="books">Books</option>
    <option name="cd"value="cd">CD</option>
    <option name="games" value="games">Games</option>
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
