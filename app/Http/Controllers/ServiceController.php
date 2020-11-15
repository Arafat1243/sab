<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;
use Throwable;

class ServiceController extends Controller
{
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $services = Service::orderBy('created_at','DESC')->paginate(20);
        return Inertia::render('Service/Index',compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return Inertia::render('Service/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validedata = $request->validateWithBag('Createservice', [
            'title' => ['required','max:250'],
            'image' => ['required','file','image','max:3072'],
            'discraption' => ['required']
        ],[
            'image.max' => 'The image size may not be greater than 3 MB.'
        ]);
        try{
            $validedata['image'] = '';
            $service = new Service($validedata);
            if($service->save()){
                $this->updateImage($request->image,$service);
                return back();
            }
        }catch(Throwable $err){
            if(app()->environment() === 'production'){
                return back();
            }
            dd($err->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        //
        dd($service);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        //
        try{
            if($service->delete()){
                return back();
            }
        }catch(Throwable $err){
            if(app()->environment() === 'production'){
                return back();
            }
            dd($err->getMessage());
        }
    }

    /**
     * Delete Service permanent
     * @return void
     */
    public static function permanentDelete(){
        try{
            $services = Service::onlyTrashed()->get();
            foreach ($services as $service) {
                if((new self)->deleteImage($service->image)){
                    $service->forceDelete();
                }
            }
            return response()->json('success');
        }catch(Throwable $err){
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
    protected function updateImage(UploadedFile $image, $service){
        $previous = $service->image;
        $service->image = $image->storePublicly('service-image', ['disk' => 'public']);
        if($service->save()){
            if($previous){
                $this->deleteImage($previous);
            }
        }else{
            $this->deleteImage($service->image);
            $service->image = $previous;
            $service->save();
        }
    }

    /**
     * remove image from storage.
     *
     * @param  string $url
     * @return void
     */
    protected function deleteImage(string $url){
        return Storage::disk('public')->delete($url);
    }
}
