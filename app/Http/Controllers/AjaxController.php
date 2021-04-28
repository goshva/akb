<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Madel;
use App\Models\Product;
use App\Models\Mark;



class AjaxController extends Controller {

   public function post(Request $request, Product $product){

    //
    //$input = $request->all();
    $marka = $request->marka;
    $madel = $request->model;
    $brand = $request->brand;
    $arrArticles = array();


    if ( isset($marka) && !isset($madel) && !isset($brand)){

        $marks = Mark::all();
        $marksids = Mark::where('name', $marka)->pluck('id'); 
        ////var_dump($find);
        $articles =  \App\Models\Article::where('mark_id',$marksids)->pluck('list');

    
        foreach ($articles as &$value) {
            $arr = explode(",",$value);
            foreach ($arr as &$art) {
                array_push($arrArticles,$art);
            }
        }
        
        $find = $product::whereIn('article', array_unique($arrArticles))->orderBy('price', 'ASC')->take(50)->get();
        return response()-> json($find);

}

    if ( isset($marka) && isset($madel)){
        $find = Madel::where('name', $madel)->pluck('id'); 
        $articles =  \App\Models\Article::where('model_id',$find)->pluck('list'); 
    
        foreach ($articles as &$value) {
            $arr = explode(",",$value);
            foreach ($arr as &$art) {
                array_push($arrArticles,$art);
            }
        }


            $find = $product::whereIn('article', array_unique($arrArticles))->orderBy('price', 'ASC')->get();

            
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
        if (isset($brand)){
            $articles =  \App\Models\Article::all()->pluck('list'); 
    
            foreach ($articles as &$value) {
                $arr = explode(",",$value);
                foreach ($arr as &$art) {
                    array_push($arrArticles,$art);
                }
            }
            $find = $product::whereIn('article', array_unique($arrArticles))->
            where('brand_id', 'LIKE', '%'.$brand.'%')->orderBy('price', 'ASC')->
            get();
            return response()-> json($find);

        }
 
}
}