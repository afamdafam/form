<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FormData;

class FormController extends Controller
{
    public function index()
    {
        $forms = FormData::all();
        return view('forms.index',compact('forms'));
    }

    public function createStepOne(Request $request)
    {
        $forms = $request->session()->get('form_data');

        return view('forms.create-step-one',compact('forms'));
    }

    public function postCreateStepOne(Request $request)
    {
        $validatedData = $request->validate([
            'profesi' => 'required',
            'jenis_kelamin' => 'required',
            'umur' => 'required|numeric',
            'ukuran_keluarga' => 'required|numeric',
            'kedudukan_keluarga' => 'required',
            'maksud_perjalanan' => 'required',
            'berangkat_pulang' => 'required',
            'frekuensi_perjalanan' => 'required|numeric',
            'kendaraan_pribadi' => 'required',

        ]);

        if(empty($request->session()->get('form_data'))){
            $forms = new FormData();
            $forms->fill($validatedData);
            $request->session()->put('form_data', $forms);
        }else{
            $forms = $request->session()->get('form_data');
            $forms->fill($validatedData);
            $request->session()->put('form_data', $forms);
        }

        return redirect()->route('forms.create.step.two.1');
    }

    public function createStepTwo1(Request $request)
    {
        $forms = $request->session()->get('form_data');


        return view('forms.create-step-two-1',compact('forms'));
    }

    public function postCreateStepTwo1(Request $request)
    {
        $validatedData = $request->validate([
            'alamat_kecamatan' => 'required',
            'alamat_kelurahan' => 'required',
            'alamat_kota' => 'required',
            'alamat_latitude' => 'required',
            'alamat_longitude' => 'required'
        ]);

        $forms = $request->session()->get('form_data');
        $forms->fill($validatedData);
        $request->session()->put('form_data', $forms);

        return redirect()->route('forms.create.step.two.2');
    }

    public function createStepTwo2(Request $request)
    {
        $forms = $request->session()->get('form_data');


        return view('forms.create-step-two-2',compact('forms'));
    }

    public function postCreateStepTwo2(Request $request)
    {
        $validatedData = $request->validate([
            'tujuan_kecamatan' => 'required',
            'tujuan_kelurahan' => 'required',
            'tujuan_kota' => 'required',
            'tujuan_latitude' => 'required',
            'tujuan_longitude' => 'required'
        ]);

        $forms = $request->session()->get('form_data');
        $forms->fill($validatedData);
        $request->session()->put('form_data', $forms);

        return redirect()->route('forms.create.step.three');
    }

    public function createStepThree(Request $request)
    {
        $forms = $request->session()->get('form_data');

        return view('forms.create-step-three',compact('forms'));
    }

    public function postCreateStepThree(Request $request)
    {
        $validatedData = $request->validate([
            'option' => 'required'
        ]);

        $forms = $request->session()->get('form_data');
        $forms->fill($validatedData);
        $request->session()->put('form_data', $forms);

        if ($forms->option && $forms->kendaraan_pribadi) {
            return redirect()->route('forms.create.step.four.a');
        } else if (!$forms->option && $forms->kendaraan_pribadi){
            return redirect()->route('forms.create.step.four.b1');
        } else {
            return redirect()->route('forms.create.step.four.c');
        }
    }

    public function createStepFourA(Request $request)
    {
        $forms = $request->session()->get('form_data');


        return view('forms.create-step-four-A',compact('forms'));
    }

    public function postCreateStepFourA(Request $request)
    {
        $validatedData = $request->validate([
            'deskripsi_kendaraan_motor' => 'required|numeric',
            'deskripsi_kendaraan_mobil' => 'required|numeric',
            'biaya_parkir' => 'required|numeric',
            'biaya_bbm' => 'required|numeric',
            'perjalanan_total' => 'required|numeric',
            'preferensi_pribadi' => 'required|numeric'
        ]);

        $forms = $request->session()->get('form_data');
        $forms->fill($validatedData);
        $request->session()->put('form_data', $forms);

        $forms->save();

        $request->session()->forget('form_data');

        return redirect()->route('forms.success');

    }

    public function createStepFourB1(Request $request)
    {
        $forms = $request->session()->get('form_data');


        return view('forms.create-step-four-B1',compact('forms'));
    }

    public function postCreateStepFourB1(Request $request)
    {
        $validatedData = $request->validate([
            'deskripsi_kendaraan_motor' => 'required|numeric',
            'deskripsi_kendaraan_mobil' => 'required|numeric',
            'biaya_parkir' => 'required|numeric',
            'biaya_bbm' => 'required|numeric',
            'perjalanan_total' => 'required|numeric',
        ]);

        $forms = $request->session()->get('form_data');
        $forms->fill($validatedData);
        $request->session()->put('form_data', $forms);

        return redirect()->route('forms.create.step.four.b2');

    }

    public function createStepFourB2(Request $request)
    {
        $forms = $request->session()->get('form_data');


        return view('forms.create-step-four-B2',compact('forms'));
    }

