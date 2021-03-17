<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
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
        $services = Service::orderBy('created_at','DESC')->withTrashed()->paginate(20);
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
            'image' => ['required','file','image','max:4096'],
            'discraption' => ['required']
        ],[
            'image.max' => 'The image size may not be greater than 4 MB.'
        ]);
        try{
            $validedata['image'] = '';
            $service = new Service($validedata);
            if($service->save()){
                $this->updateImage($request->image,$service);
                return back()->with('toast',['message' => 'Service added Successful.', 'success' => true]);
            }
        }catch(Throwable $err){
            if(app()->environment() === 'production'){
                return back()->with('toast',['message' => 'Error to add this Service.', 'success' => true]);
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
        return Inertia::render('Service/Show',compact('service'));
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
        return Inertia::render('Service/Create',compact('service'));
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
        if($request->hasFile('image')){
            $validedata = $request->validateWithBag('Createservice', [
                'title' => ['required','max:250'],
                'image' => ['required','file','image','max:4096'],
                'discraption' => ['required']
            ],[
                'image.max' => 'The image size may not be greater than 4 MB.'
            ]);
            // dd($validedata);
             $service->title = $validedata['title'];
             $this->updateImage($validedata['image'],$service);
             $service->discraption = $validedata['discraption'];
        }else{
            $validedata = $request->validateWithBag('Createservice', [
                'title' => ['required','max:250'],
                'discraption' => ['required']
            ]);
            $service->title = $validedata['title'];
            $service->discraption = $validedata['discraption'];
        }
        try{
            if($service->save()){
                return back()->with('toast',['message' => 'Service Update Successful.', 'success' => true]);
            }
        }catch(Throwable $err){
            if(app()->environment() === 'production'){
                return back()->with('toast',['message' => 'Error to Update this Project.', 'success' => false]);
            }
            dd($err->getMessage());
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        try{
            $service = Service::withTrashed()->findOrFail($id);
            // dd($service);
            if($service->deleted_at != null){
                if($this->deleteImage($service->image) && $service->forceDelete())
                    return back()->with('toast',['message' => 'Service permanently deleted successfully.', 'success' => true]);
            }else{
                $service->delete();
                return back()->with('toast',['message' => 'Service temporary deleted successfully.', 'success' => true]);
            }
        }catch(Throwable $err){
            if(app()->environment() === 'production'){
                return back()->with('toast',['message' => 'Error to Delete this Service.', 'success' => false]);
            }
            dd($err->getMessage());
        }
    }

    /**
     * Delete Service permanent
     * @return void
     */
    public function restore($id){
        try{
            $service = Service::withTrashed()->findOrFail($id);
            // dd($service);
            if($service->restore()){
                return back()->with('toast',['message' => 'Service Restore Successful.', 'success' => true]);
            }
        }catch(Throwable $err){
            if(app()->environment() === 'production'){
                return back()->with('toast',['message' => 'Error ot restore this Service.', 'success' => false]);
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
    protected function updateImage(UploadedFile $image, $service){
        try{
            // dd($image);
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
     * @return bool
     */
    protected function deleteImage(string $url){
        if(Storage::disk('public')->delete($url)){
            return true;
        }
        throw new FileException('File not Found.');
    }

}
