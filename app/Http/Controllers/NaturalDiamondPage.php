<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class NaturalDiamondPage extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $mainDiamonds = collect(Http::get('http://127.0.0.1:8000/api/maindiamond')->json());

        // Filter the Natural Diamonds
        // $naturalDiamonds = $mainDiamonds->filter(function ($diamond) {
        //     return $diamond['origin'] === 'Natural';
        // });

        // // Paginate the filtered diamonds
        // $perPage = 20;
        // $page = $request->get('page', 1);
        // $offset = ($page - 1) * $perPage;
        
        // $paginatedDiamonds = new LengthAwarePaginator(
        //     $naturalDiamonds->slice($offset, $perPage)->values(),
        //     $naturalDiamonds->count(),
        //     $perPage,
        //     $page,
        //     ['path' => $request->url(), 'query' => $request->query()]
        // );

        // return view('NaturalDiamondPage_Hoa/NaturalDiamondPage', [
        //     'diamonds' => $paginatedDiamonds
        // ]);
        return view('NaturalDiamondPage_Hoa/NaturalDiamondPage', [
                 'diamonds' => $mainDiamonds]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}