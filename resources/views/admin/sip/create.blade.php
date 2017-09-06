@component('admin.layouts.elements.body')
    @slot('title') SIP @endslot
    @slot('description') Adicionar Ramal @endslot

    <form action="{{ route('sip.store') }}" class="form-horizontal" method="post">
        @include('admin.sip.form')
    </form>

    <a href="{{ route('sip.index') }}" class="btn btn-xs btn-default">Voltar</a>
@endcomponent