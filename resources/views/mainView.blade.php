
<!doctype html>
<html>
<head>
    <link href="css/button.css" rel="stylesheet" >
    <title>TOP 1 REZI</title>
    <meta name="description" content="Rezi">
</head>
<body>
СЕЙЧАС ТОП 1 РЭЗИ ЭТО: {{$topOneRezi}}

<script>
    function isNumeric(num){
        return !isNaN(num)
    }
    var table = @json($topArray);
    var surnames = @json($table);
    var funNames = @json($funNames);


    function topFunc(inp){
        var youtop_div = document.getElementById("youtop");
        var found=false;
        if (!inp){
            alert('empty form');
        }

        //console.log(table);
        else if (isNumeric(inp)){
            for (let i = 0; i < table.length; i++) {
                if (table[i]['studentCardNumber']==inp){
                    youtop_div.innerHTML='ТЫ ТОП '+(i+1)+' РЭЗИ';
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


<br>Номер студака или фамилия
<form name="who">
    <input type="text" name="key"></input>
    <input type="button" id="Button" name="send" value="Отправить" onclick="topFunc(document.who.key.value)">
    <button class="button-49" role="button" onclick="topFunc(document.who.key.value)">УЗНАТЬ</button>
</form>

<br><br>
<div id="youtop"></div>


</body>
</html>
