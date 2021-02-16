<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\Book;
use App\Http\Resources\Book as BookResource;
use Validator;

class BookController extends BaseController
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::all();
    
        return $this->sendResponse(BookResource::collection($books), 'Book retrieved successfully.');
    }

    public function indexWeb()
    {
        $books = Book::all();
    
        return view('dashboard')->with('books',$books);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            $input = $request->all();

            Validator::extend('isValidISBN', function ($attribute, $isbn, $parameters) {
                // length must be 10
                $n = strlen($isbn); 
                if ($n != 10) 
                    return false; 
            
                // Computing weighted sum of first 9 digits 
                $sum = 0; 
                for ($i = 0; $i < 9; $i++) 
                { 
                    $digit = $isbn[$i] - '0'; 
                    if (0 > $digit || 9 < $digit) 
                        return false; 
                    $sum += ($digit * (10 - $i)); 
                } 
            
                // Checking last digit. 
                $last = $isbn[9]; 
                if ($last != 'X' && ($last < '0' || $last > '9')) 
                    return false; 
            
                // If last digit is 'X', add 10 to sum, else add its value. 
                $sum += (($last == 'X') ? 10 : ($last - '0')); 
            
                // Return true if weighted sum of digits is divisible by 11. 
                return $sum % 11 == 0;

            }, "It's not valid ISBN");
    
            $validator = Validator::make($input, [
                'title' => 'required',
                'isbn' => 'required|isValidISBN',
                'publication_date' => 'required|date_format:Y-m-d',
                'status' => 'required|in:AVAILABLE,CHECKED_OUT'
            ]);
    
            if($validator->fails()){
                return $this->sendError('Validation Error.', $validator->errors());       
            }
    
            $book = Book::create($input);
    
            return $this->sendResponse(new BookResource($book), 'Book created successfully.');
        }catch (\Illuminate\Database\QueryException $ex){
            return $this->sendError($ex->errorInfo[2], 'Please check.');
        }catch (\Exception $ex){
            return $this->sendError($ex->getMessage(), 'Please check.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = Book::find($id);
  
        if (is_null($book)) {
            return $this->sendError('Book not found.');
        }
   
        return $this->sendResponse(new BookResource($book), 'Book retrieved successfully.');
    }
}
