<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <title>404 | Not Found</title>
</head>
<body>

    <section>
        <div class="texto"> 
            <h1> Oops! Parece que você se perdeu... </h1>
            <span> Essa página não existe. <br> Se você considerar que isto é um erro, por favor <a href="#"> Nos Avise </a>  </span>
        </div>

        <div class="botao_container">
            <a class="btn btn-primary shadow-lg" alt="Botão Voltar" href="/"> Voltar para o Início </a>
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
            background-image: url("/images/svg/errors/404_page_not_found.svg");
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
            color: #7070c7;
        }

        .texto span {
            font-size: 17px;
            color: #7070c7;
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
            background-color: #3e6ed6;
            border-color: orange;
            border-width: 1px;
            border-radius: 6px;

            font-size: 14px!important;
            text-decoration: none;
        }
        .botao:hover {
            background-color: #375ecc;
        }
        .botao:visited {
            text-decoration: none;
        }
    </style>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>

</body>
</html>