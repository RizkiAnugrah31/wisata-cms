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
     * @return \Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        return view('page.Contoh.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response|\Illuminate\View\View
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
        $inputUser = $request->only('example_name', 'example_phone');

        $validator = Validator::make($inputUser, [
            'example_name' => 'required',
            'example_phone' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->route('contoh.create')->with('errors', $validator->getMessageBag());
        }

        $client = new Client();
        $options = [
            'headers' => [
                'Accept' => 'application/json',
                'Content-Type' => ' application/json',
            ],
            'json' => $inputUser
        ];
        $responseService = $client->request('POST', env('GATEWAY') . '/contoh', $options);
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
     * @return \Illuminate\Http\Response|\Illuminate\View\View
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

        return view('page.Contoh.edit', ['data' => $response->data]);
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
        $inputUser = $request->only('example_name', 'example_phone');

        $validator = Validator::make($inputUser, [
            'example_name' => 'required',
            'example_phone' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->route('contoh.edit', $id)->with('errors', $validator->getMessageBag());
        }

        $client = new Client();
        $options = [
            'headers' => [
                'Accept' => 'application/json',
                'Content-Type' => ' application/json',
            ],
            'json' => $inputUser
        ];
        $responseService = $client->request('PUT', env('GATEWAY') . '/contoh/' . $id, $options);
        $response = json_decode($responseService->getBody()->getContents(), false);

        if (!$response->success) {
            return redirect()->route('contoh.edit');
        }
        return redirect()->route('contoh.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $client = new Client();
        $options = [
            'headers' => [
                'Accept' => 'application/json',
                'Content-Type' => ' application/json',
            ],
        ];
        $responseService = $client->request('DELETE', env('GATEWAY') . '/contoh/' . $id, $options);
        $response = json_decode($responseService->getBody()->getContents(), false);

        if (!$response->success) {
            return redirect()->route('contoh.index');
        }
        return redirect()->route('contoh.index');
    }

    /**
     * Display a listing of the datatable
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function dataTable()
    {
        $client = new Client();
        $options = [
            'headers' => [
                'Accept' => 'application/json',
                'Content-Type' => ' application/json',
            ],
            'json' => [
                'keyword' => \request()->get('search')['value'],
                'limit' => \request()->get('length'),
                'page' => \request()->get('start') / \request()->get('length') + 1
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
