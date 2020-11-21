<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Inertia\Inertia;
use Symfony\Component\HttpFoundation\File\Exception\NoFileException;
use Throwable;

class ProjectController extends Controller
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
        $projects = Project::orderBy('created_at','DESC')->withTrashed()->paginate(20);
        return Inertia::render('Project/Index',compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return Inertia::render('Project/Create');
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
        $validedata = $request->validateWithBag('CreateProject', [
            'title' => ['required','max:250'],
            'image' => ['required','file','image','max:4096'],
            'discraption' => ['required'],
            'status' => Rule::in(0)
        ],[
            'image.max' => 'The image size may not be greater than 4 MB.'
        ]);
        try{
            $validedata['image'] = '';
            $project = new Project($validedata);
            if($project->save()){
                $this->updateImage($request->image,$project);
                return back()->with('toast',['message' => 'Project Created Success.', 'success' => true]);
            }
        }catch(Throwable $err){
            if(app()->environment() === 'production'){
                return back()->with('toast',['message' => 'Error to add this Project.', 'success' => false]);
            }
            dd($err->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        //
        return Inertia::render('Project/Show',compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        //
        return Inertia::render('Project/Create',compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        //
        // dd($project);
        if($request->hasFile('image')){
            $validedata = $request->validateWithBag('CreateProject', [
                'title' => ['required','max:250'],
                'image' => ['required','file','image','max:4096'],
                'discraption' => ['required'],
                'status' => Rule::in([0,1])
            ],[
                'image.max' => 'The image size may not be greater than 4 MB.'
            ]);
            // dd($validedata);
             $project->title = $validedata['title'];
             $this->updateImage($validedata['image'],$project);
             $project->discraption = $validedata['discraption'];
        }else{
            $validedata = $request->validateWithBag('CreateProject', [
                'title' => ['required','max:250'],
                'discraption' => ['required'],
                'status' => Rule::in([0,1])
            ]);
            $project->title = $validedata['title'];
            $project->discraption = $validedata['discraption'];
            $project->status = $validedata['status'];
        }
        try{
            if($project->save()){
                return back()->with('toast',['message' => 'Project Update Successful.', 'success' => true]);
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
     * @param  \App\Models\Project  $Project
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        try{
            $project = Project::withTrashed()->findOrFail($id);
            // dd($Project);
            if($project->deleted_at != null){
                if($this->deleteImage($project->image) && $project->forceDelete())
                    return back()->with('toast',['message' => 'Project permanently deleted successfully.', 'success' => true]);
            }else{
                $project->delete();
                return back()->with('toast',['message' => 'Project temporary deleted successfully.', 'success' => true]);
            }
        }catch(Throwable $err){
            if(app()->environment() === 'production'){
                return back()->with('toast',['message' => 'Error to Delete this Project.', 'success' => false]);
            }
            dd($err->getMessage());
        }
    }

    /**
     * restore Project
     * @return void
     */
    public function restore($id){
        try{
            $project = Project::withTrashed()->findOrFail($id);
            // dd($Project);
            if($project->restore()){
                return back()->with('toast',['message' => 'Project Restore Successful.', 'success' => true]);
            }
        }catch(Throwable $err){
            if(app()->environment() === 'production'){
                return back()->with('toast',['message' => 'Error ot restore this Project.', 'success' => false]);
            }
            dd($err->getMessage());
        }
    }

    /**
     * update image.
     *
     * @param  \Illuminate\Http\UploadedFile  $image
     * @param  $Project
     * @return string
     */
    protected function updateImage(UploadedFile $image, $project){
        try{
            // dd($image);
            $previous = $project->image;
            $project->image = $image->storePublicly('project-image', ['disk' => 'public']);
            if($project->save()){
                if($previous){
                    $this->deleteImage($previous);
                }
            }else{
                $this->deleteImage($project->image);
                $project->image = $previous;
                $project->save();
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
        throw new NoFileException('File not Found.');
    }
}
