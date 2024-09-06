<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WaliSantri;
use App\Models\Santri;

class WaliSantriController extends Controller
{

  function ajax_add(Request $request)
  {
    $response = array(
        'status' => 500,
        'status_desc'=> 'error',
        'message' => '',
        'data' => '',

    );
    try {
        $santri = new WaliSantri;
        $santri->santri_id = $request->santri_id;
        $santri->nama_wali = $request->nama_wali;
        $santri->handphone = $request->handphone;
        $santri->alamat = $request->alamat;

        if ($santri->save()){
            $response['status'] = 200;
            $response['status_desc'] = 'success';
            $response['data'] = $santri;
        }

    } catch (\Exception $e) {
        $response['status'] = 400;
        $response['message'] = $e->getMessage();
        unset($response['data']);
    }

    return response()->json($response, $response['status']);
  }

  function ajax_edit($id)
  {
    $santri = WaliSantri::find($id);
    return response()->json($santri);
  }

  function ajax_update(Request $request)
  {
    $response = array(
        'status' => 500,
        'status_desc'=> 'error',
        'message' => '',
        'data' => '',

    );
    try {

        $santri = WaliSantri::find($request->id);

        if($santri === null){
          $response['message'] = 'ID tidak ditemukan';
          unset($response['data']);
          return response()->json($response, $response['status']);
        }
         
        $santri->id = $request->id;
        $santri->santri_id = $request->santri_id;
        $santri->nama_wali = $request->nama_wali;
        $santri->handphone = $request->handphone;
        $santri->alamat = $request->alamat;

        if ($santri->save()){
            $response['status'] = 200;
            $response['status_desc'] = 'success';
            $response['data'] = $santri;
            unset($response['message']);
        }

    } catch (\Exception $e) {
        $response['status'] = 400;
        $response['message'] = $e->getMessage();
        unset($response['data']);
    }

    return response()->json($response, $response['status']);
  }

  function ajax_delete($id)
  {
    $response = array(
        'status' => 500,
        'status_desc'=> 'error',
        'message' => '',
        'data' => '',

    );
    try {

        $santri = WaliSantri::find($id);

        if($santri === null){
          $response['message'] = 'ID tidak ditemukan';
          unset($response['data']);
          return response()->json($response, $response['status']);
        }

        if ($santri->delete()){
            $response['status'] = 200;
            $response['status_desc'] = 'success';
            $response['data'] = $santri;
            unset($response['message']);
        }

    } catch (\Exception $e) {
        $response['status'] = 400;
        $response['message'] = $e->getMessage();
        unset($response['data']);
    }

    return response()->json($response, $response['status']);
  }

	function ajax_list()
  {
    $list = WaliSantri::select(
            "wali_santri.*", 
            "santri.nama as nama_santri")
    				->leftJoin("santri", "santri.id", "=", "wali_santri.santri_id")
          	->get();
    $data = array();
    $no = $_POST['start'];
    // $no = 1;
    foreach ($list as $item) {
        $no++;
        $row = array();
        $row[] = $item->santri_id;
        $row[] = $item->nama_santri;
        $row[] = $item->nama_wali;
        $row[] = $item->handphone;
        $row[] = $item->alamat;
        
        $row[] = '<a class="btn btn-outline-primary btn-sm" href="javascript:void(0)" title="Edit" onclick="edit('."'".$item->id."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>        
          <a class="btn btn-outline-danger btn-sm" href="javascript:void(0)" title="Hapus" onclick="delete_by_id('."'".$item->id."'".')"><i class="glyphicon glyphicon-trash"></i> Delete
          </a>';
        $data[] = $row;
    }

    $output = array(
      "draw" => intval($_POST['draw']),
      "recordsTotal" => intval($this->count_all()),
      "recordsFiltered" => intval($this->count_filtered()),
      "data" => $data,
    );
    //output to json format
    // echo json_encode($output);
    return response()->json($output);
  }

  function count_all()
  {
      $countAll = WaliSantri::select(
            "wali_santri.*", 
            "santri.nama as nama_santri")
    				->leftJoin("santri", "santri.id", "=", "wali_santri.santri_id")
          	->count();
      return $countAll;      
  }

  function count_filtered()
  {
      $countFiltered = WaliSantri::all()->count();
      return $countFiltered;
  }

  function santri_select(Request $request)
  {
    if ($request->has('term')) {
      $key = $request->term;
      $data = Santri::select('id', 'nama')->where('nama', 'LIKE', '%'.$key.'%')
				->orWhere('id', 'LIKE', '%'.$key.'%')
      	->get();

      $response = array();
      foreach($data as $d){
         $response[] = array("value"=>$d->id,"label"=>$d->id." - ".$d->nama);
      }

      return response()->json($response);
    }
  }

}
