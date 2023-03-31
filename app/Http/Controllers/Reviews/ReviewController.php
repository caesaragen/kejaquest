<?php

namespace App\Http\Controllers\Reviews;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Review;

/**
 * Summary of ReviewController
 */
class ReviewController extends Controller
{
    /**
     * Summary of index
     * 
     * @return Response
     */
    public function index() : Response
    {
        $reviews = Review::all();

        return response(
            [
                'reviews' => $reviews,
                'message' => 'success'
            ],
            200
        );
    }
}
