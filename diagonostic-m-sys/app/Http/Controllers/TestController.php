<?php

namespace App\Http\Controllers;

use App\Test;
use App\TestRequest;
use Illuminate\Http\Request;

class TestController extends Controller
{
    function saveTestInfo(Request $request)
    {
        $this->validate($request, [
            'test_name' => 'required|unique:tests',
            'fee' => 'required',
            'test_type_id' => 'required',
        ]);
        $test = new Test();
        $test->test_name = $request->test_name;
        $test->fee = $request->fee;
        $test->test_type_id = $request->test_type_id;
        $test->save();
        return 'success';
    }

//    function fetchTestName()
//    {
//        $tests = Test::orderBy('test_name', 'desc')->get();
//
//        return response()->json([
//            'tests' => $tests
//        ], 200);
//    }
    function fetchTestName()
    {
        $tests = Test::with('type')->orderBy('test_name', 'asc')->get();

        return response()->json([
            'tests' => $tests
        ], 200);
    }

    function extractFee($testName)
    {
        $fee = Test::where('test_name', $testName)
            ->select('tests.fee')
            ->first();
        //$fee= $catchFee->fee;
        return $fee;
//        $catchFee = Test::find($id);
//        $fee= $catchFee->fee;
//        return $fee;
    }

    function searchByBillNo()
    {
        $search = \Request::get('s');
        $amount = TestRequest::where('billNo', 'LIKE', "%$search%")
                                ->first();

        return response()->json([
            'amount' => $amount
        ], 200);
//        $fee = Test::where('test_name', 'LIKE', '')
//            ->select('tests.fee')
//            ->first();
    }
}
