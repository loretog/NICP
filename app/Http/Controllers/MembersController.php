<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
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
      //dd(storage_path() . "\\app\\public\\uploads\\" );
      $data = request()->validate([
        'name' => 'required',
        'affiliation' => 'required',
        'contact_number' => 'required',
        'email' => 'required|email|unique:members',
        'photo' => 'required',
      ]);
      $data[ 'photo' ] = str_replace('data:image/jpeg;base64,', '', $data[ 'photo' ] );
      $data[ 'photo' ] = str_replace(' ', '+', $data[ 'photo' ] );
      $imageName = str_random(10).'.'.'jpg';
      \File::put(storage_path() . "\\app\\public\\uploads\\" . $imageName, base64_decode( $data[ 'photo' ] ));
      //dd($data);

      $id = Members::create([
        'name' => $data['name'],
        'affiliation' => $data['affiliation'],
        'contact_number' => $data['contact_number'],
        'email' => $data['email'],
        'photo' => $imageName,
      ])->id;
      return redirect( '/members/print/' . $id );
    }
    public function print( $id ) {
      $member = Members::findOrFail( $id );
      return view( 'members.print', compact( 'member' ) );
    }
}
