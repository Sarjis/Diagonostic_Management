<?php

namespace App\Http\Controllers;

use App\TestType;
use Illuminate\Http\Request;

class TestTypeController extends Controller
{
    function saveTestTypeInfo(Request $request)
    {
        $this->validate($request, [
            'type_name' => 'required|unique:test_types'
        ]);
        $testType = new TestType();
        $testType->type_name = $request->type_name;
        $testType->save();
        return 'success';

    }

    function fetchTypeName()
    {
        $types = TestType::orderBy('created_at','desc')->get();

        return response()->json([
            'types' => $types
        ], 200);
    }
}
