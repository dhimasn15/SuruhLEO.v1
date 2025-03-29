<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InputForm;

class PostController extends Controller
{
    protected $fillable = ['name', 'no_telp', 'prodi', 'gender', 'description'];
    

    // 
    public function home()
{
    $userName = auth()->check() ? auth()->user()->name : ', silahkan login';
    
    // Ambil semua data dari tabel input_forms
    $input_form = InputForm::all(); 

    return view('input_form.home', compact('userName', 'input_form'));
}


    public function about()
    {
        return view('input_form.about'); // Halaman utama
    }
     

    public function dashboard()
    {
        return view('input_form.dashboard'); // Halaman form input
    }
    public function create()
    {
        return view('input_form.create'); // Halaman form input
    }

    public function history()
{
    // Ambil data berdasarkan ID user yang sedang login
    $inputs = InputForm::whereHas('user', function ($query) {
        $query->where('id', auth()->id());
    })->get();

    // Pass data ke view
    return view('input_form.history', compact('inputs'));
}

// 
   



public function updateStatus($id)
{
    $input = InputForm::findOrFail($id);
    $input->status = 'Diproses';
    $input->save();

    return redirect()->route('input_form.index')->with('success', 'Status berhasil diperbarui menjadi Diproses');
}

public function markComplete($id)
{
    // Temukan data berdasarkan ID
    $input = InputForm::findOrFail($id);

    // Ubah status menjadi "Selesai"
    $input->status = 'Selesai';
    $input->save();

    // Redirect dengan pesan sukses
    return redirect()->route('input_form.index')->with('success', 'Status berhasil diubah menjadi Selesai!');
}

 



public function store(Request $request)
{
    // Validasi data input
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'no_telp' => 'required|string|max:15',
        'prodi' => 'required|string|max:255',
        'gender' => 'required|string|max:10',
        'description' => 'required|string',
        'user_id' => 'required|exists:users,id', // Pastikan user_id valid
    ]);

    // Menyimpan data ke dalam database
    $inputForm = new InputForm();
    $inputForm->name = $validatedData['name'];
    $inputForm->no_telp = $validatedData['no_telp'];
    $inputForm->prodi = $validatedData['prodi'];
    $inputForm->gender = $validatedData['gender'];
    $inputForm->description = $validatedData['description'];
    $inputForm->user_id = $validatedData['user_id'];  // Menyimpan user_id
    $inputForm->save();

    // Redirect dengan pesan sukses
    return redirect()->route('input_form.home')->with('success', 'Data berhasil ditambahkan!');
}




public function index()
{
    // Mengambil semua data dari tabel input_forms
    $input_form = InputForm::all();

    // Mengirimkan data ke tampilan index
    return view('input_form.index', compact('input_form'));
}








  
    public function show(string $id)
    {
        $input_form = InputForm::find($id);
    return view('input_form.home', compact('input_form')); 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
{
    $input_form = InputForm::find($id);
    return view('input_form.edit', compact('input_form'));  // Sesuaikan nama variabel
}


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'no_telp' => 'required',
            'prodi' => 'required',
            'gender' => 'required',
            'description' => 'required',  // Menambahkan validasi untuk deskripsi
        ]);
    
        $input_form = InputForm::find($id);
        $input_form->update([
            'name' => $request->name,
            'no_telp' => $request->no_telp,
            'prodi' => $request->prodi,
            'gender' => $request->gender,
            'description' => $request->description,  // Memperbarui deskripsi
        ]);
    
        return redirect()->route('input_form.index');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        InputForm::find($id)->delete();

        return redirect()->route('input_form.index');
    }

    
}