    public function postCreateStepFourB2(Request $request)
    {
        $validatedData = $request->validate([
            'jenis_kendaraan_krl' => 'required_without_all:jenis_kendaraan_lrt,jenis_kendaraan_mrt,jenis_kendaraan_brt,jenis_kendaraan_angkutan_kota,jenis_kendaraan_ojol',
            'jenis_kendaraan_lrt' => 'required_without_all:jenis_kendaraan_krl,jenis_kendaraan_mrt,jenis_kendaraan_brt,jenis_kendaraan_angkutan_kota,jenis_kendaraan_ojol',
            'jenis_kendaraan_mrt' => 'required_without_all:jenis_kendaraan_krl,jenis_kendaraan_lrt,jenis_kendaraan_brt,jenis_kendaraan_angkutan_kota,jenis_kendaraan_ojol',
            'jenis_kendaraan_brt' => 'required_without_all:jenis_kendaraan_krl,jenis_kendaraan_lrt,jenis_kendaraan_mrt,jenis_kendaraan_angkutan_kota,jenis_kendaraan_ojol',
            'jenis_kendaraan_angkutan_kota' => 'required_without_all:jenis_kendaraan_krl,jenis_kendaraan_lrt,jenis_kendaraan_mrt,jenis_kendaraan_brt,jenis_kendaraan_ojol',
            'jenis_kendaraan_ojol' => 'required_without_all:jenis_kendaraan_krl,jenis_kendaraan_lrt,jenis_kendaraan_mrt,jenis_kendaraan_brt,jenis_kendaraan_angkutan_kota',
            'tarif' => 'required|numeric',
            'waktu_transfer' => 'required|numeric',
            'waktu_transit' => 'required|numeric',
            'waktu_tunggu' => 'required|numeric',
            'waktu_perjalanan' => 'required|numeric',
            'waktu_total' => 'required|numeric',
            'pendapatan' => 'required|numeric',
            'preferensi_umum' => 'required|numeric'
        ]);

        $forms = $request->session()->get('form_data');
        $forms->fill($validatedData);
        $request->session()->put('form_data', $forms);

        $forms->save();

        $request->session()->forget('form_data');

        return redirect()->route('forms.success');
    }

    public function createStepFourC(Request $request)
    {
        $forms = $request->session()->get('form_data');


        return view('forms.create-step-four-C',compact('forms'));
    }

    public function postCreateStepFourC(Request $request)
    {
        $validatedData = $request->validate([
            'jenis_kendaraan_krl' => 'required_without_all:jenis_kendaraan_lrt,jenis_kendaraan_mrt,jenis_kendaraan_brt,jenis_kendaraan_angkutan_kota,jenis_kendaraan_ojol',
            'jenis_kendaraan_lrt' => 'required_without_all:jenis_kendaraan_krl,jenis_kendaraan_mrt,jenis_kendaraan_brt,jenis_kendaraan_angkutan_kota,jenis_kendaraan_ojol',
            'jenis_kendaraan_mrt' => 'required_without_all:jenis_kendaraan_krl,jenis_kendaraan_lrt,jenis_kendaraan_brt,jenis_kendaraan_angkutan_kota,jenis_kendaraan_ojol',
            'jenis_kendaraan_brt' => 'required_without_all:jenis_kendaraan_krl,jenis_kendaraan_lrt,jenis_kendaraan_mrt,jenis_kendaraan_angkutan_kota,jenis_kendaraan_ojol',
            'jenis_kendaraan_angkutan_kota' => 'required_without_all:jenis_kendaraan_krl,jenis_kendaraan_lrt,jenis_kendaraan_mrt,jenis_kendaraan_brt,jenis_kendaraan_ojol',
            'jenis_kendaraan_ojol' => 'required_without_all:jenis_kendaraan_krl,jenis_kendaraan_lrt,jenis_kendaraan_mrt,jenis_kendaraan_brt,jenis_kendaraan_angkutan_kota',
            'tarif' => 'required|numeric',
            'waktu_transfer' => 'required|numeric',
            'waktu_transit' => 'required|numeric',
            'waktu_tunggu' => 'required|numeric',
            'waktu_perjalanan' => 'required|numeric',
            'waktu_total' => 'required|numeric',
            'pendapatan' => 'required|numeric',
            'preferensi_umum' => 'required|numeric'
        ]);

        $forms = $request->session()->get('form_data');
        $forms->fill($validatedData);
        $request->session()->put('form_data', $forms);
        // dd($validatedData);
        $forms->save();

        $request->session()->forget('form_data');

        return redirect()->route('forms.success');
    }
    public function formSuccess(Request $request){

        return view('forms.forms-success');
    }
    public function postForm(Request $request)
    {
        $forms = $request->session()->get('form_data');
        $forms->save();

        $request->session()->forget('form_data');

        return redirect()->route('forms.index');
    }
}
