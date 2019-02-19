<?php

namespace App\Http\Controllers\Document;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Document\Document;
use Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;


class DocumentController extends Controller
{
    public function index(){
        $documents = Document::get();
        
        return view('document.index', get_defined_vars());
    }

    public function create(){
        return view('document.form');
    }

    public function store(Request $request){
       
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'doc_file' => 'required|mimes:pdf',
        ]);
        
        if ($validator->fails()) {
            return redirect('document/create')
                        ->withErrors($validator)
                        ->withInput();
        }

        if($request->has('doc_file')){
            $extension = $request->doc_file->extension();
            if($extension != 'pdf'){
                return redirect('document/create')
                        ->withErrors("please provide a pdf file")
                        ->withInput();
            }
            $fileName = microtime(true) . '.' . $extension;
            
            $storing =  $request->doc_file->store('public/imports');
            
            if(! $storing){
                return 'shsishir';
            }
        }

        $input = Document::create([
            'title' => $request->title,
            'description'=> $request->description,
            'path' => $fileName
        ]);

        if(! $input){
            return redirect('document/create')
                        ->withErrors($input)
                        ->withInput();
        }
        $documents =  Document::get();
        return view('document/index', get_defined_vars());
    }
}
