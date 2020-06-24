<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = Product::latest()->get();

        if ($request->ajax()) {
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row) {
                    $url = route('product.delete', $row->id);
                    $button =
                        '<center>' .
                        '<form action="' .  $url  . '" method="post">' .
                        csrf_field()  . method_field("DELETE")  .
                        '<a href="' . $url . '" class=" btn btn-primary" style="margin-right: 10px">Edit</a>' .
                        '<button class="btn btn-danger" type="submit" onclick="return confirm(' .
                        "'Are you sure delete $row->name ?')" .
                        '" href=""><i class="fa fa-trash"></i>Delete</button>' .
                        '</form>' .
                        '</center>';
                    return $button;
                })
                ->editColumn('price', function($row) {
                    $row = 'Rp. ' . number_format($row->price, 0, ',', '.');
                    return $row;
                })
                ->editColumn('created_at', function($row) {
                    $formattingDate = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $row->created_at)->format('F j, Y');
                    $lastCreated = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $row->created_at)->diffForHumans();
                    $row = $formattingDate . ' (' . $lastCreated . ')';
                    return $row;
                })
                ->make(true);
        }

        return view('product');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //Upload Image
        $image = $request->file('image');
        $extension = $image->getClientOriginalExtension();
        $imageName = date('Ymdhis') . "." . $extension;
        $image->move('storage/product/', $imageName);
        $imagePath = 'storage/product/' . $imageName;

        Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'image' => $imagePath,
        ]);

        $successMessage = "Success to create product! ";
        return redirect()->route('product.index')->with('success', $successMessage);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product, $id)
    {
        $data = Product::find($id);
        return view('product-edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product, $id)
    {
        $data = Product::find($id);

        if ($request->image != null) {

            if (file_exists($data->image)) {
                unlink($data->image);
            }

            //Upload Image
            $image = $request->file('image');
            $extension = $image->getClientOriginalExtension();
            $imageName = date('Ymdhis') . "." . $extension;
            $image->move('storage/product/', $imageName);
            $imagePath = 'storage/product/' . $imageName;

        } else {
            $imagePath = $data->image;
        }

        $data->name = $request->name;
        $data->price = $request->price;
        $data->image = $imagePath;
        $data->save();

        $successMessage = "Success to update product! ";
        return redirect()->route('product.index')->with('success', $successMessage);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product, $id)
    {
        $data = Product::find($id);

        if (file_exists($data->image)) {
            unlink($data->image);
        }

        $data->delete();
        $successMessage = "Success delete product! ";
        return redirect()->route('product.index')->with('success', $successMessage);
    }
}
