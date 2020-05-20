<?php

namespace App\Http\Controllers;

use App\Bookable;
use App\Http\Resources\BookableIndexResource;
use App\Http\Resources\BookableShowResource;
use Illuminate\Http\Request;

class BookableController extends Controller
{

    public function index()
    {
        return BookableIndexResource::collection(
            Bookable::all()
        );

    }

    public function show(Bookable $bookable)
    {
        return new BookableShowResource($bookable);
    }
}
