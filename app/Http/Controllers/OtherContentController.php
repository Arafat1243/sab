<?php

namespace App\Http\Controllers;

use App\Models\OtherContent;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Throwable;

class OtherContentController extends Controller
{
    //
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    /**
     * Update the empolyee resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function empolyee(Request $request){
        $validedata = $request->validateWithBag('updateEmpolyee', [
            'employee' => ['required','numeric'],
        ]);
        try{
            $outher = OtherContent::first();

            $outher->employee = $validedata['employee'];

            if($outher->save()){
                return back()->with('toast',['message'=>'Employee Updated Success.','success'=>true]);
            }
        }catch(Throwable $err){
            if(app()->environment() === 'production'){
                return back()->with('toast',['message'=>'Error to Updated Employee.','success'=>false]);
            }
            dd($err->getMessage());
        }
    }
    /**
     * Update the client resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function client(Request $request){
        $validedata = $request->validateWithBag('updateClient', [
            'client' => ['required','numeric'],
        ]);
        try{
            $outher = OtherContent::first();

            $outher->client = $validedata['client'];

            if($outher->save()){
                return back()->with('toast',['message'=>'Client Updated Success.','success'=>true]);
            }
        }catch(Throwable $err){
            if(app()->environment() === 'production'){
                return back()->with('toast',['message'=>'Error to Updated Client.','success'=>false]);
            }
            dd($err->getMessage());
        }
    }
    /**
     * Update the whatweare resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function whatweare(Request $request){
        // dd($request);
        $validedata = $request->validateWithBag('updateWhatweare', [
            'whatweare' => ['required','min:150'],
        ]);
        try{
            $outher = OtherContent::first();

            $outher->whatweare = $validedata['whatweare'];

            if($outher->save()){
                return back()->with('toast',['message'=>'What We Are Updated Success.','success'=>true]);
            }
        }catch(Throwable $err){
            if(app()->environment() === 'production'){
                return back()->with('toast',['message'=>'Error to Updated What We Are.','success'=>false]);
            }
            dd($err->getMessage());
        }
    }
    /**
     * Update the about resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function about(Request $request){
        // dd($request);
        $outher = OtherContent::first();
        if($request->hasFile('image')){
            $validedata = $request->validateWithBag('updateAbout', [
            'about' => ['required','min:150'],
            'image' => ['required','file','image','max:4096'],
            ],[
                'image.max' => 'The image size may not be greater than 4 MB.'
            ]);
                $outher->about = $validedata['about'];
                 $this->updateImage($validedata['image'],$outher);
        }else{
            $validedata = $request->validateWithBag('updateAbout', [
            'about' => ['required','min:150'],
            ]);
            $outher->about = $validedata['about'];
        }
        try{
            if($outher->save()){
                return back()->with('toast',['message'=>'About Deatils Updated Success.','success'=>true]);
            }
        }catch(Throwable $err){
            if(app()->environment() === 'production'){
                return back()->with('toast',['message'=>'Error to Updated About Deatils.','success'=>false]);
            }
            dd($err->getMessage());
        }
    }

    /**
     * update image.
     *
     * @param  \Illuminate\Http\UploadedFile  $image
     * @param  $service
     * @return string
     */
    protected function updateImage(UploadedFile $image, $others){
        try{
            // dd($image);
            $previous = $others->image;
            $others->image = $image->storePublicly('other-image',['disk' => 'public']);
            if($others->save()){
                if($previous){
                    $this->deleteImage($previous);
                }
            }else{
                $this->deleteImage($others->image);
                $others->image = $previous;
                $others->save();
            }
        }
        catch(Throwable $err){
            if(app()->environment() === 'production'){
                return back();
            }
            dd($err->getMessage());
        }
    }
    
    /**
     * remove image from storage.
     *
     * @param  string $url
     * @return void
     */
    protected function deleteImage(string $url){
        if(Storage::disk('public')->delete($url)){
            return true;
        }
        throw new FileException('File not Found.');
    }
}
