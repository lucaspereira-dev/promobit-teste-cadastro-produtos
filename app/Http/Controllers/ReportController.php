<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function index()
    {
        $resulQuery = DB::select("SELECT 
                                        tags.id AS id, tags.name AS name, COUNT(product_tags.id) AS qtd_produtos
                                    FROM
                                        tags
                                            INNER JOIN
                                        product_tags ON tags.id = product_tags.tag_id
                                    GROUP BY product_tags.tag_id
                                    ORDER BY tags.id DESC;");

        return view('reports', ['resulQuery' => $resulQuery]);
    }
}
