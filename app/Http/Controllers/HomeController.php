<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $url = 'orders';
        $method = 'GET';
        $body = '';
        $return = $this->curl($url,$method,$body);

        $returns = $return->data;

        return view('home', compact('returns'));
    }

    public function create()
    {
        $url = 'orders';
        $method = 'GET';
        $body = '';
        $return = $this->curl($url,$method,$body);

        $returns = count($return->data);

        if($return == ''){
            $id = 1; 
        }else{  
            $id = $returns + 1;
        }

        return view('tk.create',compact('id'));
    }

    public function store(Request $request)
    {

            
        $url = 'orders';
        $method = 'POST';

        $request->date = date('Y-m-d', strtotime($request->date));
        $body  = json_encode(array(
            'orders' => array(
                $request->all()
            )));

        $response = $this->curl($url,$method,$body);

        echo json_encode($response->response);
        return;
    }
    public function show($id)
    {
        $url = 'order/'.$id;
        $method = 'GET';
        $body = '';
        $return = $this->curl($url,$method,$body);

        $return = $return->data['0'];


       return view('tk.show',compact('return'));
    }

    public function edit ($id)
    {
        $url = 'order/'.$id;
        $method = 'GET';
        $body = '';
        $return = $this->curl($url,$method,$body);

        $return = $return->data['0'];

       return view('tk.edit',compact('return'));
    }
    public function update(Request $request)
    {
        
        $request->validate([
            'name' => 'required', 
            'point_sale' => 'required', 
            'status' => 'required', 
            'date' => 'required', 
            'total' => 'required', 
            'partial_total' => 'required', 
            'shipment_value' =>'required'
            ],
            ['required' => 'O campo :attribute é obrigatório'],
            [
                'name' => 'Origem', 
                'point_sale' => 'Ponto de venda', 
                'status' => 'Status ', 
                'date' => 'Data ', 
                'total' => 'Total do pedido ', 
                'partial_total' => 'Total do produto ', 
                'shipment_value' =>'Total de frete ' 
            ]);

            
        $url = 'orders';
        $method = 'PUT';
        $request->date = date('Y-m-d', strtotime($request->date));

        $body  = json_encode(array(
            'orders' => array(
                $request->all()
            )));

            $response = $this->curl($url,$method,$body);


        echo json_encode($response->response);
        return;
    }
    public function destroy($id)
    {
        $url = 'order/'.$id;
        $method = 'DELETE';
        $body = '';
        $return = $this->curl($url,$method,$body);

        $curl = curl_init("https://trackcash.com.br/api/order/". $id);

        return redirect()->route('home.index')
                         ->with('success','Item excluído com sucesso.');
    }

    public function curl($url,$method,$body){

        $curl = curl_init("https://trackcash.com.br/api/".$url);

        $headers = array(
        "Content-Type: application/json; charset=utf-8",
        "token:" .base64_encode('teste@api.com.br:teste123'));

        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);

        curl_setopt($curl, CURLOPT_HEADER, false);

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

        if($body != ''){
            curl_setopt($curl, CURLOPT_POSTFIELDS, $body);
        }

        $response = curl_exec($curl);

        $return = json_decode($response);

        return $return;

    }
}
