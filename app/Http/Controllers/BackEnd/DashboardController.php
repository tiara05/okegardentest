<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Project;

class DashboardController extends Controller
{
    public function index()
    {
        $project = Project::paginate(7);

        return view('BackEnd.Page.Dashboard.Dashboard', compact('project'));
    }

    public function create()
    {        
        return view('BackEnd.Page.Dashboard.Create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'namaproject'               => 'required',
            'keterangan'               => 'required',
        ]);

        $project = new Project;

        $project->namaproject         = $request->namaproject;
        $project->keterangan         = $request->keterangan;
        $project->status         = "On Progress";
        $project->save();
        
        return redirect(route('backend.index'))->with(['success' => 'Tambah Project Berhasil']);

    }

    public function show($id)
    {
        $project = Project::findOrFail($id);

        return view('BackEnd.Page.Dashboard.Update', compact('project') );
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'namaproject'               => 'required',
            'keterangan'               => 'required',
            'status'               => 'required',
        ]);
        
        $project = Project::find($id);

        $project->namaproject           = $request->namaproject;
        $project->keterangan            = $request->keterangan;
        $project->status                = $request->status;
        $project->save();

        return redirect(route('backend.index'))->with(['success' => 'Ubah Project Berhasil']);
    }

    public function tampil($id)
    {
        $project = Project::findOrFail($id);

        return view('BackEnd.Page.Dashboard.Show', compact('project') );
    }

    public function delete($id)
    {
        $kategori = Project::find($id);
        $kategori->delete();

        return redirect(route('backend.index'))->with(['success' => 'Delete Project Berhasil']);
    }
}
