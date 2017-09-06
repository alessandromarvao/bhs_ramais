@component('admin.layouts.elements.body')
    @slot('title') IAX @endslot
    @slot('description') Adicionar Ramal @endslot

    <form action="{{ route('iax.store') }}" class="form-horizontal" method="post">
        @include('admin.iax.form')
    </form>

    <a href="{{ route('iax.index') }}" class="btn btn-xs btn-default">Voltar</a>
@endcomponent