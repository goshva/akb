<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BazaController extends Controller
{
    public function create()
    {

      return view('ajax-request');
    }

    public function getinfo(Request $request)
    {
        $data = $request->all();
        //dd(http_build_query($data));
        //dd($request->all());
        #create or update your data here
//
$cmd="curl 'https://bazadromm.ru/baza-dannyh-dlya-podbora-akkumulyatorov-po-marke-avto/demo-bazy-podbora-akb.html' \
  -H 'authority: bazadromm.ru' \
  -H 'pragma: no-cache' \
  -H 'cache-control: no-cache' \
  -H 'accept: */*' \
  -H 'dnt: 1' \
  -H 'x-requested-with: XMLHttpRequest' \
  -H 'user-agent: Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.182 Safari/537.36' \
  -H 'content-type: application/x-www-form-urlencoded; charset=UTF-8' \
  -H 'origin: https://bazadromm.ru' \
  -H 'sec-fetch-site: same-origin' \
  -H 'sec-fetch-mode: cors' \
  -H 'sec-fetch-dest: empty' \
  -H 'referer: https://bazadromm.ru/baza-dannyh-dlya-podbora-akkumulyatorov-po-marke-avto/demo-bazy-podbora-akb.html' \
  -H 'accept-language: en' \
  -H 'cookie: evo1le7bo5=df9229ee30e2c09d60aa1a9583f9885d' \
  --data '". http_build_query($data) . "' \
  --compressed";

  
exec($cmd,$result);
//
//dd($result);
        return $result; //response()->json(['success'=>'Ajax request submitted successfully']);
    }
}
