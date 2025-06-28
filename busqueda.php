<head>
    <title> Buscar placas</title>
</head>

<html>
<body>
    <form id = "form1" name = "form1" method = "GET" action = "buscar.php">
        <p>
            <label for = "numpla" type = "text"> Numero de placa a buscar: </label>
        </p>
        <p>
            <input name = "numpla" type = "text" id = "numpla" maxlength = "7" required/>
        </p>
        <p>
            <input type="submit" name = "enviar" id = "enviar" value = "Enviar" />
        </p>
    </form>

    <p> <a href = "index.php"> Cancelar </a></p>
</body>
</html>