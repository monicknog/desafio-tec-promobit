<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // query builder
        $query = DB::table('tag')
            ->select(
                'tag.*',
                (DB::raw("(SELECT count(*)
                    FROM product
                        inner join product_tag on product.id = product_tag.product_id
                        WHERE tag.id = product_tag.tag_id ) AS products_count")),
            )->orderBy('products_count', 'DESC');
        $tags = $query->get();

        return view('reports.index', compact('tags'));
    }
}
