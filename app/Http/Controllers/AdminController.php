<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

use function PHPUnit\Framework\returnSelf;

class AdminController extends Controller
{


    //getting data from db to table
    public function view_category()
    {
        $data = Category::all();
        return view('admin.category', compact('data'));
    }


    //sending data to db
    public function add_category(Request $request)
    {
        $category = new Category;
        $category->category_name = $request->category;
        $category->save();
        toastr()->closeButton()->addSuccess('Categoty added successfully');
        return redirect()->back();
    }


    //deleting the data
    public function delete_category($id)
    {
        $data = Category::find($id);
        $data->delete();
        toastr()->closeButton()->addSuccess('Category deleted successfully');

        return redirect()->back();
    }


    public function edit_category(string $id)
    {
        $data = Category::find($id);

        return view('admin.edit_category', compact('data'));
    }


    public function update_category(Request $request, string $id)
    {
        $data = Category::find($id);
        $data->category_name = $request->category;
        $data->save();
        toastr()->closeButton()->addSuccess('Category updated successfully');

        return redirect('/view_category');
    }





    //FOR PRODUCTS

    public function add_product()
    {
        $category = Category::all();
        return view('admin.add_product', compact('category'));
    }

    //upload product to db with image
    public function upload_product(Request $request)
    {
        $data = new Product;
        $data->title = $request->title;
        $data->description = $request->description;
        $data->quantity = $request->qty;
        $data->category = $request->category;

        $image = $request->image;
        if ($image) {
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $request->image->move('products', $imagename);
            $data->image = $imagename;
        }


        $data->save();
        return redirect()->back();
    }


    public function view_product()
    {
        $product = Product::all();
        return view('admin.view_product', compact('product'));
    }


    public function delete_product($id)
    {
        $data = Product::find($id);
        $image_path = public_path('products/' . $data->image);
        if (file_exists($image_path)) {
            unlink($image_path);
        }
        $data->delete();
        toastr()->closeButton()->addSuccess('Product deleted successfully');

        return redirect()->back();
    }


    public function edit_product(string $id)
    {
        $data = Product::find($id);
        $category = Category::all();

        return view('admin.update_product', compact('data', 'category'));
    }

    public function update_product(Request $request, string $id)
    {
        $data = Product::find($id);
        $data->title = $request->title;
        $data->description = $request->description;
        $data->quantity = $request->quantity;
        $data->price = $request->price;
        $data->category = $request->category;

        $image = $request->image;
        if ($image) {
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $request->image->move('products', $imagename);
            $data->image = $imagename;
        }


        $data->save();
        toastr()->closeButton()->addSuccess('Product updated successfully');

        return redirect('/view_product');
    }

    public function view_order()
    {
        $data = Order::all();
        return view('admin.order', compact('data'));
    }

    public function on_the_way($id)
    {
        $data = Order::find($id);
        $data->status = 'On the way';
        $data->save();
        return redirect('/view_order');
    }

    public function delivered($id)
    {
        $data = Order::find($id);
        $data->status = 'Delivered';
        $data->save();
        return redirect('/view_order');
    }

    public function print_pdf($id)
    {

        $data = Order::find($id);
        $pdf = Pdf::loadView('admin.invoice', compact('data'));
        return $pdf->download('invoice.pdf');
    }


    //search
    public function product_search(Request $request)
    {
        $search = $request->search;
        $product = Product::where('title', 'LIKE', '%' . $search . '%')->orWhere('category', 'LIKE', '%' . $search . '%')->paginate(3);
        return view('admin.view_product', compact('product'));
    }
}
