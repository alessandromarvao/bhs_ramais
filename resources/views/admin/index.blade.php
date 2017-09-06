@component('admin.layouts.elements.body')
    @slot('title') IFMA - Barreirinhas @endslot
    @slot('description') Gerenciamento de Ramais @endslot
    
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-3 col-sm-offset-2">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="{{ route('sip.index') }}">Consultar Ramais SIP</a>
                    </div>
                </div>
                <div class="col-sm-3 col-sm-offset-1">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="{{ route('iax.index') }}">Consultar Ramais IAX</a>
                    </div>
                </div>
            </div>
            <!-- Brand and toggle get grouped for better mobile display -->
        </div>
    </nav>
@endcomponent
