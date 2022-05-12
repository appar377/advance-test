<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientRequest;
use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Session;

class ContactController extends Controller
{
    public function index() {
        return view('/contact');
    }

    public function confirm() {
        return redirect('/confirm');
    }

    public function sendConfirm(ClientRequest $request) {
        $items = $request->all();
        unset($items['_token']);

        Session::flash('topname' , $request->topname);
        Session::flash('undername' , 
        $request->undername);
        Session::flash('gender' , $request->gender);
        Session::flash('email' , $request->email);
        Session::flash('postcode' , $request->postcode);
        Session::flash('address' , $request->address);
        Session::flash('building_name' , $request->building_name);
        Session::flash('opinion' , $request->opinion);
        return view('confirm',['items'=>$items]);
    }

    public function alert() {
        return view('alert');
    }

    public function createUser(Request $request) {
        $params = $request->all();
        unset($params['_token']);
        Contact::create($params);
        return view('alert');
    }

    public function management() {
        $items = Contact::paginate(10);
        return view('management',['items'=>$items]);
    }

    public function find(Request $request) {
        
        $query = Contact::query();

        if (!empty($request->fullname)) {
            $query->where('fullname',$request->fullname);
        }

        if (!empty($request->gender)) {
            if ($request->gender == 3) {
                $query->whereIn('gender',[1,2])->get();
            } else {
                $query->where('gender',$request->gender);
            }
        }

        if (!empty($request->email)) {
            $query->where('email',[$request->email]);
        }

        if (!empty($request->crated_start) && !empty($request->crated_end)) {
            $query->where('created_at','>=',$request->crated_start)->where('created_at','<=',$request->crated_end);
        }

        $items = $query->paginate(10);
        return view('management', ['items'=>$items]);
    }

    public function delete(Request $request) {
        Contact::find($request->id)->delete();
        return redirect('management');
    }
}
