<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>503 | Service Offline</title>
</head>
<body>

    <section>
        <div class="texto"> 
            <h1> Oops! ... </h1>
            <span> Achamos que o estagiário tropeçou nos fios! <br> Se você considerar que isto é um erro, por favor <a href="#"> Nos Avise </a>  </span>
        </div>

        <div class="botao_container">
            <a class="botao" alt="Botão Voltar" href="/"> Voltar para o Início </a>
        </div>
    </section>


    <style>

        html {
            height: 100%;
            padding: 0;
            margin: 0;
        }

        body {
            background-color: white;
            background-image: url("/images/svg/errors/503_service.svg");
            background-repeat: no-repeat;
            background-position: 5% 35%; 
        }

        .texto {
            margin-left: 55%;
            margin-top: 15%;
            align-itens: center;
            align content: center;
        }

        .texto h1 {
            font-size: 33px;
            font-family: Arial, Helvetica, sans-serif;
            border-size: 1px!important;
            border-color: orange;
            color: #407BFF;
        }

        .texto span {
            font-size: 17px;
            color: #407BFF;
            font-family: Arial, Helvetica, sans-serif;

        }

        a {
            text-decoration: none;
            font-size: 17px;
        }
        a:visited {
            text-decoration: none;
        }
        a:active {
            color: blue;
        }

        .botao_container {
            margin-top: 5%;
            margin-left: 55%;
        }

        .botao {
            padding: 2%;
            margin: 1%;
            font-family: Arial, Helvetica, sans-serif;

            font-size: 14px;
            color: white;
            background-color: #407BFF;
            border-color: orange;
            border-width: 1px;
            border-radius: 6px;

            font-size: 14px!important;
            text-decoration: none;
        }
        .botao:hover {
            background-color: #407BFF;
        }
        .botao:visited {
            text-decoration: none;
        }
    </style>
    
</body>
</html>