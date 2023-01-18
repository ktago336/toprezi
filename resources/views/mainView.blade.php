
<!doctype html>
<html>
<head>
    <link href="css/button.css" rel="stylesheet" >
    <title>TOP 1 REZI</title>
    <meta name="description" content="Rezi">
    <meta name = "viewport" content = "width=device-width, initial-scale=1">
</head>
<body>
<h1 style="font-size:9vw;" align="center">СЕЙЧАС ТОП 1 РЭЗИ ЭТО: <div style="font-size:9vw;" class="rainbow-animated">{{$topOneRezi}}</div></h1>

<script>
    function isNumeric(num){
        return !isNaN(num)
    }
    var table = @json($topArray);
    var surnames = @json($table);
    var funNames = @json($funNames);


    function topFunc(inp){

        inp=inp.trim();

        var youtop_div = document.getElementById("youtop");
        var found=false;
        if (!inp){
            alert('empty form');
        }

        //console.log(table);
        else if (isNumeric(inp)){
            for (let i = 0; i < table.length; i++) {
                if (table[i]['studentCardNumber']==inp){
                    youtop_div.innerHTML=funNames[table[i]['studentCardNumber']]+' ТОП '+(i+1)+' РЭЗИ';
                    found=true;
                    {break;}
                }
            }
            if (!found){
                youtop_div.innerHTML='';
                alert('СТУДЕНТ НЕ НАЙДЕН');
            }
        }
        else if (!isNumeric(inp)){
            for (let i = 0; i < table.length; i++) {
                var sudentSurname=surnames[table[i]['studentCardNumber']];
                if (inp==sudentSurname){
                    youtop_div.innerHTML=funNames[table[i]['studentCardNumber']]+' ТОП '+(i+1)+' РЭЗИ';
                    found=true;
                    {break;}
                }
            }
            if (!found){
                youtop_div.innerHTML='';
                alert('СТУДЕНТ НЕ НАЙДЕН');
            }
        }

    }
</script>

<form name="who">

    <div class="page">
        <div class="field field_v1">
            <label for="first-name" class="ha-screen-reader">Ваша фамилия или номер студака</label>
            <input id="first-name" class="field__input" placeholder="e.g. Арцименя или 14130030", type="text", name="key"></input>
            <span class="field__label-wrap" aria-hidden="true">
      <span class="field__label">Ваша фамилия или номер студака</span>
    </span>

        </div>
    </div>
    <input class="button-46" type="button" id="Button" name="send" value="УЗНАТЬ ТОП СКОЛЬКО РЭЗИ ТЫ" onclick="topFunc(document.who.key.value)">

<br><br>
<div id="youtop"></div>


</body>
</html>
