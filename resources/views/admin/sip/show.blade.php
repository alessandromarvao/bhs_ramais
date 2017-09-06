@component('admin.layouts.elements.body')
    @slot('title') SIP @endslot
    @slot('description') Listar Ramais @endslot

    <h4>{{ $sip->name }}</h4>

    <table class="table table-hover">
        <thead>
            <tr>
                <th>Conta</th>
                <th>Código da Conta</th>
                <th>Nome no discador</th>
                <th>Setor</th>
                <th>Senha</th>
                <th class="text-right">Endereço IP</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $sip->name }}</td>
                <td>{{ $sip->accountcode }}</td>
                <td>{{ $sip->callerid }}</td>
                <td>{{ $sip->description }}</td>
                <td>{{ $sip->md5secret }}</td>
                <td class="text-right">{{ $sip->ipaddr }}</td>
            </tr>
        </tbody>
    </table>

    <a href="{{ route('sip.index') }}" class="btn btn-xs btn-default">Voltar</a>
    <a href="{{ route('sip.edit', $sip->name) }}" class="btn btn-xs btn-default">Editar</a>
    <form action="{{ route('sip.destroy', $sip->name) }}" class="form-horizontal" method="post" style="display: inline-block">
        {!! csrf_field() !!}
        <input type="hidden" name="_method" value="DELETE" />
        <input type="submit" value="Remover" class="btn btn-xs btn-default" >
    </form>
@endcomponent