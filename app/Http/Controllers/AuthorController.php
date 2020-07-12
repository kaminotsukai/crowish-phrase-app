<?php

namespace App\Http\Controllers;

use App\Author;
use App\Http\Requests\SaveAuthorRequest;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthorController extends Controller
{
    /**
     * 一覧取得
     *
     * @return \Illuminate\Http\Response
     */
    public function list(Request $request): JsonResponse
    {
        $params = $request->all();

        $query = Author::select();

        if (!empty($params['query'])) {
            $query = $query->where('name', 'LIKE', "%{$params['query']}%");
        }

        $authors = $query->get();

        return response()->json($authors);
    }

    /**
     * 作者登録
     *
     * @param  App\Http\Requests\SaveAuthorRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaveAuthorRequest $request): JsonResponse
    {
        $author = $request->all();
        $statusCode = Response::HTTP_CREATED;
        \Log::debug($request);

        try {

            Author::create([
                'name' => $author['name'],
                'details' => $author['detail']
            ]);

        } catch (Exception $e) {

            $statusCode = 500;

        }

        return response()->json([], $statusCode);
    }
}
