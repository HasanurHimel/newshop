<?php

namespace App\Http\Controllers;
use App\Product;
use App\dropzone;
use App\multiplePhoto;
use DB;

use Illuminate\Http\Request;

class newShopController extends Controller
{

    public function multiplePhotoUpload(){
        return view('dashboard.dashboard_elements.multiple-photo.multiple-photo');
    }

    protected function multiplePhoto($request){
        $image=$request->file('file');
        $directory='multiple-photo/';
        $name=$image->getClientOriginalName();
        $imageUrl=$directory.$name;
        $image->move($directory,$name);
        return $imageUrl;
    }
    public function multiplePhotoSave(Request $request){
        $imageUrl= $this->multiplePhoto($request);
        $photo=new multiplePhoto;
        $photo->photo =$imageUrl ;
        $photo->save();
        return redirect('photo/multiple')->with('message', 'you have successfully upload');


    }






    public function home()
    {
        $newProducts = Product::where('publication_status' , 1)
            ->orderBy('id', 'DESC')
            ->take(12)
            ->get();
        return view('front-end.home.home', ['newProducts'=>$newProducts]);
    }


    public function women_clothes($id)
    {
        $womenClothes = Product::where('product_id', $id)
            ->where('publication_status', 1)
            ->orderBy('id', 'DESC')
            ->get();


        return view('front-end.categories.women_clothes', ['womenClothes'=>$womenClothes]);
    }

    public function contact_us()
    {
        return view('front-end.mail.mail');
    }

    public function product_details($id){
        $product_details = Product::find($id);
        $id=$product_details->id;

        $dropzone=dropzone::where('product_id', $id)->get();
//        return $dropzone;






        return view('front-end.home.product_details',[
            'product_details'=>$product_details,
            'dropzone'=>$dropzone
        ]);
    }

}
