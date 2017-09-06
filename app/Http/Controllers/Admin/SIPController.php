<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\SIP;

class SIPController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sippeers = SIP::paginate(10);
        return view('admin.sip.index', compact('sippeers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.sip.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = [
            '_method'=>$request->input('_method'),
            '_token'=>$request->input('_token'),
            'name'=>$request->input('ramal'),
            'defaultuser'=>$request->input('ramal'),
            'description'=>$request->input('setor'),
            'host'=>'dynamic',
            'type'=>'friend',
            'context'=>'barrei_sip',
            'md5secret'=> md5($request->input('ramal') . ':10.7.14.10:' . $request->input('pwd')),
            'transport'=>'udp',
            'dtmfmode'=>'rfc2833',
            'callgroup'=>'1',
            'pickupgroup'=>'1',
            'language'=>'pt_BR',
            'disallow'=>'all',
            'allow'=>'ulaw,alaw,ilbc',
            'accountcode'=>$request->input('setor').'-'.$request->input('ramal'),
            'callerid'=>$request->input('setor').'<'.$request->input('ramal').'>',
            'call-limit'=>2
        ];
        SIP::create($input);

        return response()->redirectToRoute('sip.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $name
     * @return \Illuminate\Http\Response
     */
    public function show($name)
    {
        $sip = SIP::findOrFail($name);
        return view('admin.sip.show', compact('sip'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $name
     * @return \Illuminate\Http\Response
     */
    public function edit($name)
    {
        $sip = SIP::findOrFail($name);
        return view('admin.sip.edit', compact('sip'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $sippeer = SIP::findOrFail($id);
        $input = [
            '_method'=>$request->input('_method'),
            '_token'=>$request->input('_token'),
            'name'=>$request->input('ramal'),
            'defaultuser'=>$request->input('ramal'),
            'description'=>$request->input('setor'),
            'host'=>'dynamic',
            'type'=>'friend',
            'context'=>'barrei_sip',
            'transport'=>'udp',
            'dtmfmode'=>'rfc2833',
            'callgroup'=>'1',
            'pickupgroup'=>'1',
            'language'=>'pt_BR',
            'disallow'=>'all',
            'allow'=>'ulaw,alaw,ilbc',
            'accountcode'=>$request->input('setor').'-'.$request->input('ramal'),
            'callerid'=>$request->input('setor').'<'.$request->input('ramal').'>',
            'call-limit'=>2
        ];
        //Confere se foi alterada a senha. Caso haja alteração, a nova senha será cadastrada no BD em hash MD5
        if(!empty($request->input('md5secret'))){
            $input['md5secret'] = md5($request->input('ramal') . ':10.7.14.10:' . $request->input('md5secret'));
        }
        $sippeer->update($input);
        
        return response()->redirectToRoute('sip.show', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sip = SIP::findOrFail($id);
        $sip->delete();

        return response()->redirectToRoute('sip.index');
    }
}
