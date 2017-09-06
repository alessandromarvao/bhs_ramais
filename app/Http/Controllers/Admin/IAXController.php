<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\IAX;

class IAXController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $iaxfriends = IAX::paginate(5);
        return view('admin.iax.index', compact('iaxfriends'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.iax.create');
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
            '_method'=> $request->input('_method'),
            '_token'=> $request->input('_token'),
            'name' => $request->input('ramal'), //ramal
            'type' => $request->input('setor'), //friend
            'username' => $request->input('ramal'), //ramal
            'mailbox' => $request->input('ramal') . "@mailboxiax", // ramal@mailboxiax
            'md5secret' => md5($request->input('pwd')), //ramal:10.7.14.10:SENHA
            'context' => 'barrei_iax', //barrei_iax
            'host' => 'dynamic', //dynamic
            'accountcode' => $request->input('setor'), //SETOR
            'callgroup' => '1', //1
            'pickupgroup' => '1', //1
            'language' => 'pt_BR', // pt_BR
            'callerid' => $request->input('setor') . '<' . $request->input('ramal') . '>', //SETOR <ramal>
            'disallow' => 'all', // all
            'allow' => 'ulaw,alaw,gsm', // ulaw,alaw,gsm
            'qualify' => 'no', // no
            'usr' => $request->input('usr'), //Nome do usuário
            'user_siape' => $request->input('siape') //Matrícula do usuário
        ];
        IAX::create($input);

        return response()->redirectToRoute('iax.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $iax = IAX::findOrFail($id);
        return view('admin.iax.show', compact('iax'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $iax = IAX::findOrFail($id);
        return view('admin.iax.edit', compact('iax'));
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
        $iax = IAX::findOrFail($id);
        $input = [
            '_method'=> $request->input('_method'),
            '_token'=> $request->input('_token'),
            'name' => $request->input('ramal'), //ramal
            'type' => $request->input('setor'), //friend
            'username' => $request->input('ramal'), //ramal
            'mailbox' => $request->input('ramal') . "@mailboxiax", // ramal@mailboxiax
            'context' => 'barrei_iax', //barrei_iax
            'host' => 'dynamic', //dynamic
            'accountcode' => $request->input('setor'), //SETOR
            'callgroup' => '1', //1
            'pickupgroup' => '1', //1
            'language' => 'pt_BR', // pt_BR
            'callerid' => $request->input('setor') . '<' . $request->input('ramal') . '>', //SETOR <ramal>
            'disallow' => 'all', // all
            'allow' => 'ulaw,alaw,gsm', // ulaw,alaw,gsm
            'qualify' => 'no', // no
            'usr' => $request->input('usr'), //Nome do usuário
            'user_siape' => $request->input('siape') //Matrícula do usuário
        ];
        //Confere se foi alterada a senha. Caso haja alteração, a nova senha será cadastrada no BD em hash MD5
        if(!empty($request->input('md5secret'))){
            $input['md5secret'] = md5($request->input('ramal') . ':10.7.14.10:' . $request->input('md5secret'));
        }
        $iax->update($input);

        return response()->redirectToRoute('iax.show', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $iax = IAX::findOrFail($id);
        $iax->delete();

        return response()->redirectToRoute('iax.index');
    }
}
