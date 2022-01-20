<?php

namespace App\Http\Controllers;

use App\Http\Requests\GuestBookRequest;
use App\Models\GuestBook;
use Illuminate\Http\Request;

class GuestBookController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('api')->except(['index', 'store']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $guests = GuestBook::with(['provinces', 'cities'])->latest()->get();

        return response([
            'message' => 'List All Guest Books',
            'data' => $guests
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GuestBookRequest $request)
    {
        $guest = GuestBook::create($request->validated());

        return response([
            'message' => 'GuestBook successfully created',
            'data' => $guest
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(GuestBook $guest)
    {
        return response([
            'message' => 'GuestBook show',
            'data' => $guest
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(GuestBookRequest $request, GuestBook $guest)
    {
        $guest->update($request->validated());

        return response([
            'message' => 'GuestBook successfully updated',
            'data' => $guest
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(GuestBook $guest)
    {
        $guest->delete();

        return response([
            'message' => 'GuestBook successfully deleted',
        ], 202);
    }
}