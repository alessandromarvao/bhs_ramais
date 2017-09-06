@component('admin.layouts.elements.body')
@slot('title') SIP @endslot
@slot('description') Listar Ramais @endslot

<a href="{{ route('admin') }}" class="btn btn-default">Voltar</a>
<a href="{{ route('sip.create') }}" class="btn btn-primary">Novo</a>
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
        @foreach($sippeers as $sip)
        <tr>
            <td><a href="{{ route('sip.show', $sip->name) }}" title="Alterar">{{ $sip->name }}</a></td>
            <td>{{ $sip->accountcode }}</td>
            <td>{{ $sip->callerid }}</td>
            <td>{{ $sip->description }}</td>
            <td>{{ $sip->md5secret }}</td>
            <td class="text-right">{{ $sip->ipaddr }}</td>
        </tr>
        @endforeach
    </tbody>
</table>


{{ $sippeers->links() }}

@endcomponent