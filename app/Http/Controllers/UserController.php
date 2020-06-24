<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\User;

class UserController extends Controller
{
    public function index(Request $request) {
        $data = User::get();

        if ($request->ajax()) {
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row) {
                    $url = route('order.delete', $row->id);
                    $button =
                        '<center>' .
                        csrf_field()  . method_field("DELETE")  .
                        '<a class=" btn btn-primary" style="margin-right: 10px">Edit</a>' .
                        '<button class="btn btn-danger" type="submit"><i class="fa fa-trash"></i>Delete</button>' .
                        '</center>';
                    return $button;
                })
                ->make(true);
        }
        return view('user', compact('data'));
    }
}
