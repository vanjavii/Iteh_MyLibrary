<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Books as BooksModel;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Api\BaseController;
//use App\Traits\ApiResponser;

use App\Http\Resources\BooksResource as BooksResource;

class ApiBooksController extends BaseController
{
    public function index()
    {
        $books = BooksModel::all();

        return $this->sendResponse(BooksResource::collection($books), 'Knjiga uspesno vracena!');
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input,[
            'book_name'=>'required',
            'writer'=>'required',

        ]);

        if($validator->fails()){
            return $this->sendError('Greska pri validaciji.', $validator->errors());
        }

        $book = BooksModel::create($input);
        return $this->sendResponse(new BooksResource($book), 'Knjiga uspesno kreirana!');

    }

    public function show($id)
    {
        $book = BooksModel::find($id);
        if(is_null($book)){
            return $this->sendError('Knjiga nije nadjena!');
        }
        return $this->sendResponse(new BooksResource($book), 'Knjiga uspesno vracena!');

    }

    public function update(Request $request, BooksModel $book)
    {
        $input = $request->all();
        $validator = Validator::make($input,[
            'book_name'=>'required',
            'writer'=>'required',

        ]);

        if($validator->fails()){
            return $this->sendError('Greska pri validaciji.', $validator->errors());
        }


        $book->book_name = $input['book_name'];
        $book->writer = $input['writer'];
        $book->save();

        return $this->sendResponse(new BooksResource($book), 'Knjiga uspesno update-ovana!');

    }

    public function destroy(BooksModel $book)
    {
        $book->delete();
        return $this->sendResponse([], 'Knjiga uspesno izbrisana!');

    }


}