<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <header>
        <img src="https://www.uncoma.edu.ar/wp-content/uploads/2018/04/LOGOUNC-e1522858761795.png" alt="UNCOMA" />
        <h2 class="tc ml">
            Universidad Nacional del Comahue <br>
            Centro Universitario Regional Zona Atlántica <br>
            Departamento de Alumnos
        </h2>
        <hr>
    </header>

    <footer>
        <hr>
        {!! $footer !!}
    </footer>

    <main class="tj">
        {!! $contenido !!}

        <section id="firma" class="tc">
            @isset($firma_dpto)
            <div>
                <img width="70px" height="70px" src="img/logito-fai.png" alt="F.A.I.">
                <div>
                    <h4>A/C. DEPTO ALUMNOS</h4>
                    <h5>{{ $firma_dpto }}</h5>
                </div>
            </div>
            @endisset
            @isset($firma_secretaria)
            <div>
                <img width="70px" height="70px" src="img/logito-fai.png" alt="F.A.I.">
                <div>
                    <h4>SECRE</h4>
                    <h5>{{ $firma_secretaria }}.</h5>
                </div>
            </div>
            @endisset
        </section>
    </main>

    <style>
    @page {
        margin: 4.5cm 2cm 2cm 3cm;
    }

    header {
        position: fixed;
        left: 0px;
        top: -135px;
        right: 0px;
    }

    footer {
        position: fixed;
        bottom: 70px;
        left: 0px;
        right: 0px;

        line-height: .5em;
        font-size: .85em;
    }

    header img {
        float: left;
        width: 100px;
        height: 100px;
        margin-top: 15px;
    }

    .tj {
        text-align: justify;
    }

    .tc {
        text-align: center;
    }

    .ml {
        margin-left: 25px;
    }

    #firma {
        width: 100%;
        padding-top: 60px;
        line-height: 0.2em;
    }

    #firma>div {
        display: inline-block;
        width: 49% !important;
    }
    </style>
</body>

</html>