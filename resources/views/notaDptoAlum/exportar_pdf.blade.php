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
        <h2 class="tc ml-1">
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

    <main>
        {!! $contenido !!}
        
        <section id="firma">
            <u>Firma</u>
        </section>
    </main>

    <style>
        * { font-family: "Times New Roman", Times, serif!important; }
        
        @page { margin: 4.5cm 2cm 2cm 3cm; }
        
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
                
        header img { float: left; width: 100px; height: 100px; margin-top: 15px; }
        .tc { text-align: center; }
        .ml-1 { margin-left: 25px; }
    </style>
</body>
</html>