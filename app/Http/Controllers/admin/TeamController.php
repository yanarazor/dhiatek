<?php

namespace App\Http\Controllers\admin;

use App\Models\Team;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables as datatable;

class TeamController extends Controller
{
    //
    public function index()
    {
        $action  = request()->get('action');
        if ($action == 'datatable') {
            return $this->datatableTeam();
        }
        return view('team/index',['title'=>"Team"]);
    }
    public function create()
    {
        return view('team/create');
    }
    public function edit($ref="")
    {
        $record = Team::where("id",$ref)->get()->first();
        return view('team/edit',[
            "record"=>$record
        ]);
    }
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
        ]);
        $validator->validate();
        $record = Team::where("id",$id)->get()->first();
        // file foto
        $file = $request->file('foto_team');
        if($file){
            if($record->foto){
                $image_path = public_path('assets/img/team/').$record->foto;  // Value is not URL but directory file path
                // die($image_path);
                if(File::exists($image_path)) {
                    File::delete($image_path);
                }
            }
            $nama_file = time()."_".$file->getClientOriginalName();
            $file->move(public_path('assets/img/team/'),$nama_file);
            $record->foto = $nama_file;
        }
        $record->nama = $request->nama;
        $record->save();
        // $request->session()->flash('warning', 'Update berhasil!');
        return redirect()->route("team")->with('success', 'Update berhasil!');
    }
    public function datatableTeam()
    {
        $query = Team::with([]);
        $query->orderBy('id', 'ASC');
        $totalCount = $query->count();
        $inputs = request()->post('form_search_values');
        if (is_array($inputs)) {
            foreach ($inputs as $input) {
                if ($input['name'] == 'nama') {
                    $query->where(function ($query) use ($input) {
                        $query->where('nama','like','%'.$input['value'].'%');
                    });
                }
            }
        }
        $query->orderBy('id','asc');
        $dt = datatable::of($query);

        $dt->addColumn('id', function ($row) {
            return $row->id;
        });
        $dt->addColumn('nama', function ($row) {
            return $row->nama;
        });
       
        $dt->addColumn('foto', function ($row) {
            return $row->foto;
        });

        $dt->addColumn('edit_url', function ($row) {
            return route("team.edit",$row->id);
        });
        $dt->addColumn('delete_url', function ($row) {
            return route("team.destroy", "action=delete&ref={$row->id}");
        });
        return $dt->make(true);
    }
    public function teamdestroy()
    {
        $ref = request()->get('ref');
        $record = Team::where('id', $ref)->get()->first();
        if (!$record) {
            return response()->json([
                'success' => false,
                'msg' => 'Data tidak ditemukan'
            ]);
        }
        if($record->foto){
            $image_path = public_path('assets/img/team/').$record->foto;  // Value is not URL but directory file path
            // die($image_path);
            if(File::exists($image_path)) {
                File::delete($image_path);
            }
        }
        $record->delete();
        return response()->json([
            'success' => true,
            'msg' => 'Berhasil dihapus.'
        ]);
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'jabatan' => 'required',
        ]);
        $validator->validate();
        $record = new Team();
        // file logo
        $file = $request->file('foto_team');
        if($file){
            $nama_file = time()."_".$file->getClientOriginalName();
            $file->move(public_path('assets/img/team/'),$nama_file);
            $record->foto = $nama_file;
        }
        $record->nama = request()->get('nama');
        $record->jabatan = request()->get('jabatan');
        $record->save();
        return redirect()->route("team")->with('success', 'Data tersimpan!');
    }
}
