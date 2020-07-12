<?php

namespace App\Http\Controllers;

use App\Author;
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
        $phrases = Phrase::with('author')->orderBy('created_at', 'desc')->paginate(10);

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
            $author = Author::find($params['author_id']);

            $author->phrases()->create([
                'id' => \Str::uuid(),
                'content' => $params['content']
            ]);

        } catch (Exception $e) {
            $statusCode = Response::HTTP_INTERNAL_SERVER_ERROR;
        }
        
        return response()->json([], $statusCode);
    }

    /**
     * 詳細情報取得
     * TODO: もう少しいい書き方はないか？
     *
     * @param  \App\Phrase  $phrase
     * @return \Illuminate\Http\Response
     */
    public function show(Phrase $phrase): JsonResponse
    {   
        $phrase = $phrase->with('author')->where('id', $phrase->id)->first();

        return response()->json([
            'phrase' => $phrase
        ]);
    }

    /**
     * 名言更新
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Phrase  $phrase
     * @return \Illuminate\Http\Response
     */
    public function update(SavePhraseRequest $request, Phrase $phrase): JsonResponse
    {
        $params = $request->all();
        $statusCode = Response::HTTP_OK;
        
        try {
            
            $phrase->update([
                'content' => $params['content']
            ]);

        } catch (Exception $e) {
            $statusCode = Response::HTTP_INTERNAL_SERVER_ERROR;
        }

        return response()->json([], $statusCode);
    }

    /**
     * 削除
     *
     * @param  \App\Phrase  $phrase
     * @return \Illuminate\Http\Response
     */
    public function delete(Phrase $phrase): JsonResponse
    {
        $phrase->delete();

        return response()->json();
    }
}
