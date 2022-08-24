<?php

namespace App\Http\Controllers;

use App\Silsilah;
use Illuminate\Http\Request;

class SilsilahController extends Controller
{
    public function getCousin($id) {
        $parentId = Silsilah::where('id', $id)->value('id_orang_tua');
        $parent = Silsilah::where('id', $parentId)->value('id_orang_tua');
        $parents = Silsilah::where('id_orang_tua', $parent)->pluck('id');
        $cousin = Silsilah::where('jenis_kelamin', 'l')
            ->where('id_orang_tua', '<>' , $parentId)
            ->whereIn('id_orang_tua', $parents)
            ->get();
        return response()->json($cousin);
    }

    public function getAunt($id) {
        $from = Silsilah::where('id', $id)->value('id_orang_tua');
        $parent = Silsilah::where('id', $from)->value('id_orang_tua');
        $aunt = Silsilah::where('jenis_kelamin', 'p')->where('id_orang_tua', $parent)->get();
        return response()->json($aunt);
    }

    public function getGrandChild($id, $jk = null) {
        $grandChild = Silsilah::whereIn('id_orang_tua', Silsilah::where('id_orang_tua', $id)->pluck('id'));
        if($jk != null) {
            $grandChild->where('jenis_kelamin', $jk);
        }
        return response()->json($grandChild->get());
    }

    public function getChild($id) {
        $child = Silsilah::where('id_orang_tua', $id)->get();
        return response()->json($child);
    }

    public function getAll() {
        $all = Silsilah::all();
        return response()->json($all);
    }

    public function create(Request $request) {
        $this->validate($request, [
            'nama' => 'required',
            'jenis_kelamin' => 'required',
        ]);

        $create = Silsilah::create($request->all());
        return response()->json($create, 201);
    }

    public function update($id, Request $request)
    {
        $silsilah = Silsilah::findOrFail($id);
        $silsilah->update($request->all());

        return response()->json($silsilah, 200);
    }

    public function delete($id)
    {
        Silsilah::findOrFail($id)->delete();
        return response('Deleted Successfully', 200);
    }
}