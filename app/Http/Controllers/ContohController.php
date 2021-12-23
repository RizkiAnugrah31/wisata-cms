<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContohController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View|\Laravel\Lumen\Application
     */
    public function index()
    {
        return view('page.Contoh.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View|\Laravel\Lumen\Application
     */
    public function create()
    {
        return view('page.Contoh.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->only('example_name', 'example_phone'), [
            'example_name' => 'required',
            'example_phone'=> 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->route('contoh.create');
        }

        $client = new Client();
        $options = [
            'headers' => [
                'Accept' => 'application/json',
                'Content-Type' => ' application/json',
            ],
            'json' => $request->only('example_name', 'example_phone')
        ];
        $responseService = $client->request('GET', env('GATEWAY') . '/contoh', $options);
        $response = json_decode($responseService->getBody()->getContents(), false);

        if (!$response->success) {
            return redirect()->route('contoh.create');
        }
        return redirect()->route('contoh.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View|\Laravel\Lumen\Application
     */
    public function edit($id)
    {
        $client = new Client();
        $options = [
            'headers' => [
                'Accept' => 'application/json',
                'Content-Type' => ' application/json',
            ]
        ];
        $responseService = $client->request('GET', env('GATEWAY') . '/contoh/' . $id, $options);
        $response = json_decode($responseService->getBody()->getContents(), false);
        dd($response);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        //
    }

    public function dataTable()
    {
        $client = new Client();
        $options = [
            'headers' => [
                'Accept' => 'application/json',
                'Content-Type' => ' application/json',
            ]
        ];
        $responseService = $client->request('GET', env('GATEWAY') . '/contoh', $options);
        $response = json_decode($responseService->getBody()->getContents(), false);

        $initResponse = [
            'draw' => \request()->get('draw'),
            "data" => [],
            'input' => \request()->all(),
            'recordsTotal' => 0,
            'recordsFiltered' => 0
        ];

        if (!$response->success) {
            return response()->json($initResponse, 200);
        }

        $initResponse['data'] = $response->data->items;
        $initResponse['recordsTotal'] = $response->data->total;
        $initResponse['recordsFiltered'] = $response->data->total;

        foreach ($initResponse['data'] as $i => $data) {
            $initResponse['data'][$i]->action = '<a href="' . route('contoh.edit', $data->example_id) . '" class="btn btn-warning" style="padding: 6px"><i class="fa fa-fw fa-edit"></i></a> ';
            $initResponse['data'][$i]->action = $initResponse['data'][$i]->action . '<a href="' . route('contoh.destroy', $data->example_id) . '" class="btn btn-danger" style="padding: 6px"><i class="fa fa-fw fa-trash"></i></a>';
        }

        return response()->json($initResponse, $responseService->getStatusCode());
    }
}
