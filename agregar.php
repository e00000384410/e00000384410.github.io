<html>
<head>
    <title>Agregar placas</title>
</head>

<body>
    <form id="form1" name="form1" method="GET" action="guardar.php">
        <p>
            <label for="fecha"> Fecha:</label>
            <input name="fecha" type="date" id="fecha" maxlength="10" />
        </p>

        <p>
            <label for="folio"> Folio:</label>
            <input name="folio" type="texto" id="folio" maxlength="8" required />
        </p>

        <p>
            <label for="contribuyente"> Contribuyente:</label>
            <input name="contribuyente" type="texto" id="contribuyente" maxlength="30" required />
        </p>

        <p>
            <label for="documento"> Documento:</label>
            <select name="documento" id="documento">
                <option> Placa moto </option>
                <option> Placa vehiculo </option>
                <option> Tarjeta de circulación </option>
                <option> Licencia de conducir </option>
            </select>
        </p>

        <p>
            <label for="referencia"> Referencia:</label>
            <input name="referencia" type="text" id="referencia" maxlength="150" />
        </p>

        <p>
            <label for="placa"> Placa:</label>
            <input name="placa" type="text" id="placa" maxlength="7" />
        </p>
        
        <p>
            <input type="submit" name="enviar" id="enviar" value="Enviar" />
        </p>
    </form>

    <p> <a href="index.php"> Cancelar</a>
    </p>
        

</body>
</html>