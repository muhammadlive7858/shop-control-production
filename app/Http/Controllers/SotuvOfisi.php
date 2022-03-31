<?php
use App\Models\Product;

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;


use App\Models\Search;

use App\Models\Sotuv_Royxati;
use App\Models\vaqtincha;

use Illuminate\Http\Request;

class SotuvOfisi extends Controller
{   
    // public array = [];
    public function index(){
        $cate = Category::all();
        $product = Product::all();
        return view('shop.index',compact('cate','product'));
    }
    public function productid(Request $request){
        $validate = $request->validate([
            'producttime'=>'numeric',
        ]);
        $cate = Category::all();
        $product = Product::all()->where('producttime',$request->input('productid'));
        
        

        // dd($product);
        // return view('shop.create',compact('product','cate'));
        foreach($product as $product){
            $vaqt = vaqtincha::create([
                    'product_id'=>$product['id'],
                    'product_name'=>$product['name'],
                    'product_count'=>$product['count'],
                    'price'=>$product['shop_price'],
            ]);
        }
        $prod_vaqt = vaqtincha::all();
        // dd($product);
        return view('shop.create',compact('cate','prod_vaqt'));

    }
    public function sotish(Request $request){
        $i = 0;
        foreach($request->prod_id as $prod_id){
            $s = intval($prod_id);
            // dd($s);
            // $pro = Product::where('id', $s )->get();
            $pro = Product::find($s);
            $update = $pro->update([
                'count' => $pro->count - intval($request->sotish_soni[$i])
            ]);

            $i++;

        }
        // dd($request->prod_id);
        $i = 0;
        foreach($request->prod_id as $prod){
            $product = Product::all()->where('id',intval($prod))->first();
            // dd($product);
            $name[$i] = $product->name;
            $f[$i] = intval($product->shop_price) - $product->price;
            $i++;
        }
        $i = 0;
        foreach($request->sotish_soni as $sotish){
            // $sotish = $request->sotish_soni;
            // dd($request->skidka);
            $count = $sotish;
            $foyda = $f[$i] * intval($sotish);
            $skidka = intval($request->skidka) / count($request->sotish_soni);
            $royxat = Sotuv_Royxati::create([
                'product_name' => $name[$i],
                'count'=>$count,
                'foyda'=>$foyda,
                'skidka'=>$skidka,
            ]);
            $i++;
        }
        

        if($update){
            $vaqt = vaqtincha::get();
            foreach($vaqt as $vaqt){
                $delete = $vaqt->delete();
            }
            if($delete){
                return redirect()->route('shop-index');
                $s = 10;
            }
            else{
                return redirect()->back();

            }
        }
    }

    public function tozalash(){

        $vaqt = vaqtincha::get();
        foreach($vaqt as $vaqt){
            $delete = $vaqt->delete();
        }
        if(true){
            return redirect()->route('shop-index');
        }
        else{
            return redirect()->back();
        }
    }
}
    