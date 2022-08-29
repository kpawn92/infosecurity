<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generar Expediente...</title>
</head>

<body>
</body>
<script src="jspdf.min.js"></script>
<!-- https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/2.3.5/jspdf.plugin.autotable.js -->
<script src="jspdf.plugin.autotable.js"></script>
<script>
    window.onload = function() {

        var imgData = <?= $this->include('template/logoBase64') ?>;
        var pdf = new jsPDF();
        pdf.line(20, 43, 190, 43);
        pdf.setFontSize(14);
        pdf.text("CP Jesús Menéndez Larrondo de Manzanillo", 20, 36);
        pdf.addImage(imgData, 'PNG', 20, 10, 20, 20);

        pdf.setFontSize(12);
        pdf.text("Elaborado por:", 20, 42);
        pdf.setFontSize(12);
        pdf.text("CPU:", 20, 48);
        pdf.setFontSize(12);

        pdf.text("Fecha:", 160, 19);
        pdf.rect(160, 20, 8, 8);
        pdf.text("<?= date("d", time()) ?>", 162, 26);
        pdf.rect(168, 20, 9, 8);
        pdf.text("<?= date("m", time()) ?>", 170, 26);
        pdf.rect(177, 20, 13, 8);
        pdf.text("<?= date("Y", time()) ?>", 178, 26);

        pdf.setFontSize(10);
        pdf.setFontType('bold');
        pdf.text("Responsable:", 22, 265);

        <?php
        $inv_bocina = 0;
        $marca_bocina = 0;
        $model_bocina = 0;
        $ns_bocina = 0;
        if ($bocina != null) {
            $inv_bocina = $bocina['inventario'];
            $marca_bocina = $bocina['marca'];
            $model_bocina = $bocina['modelo'];
            $ns_bocina = $bocina['ns'];
        }
        ?>

        <?php
        $inv_ups = 0;
        $marca_ups = 0;
        $model_ups = 0;
        $ns_ups = 0;
        if ($ups != null) {
            $inv_ups = $ups['inventario'];
            $marca_ups = $ups['marca'];
            $model_ups = $ups['modelo'];
            $ns_ups = $ups['ns'];
        }
        ?>

        <?php
        $tipo_display = 0;
        $pulgadas = 0;
        $inv_display = 0;
        $marca_display = 0;
        $model_display = 0;
        $ns_display = 0;
        if ($display != null) {
            $tipo_display = $display['tipo'];
            $pulgadas = $display['pulgadas'];
            $inv_display = $display['inventario'];
            $marca_display = $display['marca'];
            $model_display = $display['modelo'];
            $ns_display = $display['ns'];
        }
        ?>

        /* Tablas */
        var columns = ["Nombre", "IP", "MAC", "Sello", "SO", "Inv", "Marca", "Modelo"];
        var rows = [
            ["<?= $expediente['nombrepc'] ?>", "<?= $expediente['ip'] ?>", "<?= $expediente['mac'] ?>", "<?= $expediente['sello_seguridad'] ?>", "<?= $expediente['so'] ?>", "<?= $expediente['invpc'] ?>", "<?= $expediente['marcapc'] ?>", "<?= $expediente['modelpc'] ?>"]
        ];

        var column = ["Placa-Madre", "Socket", "Marca", "Modelo", "NS"];
        var row = [
            ["", "<?= $expediente['sokplaca'] ?>", "<?= $expediente['marcaplaca'] ?>", "<?= $expediente['modelplaca'] ?>", "<?= $expediente['nsplaca'] ?>"],
            ["Velocidad-MICRO", "Cantidad de núcleos", "Marca", "Modelo", "NS"],
            ["<?= $expediente['velocidad'] ?>", "<?= $expediente['cantnucleos'] ?>", "<?= $expediente['marcamicro'] ?>", "<?= $expediente['modelmicro'] ?>", "<?= $expediente['nsmicro'] ?>"],

            ["Tipo-RAM", "Capacidad", "Marca", "Modelo", "NS"],
            <?php foreach ($memorias as $ram) : echo "['".$ram['tipo']."','".$ram['capacidad']. "', '".$ram['marca']. "','".$ram['modelo']. "','".$ram['ns']. "'],"; endforeach; ?>            

            ["Fuente Interna", "Potencia", "Marca", "Modelo", "NS"],
            ["", "<?= $expediente['potencia'] ?>", "<?= $expediente['marcafuente'] ?>", "<?= $expediente['modelfuente'] ?>", "<?= $expediente['nsfuente'] ?>"],

            ['HDD', 'Capacidad', 'Marca', 'Modelo', 'NS'],
            <?php foreach ($discos as $disco) : echo "['','".$disco['capacidad']. "', '".$disco['marca']. "','".$disco['modelo']. "','".$disco['ns']. "'],"; endforeach; ?>

            ["CD-DVD", "Tipo", "Marca", "Modelo", "NS"],
            ["", "<?= $expediente['tlector'] ?>", "<?= $expediente['marcalector'] ?>", "<?= $expediente['modellector'] ?>", "<?= $expediente['nslector'] ?>"],
            ["Teclado", "Interfaz", "Inventario", "Marca", "Modelo"],
            ["", "<?= $expediente['it'] ?>", "<?= $expediente['invteclado'] ?>", "<?= $expediente['marcateclado'] ?>", "<?= $expediente['modelteclado'] ?>"],
            ["Mouse", "Interfaz", "Inventario", "Marca", "Modelo"],
            ["", "<?= $expediente['im'] ?>", "<?= $expediente['invmouse'] ?>", "<?= $expediente['marcamouse'] ?>", "<?= $expediente['modelmouse'] ?>"],
            ["Speaker", "Inventario", "Marca", "Modelo", "Ns"],
            ["", "<?= $inv_bocina ?>", "<?= $marca_bocina ?>", "<?= $model_bocina ?>", "<?= $ns_bocina ?>"],
            ["UPS", "Inventario", "Marca", "Modelo", "Ns"],
            ["", "<?= $inv_ups ?>", "<?= $marca_ups ?>", "<?= $model_ups ?>", "<?= $ns_ups ?>"],
            ["Monitor", "Tipo-Tamaño", "Inventario", "Marca", "Modelo-Ns"],
            ["", "<?= $tipo_display . ' - ' . $pulgadas ?>", "<?= $inv_display ?>", "<?= $marca_display ?>", "<?= $model_display . " - " . $ns_display ?>"]

        ];


        var cresp = ["Nombre", "Cargo", "Departamento", "Firma"];
        var rresp = [
            ["<?= $expediente['nombre'] . ' ' . $expediente['lastname'] ?>", "<?= $expediente['cargo'] ?>", "<?= $expediente['dpto'] ?>", "___________"]
        ];

        /* CPU */
        pdf.autoTable(columns, rows, {
            theme: 'striped',
            margin: {
                top: 49,
                left: 20,
                right: 20
            },
            styles: {
                overflow: 'linebreak'
            }
        });
        pdf.autoTable(column, row, {
            theme: 'striped',
            margin: {
                top: 70,
                left: 20,
                right: 20
            },
            styles: {
                overflow: 'linebreak'
            }
        });

        pdf.autoTable(cresp, rresp, {
            theme: 'plain',
            margin: {
                top: 266,
                left: 20,
                right: 20
            },
            styles: {
                overflow: 'linebreak'
            }
        });

        /* Autoguardado */
        pdf.save('[<?php echo $expediente['dpto'] ?>]_<?php echo $expediente['nombrepc'] ?>_INV(<?php echo $expediente['invpc'] ?>).pdf');
        setTimeout(function() {
            window.history.back();
        }, 10);
    }
</script>

</html>