<!DOCTYPE html>
<html lang="es">

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
        pdf.text("Impresora:", 20, 48);
        pdf.setFontSize(12);
        pdf.text("Modem", 20, 69);
        pdf.text("Router", 20, 90);
        pdf.text("Switch", 20, 112);
        pdf.text("Telefono", 20, 134);

        pdf.text("Fecha:", 160, 19);
        pdf.rect(160, 20, 8, 8);
        pdf.text("<?= date("d", time()) ?>", 162, 26);
        pdf.rect(168, 20, 9, 8);
        pdf.text("<?= date("m", time()) ?>", 170, 26);
        pdf.rect(177, 20, 13, 8);
        pdf.text("<?= date("Y", time()) ?>", 178, 26);

        pdf.setFontSize(10);
        pdf.setFontType('bold');
        pdf.text("Responsable:", 22, 244);


        /* Tablas */
        var cimpresora = ["Tipo", "Repuesto", "Multifunc", "Inv", "Marca", "Modelo"];
        var rimpresora = [
            ["", "", "", "", "", ""]
        ];

        var cmodem = ["Inv", "Marca", "Modelo", "NS"];
        var rmodem = [
            ["", "", "", ""]
        ];

        var crouter = ["Inv", "Marca", "Modelo", "NS"];
        var rrouter = [
            ["", "", "", ""]
        ];

        var cswitch = ["Inv", "Marca", "Modelo", "NS", "Reprogramable"];
        var rswitch = [
            ["", "", "", "", ""]
        ];

        var cphone = ["Alcance", "Inv", "Marca", "Modelo", "NS"];
        var rphone = [
            ["", "", "", "", ""]
       ];
        <?php
        /*$inv_bocina = 0;
        $marca_bocina = 0;
        $model_bocina = 0;
        $ns_bocina = 0;
        if ($bocina != null) {
            $inv_bocina = $bocina['inventario'];
            $marca_bocina = $bocina['marca'];
            $model_bocina = $bocina['modelo'];
            $ns_bocina = $bocina['ns'];
        }*/
        ?>

        var cresp = ["Nombre", "Cargo", "Departamento", "Firma"];
        var rresp = [
            ["", "", "", ""]
        ];

        /* CPU */
        pdf.autoTable(cimpresora, rimpresora, {
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
        pdf.autoTable(cmodem, rmodem, {
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

        pdf.autoTable(crouter, rrouter, {
            theme: 'striped',
            margin: {
                top: 92,
                left: 20,
                right: 20
            },
            styles: {
                overflow: 'linebreak'
            }
        });
        pdf.autoTable(cswitch, rswitch, {
            theme: 'striped',
            margin: {
                top: 113,
                left: 20,
                right: 20
            },
            styles: {
                overflow: 'linebreak'
            }
        });

        pdf.autoTable(cphone, rphone, {
            theme: 'striped',
            margin: {
                top: 135,
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
                top: 245,
                left: 20,
                right: 20
            },
            styles: {
                overflow: 'linebreak'
            }
        });

        /* Autoguardado */
        pdf.save('MyPDF.pdf');
        /*setTimeout(function() {
            window.history.back();
        }, 10);*/
    }
</script>

</html>