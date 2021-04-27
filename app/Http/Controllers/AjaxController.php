<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Madel;
use App\Models\Product;


class AjaxController extends Controller {

   public function post(Request $request, Product $product){

    //
    //$input = $request->all();
    $madel = $request->model;
    $find = Madel::where('name', $madel)->pluck('id'); 

    $articles =  \App\Models\Article::where('model_id',$find)->pluck('list'); 
    
    $arrArticles = array();
    foreach ($articles as &$value) {
        $arr = explode(",",$value);
        foreach ($arr as &$art) {
            array_push($arrArticles,$art);
        }
    }
    $find = $product::whereIn('article', array_unique($arrArticles))->get();
        return response()-> json($find);
    /*
      $response = array(
          'marka' => $request->marka,
          'model' => $request->model,
          'brand' => $request->brand,
          //'e' => $request->e,
      );
     */ 
      //return response()->json($response); 
   }
}