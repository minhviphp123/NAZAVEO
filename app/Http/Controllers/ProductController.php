<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use Illuminate\Http\Request;
use App\Models\Menu;
use Illuminate\Support\Facades\File;
use App\Models\Products;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $childMenu = Menu::where('parent_id', '!=', 0)->get();
        $menu = Menu::all();

        return view('addProduct', [
            'title' => 'ADD MENU',
            'adminName' => session()->get('admin-name'),
            'childMenu' => $childMenu,
        ]);
    }


    public function getImg(Request $request)
    {
        if ($request->hasFile('file')) {

            $image = $request->file('file');
            $filename = time() . '.' . $image->getClientOriginalExtension(); //time+ext
            $destinationPath = public_path('/images');

            $image->move($destinationPath, $filename); //save to public

            $latestFile = collect(File::glob(public_path('images/*')))
                ->sortByDesc(function ($file) {
                    return filemtime($file);
                })
                ->first();

            return response()->json([
                'img' => $latestFile,
            ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {

            $longLatestFile = collect(File::glob(public_path('images/*')))
                ->sortByDesc(function ($file) {
                    return filemtime($file);
                })
                ->first();

            $latestFileArray = explode("/", $longLatestFile);
            $latestFile = end($latestFileArray);
            $thumb = $latestFile ? "/images/" . $latestFile : null;
            Products::create([
                'name' => (string)$request->input('prod-name'),
                'child_id' => (int)$request->input('child_id'),
                'price' => (int)$request->input('price'),
                'thumb' => $thumb,
                'description' => (string)$request->input('desc'),
            ]);

            session()->flash('success', 'tao san pham thanh cong');
            return redirect()->route('list-product');
        } catch (\Exception $e) {
            session()->flash('error', $e->getMessage());
            return 1;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {

        $allProducts = Products::all();

        // dd($allProducts);

        return view('list-product', [
            'title' => 'LIST PRODUCT',
            'adminName' => session()->get('admin-name'),
            'products' => $allProducts
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Products::find($id);
        $childMenu = Menu::where('parent_id', '!=', 0)->get();

        if ($product) {
            return view('edit-product', [
                'title' => 'EDIT PRODUCT',
                'adminName' => session()->get('admin-name'),
                'product' => $product,
                'childMenu' => $childMenu,
            ]);
        }
        return abort(404);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $productId)
    {
        $product = Products::findOrFail($productId);
        $longLatestFile = collect(File::glob(public_path('images/*')))
            ->sortByDesc(function ($file) {
                return filemtime($file);
            })
            ->first();
        $latestFileArray = explode("/", $longLatestFile);
        $latestFile = end($latestFileArray);
        $thumb = $latestFile ? "/images/" . $latestFile : null;
        if ($product) {
            $product->name = $request->input('prod-name');
            $product->child_id = $request->input('child_id');
            $product->thumb = $thumb;
            $product->price = $request->input('price');
            $product->description = $request->input('desc');
        }

        $product->save();
        // session()->flash('success', 'update san pham thanh cong');
        return redirect()->route('list-product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Products::find($id)->delete();
        session()->flash('success', 'Message here');
        return redirect()->back();
    }
}
