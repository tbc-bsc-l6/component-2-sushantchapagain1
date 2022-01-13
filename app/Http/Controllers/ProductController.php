<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Validation\ValidationException;
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
        return view('addproduct');   
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
            $product->category_id = $request->input('category_id');
            $product->save();
            return redirect('products')->with('success', 'Product has been Added.');
            }
        
        /**
         * Display the specified resource.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function show()
        {
            $products = Product::paginate(15);
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
        $product->category_id = $request->input('category_id');
        $product->update();
        return redirect('products')->with('success', 'Product has been Edited.');
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
        return back()->with('success', 'Product has been Deleted.');
    }
    public function showProduct()
    {
        // search filter
        if(request('search')){
            $products = Product::latest()->where('productname','like','%'.request('search').'%')
            ->orWhere('creatorinfo','like','%'.request('search').'%')->paginate(15);
            $categories = Category::get();
            return view('welcome',compact('products','categories'));
        }

        else{
            $products = Product::filter(request(['category']))->paginate(15);
            $categories = Category::get();
            return view('welcome',compact('products','categories'));
        }
    }

    // NEWS LETTER
    public function newsLetter(){
    request()->validate(['email' => 'required|email']);
    $mailchimp = new \MailchimpMarketing\ApiClient();

    $mailchimp->setConfig([
        'apiKey' => config('services.mailchimp.key'),
        'server' => 'us20'
    ]);
    try {
    $response = $mailchimp->lists->addListMember(config('services.mailchimp.lists.subscribers'),[
        'email_address' => request('email'),
        'status' => 'subscribed'
        ]);
    }
     catch(\Exception $e){
       throw \Illuminate\Validation\ValidationException::withMessages([
            'email' => 'This email could not be sent to our Newsletter.'
        ]);
    }
        return redirect('/')->with('success','You are now signed up for our newsletter');
}
}   

?>