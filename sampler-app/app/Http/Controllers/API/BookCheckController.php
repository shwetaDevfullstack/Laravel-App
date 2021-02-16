<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\Book;
use App\Models\UserActionLogs;
use Validator;

class BookCheckController extends BaseController
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $book = Book::find($id);
        $book_log = UserActionLogs::select('action')->orderBy('id', 'desc')->where('book_id', '=', $id)->limit(1)->get();
        $action = '';
        if (!$book_log->isEmpty()) { $action = $book_log[0]->action; }
  
        if (is_null($book)) {
            return $this->sendError('Book not found.');
        }
        if($action != 'CHECKOUT'){
            return view('book-checkin')->with('book', $book);
        }else{
            return redirect('/dashboard');
        }
    }

    public function store(Request $request)
    {
        try{
            $input = $request->all();
    
            $validator = Validator::make($input, [
                'book_id' => 'required',
                'action' => 'required|in:CHECKIN,CHECKOUT'
            ]);
    
            if($validator->fails()){
                return $this->sendError('Validation Error.', $validator->errors());       
            }
    
            $book_log = UserActionLogs::create($input);
    
            return redirect('/dashboard');
        }catch (\Illuminate\Database\QueryException $ex){
            return $this->sendError($ex->errorInfo[2], 'Please check.');
        }catch (\Exception $ex){
            return $this->sendError($ex->getMessage(), 'Please check.');
        }
    }
}
