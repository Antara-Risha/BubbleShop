<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Item;

class ItemsController extends Controller
{
    public function addItems(Request $request){
        $items=new Item;
        $items->item_name=$request->item_name;
        $items->wash_type=$request->wash_type;
        $items->unit_price=$request->unit_price;
        $items->save();
        return redirect('adminDashboard');

    }
}
