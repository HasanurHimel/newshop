<?php

namespace App\Http\Controllers;

use App\Brand;
use Illuminate\Http\Request;

class BrandsController extends Controller
{
   public function index(){
        return view('brand.create_brands');
}
public function mange_brands(){
       $brands = brand::all();
        return view('brand.manage_brands', ['brands'=>$brands ]);
}

public function save_brands(Request $request){
    $this->validate($request, [
       'brand_name' => 'required|min:2|max:15',
       'brand_description' => 'required|min:8',
       'publication_status' => 'required'
    ]);

       $brands = new brand;
       $brands->brand_name = $request->brand_name;
       $brands->brand_description = $request->brand_description;
       $brands->publication_status = $request->publication_status;
       $brands->save();
       return redirect('/brands/add')->with('message', 'your brand save successfully');


}
public function brand_unpublished($id){
       $brands =brand::find($id) ;
       $brands->publication_status = 0;
       $brands->save();
       return redirect('/brands/manage')->with('message' , 'your brand unpublished successfully');
}
public function brand_published($id){
    $brands =brand::find($id) ;
       $brands->publication_status = 1;
       $brands->save();
       return redirect('/brands/manage')->with('message' , 'your brand published successfully');
}
public function brand_edit($id){
       $brands= brand::find($id);

       return view('brand.edit-brand', ['brands'=>$brands ]);
}
public function brand_update(Request $request){
       $brand = brand::find($request->brand_id);

       $brand->brand_name = $request->brand_name;
       $brand->brand_description = $request->brand_description;
       $brand->publication_status = $request->publication_status;
       $brand->save();
       return redirect('/brands/manage')->with('message' , 'your brand Edit successfully');

}
public function brand_delete($id){
       $brands = brand::find($id);
       $brands->delete();
       return redirect('/brands/manage')->with('message' , 'your brand Delete successfully');
}








}
