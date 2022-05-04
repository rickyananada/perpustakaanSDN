<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->ajax() ){
            $collection = Book::paginate(10);
            return view('pages.book.list',compact('collection'));
        }
        return view('pages.book.main');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.book.input',['data' => new Book]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'type' => 'required',
                'year_release' => 'required',
                'image' => 'required',
                'publisher' => 'required',
                'description' => 'required',
                'qty' => 'required',
                'number' => 'required',
            ]);

            if ($validator->fails()) {
                $errors = $validator->errors();
                if ($errors->has('name')) {
                    return response()->json([
                        'alert' => 'error',
                        'message' => $errors->first('name'),
                    ]);
                }elseif ($errors->has('type')) {
                    return response()->json([
                        'alert' => 'error',
                        'message' => $errors->first('type'),
                    ]);
                }elseif ($errors->has('year_release')) {
                    return response()->json([
                        'alert' => 'error',
                        'message' => $errors->first('year_release'),
                    ]);
                }elseif ($errors->has('image')) {
                    return response()->json([
                        'alert' => 'error',
                        'message' => $errors->first('image'),
                    ]);
                }elseif ($errors->has('publisher')) {
                    return response()->json([
                        'alert' => 'error',
                        'message' => $errors->first('publisher'),
                    ]);
                }elseif ($errors->has('description')) {
                    return response()->json([
                        'alert' => 'error',
                        'message' => $errors->first('description'),
                    ]);
                }elseif ($errors->has('number')) {
                    return response()->json([
                        'alert' => 'error',
                        'message' => $errors->first('number'),
                    ]);
                }elseif ($errors->has('qty')) {
                    return response()->json([
                        'alert' => 'error',
                        'message' => $errors->first('qty'),
                    ]);
                }
            }

            $file = $request->file('image');
            $namaFile = $file->getClientOriginalName();
            $tujuanFile = 'asset/gambar';

            $file->move($tujuanFile, $namaFile);

            $book = new Book;
            $book->name = $request->name;
            $book->type = $request->type;
            $book->year_release = $request->year_release;
            $book->image = $namaFile;
            $book->publisher = $request->publisher;
            $book->description = $request->description;
            $book->qty = $request->qty;
            $book->number = $request->number;
            $book->status = 'pending';
            $book->save();

            return response()->json([
                'alert' => 'success',
                'message' => 'Buku '. $book->name . ' tersimpan',
            ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        return view('pages.book.input', ['data' => $book]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
            $request->validate(
            [
                'name' => 'required',
                'type' => 'required',
                'year_release' => 'required',
                'publisher' => 'required',
                'description' => 'required',
                'qty' => 'required',
                'number' => 'required',
            ]);
            if($request->image){
                Book::where('id', $id)
                ->update([
                    'name' => $request->name,
                    'type' => $request->type,
                    'year_release' => $request->year_release,
                    'publisher' => $request->publisher,
                    'description' => $request->description,
                    'qty' => $request->qty, 
                    'image' => $request->image, 
                    'number' => $request->number,
                ]);
            }else{
                Book::where('id', $id)
                ->update([
                    'name' => $request->name,
                    'type' => $request->type,
                    'year_release' => $request->year_release,
                    'publisher' => $request->publisher,
                    'description' => $request->description,
                    'qty' => $request->qty, 
                    'number' => $request->number,
                ]);
            }        
            return response()->json([
                'alert' => 'success',
                'message' => 'Buku '. $id->name . ' terupdate',
            ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $book->delete();

        return response()->json([
            'alert' => 'success',
            'message' => 'Buku '. $book->name . ' terhapus',
        ]);
    }
}
