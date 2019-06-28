<?php

namespace App\Http\Controllers;
use App\Logic\Image\ImageRepository;
//use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
//use App\Models\Image;
use App\Product;
use Illuminate\Http\Request;
use App\Brand;
use App\Category;
use App\dropzone;
use DB;

class ProductController extends Controller
{
    protected function forProductId(){
        $product_id=Product::where('publication_status', 1 || 'publication_status', 0)
            ->orderBy('id', 'DESC')
            ->take(1)
            ->first();
        return $product_id;
    }

    public function photoUpload(Request $request){
        $product_id=$this->forProductId();
        $dropzone=new dropzone;
        $imageUrl = $this->productImage($request);
        $dropzone->product_id = $product_id->id+1;
        $dropzone->photo = $imageUrl;
        $dropzone->save();

        return 'done';
    }





    public function create_product(){
//        $categories = category::where('publication_status', 1)->get();
//        $brands = brand::where('publication_status', 1)->get();
        return view('product.create_product');
    }

    protected function productImage(Request $request){
        $productImage = $request->file('file');
        $imgName = $productImage->getClientOriginalName();
        $directory = ('product-image/');
        $imageUrl= $directory.$imgName;
        $productImage->move($directory, $imgName);
        return $imageUrl;
    }
    protected function createProductValidate($request){
        $this->validate($request , [
           'product_id' => 'required',
           'brand_id' => 'required',
           'product_name' => 'required',
           'short_description' => 'required|min:8|max:50',
           'long_description' => 'required|min:8',
           'publication_status' => 'required',
        ]);
    }
    protected function productSaveInDatabase( $request, $imageUrl=null){
        $products = new Product();
        $products->product_id = $request->product_id;
        $products->brand_id = $request->brand_id;
        $products->product_name = $request->product_name;
        $products->short_description = $request->short_description;
        $products->long_description = $request->long_description;
        if($imageUrl){
         $products->product_image = $imageUrl;
        }
        $products->quantity = $request->quantity;
        $products->product_price = $request->product_price;
        $products->publication_status = $request->publication_status;
        $products->save();
    }





 public function save_product(Request $request){
     $this->createProductValidate($request);


     $productImage = $request->file('product_image');
     $imgName = $productImage->getClientOriginalName();
     $directory = ('product-image/');
     $imageUrl= $directory.$imgName;
     $productImage->move($directory, $imgName);


       $this->productSaveInDatabase($request, $imageUrl);
       return redirect('/product/create')->with('message', 'your product save successfully');

 }




        public function manage_product(){
            $products = DB::table('products')
                ->join('categories', 'products.product_id', '=', 'categories.id')
                ->join('brands', 'products.brand_id', '=', 'brands.id')
                ->select('products.*', 'categories.category_name', 'brands.brand_name')
                ->get();

        return view('product.manage_product' , ['products'=>$products]);


    }
    public function product_unpublished($id){
        $products = Product::find($id);
        $products->publication_status = 0;
        $products->save();
        return redirect('/product/manage')->with('message', 'your products unpublished successfully');
    }
    public function product_published($id){
        $products = Product::find($id);
        $products->publication_status = 1;
        $products->save();
        return redirect('/product/manage')->with('message', 'your products published successfully');
    }
    public function product_edit($id){
        $products = Product::find($id);
        return view('product.product-edit',['product'=>$products]);
    }


    protected function editimageUpload($products , $request , $imageUrl=null){
        $products->product_id = $request->product_id;
        $products->brand_id = $request->brand_id;
        $products->product_name = $request->product_name;
        $products->short_description = $request->short_description;
        $products->long_description = $request->long_description;
        if($imageUrl) { $products->product_image = $imageUrl; }
        $products->quantity = $request->quantity;
        $products->product_price = $request->product_price;
        $products->publication_status = $request->publication_status;
        $products->save();
    }

    public function product_update(Request $request)
    {
        $product_images= $request->file('product_image');
        $products = Product::find($request->products_id);



        if ($product_images){

            $imageUrl=$this->productImage($request);
            $this->editimageUpload($products , $request , $imageUrl);
        }
        else{

            $this->editimageUpload($products , $request);

        }
        return redirect('/product/manage')->with('message', 'your product edit successfully');



    }


    public function product_delete($id){
        $product= Product::find($id);
        $product->delete();
        return redirect('/product/manage')->with('message', 'your products delete successfully');
    }



}
