<?php

namespace App\Http\Controllers\Apartment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Apartment;
use Illuminate\Http\Response;

/**
 * Summary of ApartmentController
 */
class ApartmentController extends Controller
{
    /**
     * Summary of index
     *
     * @return Response
     */
    public function index(): Response
    {
        $apartments = Apartment::all();

        return response(
            [
                'apartments' => $apartments,
                'message' => 'success'
            ],
            200
        );
    }
}
