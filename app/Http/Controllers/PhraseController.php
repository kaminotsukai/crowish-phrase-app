<?php

namespace App\Http\Controllers;

use App\Http\Requests\SavePhraseRequest;
use App\Phrase;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PhraseController extends Controller
{
    /**
     * 一覧取得
     *
     * @return \Illuminate\Http\Response
     */
    public function list(): JsonResponse
    {
        $phrases = Phrase::orderBy('created_at', 'desc')->paginate(10);

        return response()->json($phrases);
    }

    /**
     * 名言登録
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SavePhraseRequest $request): JsonResponse
    {
        $params = $request->all();
        $statusCode = Response::HTTP_CREATED;

        try {
        
            Phrase::create([
                'content' => $params['content'],
                'author_name' => $params['author_name']
            ]);

        } catch (Exception $e) {
            $statusCode = Response::HTTP_INTERNAL_SERVER_ERROR;
        }
        
        return response()->json([], $statusCode);
    }

    /**
     * 詳細情報取得
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id): JsonResponse
    {   
        $phrase = Phrase::find($id);

        return response()->json([
            'phrase' => $phrase
        ]);
    }

    /**
     * 名言更新
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(SavePhraseRequest $request, int $id): JsonResponse
    {
        $params = $request->all();
        $statusCode = Response::HTTP_OK;
        
        try {

            $phrase = Phrase::find($id);

            $phrase->update([
                'content' => $params['content'],
                'author_name' => $params['author_name']
            ]);

        } catch (Exception $e) {
            $statusCode = Response::HTTP_INTERNAL_SERVER_ERROR;
        }

        return response()->json([], $statusCode);
    }

    /**
     * 削除
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function delete(int $id): JsonResponse
    {
        $phrase = Phrase::find($id);

        $phrase->delete();

        return response()->json();
    }
}
