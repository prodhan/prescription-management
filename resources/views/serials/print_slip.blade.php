<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Serial</title>

    <style>
        @page { width: 300px }
        .main{width: 300px; margin: 0 auto;}

        @media print {
            /* All your print styles go here */
            #header, #footer, #nav { display: none !important; }

        }



    </style>

    <!-- Custom styles for this document -->
    <link href='https://fonts.googleapis.com/css?family=Tangerine:700' rel='stylesheet' type='text/css'>
    <style>
        body   { font-family: serif }
        h1     { font-family: 'Times New Roman', "Arial Unicode MS"; font-size: 22pt;}
        h2, h3 { font-family: 'Calibri', Arial; font-size: 24pt; line-height: 7mm }
        h4     { font-size: 32pt; line-height: 14mm }
        h2 + p { font-size: 18pt; line-height: 4mm }
        h3 + p { font-size: 14pt; line-height: 7mm }
        li     { font-size: 11pt; line-height: 5mm }
        h1      { margin: 0 }
        h1 + ul { margin: 2mm 0 5mm }
        h2, h3  { margin: 0 3mm 3mm 0; float: left }
        h2 + p,
        h3 + p  { margin: 0 0 3mm 50mm }
        h4      { margin: 2mm 0 0 50mm; border-bottom: 2px solid black }
        h4 + ul { margin: 5mm 0 0 50mm }
        article { border: 4px double black; padding: 1mm 1mm; border-radius: 3mm; margin-top: 2px; }
    </style>
</head>

<!-- Set "A5", "A4" or "A3" for class name -->
<!-- Set also "landscape" if you need -->
<body class="main">

<!-- Each sheet element should have the class "sheet" -->
<!-- "padding-**mm" is optional: you can set 10, 15, 20 or 25 -->
<section class="sheet">

    <article style="text-align: center" id="DivIdToPrint">
        <h1>{{$settings['org_name']}}</h1>
        {{$settings['org_address']}}
        <hr>
        <h1 align="center">SL: # {{$data->serial}}</h1>
        <small>{{now()}}</small>
        <p align="center">P. Name: {{$data->name}}</p>
        <p align="center">Dr. Name: {{$data->dr_name}}</p>
        <center>
            {!! DNS1D::getBarcodeHTML($data->id, "C128", 2, 24) !!}
            <small>{{$data->id}}</small>
        </center>

    </article>

</section>
<input type='button' id='btn' value='Print' onclick='printData();'>
<a href="{{url('serials')}}"><button>Go to Dashboard</button></a>


<script>
    function printData()
    {
        var divToPrint=document.getElementById("DivIdToPrint");
        newWin= window.open("");
        newWin.document.write(divToPrint.outerHTML);
        newWin.print();
        newWin.close();
    }

    $('button').on('click',function(){
        printData();
    })
</script>

</body>


</html>