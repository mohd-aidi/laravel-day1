<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
class ProductController extends Controller
{
    public function index()
    {
        $products = array(
            'Jeans',
            'Baju',
            'Iphone'
        );
        return view('product_list', array('products'=>$products));

        //return 'Product list page';
    }

    public function view($id)
    {
        return 'Product view page for id '. $id;
    }
    public function search($query)
    {
        return 'Product search query : '.$query;
    }
}