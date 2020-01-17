<?php

namespace App\Http\Controllers;

use App\Model\Category;
use App\Model\Discount;
use App\Model\LedgerProduct;
use App\Model\Product;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Factory|View
     */
    public function index()
    {
        $product = Product::all();
        $product->map(function ($item) {
            $item->category = Category::find($item->category);
            $item->discount = Discount::find($item->discount);
            $item->quantity = LedgerProduct::where('product', $item->id)->where('status', 1)->sum('income') - LedgerProduct::where('product', $item->id)->where('status', 1)->sum('outcome');
            return $item;
        });

        $data = [
            'product' => $product
        ];

        return view('product.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View
     */
    public function create()
    {
        $category = Category::all();

        $data = [
            'category' => $category
        ];

        return view('product.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'category' => 'required|string|exists:categories,id',
            'name' => 'required|string|unique:products',
            'price_buy' => 'required|numeric',
            'margin' => 'required|numeric|max:100'
        ]);

        $category = Category::find($request->category);
        $discount = new Discount();
        if ($request->quantity != 0) {
            $this->validate($request, [
                'quantity' => 'required|numeric',
                'free' => 'required|numeric',
            ]);

            $discount->type = 1;
            $discount->free = $request->free;
            $discount->quantity = $request->quantity;
        } else if ($request->quantity1 != 0) {
            $this->validate($request, [
                'quantity1' => 'required|numeric',
                'total' => 'required|numeric|max:100',
            ]);

            $discount->type = 2;
            $discount->total = $request->total;
            $discount->quantity = $request->quantity1;
        } else {
            $discount->type = 0;
            $discount->total = 0;
            $discount->quantity = 0;
        }

        $discount->save();

        $product = new Product();
        $product->category = $category->id;
        $product->discount = $discount->id;
        $product->name = $request->name;
        $product->price_buy = $request->price_buy;
        $product->margin = $request->margin;
        $product->price_sell = $product->price_buy + (($product->margin / 100) * $product->price_buy);
        $product->save();

        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return void
     */
    public function show($id)
    {
        $id = base64_decode($id);
        $product = Product::find($id);
        $product->category = Category::find($product->category);
        $product->discount = Discount::find($product->discount);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return Factory|View
     */
    public function edit($id)
    {
        $id = base64_decode($id);
        $category = Category::all();
        $product = Product::find($id);
        $product->category = Category::find($product->category);
        $product->discount = Discount::find($product->discount);

        $data = [
            'product' => $product,
            'category' => $category
        ];

        return \view('product.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param $id
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function update(Request $request, $id)
    {
        $id = base64_decode($id);
        $product = Product::find($id);
        $this->validate($request, [
            'category' => 'required|string|exists:categories,id',
            'price_buy' => 'required|numeric',
            'margin' => 'required|numeric|max:100'
        ]);

        if ($product->name != $request->name) {
            $this->validate($request, [
                'name' => 'required|string|unique:products',
            ]);

            $product->name = $request->name;
        }

        $category = Category::find($request->category);
        $discount = Discount::find($product->discount);
        if ($request->quantity || $request->quantity != 0) {
            $this->validate($request, [
                'quantity' => 'required|numeric',
                'free' => 'required|numeric',
            ]);

            $discount->type = 1;
            $discount->free = $request->free;
            $discount->quantity = $request->quantity;
        } else if ($request->quantity1 || $request->quantity1 != 0) {
            $this->validate($request, [
                'quantity1' => 'required|numeric',
                'total' => 'required|numeric|max:100',
            ]);

            $discount->type = 2;
            $discount->total = $request->total;
            $discount->quantity = $request->quantity1;
        } else {
            $discount->type = 0;
            $discount->total = 0;
            $discount->quantity = 0;
            $discount->free = 0;
        }
        $discount->save();

        $product->category = $category->id;
        $product->discount = $discount->id;
        $product->price_buy = $request->price_buy;
        $product->margin = $request->margin;
        $product->price_sell = $product->price_buy + (($product->margin / 100) * $product->price_buy);
        $product->save();

        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        Discount::destroy($product->discount);
        Product::destroy($id);

        return redirect()->route('product.index');
    }
}
