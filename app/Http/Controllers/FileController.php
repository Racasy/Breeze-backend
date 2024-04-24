<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FileUpload;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class FileController extends Controller
{
    public function index(){
        return view('welcome');
    }

    public function upload(Request $request){

        // Validate that its a file with req type max 50mb
        $request->validate([
<<<<<<< HEAD
            'file' => 'required|mimes:jpg,jpeg,png,csv,txt,xlx,xls,pdf,doc,docm,docx,odt,txt,csv,xls,xlsm,xlsm,xml|max:51200',
            'comment' => 'nullable|string'
        ]);


        if($request->file()){
            $fileUpload = new FileUpload;
=======
            'file' => 'required|mimes:jpg,jpeg,png,csv,txt,xlx,xls,pdf|max:51200',
            'comment' => 'nullable|string'
        ]);

        $fileUpload = new FileUpload;

        if($request->file()){
>>>>>>> ed3fe74c0edc0b9289cfd240b85781e01a2ec818
            $file_name = time().'_'.$request->file->getClientOriginalName();
            $file_path = $request->file('file')->storeAs('uploads', $file_name, 'public');
            $comment = $request->input('comment', '');
            $file_size = $request->file('file')->getSize();

            Log::info("The comment is: {$comment}");

            Log::info("File size is: {$file_size}");

<<<<<<< HEAD
            $fileUpload->user_id = $request->user()->id;
=======
>>>>>>> ed3fe74c0edc0b9289cfd240b85781e01a2ec818
            $fileUpload->name = time().'_'.$request->file->getClientOriginalName();
            $fileUpload->path = $file_path;
            $fileUpload->comment = $request->input('comment', '');
            $fileUpload->size = $file_size;
            $fileUpload->save();

            return response()->json(['success'=>'File uploaded successfully.']);
        }
    }
    
    public function getAllFiles(Request $request){
<<<<<<< HEAD
        $files = FileUpload::with('user')->get()->map(function ($file) {
            return [
                'id' => $file->id,
                'name' => $file->name,
                'path' => $file->path,
                'comment' => $file->comment,
                'size' => $file->size,
                'uploaded_by' => $file->user ? $file->user->name : 'Unknown',
            ];
        });
=======
        $files = FileUpload::all();
>>>>>>> ed3fe74c0edc0b9289cfd240b85781e01a2ec818
        return response()->json($files);
    }

    public function downloadFile($id)
    {
        $fileUpload = FileUpload::find($id);
    
        if (!$fileUpload) {
            return response()->json(['error' => 'File not found.'], 404);
        }
    
        $filePath = $fileUpload->path;
        Log::info("Found filepath: {$filePath}");
    
        $base_path = str_replace('/', ' ', storage_path('app\\public\\'));
    
        $fullPath = $base_path . $filePath;
        Log::info("Full path to file: {$fullPath}");
    
        $fullPath = str_replace('/', '\\', $fullPath);
    
        if (Storage::disk('public')->exists(str_replace('\\', '/', $filePath))) {
            return response()->download($fullPath, $fileUpload->name);
        } else {
            Log::error('File does not exist or is not readable: ' . $fullPath);
            return response()->json(['error' => 'File does not exist in storage.'], 404);
        }
    }
    
    
    
    ///////////////////////////////////////////////////////////////////////
    public function deleteFile($id)
    {
        $fileUpload = FileUpload::find($id);

        if (!$fileUpload) {
            return response()->json(['error' => 'File not found.'], 404);
        }

        $filePath = $fileUpload->path;
        Log::info("Found filepath: {$filePath}");

        $base_path = str_replace('/', '\\', storage_path('app\\public\\'));
        $fullPath = $base_path . $filePath;
        $fullPath = str_replace('/', '\\', $fullPath);

        Log::info("Full path to file: {$fullPath}");

        // The bane of my existence, convert / to \
        if (Storage::disk('public')->exists(str_replace('\\', '/', $filePath))) {
            if (Storage::disk('public')->delete(str_replace('\\', '/', $filePath))) {
                $fileUpload->delete();
                return response()->json(['success' => 'File deleted successfully.']);
            } else {
                Log::error('Failed to delete the file from storage: ' . $fullPath);
                return response()->json(['error' => 'Failed to delete the file from storage.'], 500);
            }
        } else {
            Log::error('File does not exist in storage: ' . $fullPath);
            return response()->json(['error' => 'File does not exist in storage.'], 404);
        }
    }

    public function viewFile($id)
    { 
        Log::info("viewFile has been started");
        $fileUpload = FileUpload::find($id);

        if (!$fileUpload) {
            Log::info("nop nebus vecit, nav faila");
            return response()->json(['error' => 'File not found'], 404);
        }
        
        $filePath = $fileUpload->path;
        $base_path = str_replace('/', '\\', storage_path('app\\public\\'));
        $fullPath = $base_path . $filePath;
        $fullPath = str_replace('/', '\\', $fullPath);
        Log::info("Found file, with the file path path: {$filePath}");
        Log::info("Full path to the file: {$fullPath}");

        if (Storage::disk('public')->exists($filePath)) {
            Log::info("Doing stuff");
            $file = Storage::disk('public')->get($filePath);
            $type = Storage::disk('public')->mimeType($filePath);
            $response = response($file, 200);
            $response->header("Content-Type", $type);
            Log::info("Stuff done");
            return $response;
        } else {
            return response()->json(['error' => 'File does not exist in storage'], 404);
        }
    }

<<<<<<< HEAD
    public function updateComment(Request $request, $id)
    {
        $request->validate([
            'comment' => 'string|max:255',
        ]);

        $fileUpload = FileUpload::findOrFail($id);
        $fileUpload->comment = $request->comment;
        $fileUpload->save();
    
        return response()->json(['success' => 'Comment updated successfully.', 'comment' => $fileUpload->comment]);
    }
    
=======
    //public function updateFile($id) {

    //}
>>>>>>> ed3fe74c0edc0b9289cfd240b85781e01a2ec818
    
}
