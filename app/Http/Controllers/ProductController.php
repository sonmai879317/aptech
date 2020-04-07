<?php

namespace App\Http\Controllers;


use App\Product;
use App\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       $keyword = $request->get('search');
       if(!empty($keyword)){
        $products = Product::where('id', 'LIKE', "%$keyword%")
            ->orWhere('product_code', 'LIKE', "%$keyword%")
            ->orWhere('product_name', 'LIKE', "%$keyword%")
            ->orWhere('product_teaser', 'LIKE', "%$keyword%")
            ->latest()->paginate(10);
       }
       else {
        $products = Product::latest()->paginate(10);
       }
       return view('admin.products.index', compact('products'));
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cates = Category::pluck('cate_name', 'id');
        return view('admin.products.create', compact('cates'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
{
$this->validate($request, [
    'product_name' => 'required',
    'product_teaser' => 'required',
    'product_content' => 'required',
    'product_code' => 'required|unique:products, product_code' . $id . 'ID',
    'product_price' => 'required',
    'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
]);
$requestData = $request->except('image');
if ($request->hasFile('image')) {
    $image = $request->file('image');

    $filename = 'product' . '-' . time() . '.' . $image->getClientOriginalExtenstion();

    $location = public_path('Upload/Products');
    $request->file('image')->move($location, $filename);
    $requestData['product_image'] = $filename;
}
Product::create($requestData);
return redirect('admin/products')->with('flash_message', 'Product added!');

}


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cates = Category::pluck('cate_name', 'id');
        $product = Product::find($id);
        return view('admin.products.edit', compact('cates', 'product'));       

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
{
$this->validate($request, [
    'product_name'=>'required',
    'product_teaser'=>'required',
    'product_content'=>'required',
    'product_code' =>'required|unique:product,product_code' . $id . 'ID',
    'product_price' =>'required',
    'image|mines:jpeg,png,jpg,gif,svg|max:2048',
]);
    $requestData = $request->except('image');
    if ($request->hasFile('image')) {
        $image = $request->file('image');

        $filename = 'product' . '-' . time() . '.' . $image->getClientOriginalExtenstion();

        $location = public_path('Upload/Products');
        $requestData['product_image'] = $filename;
    }
        
    $product = Product::findOrFail($id);
    $product->update($requestData);
    return redirect('admin/products')->with('flash_message', 'product updated!');
}    


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    	public function destroy($id)
	{
	    $product = Product::find($id);
        $product->delete();
        return redirect('admin/products')->with('success', 'Product delete!');

}
}
