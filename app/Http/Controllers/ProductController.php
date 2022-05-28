<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product as Model;
use App\Models\Product_lang;
use DataTables;
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


        if(request()->ajax())
        {
            $data = Model::with(['category','lang']);

            if($request->category !== "null")
            {
                $data = $data->where('category_id',$request->category);
            }

            if($request->lang !== "null")
            {
                $data = $data->where('lang_id',$request->lang);
            }



            //return datatables()->of($data)->make(true);
            return Datatables::of($data)->make(true);
        }


        $languages = Product_lang::all();
        $categories = Category::all();

        return view('products.index', compact('categories','languages'));




//        $products = Model::orderBy('id','desc')->get();
//        $languages = Product_lang::all();
//        $categories = Category::all();
//
//        return view('products.index',compact('products','languages','categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $languages = Product_lang::all();

        $categories = Category::all();

        return view('products.create',compact('languages','categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required',
            'category_id' => 'required|integer',
            'lang_id' => 'required|integer',
        ];

        $this->validate($request,$rules);


        if(Model::create([
            'name' => $request->name,
            'category_id' => $request->category_id,
            'lang_id' => $request->lang_id
        ]))

            return redirect()->route('products.index');

        return redirect()->route('products.index');
    }



    public function get_product_language(Request $request)
    {

       if($request->has('lang') && $request->ajax())
       {
           $results = Model::where('lang_id',$request->lang)->get();

           return $results;
       }

    }


}
