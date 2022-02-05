<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Carga Horaria</title>
    <style>
        body {
            font-size: 13.5px;
            padding: 1.5em;
        }
        .text-center{
            text-align: center; 
        }
        .parrafo{
            text-align: justify;
            text-indent: 27px;
            margin: 2em 0;
            line-height : 22px;
        }
        .penultimo{
            margin: 0;
        }
        .parrafo-final{
            text-align: justify;
            font-style: italic;
            line-height : 22px;
            font-weight: bold;
        }
        .fecha{
            text-align: right;
            margin-top: 2em;
            margin-bottom: 4em;
        }
        .firma{
            text-align: right;
            margin-top: 2em;
            margin-bottom: 6em;
        }
        .pie{
            position: absolute;
            bottom: 2%;
        }
    </style>
</head>
<body>
    <h3 class="text-center" style="margin: 1em;margin-bottom: 2.5em;">
        DECLARACION JURADA DE NO ESTAR INCURSO EN CAUSALES
        <br>
         DE INCOMPATIBILIDAD O IMPEDIMENTO LABORAL
    </h3>
    <div class="parrafo">
        Yo, {{$item->docente->user->name}} identificado con DNI. Nro {{$item->docente->user->dni}} con Código IBM Nro 4247 del
Departamento Académico Dpto. de {{$item->docente->escuela->facultad->descripcion}} de {{$item->docente->escuela->descripcion}} Facultad de {{$item->docente->escuela->facultad->descripcion}}; en el marco del programa de
Homologación de la remuneración de los docentes universitarios, dispuesto por el D.U. Nro 033-2006 y D.S. Nro
019-2006-EF, DECLARO BAJO JURAMENTO Y EN HONOR A LA VERDAD, que:
    </div>
    <div class="parrafo">
        NO ESTOY INCURSO en causales de incompatibilidad laboral y NO TENGO impedimento para ejercer la docencia en
la Universidad Nacional de Trujillo, de conformidad con lo previsto en el capitulo VII de las Incompatibilidades e
Impedimentos, del Titulo VI: Los Profesores, del Estatuto Institucional vigente.

    </div>
    
    <div class="parrafo">
        Soy docente Nombrado, a {{$item->docente->modalidad->descripcion}} {{$item->docente->modalidad->horas}} H y NO desempeño cargo público o privado en horas que coincidan con
el horario establecido en la Universidad Nacional de Trujillo (De conformidad con los articulos 270ro y 277ro del Estatuto
Institucional vigente).
    </div>
    <div class="parrafo penultimo">
        EN CASO DE FALTAR A LA VERDAD ME SOMETO A LAS SANCIONES QUE SEAN APLICABLES DE
ACUERDO A LEY; ASIMISMO, DE ENCONTRARME INCURSO EN SITUACION DE INCOMPATIBILIDAD O
IMPEDIMENTO PARA EJERCER LA DOCENCIA EN LA U.N.T., ME SOMETO A LAS SANCIONES PREVISTAS
POR SU ESTATUTO, 
    </div>
    <div class="parrafo-final">
        Y AUTORIZO AL FUNCIONARIO COMPETENTE DISPONGA EL DESCUENTO DE MI PLANILLA DE HABERES,
DEL MONTO QUE LA UNIDAD DE REMUNERACIONES LIQUIDE COMO PAGOS INDEBIDOS POR EL LAPSO
DE TIEMPO LABORADO ILEGALMENTE.
    </div>
    <div class="fecha">
        {{'Trujillo, '.date('d').' de '.date('M').' del '.date('Y')}}
    </div>
    <div class="firma">
        __________________________________
        <br>
        <br>
        FIRMA DEL DECLARANTE
        <br>
        <br>
        DNI: {{$item->docente->user->dni}}
    </div>

    <div class="pie">
        Nota: Los docentes deben suscribir de forma obligatoria el presente formato en cada Semestre Académico, en el reverso de la Declaracion de Carga Horaria Asignada
    </div>
</body>

</html>