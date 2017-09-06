@component('admin.layouts.elements.body')
    @slot('title') IAX @endslot
    @slot('description') Editar Ramal @endslot

    {!! csrf_field() !!}
    <form action="{{ route('iax.update', $iax->name) }}" class="form-horizontal" method="post">
        <input type="hidden" name="_method" value="PUT" />
        @include('admin.iax.form')
    </form>

    <a href="{{ route('iax.index') }}" class="btn btn-xs btn-default">Voltar</a>
@endcomponent