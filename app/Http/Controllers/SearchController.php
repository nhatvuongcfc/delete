<?php
namespace App\Http\Controllers;


use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Item;
use DB;


class SearchController extends Controller

{


    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function search()

    {

        return view('search');

    }


    /**

     * Show the form for creating a new resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function autocomplete(Request $request)

    {
        $data=DB::table('transcripts')
        ->join('class','transcripts.id_class','class.id_class')
        ->where('ten_mon_hoc', 'LIKE', '%' . $request->search . '%')
        ->get();
        // $data = Item::select("title as name")->where("title","LIKE","%{$request->input('query')}%")->get();

        return response()->json($data);

    }

}
?>