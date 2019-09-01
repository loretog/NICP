<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Members;

class MembersController extends Controller
{
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:members'],
            'affiliation' => ['required', 'string', 'max:255'],
            'contact_number' => ['required', 'string', 'max:255'],
        ]);
    }
    public function index() {
      $members = Members::all();
      return view('members.index', compact('members'));
    }
    public function create() {
      return view('members.create');
    }
    public function store() {
      $data = request()->validate([
        'firstname' => 'required',
        'lastname' => 'required',
        'affiliation' => 'required',
        'contact_number' => 'required',
        'email' => 'required|email|unique:members',
      ]);
      //dd($data);
      // $member = new Members();
      // $member->firstname = $data['firstname'];
      // $member->lastname = $data['lastname'];
      // $member->affiliation = $data['affiliation'];
      // $member->contact_number = $data['contact_number'];
      // $member->email = $data['email'];
      // $member->save();
      Members::create([
        'firstname' => $data['firstname'],
        'lastname' => $data['lastname'],
        'affiliation' => $data['affiliation'],
        'contact_number' => $data['contact_number'],
        'email' => $data['email'],
      ]);
      return back();
    }
}
