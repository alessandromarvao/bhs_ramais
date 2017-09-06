@component('admin.layouts.elements.body')
    @slot('title') SIP @endslot
    @slot('description') Editar Ramal @endslot

    {!! csrf_field() !!}
    <form action="{{ route('sip.update', $sip->name) }}" class="form-horizontal" method="post">
        <input type="hidden" name="_method" value="PUT" />
        @include('admin.sip.form')
    </form>

    <a href="{{ route('sip.index') }}" class="btn btn-xs btn-default">Voltar</a>
@endcomponent