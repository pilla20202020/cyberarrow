<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product\Product;
use App\Models\Category\Category;
use App\Http\Requests\Product\ProductRequest;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $product, $category;

    function __construct(Product $product, Category $category)
    {
        $this->product = $product;
        $this->category = $category;

    }
    public function index()
    {
        $product = $this->product->orderBy('created_at', 'desc')->get();

        return view('backend.product.index', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Product $product)
    {
      
        $categories = $this->category->get();
       
        return view('backend.product.create',compact('categories','product'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
       //dd($request->all());
        if($product = $this->product->create($request->data())) {
            if($request->hasFile('image')) {
                $this->uploadFile($request, $product);
            }
            return redirect()->route('product.index');

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
      
        $category_search = Category::find($product->category_id);
        $categories = $this->category->get();
        // dd($gallery->category()->get('name'));
        return view('backend.product.edit', compact('product','categories','category_search'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, Product $product)
    {
        $request->validate([
            'category_id' => 'required',
            'title'      => 'required|max:255',
        ]);
        if ($product->update($request->data())) {
            $product->fill([
                'slug' => $request->title,
            ])->save();
            if ($request->hasFile('image')) {
                $this->uploadFile($request, $product);
            }
        }
        return redirect()->route('product.index')->withSuccess(trans('product has been updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = $this->product->find($id);
        $product->delete();
        return redirect()->route('product.index')->withSuccess(trans('product has been deleted'));
    }   

    function uploadFile(Request $request, $product)
    {
        $file = $request->file('image');
        $path = 'uploads/product';
        $fileName = $this->uploadFromAjax($file, $path);
        if (!empty($product->image))
            $this->__deleteImages($product);

        $data['image'] = $fileName;
        $this->updateImage($product->id, $data);

    }

    public function updateImage($productId, array $data)
    {
        try {
            $product = $this->product->find($productId);
            $product = $product->update($data);
            return $product;
        } catch (Exception $e) {
            //$this->logger->error($e->getMessage());
            return false;
        }
    }

    public function __deleteImages($subCat)
    {
        try {
            if (is_file($subCat->image_path))
                unlink($subCat->image_path);

            if (is_file($subCat->thumbnail_path))
                unlink($subCat->thumbnail_path);
        } catch (\Exception $e) {

        }
    }
}
