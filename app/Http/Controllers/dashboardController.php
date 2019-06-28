<?php

namespace App\Http\Controllers;

use App\category;
use Illuminate\Http\Request;

class dashboardController extends Controller
{
   public function createCategory(){
       return view('dashboard.dashboard_elements.createCategory');
   }


   public function tables(){
       return view('dashboard.dashboard_elements.tables');
   }
   public function forms(){
       return view('dashboard.dashboard_elements.forms');
   }



 public function category_save(Request $request){
      $category = new category;
      $category->category_name = $request->category_name;
      $category->category_description = $request->category_description;
      $category->publication_status = $request->publication_status;
      $category->save();
      return redirect('/home/createCategory')->with('message' , 'category save successfully');
 }

    public function manageCategory(){
       $categories = category::all();

        return view('dashboard.dashboard_elements.manageCategory', ['category'=>$categories]);
    }

    public function category_unpublished($id){
       $category= category::find($id);
       $category->publication_status = 0 ;
       $category->save();
       return redirect('/home/manageCategory')->with('message', 'category unpublished successfully');

    }
    public function category_published($id){
       $category= category::find($id);
       $category->publication_status = 1 ;
       $category->save();
       return redirect('/home/manageCategory')->with('message2', 'category published successfully');
    }
    public function category_edit($id){
       $category = category::find($id);
       return view('dashboard.dashboard_elements.edit_category', ['category'=>$category]);
    }

    public function category_update(Request $request){
       $category = category::find($request->category_id);
       $category->category_name = $request->category_name;
       $category->category_description = $request->category_description;
       $category->publication_status = $request->publication_status;
       $category->save();
       return redirect('/home/manageCategory')->with('message3', 'category edit successfully');
    }
    public function category_delete($id){
       $category = category::find($id);
       $category->delete();
       return redirect('/home/manageCategory')->with('message4', 'category delete successfully');
    }



































































}




























