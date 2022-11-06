<?php

namespace App\Http\Controllers;

use App\Models\BookstoreBranch;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    //Create Index
    public function index() {
        $data['bsbranchs'] = BookstoreBranch::orderBy('id')->paginate(5);
        return view('bsbranchs.index', $data);
    }

    // Create Resource
    public function create(){
        return view('bsbranchs.create');
    }

    // Store Resource
    
    public function store(Request $request) {
        $request->validate([
            'bsid' => 'required',
            'bsbranch' => 'required',
            'bslocation' => 'required'
        ]);

        $bsbranch = new BookstoreBranch;
        $bsbranch->bsid = $request->bsid;
        $bsbranch->bsbranch = $request->bsbranch;
        $bsbranch->bslocation = $request->bslocation;
        $bsbranch->save();
        return redirect()->route('bsbranchs.index')->with('success','BookStore Branch has been create success');
    }

    // Edit Bookstore Branch
    public function edit(BookstoreBranch $bsbranch){
        return view('bsbranchs.edit',compact('bsbranch'));
    }

    // Update Data from Edit
    public function update(Request $request, $id){
        $request->validate([
            'bsid' => 'required',
            'bsbranch' => 'required',
            'bslocation' => 'required'
        ]);
        $bsbranch = BookstoreBranch::find($id);
        $bsbranch->bsid = $request->bsid;
        $bsbranch->bsbranch = $request->bsbranch;
        $bsbranch->bslocation = $request->bslocation;
        $bsbranch->save();
        return redirect()->route('bsbranchs.index')->with('success', 'BookStore Branch has been updated');
    }

    // Delete or Destroy Book
    public function destroy(BookstoreBranch $bsbranch) {
        $bsbranch->delete();
        return redirect()->route('bsbranchs.index')->with('success','BookStore Branch has been deleted');

    }
}
