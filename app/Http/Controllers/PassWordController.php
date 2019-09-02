<?php

namespace App\Http\Controllers;

use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Password;

class PassWordController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Return page to insert data
     *
     * @return view passinsert
     */
    public function viewInsert()
    {
        return view('passinsert');
    }

    /**
     * Insert data into database
     *
     * @param  array $request
     * @return view passinsert with success/failure message
     */
    public function insertPass(Request $request)
    {
        // validate fields
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'gb' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'max:255'],
        ]);

        $id = Auth::id();

        $password = new Password;
        $password->name = $request->input('name');
        $password->gb = $request->input('gb');
        $password->passwd = $request->input('password');
        $password->user_id = $id;
        $password->save();

        return redirect('/viewinsert')->with('success', 'Your password was successfully saved.');

    }

    /**
     * Retunrs the viewedit page to edit a password
     *
     * @param $id from the password
     * @return view viewedit
     */
    public function viewEdit($id)
    {

        $password = Password::find($id);

        return view('passedit', ['password' => $password]);
    }

    /**
     * Posts the edit data in the database
     *
     * @param  array $request
     * @param $id from the password
     * @return view viewedit with success/failure message
     */
    public function editPass(Request $request, $id)
    {

        // validate fields
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'gb' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'max:255'],
        ]);

        $password = Password::find($id);
        $password->name = $request->input('name');
        $password->gb = $request->input('gb');
        $password->passwd = $request->input('password');
        $password->save();

        return redirect('/viewedit/' . $id)->with('success', 'Your password was updated successfully.');
    }

    /**
     * Deletes a password. Softdeletes are used
     *
     * @param  array $request
     * @param $id from the password to delete
     * @return view home with success/failure message
     */
    public function deletePass(Request $request, $id)
    {

        $password = Password::find($id);
        $password->delete();

        return redirect('/home')->with('success', 'Password successfully deleted.');
    }

    /**
     * Searches for a given password
     *
     * @param  Request $request
     * @return the card with the password the user was searching
     */
    public function search(Request $request)
    {
        $output = "";
        if ($request->ajax()) {
            $query = $request->get('query');
            if ($query != '') {
                $data = Password::where('name', 'like', '%' . $query . '%')->where('user_id', Auth::id())->get();
                $total_row = $data->count();
                if ($total_row > 0) {
                    foreach ($data as $row) {
                        $output .= '<a href="#' . $row->id . '"><li data-id="'.$row->id .'" class="list-group-item searchitem">' . $row->name . '</li></a>';
                    }

                }
            }


        }
        $data = array(
            'table_data' => $output
        );

        echo json_encode($data);
    }

}
