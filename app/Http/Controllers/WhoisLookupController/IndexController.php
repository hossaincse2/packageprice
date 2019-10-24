<?php

namespace App\Http\Controllers\WhoisLookupController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    	$whois =  config('enums.whoisservers');
        Validator::extend('domain', function ($attribute, $value, $parameters, $validator) {
		    preg_match("/[^\.\/]+\.[^\.\/]+$/", $value, $matches);
		    return count($matches);
        });
        Validator::extend('extension', function ($attribute, $value, $parameters, $validator) use ($whois) {
        	$pathinfo = pathinfo($value);
        	$extension = isset($pathinfo['extension']) ? $pathinfo['extension'] : false;
        	return in_array($extension, array_keys($whois));
        });
		$reCAPTCHA = file_get_contents(
			'https://www.google.com/recaptcha/api/siteverify',
			false,
			stream_context_create(
				['http' =>
				    [
				        'method'  => 'POST',
				        'header'  => 'Content-type: application/x-www-form-urlencoded',
				        'content' => http_build_query(
							[
								'secret' => Config::get('services.recaptcha.secret'),
								'response' => $request->get('g-recaptcha-response'),
								'remoteip' => $request->ip(),
							]
						)
				    ]
				]
			)
		);
		$input = $request->all();
		$input['reCAPTCHA'] = json_decode($reCAPTCHA)->success;
        $validator = Validator::make($input, [
            'domain' => 'required|min:4|domain|extension',
            'reCAPTCHA' => 'required|accepted',
        ]);
        if ($validator->fails()) {
        	if($request->ajax())
			{
				return Response::json($validator->messages(), 400);
            }else{
            	return redirect('whois-lookup')
                        ->withErrors($validator)
                        ->withInput();
            }
        }
        $domain = $request->get('domain');
        $pathinfo = pathinfo($domain);
        $extension = $pathinfo['extension'];
		$fp = fsockopen($whois[$extension], 43);
		 
		$out = $domain."\r\n";
		 
		fwrite($fp, $out);
		 
		$response = '';
		while (!feof($fp)) {
		    $response .= fgets($fp, 4096);
		}
		 
		fclose($fp);
		if ($request->ajax()) {
			return ['response' => $response];
		}else{
			return $response;
		}		
    }
}
