<?php

namespace App\Http\Controllers;

use App\Test;
use App\TestRequest;
use Illuminate\Http\Request;
use PDF;

class TestRequestController extends Controller
{

    function saveTestRequestInfo(Request $request)
    {
        $this->validate($request, [
            'patient_name' => 'required',
            'birth_date' => 'required',
            'mobile_no' => 'required',
            'totalPayment' => 'required',
            'billNo' => 'required|unique:test_requests',
        ]);

        $object = new TestRequest();
        $object->patient_name = $request->patient_name;
        $object->birth_date = $request->birth_date;
        $object->mobile_no = $request->mobile_no;
        $object->totalPayment = $request->totalPayment;
        $object->billNo = $request->billNo;
        //return $request->billNo;
        $object->save();
    }

    function searchForPaymentByMobile()
    {
        $search = \Request::get('s');
        $amount = TestRequest::where('mobile_no', 'LIKE', "$search")->first();

        return response()->json([
            'amount' => $amount
        ], 200);
    }

    function unpaidBillList($from, $to)
    {
        $bills = TestRequest::all()->whereBetween('created_at', [$from, $to])->where('totalPayment','!=','0');
        return response()->json([
            'bills' => $bills
        ], 200);

    }

    function extractTextRequestData()
    {
        $tests = Test::all();
        return $tests;
    }

    function payBill($id)
    {
        $billPaymentFor = TestRequest::find($id);
        $billPaymentFor->totalPayment = 0;
        $billPaymentFor->update();
        return $id;
    }

    function pdf()
    {
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($this->converted_text());
        return $pdf->stream();
    }

    function converted_text()
    {
        $tests = $this->extractTextRequestData();
        $output = '
        <!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    <h1>Hello, world!</h1>
<table class="table table-borderless">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">Handle</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td colspan="2">Larry the Bird</td>
      <td>@twitter</td>
    </tr>
  </tbody>
</table>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
        ';


        return $output;

    }
}
