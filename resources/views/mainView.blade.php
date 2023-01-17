
<!doctype html>
<html>
<head>
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
        if (!inp){
            alert('empty form');
        }
        var found=false;
        //console.log(table);
        if (isNumeric(inp)){
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
        if (!isNumeric(inp)){
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
</form>

<br><br>
<div id="youtop"></div>


</body>
</html>
