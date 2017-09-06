@component('admin.layouts.elements.body')
    @slot('title') IAX @endslot
    @slot('description') Listar Ramais @endslot

    <h4>{{ $iax->name }}</h4>

    <table class="table table-hover">
        <thead>
            <tr>
                <th>Conta</th>
                <th>Nome no discador</th>
                <th>Setor</th>
                <th>Usuário</th>
                <th>SIAPE</th>
                <th>Senha</th>
                <th class="text-right">Endereço IP</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $iax->name }}</td>
                <td>{{ $iax->callerid }}</td>
                <td>{{ $iax->accountcode }}</td>
                <td>{{ $iax->usr }}</td>
                <td>{{ $iax->user_siape }}</td>
                <td>{{ $iax->md5secret }}</td>
                <td class="text-right">{{ $iax->ipaddr }}</td>
            </tr>
        </tbody>
    </table>

    <a href="{{ route('iax.index') }}" class="btn btn-xs btn-default">Voltar</a>
    <a href="{{ route('iax.edit', $iax->name) }}" class="btn btn-xs btn-default">Editar</a>
    <form action="{{ route('iax.destroy', $iax->name) }}" class="form-horizontal" method="post" style="display: inline-block">
        {!! csrf_field() !!}
        <input type="hidden" name="_method" value="DELETE" />
        <input type="submit" value="Remover" class="btn btn-xs btn-default" >
    </form>
@endcomponent