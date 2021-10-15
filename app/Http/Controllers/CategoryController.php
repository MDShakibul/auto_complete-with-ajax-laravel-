<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index(){
        return view('category');
    }

    public function getCategory(Request $request){

        if($request->get('query'))
        {
         $query = $request->get('query');
         $data = DB::table('category')
           ->where('name', 'LIKE', "%{$query}%")
           ->get();
         $output = '<ul class="dropdown-menu" style="display:block; position:relative">';
         foreach($data as $row)
         {
          $output .= '
          <li><a href="#">'.$row->name.'</a></li>
          ';
         }
         $output .= '</ul>';
         echo $output;
        }

    }
}
