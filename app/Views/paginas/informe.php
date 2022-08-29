<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generar Informe...</title>
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
        pdf.text("Informe del Cumplimiento de la Especialialidad de Seguridad informática", 20, 42);

        pdf.text("Fecha:", 160, 19);
        pdf.text("<?= $fechaInsp ?>", 170, 26);


        /* Tablas */
        var cinforme = ["1. Introducción"];
        var rinforme = [
            ["En nuestro objetivo solo se cuenta con una dependencia, en esta existen físicamente: <?= $pcs ?>pc subordinadas a: <?= $dptos ?> departamentos en explotación. En el transcurso del mes se realizaron <?= $insp ?> controles para un <?php $promedio = ($insp / $pcs) * 100; echo $promedio; ?>%, de ellos se detectaron: <?= $virus ?> malware y <?= $def ?> incidencias detectandose violaciones a la seguridad Informática, derivando de ellas:  medidas técnicas y disciplinarias."]
        ];

        var cmedidas = ["2. Control estadistico: ", ""];
        var rmedidas = [                        
            ["Medidas de control: <?php $count_med = $cantAccionInsp + $cAccionesVirus + $cAccionesincide; echo $count_med; ?> | Mantenimientos: <?=$mant?> | Roturas: <?=$rotura?> | Salvas de la información: <?=$salva?>", ""]
        ];


        pdf.autoTable(cinforme, rinforme, {
            theme: 'plain',
            margin: {
                top: 49,
                left: 20,
                right: 20
            },
            styles: {
                overflow: 'linebreak'
            }
        });

        pdf.autoTable(cmedidas, rmedidas, {
            theme: 'plain',
            margin: {
                top: 78,
                left: 20,
                right: 20
            },
            styles: {
                overflow: 'linebreak'
            }
        });


        /* Autoguardado */
        pdf.save('Informe_SI.pdf');
        setTimeout(function() {
            window.history.back();
        }, 10);
    }
</script>

</html>