<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>{{ $title ?? 'VoIP - IFMA Barreirinhas' }}</title>
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <img src="/img/149645831825124.png" alt="Brand" class="img-responsive img-logo">
            </div>
            <div class="navbar-header navbar-right">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/admin">
                    CTIC - Gerenciamento de ramais VoIP
                </a>
            </div>
        </div>
    </nav>
    <main>
        <section class="container">
            {{ $slot }}
        </section>
    </main>
    <script src="/js/app.js"></script>
</body>
</html>