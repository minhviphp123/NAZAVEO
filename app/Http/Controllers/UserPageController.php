<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Products;
use App\Jobs\SendMail;
use App\Mail\OrderShipped;
use Illuminate\Support\Facades\Mail;
use Mckenziearts\Notify\Facades\LaravelNotify;

class UserPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $products = Products::all();

        return view('overviewProduct', compact('products'));
    }

    public function getProdById($id)
    {

        try {

            $product = Products::find($id);

            if ($product) {
                return view('prodDetail', compact('product'));
            }
            return redirect()->back();
        } catch (\Exception $e) {
            error_log($e->getMessage());
        }
    }

    public function addToCart(Request $request)
    {
        $prodId = $request->input('prod-id');
        $amount = $request->input('amount');
        $price = $request->input('price');

        if ($prodId && $amount && $price) {
            if (!session()->has('cart')) {
                $cart = [];
                // $cart[$prodId] = $amount;
                $cart[$prodId] = ['amount' => $amount, 'price' => $price];

                session()->put('cart', $cart);
            } else {
                $cart = session()->get('cart');
                if (array_key_exists($prodId, $cart)) {
                    // $cart[$prodId] += $amount;
                    $cart[$prodId]['amount'] += $amount;
                    $cart[$prodId]['price'] += $price;
                } else {
                    // $cart[$prodId] = $amount;
                    $cart[$prodId] = ['amount' => $amount, 'price' => $price];
                }
            }
            session()->put('cart', $cart);
            // $alert = true;
            return redirect()->back()->with('alert1', 'success');
        }
        return redirect()->back()->with('alert2', 'error');
        // return 1;
    }

    public function viewCart()
    {
        $cart =  session()->get('cart');
        return view('cart', compact('cart'));
    }

    public function order(Request $request)
    {
        // return  $request->input('email');
        SendMail::dispatch($request->input('email'))->delay(now()->addSeconds(2));
        session()->forget('cart');
        return redirect()->back();
    }

    public function sendMail()
    {
        SendMail::dispatch('minhtq9700@gmail.com')->delay(now()->addSeconds(2));
        return view('mail');
    }

    public function getGroupProd($id)
    {
        $products = Products::where('child_id', $id)->get();
        if ($products) {
            return view('prodGroup', [
                'products' => $products,
                'id' => $id
            ]);
        }
    }

    public function showToast()
    {
        return view('test-toast');
    }

    public function toast()
    {
        return back()->with('message', 'ok');
    }

    public function AJAX($id)
    {
        // return response()->json([
        //     'id' => $id,
        //     'name' => $name
        // ]);
        $products = Products::where('child_id', $id)->get();
        return response()->json([
            'product' => $products,
        ]);
    }
}
