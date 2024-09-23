<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Santri;

class SantriRegistrationController extends Controller
{
    // Display the registration form
    public function index()
    {
        return view('santri-registration');
    }

    // Handle the form submission and store data
    public function store(Request $request)
    {
        $response = array(
            'status' => 500,
            'status_desc' => 'error',
            'message' => '',
            'data' => '',
        );

        try {
            $santri = new Santri;
            $santri->id = random_int(100000, 999999);
            $santri->nama = $request->nama;
            $santri->jk = $request->jk;
            $santri->tempat = $request->tempat;
            $santri->tgllahir = $request->tgllahir;
            $santri->handphone = $request->handphone;
            $santri->email = $request->email;
            $santri->alamat = $request->alamat;

            if ($santri->save()) {
                $response['status'] = 200;
                $response['status_desc'] = 'success';
                $response['data'] = $santri; // Contains all saved santri data
                $response['id'] = $santri->id; // Add the ID to the response explicitly
            }
        } catch (\Exception $e) {
            $response['status'] = 400;
            $response['message'] = $e->getMessage();
            unset($response['data']);
        }

        return response()->json($response);
    }

    // Generate and download PDF
    public function printPdf($id)
{
   // set_time_limit(100);
        
    $santri = Santri::findOrFail($id); // Fetch data based on ID
    $pdf = Pdf::loadView('pdf.santri', compact('santri')); // Load the view and pass data
    return $pdf->download('Pendaftaran-Santri-Tebuireng.pdf'); // Provide a meaningful filename
}
}
