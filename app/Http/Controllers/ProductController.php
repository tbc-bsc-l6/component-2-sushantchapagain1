<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\File;
class ProductController extends Controller
{
  
  // -----------------------------------------------------------------
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('addproduct.create');   
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $product = new Product();
            $product->productname = $request->input('productname');
            $product->creatorinfo = $request->input('creatorinfo');
            $product->title = $request->input('title');
            $product->otherinfo = $request->input('otherinfo');
            if($request->hasfile('image')){
                $file = $request->file('image');
                $filetype = $file->getClientOriginalExtension();
                $filename = time().'.'.$filetype;
                $file->move('Uploads/products/',$filename);
                $product->image = $filename; 
            }
            $product->productprice = $request->input('productprice');
            $product->category = $request->input('category');
            $product->save();
            return redirect('products');
            }
        
        /**
         * Display the specified resource.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function show()
        {
            $products = Product::all();
            return view('products',['products' => $products]);
        }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $product = Product::find($id);
       return view('editProduct',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $product->productname = $request->input('productname');
        $product->creatorinfo = $request->input('creatorinfo');
        $product->title = $request->input('title');
        $product->otherinfo = $request->input('otherinfo');
        if($request->hasfile('image')){

            $destination = 'Uploads/products/'.$product->Image;
            if(File::exists($destination)){
                File::delete($destination);
            }
            $file = $request->file('image');
            $filetype = $file->getClientOriginalExtension();
            $filename = time().'.'.$filetype;
            $file->move('Uploads/products/',$filename);
            $product->image = $filename; 
        }
        $product->productprice = $request->input('productprice');
        $product->category = $request->input('category');
        $product->update();
        return redirect('products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $destination = 'Uploads/products/'.$product->Image;
        if(File::exists($destination)){
            File::delete($destination);
        }
        $product->delete();
        return back();
    }
}   

?>