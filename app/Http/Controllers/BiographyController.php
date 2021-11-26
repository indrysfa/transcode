<?php

namespace App\Http\Controllers;

use App\Biography;
use Doctrine\DBAL\Query\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class BiographyController extends Controller
{
    public function index()
    {
        $biography = Biography::orderBy('created_at', 'DESC')->get();
        $response = [
            'message' => 'List Biography Member K-pop',
            'data' => $biography
        ];

        return response()->json($response, Response::HTTP_OK);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'          => ['required'],
            'age'           => ['required', 'numeric'],
            'group'         => ['required'],
            'birth_place'   => ['required'],
            'birth_date'    => ['required', 'date'],
            'date_debut'    => ['required', 'date'],
            'agency'        => ['required'],
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        try {
            $biography = Biography::create($request->all());
            $response = [
                'message' => 'Biography created',
                'data' => $biography
            ];

            return response()->json($response, Response::HTTP_CREATED);
        } catch (QueryException $e) {
            return response()->json([
                'message' => "Failed " . $e->errorInfo
            ]);
        }
    }

    public function update(Request $request, $id)
    {
        $biography = Biography::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'name'          => ['required'],
            'age'           => ['required', 'numeric'],
            'group'         => ['required'],
            'birth_place'   => ['required'],
            'birth_date'    => ['required', 'date'],
            'date_debut'    => ['required', 'date'],
            'agency'        => ['required'],
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        try {
            $biography->update($request->all());
            $response = [
                'message' => 'Biography updated',
                'data' => $biography
            ];

            return response()->json($response, Response::HTTP_OK);
        } catch (QueryException $e) {
            return response()->json([
                'message' => "Failed " . $e->errorInfo
            ]);
        }
    }

    public function show($id)
    {
        $biography = Biography::findOrFail($id);
        $response = [
            'message' => 'Biography of ' . $biography->name,
            'data' => $biography
        ];

        return response()->json($response, Response::HTTP_OK);
    }

    public function destroy($id)
    {
        $biography = Biography::findOrFail($id);

        try {
            $biography->delete();
            $response = [
                'message' => 'Biography deleted'
            ];

            return response()->json($response, Response::HTTP_OK);
        } catch (QueryException $e) {
            return response()->json([
                'message' => "Failed " . $e->errorInfo
            ]);
        }
    }
}
