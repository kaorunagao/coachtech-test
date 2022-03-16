<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Rules\ZipCodeRule;
use App\Http\Requests\ContactRequest;
use Illuminate\Support\Facades\DB;

class ContactsController extends Controller
{
    public function index(Request $request)
    {
        return view('contacts.index');
    }

    public function confirm(Request $request)
    {
        $validate_rule = [
            'fullname' => ['required','max:255'],
            'gender' => 'required',
            'email' => ['required','email:strict,dns','max:255'],
            'postcode' =>[ 'required','max:8',new ZipCodeRule()],
            'address' => ['required','max:255'],
            'opinion' => ['required','max:120']
        ];
        $this->validate($request, $validate_rule);

        $inputs = $request->all();

        return view('contacts.confirm', ['inputs' => $inputs]);
    }

    public function process(Request $request)
    {
        $action = $request->get('action', 'return');
        $input  = $request->except('action');

        if($action === 'submit') 
        {
            $contact = new Contact();
            $contact->fill($input);
            $contact->save();

            return redirect()->route('complete');
        } else {
            return redirect()->route('contact')->withInput($input);
        }
    }

    public function complete()
    {
        return view('contacts.complete');
    }
    
    public function show()
    {
        $inputs=DB::table('contacts')
        ->select('id', 'fullname', 'gender', 'email', 'opinion')
        ->paginate(20);
        return view('contacts.show', compact('inputs'));
    }

    public function search(Request $request)
    {
        $serach=$request->input('q');
        $query=DB::table('contacts');
        $serach_spaceharf=mb_convert_kana($serach, 's');
        $keyword_array=preg_split('/[\s]+/', $serach_spaceharf, -1, PREG_SPLIT_NO_EMPTY);

        foreach ($keyword_array as $keyword) {
            $query->where('fullname', 'like', '%'.$keyword.'%')->orWhere('email','like','%'.$keyword.'%')->orWhere('gender','like','%'.$keyword.'%');
        }
        $query->select('id', 'fullname', 'gender', 'email', 'opinion');
        $inputs=$query->paginate(20);

        return view('contacts.show', compact('inputs'));
    }
    public function destroy($id)
    {
        $input=Contact::find($id);

        $input->delete();

        return redirect('/show');
    }
    public function view($id)
    {
        $input=Contact::find($id);

        return view('contacts.view', compact('input'));
    }
}
