@component('admin.layouts.elements.body')
    @slot('title') IAX @endslot
    @slot('description') Listar Ramais @endslot
    
    <a href="{{ route('admin') }}" class="btn btn-default">Voltar</a>
    <a href="{{ route('iax.create') }}" class="btn btn-primary">Novo</a>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Conta</th>
                <th class="text-center">Setor</th>
                <th class="text-center">Usuário</th>
                <th class="text-center">Matrícula</th>
                <th>Nome no discador</th>
                <th>Senha</th>
                <th class="text-right">Endereço IP</th>
            </tr>
        </thead>
        <tbody>
            @foreach($iaxfriends as $iax)
            <tr>
                <td><a href="{{ route('iax.show', $iax->name) }}" title="Alterar">{{ $iax->name }}</a></td>
                <td class="text-center">{{ $iax->accountcode }}</td>
                @if (empty($iax->usr))
                {{-- Confere se existe funcionário cadastrado --}}
                    <td class="text-center">-</td>
                @else
                    <td class="text-center">{{ $iax->usr }}</td>
                @endif
                @if (empty($iax->user_siape))
                {{-- Confere se existe a matrícula do funcionário cadastrada --}}
                    <td class="text-center">-</td>
                @else
                    <td class="text-center">{{ $iax->user_siape }}</td>
                @endif
                <td>{{ $iax->callerid }}</td>
                <td>{{ $iax->md5secret }}</td>
                <td class="text-right">{{ $iax->ipaddr }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $iaxfriends->links() }}

@endcomponent