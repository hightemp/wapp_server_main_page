<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Главная страница - РЕДАКТИРОВАНИЕ - <?php echo $SERVER_NAME ?></title>
</head>

<body onload="initDoc();">

    <script type="text/javascript"></script>
    <style type="text/css"></style>

    <form class="compForm" name="compForm" method="post" action="index.php" onsubmit="if(validateMode()){this.myDoc.value=oDoc.innerHTML;return true;}return false;">
        <div class="top-panel">
            <div></div>
            <span id="editMode"><input id="switchBox" type="checkbox" name="switchMode" onchange="setDocMode(this.checked);"> <label for="switchBox">Показать HTML</label></span>
            <span><input class="button" id="btn" type="submit" value="Принять"></span>
        </div>
        <input type="hidden" name="myDoc">
        <div id="toolBar1">
            <select onchange="formatDoc('formatblock',this[this.selectedIndex].value);this.selectedIndex=0;">
                <option selected="">- формат -</option>
                <option value="h1">Title 1 &lt;h1&gt;</option>
                <option value="h2">Title 2 &lt;h2&gt;</option>
                <option value="h3">Title 3 &lt;h3&gt;</option>
                <option value="h4">Title 4 &lt;h4&gt;</option>
                <option value="h5">Title 5 &lt;h5&gt;</option>
                <option value="h6">Подзаголовок &lt;h6&gt;</option>
                <option value="p">Параграф &lt;p&gt;</option>
                <option value="pre">Preformatted &lt;pre&gt;</option>
            </select>
            <select onchange="formatDoc('fontname',this[this.selectedIndex].value);this.selectedIndex=0;">
                <option class="heading" selected="">- шрифт -</option>
                <option>Arial</option>
                <option>Arial Black</option>
                <option>Courier New</option>
                <option>Times New Roman</option>
            </select>
            <select onchange="formatDoc('fontsize',this[this.selectedIndex].value);this.selectedIndex=0;">
                <option class="heading" selected="">- размер -</option>
                <option value="1">Малюсенький</option>
                <option value="2">Маленький</option>
                <option value="3">Нормальный</option>
                <option value="4">Большеват</option>
                <option value="5">Большой</option>
                <option value="6">Большущий</option>
                <option value="7">Огромный</option>
            </select>
            <select onchange="formatDoc('forecolor',this[this.selectedIndex].value);this.selectedIndex=0;">
                <option class="heading" selected="">- цвет -</option>
                <option value="red">Красный</option>
                <option value="blue">Синий</option>
                <option value="green">Зелёный</option>
                <option value="black">Чёрный</option>
            </select>
            <select onchange="formatDoc('backcolor',this[this.selectedIndex].value);this.selectedIndex=0;">
                <option class="heading" selected="">- фон -</option>
                <option value="#faa">Красень</option>
                <option value="#afa">Зелень</option>
                <option value="#aaf">Синь</option>
            </select>
        </div>
        <div id="toolBar2">
            <img class="intLink" title="Чистка" onclick="if(validateMode()&amp;&amp;confirm('Вы уверены?')){oDoc.innerHTML=sDefTxt};" src="data:image/gif;base64,R0lGODlhFgAWAIQbAD04KTRLYzFRjlldZl9vj1dusY14WYODhpWIbbSVFY6O7IOXw5qbms+wUbCztca0ccS4kdDQjdTLtMrL1O3YitHa7OPcsd/f4PfvrvDv8Pv5xv///////////////////yH5BAEKAB8ALAAAAAAWABYAAAV84CeOZGmeaKqubMteyzK547QoBcFWTm/jgsHq4rhMLoxFIehQQSAWR+Z4IAyaJ0kEgtFoLIzLwRE4oCQWrxoTOTAIhMCZ0tVgMBQKZHAYyFEWEV14eQ8IflhnEHmFDQkAiSkQCI2PDC4QBg+OAJc0ewadNCOgo6anqKkoIQA7">
            <img class="intLink" title="Печать" onclick="printDoc();" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABYAAAAWCAYAAADEtGw7AAAABGdBTUEAALGPC/xhBQAAAAZiS0dEAP8A/wD/oL2nkwAAAAlwSFlzAAALEwAACxMBAJqcGAAAAAd0SU1FB9oEBxcZFmGboiwAAAAIdEVYdENvbW1lbnQA9syWvwAAAuFJREFUOMvtlUtsjFEUx//n3nn0YdpBh1abRpt4LFqtqkc3jRKkNEIsiIRIBBEhJJpKlIVo4m1RRMKKjQiRMJRUqUdKPT71qpIpiRKPaqdF55tv5vvusZjQTjOlseUkd3Xu/3dPzusC/22wtu2wRn+jG5So/OCDh8ycMJDflehMlkJkVK7KUYN+ufzA/RttH76zaVocDptRxzQtNi3mRWuPc+6cKtlXZ/sddP2uu9uXlmYXZ6Qm8v4Tz8lhF1H+zDQXt7S8oLMXtbF4e8QaFHjj3kbP2MzkktHpiTjp9VH6iHiA+whtAsX5brpwueMGdONdf/2A4M7ukDs1JW662+XkqTkeUoqjKtOjm2h53YFL15pSJ04Zc94wdtibr26fXlC2mzRvBccEbz2kiRFD414tKMlEZbVGT33+qCoHgha81SWYsew0r1uzfNylmtpx80pngQQ91LwVk2JGvGnfvZG6YcYRAT16GFtW5kKKfo1EQLtfh5Q2etT0BIWF+aitq4fDbk+ImYo1OxvGF03waFJQvBCkvDffRyEtxQiFFYgAZTHS0zwAGD7fG5TNnYNTp8/FzvGwJOfmgG7GOx0SAKKgQgDMgKBI0NJGMEImpGDk5+WACEwEd0ywblhGUZ4Hw5OdUekRBLT7DTgdEgxACsIznx8zpmWh7k4rkpJcuHDxCul6MDsmmBXDlWCH2+XozSgBnzsNCEE4euYV4pwCpsWYPW0UHDYBKSWu1NYjENDReqtKjwn2+zvtTc1vMSTB/mvev/WEYSlASsLimcOhOBJxw+N3aP/SjefNL5GePZmpu4kG7OPr1+tOfPyUu3BecWYKcwQcDFmwFKAUo90fhKDInBCAmvqnyMgqUEagQwCoHBDc1rjv9pIlD8IbVkz6qYViIBQGTJPx4k0XpIgEZoRN1Da0cij4VfR0ta3WvBXH/rjdCufv6R2zPgPH/e4pxSBCpeatqPrjNiso203/5s/zA171Mv8+w1LOAAAAAElFTkSuQmCC">
            <img class="intLink" title="Назад" onclick="formatDoc('undo');" src="data:image/gif;base64,R0lGODlhFgAWAOMKADljwliE33mOrpGjuYKl8aezxqPD+7/I19DV3NHa7P///////////////////////yH5BAEKAA8ALAAAAAAWABYAAARR8MlJq7046807TkaYeJJBnES4EeUJvIGapWYAC0CsocQ7SDlWJkAkCA6ToMYWIARGQF3mRQVIEjkkSVLIbSfEwhdRIH4fh/DZMICe3/C4nBQBADs=">
            <img class="intLink" title="Вперёд" onclick="formatDoc('redo');" src="data:image/gif;base64,R0lGODlhFgAWAMIHAB1ChDljwl9vj1iE34Kl8aPD+7/I1////yH5BAEKAAcALAAAAAAWABYAAANKeLrc/jDKSesyphi7SiEgsVXZEATDICqBVJjpqWZt9NaEDNbQK1wCQsxlYnxMAImhyDoFAElJasRRvAZVRqqQXUy7Cgx4TC6bswkAOw==">
            <img class="intLink" title="Удалить форматирование" onclick="formatDoc('removeFormat')" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABYAAAAWCAYAAADEtGw7AAAABGdBTUEAALGPC/xhBQAAAAZiS0dEAP8A/wD/oL2nkwAAAAlwSFlzAAAOxAAADsQBlSsOGwAAAAd0SU1FB9oECQMCKPI8CIIAAAAIdEVYdENvbW1lbnQA9syWvwAAAuhJREFUOMtjYBgFxAB501ZWBvVaL2nHnlmk6mXCJbF69zU+Hz/9fB5O1lx+bg45qhl8/fYr5it3XrP/YWTUvvvk3VeqGXz70TvbJy8+Wv39+2/Hz19/mGwjZzuTYjALuoBv9jImaXHeyD3H7kU8fPj2ICML8z92dlbtMzdeiG3fco7J08foH1kurkm3E9iw54YvKwuTuom+LPt/BgbWf3//sf37/1/c02cCG1lB8f//f95DZx74MTMzshhoSm6szrQ/a6Ir/Z2RkfEjBxuLYFpDiDi6Af///2ckaHBp7+7wmavP5n76+P2ClrLIYl8H9W36auJCbCxM4szMTJac7Kza////R3H1w2cfWAgafPbqs5g7D95++/P1B4+ECK8tAwMDw/1H7159+/7r7ZcvPz4fOHbzEwMDwx8GBgaGnNatfHZx8zqrJ+4VJBh5CQEGOySEua/v3n7hXmqI8WUGBgYGL3vVG7fuPK3i5GD9/fja7ZsMDAzMG/Ze52mZeSj4yu1XEq/ff7W5dvfVAS1lsXc4Db7z8C3r8p7Qjf///2dnZGxlqJuyr3rPqQd/Hhyu7oSpYWScylDQsd3kzvnH738wMDzj5GBN1VIWW4c3KDon7VOvm7S3paB9u5qsU5/x5KUnlY+eexQbkLNsErK61+++VnAJcfkyMTIwffj0QwZbJDKjcETs1Y8evyd48toz8y/ffzv//vPP4veffxpX77z6l5JewHPu8MqTDAwMDLzyrjb/mZm0JcT5Lj+89+Ybm6zz95oMh7s4XbygN3Sluq4Mj5K8iKMgP4f0////fv77//8nLy+7MCcXmyYDAwODS9jM9tcvPypd35pne3ljdjvj26+H2dhYpuENikgfvQeXNmSl3tqepxXsqhXPyc666s+fv1fMdKR3TK72zpix8nTc7bdfhfkEeVbC9KhbK/9iYWHiErbu6MWbY/7//8/4//9/pgOnH6jGVazvFDRtq2VgiBIZrUTIBgCk+ivHvuEKwAAAAABJRU5ErkJggg==">
            <img class="intLink" title="Жирный" onclick="formatDoc('bold');" src="data:image/gif;base64,R0lGODlhFgAWAID/AMDAwAAAACH5BAEAAAAALAAAAAAWABYAQAInhI+pa+H9mJy0LhdgtrxzDG5WGFVk6aXqyk6Y9kXvKKNuLbb6zgMFADs=">
            <img class="intLink" title="Italic" onclick="formatDoc('italic');" src="data:image/gif;base64,R0lGODlhFgAWAKEDAAAAAF9vj5WIbf///yH5BAEAAAMALAAAAAAWABYAAAIjnI+py+0Po5x0gXvruEKHrF2BB1YiCWgbMFIYpsbyTNd2UwAAOw==">
            <img class="intLink" title="Подчёркивание" onclick="formatDoc('underline');" src="data:image/gif;base64,R0lGODlhFgAWAKECAAAAAF9vj////////yH5BAEAAAIALAAAAAAWABYAAAIrlI+py+0Po5zUgAsEzvEeL4Ea15EiJJ5PSqJmuwKBEKgxVuXWtun+DwxCCgA7">
            <img class="intLink" title="Выровнять слева" onclick="formatDoc('justifyleft');" src="data:image/gif;base64,R0lGODlhFgAWAID/AMDAwAAAACH5BAEAAAAALAAAAAAWABYAQAIghI+py+0Po5y02ouz3jL4D4JMGELkGYxo+qzl4nKyXAAAOw==">
            <img class="intLink" title="Выровнять центр" onclick="formatDoc('justifycenter');" src="data:image/gif;base64,R0lGODlhFgAWAID/AMDAwAAAACH5BAEAAAAALAAAAAAWABYAQAIfhI+py+0Po5y02ouz3jL4D4JOGI7kaZ5Bqn4sycVbAQA7">
            <img class="intLink" title="Выровнять справа" onclick="formatDoc('justifyright');" src="data:image/gif;base64,R0lGODlhFgAWAID/AMDAwAAAACH5BAEAAAAALAAAAAAWABYAQAIghI+py+0Po5y02ouz3jL4D4JQGDLkGYxouqzl43JyVgAAOw==">
            <img class="intLink" title="Нумерованный список" onclick="formatDoc('insertorderedlist');" src="data:image/gif;base64,R0lGODlhFgAWAMIGAAAAADljwliE35GjuaezxtHa7P///////yH5BAEAAAcALAAAAAAWABYAAAM2eLrc/jDKSespwjoRFvggCBUBoTFBeq6QIAysQnRHaEOzyaZ07Lu9lUBnC0UGQU1K52s6n5oEADs=">
            <img class="intLink" title="Пунктирный список" onclick="formatDoc('insertunorderedlist');" src="data:image/gif;base64,R0lGODlhFgAWAMIGAAAAAB1ChF9vj1iE33mOrqezxv///////yH5BAEAAAcALAAAAAAWABYAAAMyeLrc/jDKSesppNhGRlBAKIZRERBbqm6YtnbfMY7lud64UwiuKnigGQliQuWOyKQykgAAOw==">
            <img class="intLink" title="Цитата" onclick="formatDoc('formatblock','blockquote');" src="data:image/gif;base64,R0lGODlhFgAWAIQXAC1NqjFRjkBgmT9nqUJnsk9xrFJ7u2R9qmKBt1iGzHmOrm6Sz4OXw3Odz4Cl2ZSnw6KxyqO306K63bG70bTB0rDI3bvI4P///////////////////////////////////yH5BAEKAB8ALAAAAAAWABYAAAVP4CeOZGmeaKqubEs2CekkErvEI1zZuOgYFlakECEZFi0GgTGKEBATFmJAVXweVOoKEQgABB9IQDCmrLpjETrQQlhHjINrTq/b7/i8fp8PAQA7">
            <img class="intLink" title="Удалить отступ" onclick="formatDoc('outdent');" src="data:image/gif;base64,R0lGODlhFgAWAMIHAAAAADljwliE35GjuaezxtDV3NHa7P///yH5BAEAAAcALAAAAAAWABYAAAM2eLrc/jDKCQG9F2i7u8agQgyK1z2EIBil+TWqEMxhMczsYVJ3e4ahk+sFnAgtxSQDqWw6n5cEADs=">
            <img class="intLink" title="Добавить отступ" onclick="formatDoc('indent');" src="data:image/gif;base64,R0lGODlhFgAWAOMIAAAAADljwl9vj1iE35GjuaezxtDV3NHa7P///////////////////////////////yH5BAEAAAgALAAAAAAWABYAAAQ7EMlJq704650B/x8gemMpgugwHJNZXodKsO5oqUOgo5KhBwWESyMQsCRDHu9VOyk5TM9zSpFSr9gsJwIAOw==">
            <img class="intLink" title="Гиперссылка" onclick="var sLnk=prompt('Введите ваш URL','http:\/\/');if(sLnk&amp;&amp;sLnk!=''&amp;&amp;sLnk!='http://'){formatDoc('createlink',sLnk)}" src="data:image/gif;base64,R0lGODlhFgAWAOMKAB1ChDRLY19vj3mOrpGjuaezxrCztb/I19Ha7Pv8/f///////////////////////yH5BAEKAA8ALAAAAAAWABYAAARY8MlJq7046827/2BYIQVhHg9pEgVGIklyDEUBy/RlE4FQF4dCj2AQXAiJQDCWQCAEBwIioEMQBgSAFhDAGghGi9XgHAhMNoSZgJkJei33UESv2+/4vD4TAQA7">
            <img class="intLink" title="Вырезать" onclick="formatDoc('cut');" src="data:image/gif;base64,R0lGODlhFgAWAIQSAB1ChBFNsRJTySJYwjljwkxwl19vj1dusYODhl6MnHmOrpqbmpGjuaezxrCztcDCxL/I18rL1P///////////////////////////////////////////////////////yH5BAEAAB8ALAAAAAAWABYAAAVu4CeOZGmeaKqubDs6TNnEbGNApNG0kbGMi5trwcA9GArXh+FAfBAw5UexUDAQESkRsfhJPwaH4YsEGAAJGisRGAQY7UCC9ZAXBB+74LGCRxIEHwAHdWooDgGJcwpxDisQBQRjIgkDCVlfmZqbmiEAOw==">
            <img class="intLink" title="Копировать" onclick="formatDoc('copy');" src="data:image/gif;base64,R0lGODlhFgAWAIQcAB1ChBFNsTRLYyJYwjljwl9vj1iE31iGzF6MnHWX9HOdz5GjuYCl2YKl8ZOt4qezxqK63aK/9KPD+7DI3b/I17LM/MrL1MLY9NHa7OPs++bx/Pv8/f///////////////yH5BAEAAB8ALAAAAAAWABYAAAWG4CeOZGmeaKqubOum1SQ/kPVOW749BeVSus2CgrCxHptLBbOQxCSNCCaF1GUqwQbBd0JGJAyGJJiobE+LnCaDcXAaEoxhQACgNw0FQx9kP+wmaRgYFBQNeAoGihCAJQsCkJAKOhgXEw8BLQYciooHf5o7EA+kC40qBKkAAAGrpy+wsbKzIiEAOw==">
            <img class="intLink" title="Вставить" onclick="formatDoc('paste');" src="data:image/gif;base64,R0lGODlhFgAWAIQUAD04KTRLY2tXQF9vj414WZWIbXmOrpqbmpGjudClFaezxsa0cb/I1+3YitHa7PrkIPHvbuPs+/fvrvv8/f///////////////////////////////////////////////yH5BAEAAB8ALAAAAAAWABYAAAWN4CeOZGmeaKqubGsusPvBSyFJjVDs6nJLB0khR4AkBCmfsCGBQAoCwjF5gwquVykSFbwZE+AwIBV0GhFog2EwIDchjwRiQo9E2Fx4XD5R+B0DDAEnBXBhBhN2DgwDAQFjJYVhCQYRfgoIDGiQJAWTCQMRiwwMfgicnVcAAAMOaK+bLAOrtLUyt7i5uiUhADs=">
        </div>
        <div id="textBox" contenteditable="true"><?php echo $sContent ?></div>
    </form>





    <script>
        var oDoc, sDefTxt;

        function initDoc() {
            oDoc = document.getElementById("textBox");
            sDefTxt = oDoc.innerHTML;
            if (document.compForm.switchBox.checked) {
                setDocMode(true);
            }
        }

        function formatDoc(sCmd, sValue) {
            if (validateMode()) {
                document.execCommand(sCmd, false, sValue);
                oDoc.focus();
            }
        }

        function validateMode() {
            if (!document.compForm.switchBox.checked) {
                return true;
            }
            alert("Uncheck \"Показать HTML\"."); /* убрать галочку из "Показать HTML" */
            oDoc.focus();
            return false;
        }

        function setDocMode(bToSource) {
            var oContent;
            if (bToSource) {
                oContent = document.createTextNode(oDoc.innerHTML);
                oDoc.innerHTML = "";
                var oPre = document.createElement("pre");
                oDoc.contentEditable = false;
                oPre.id = "sourceText";
                oPre.contentEditable = true;
                oPre.appendChild(oContent);
                oDoc.appendChild(oPre);
                document.execCommand("defaultParagraphSeparator", false, "div");
            } else {
                if (document.all) {
                    oDoc.innerHTML = oDoc.innerText;
                } else {
                    oContent = document.createRange();
                    oContent.selectNodeContents(oDoc.firstChild);
                    oDoc.innerHTML = oContent.toString();
                }
                oDoc.contentEditable = true;
            }
            oDoc.focus();
        }

        function printDoc() {
            if (!validateMode()) {
                return;
            }
            var oPrntWin = window.open("", "_blank", "width=450,height=470,left=400,top=100,menubar=yes,toolbar=no,location=no,scrollbars=yes");
            oPrntWin.document.open();
            oPrntWin.document.write("<!doctype html><html><head><title>Print<\/title><\/head><body onload=\"print();\">" + oDoc.innerHTML + "<\/body><\/html>");
            oPrntWin.document.close(); /*  */
        }
    </script>


</body>

</html>

<style>
    body {
        padding: 0;
        margin: 0;
    }

    svg:not(:root) {
        display: block;
    }

    .playable-code {
        background-color: #f4f7f8;
        border: none;
        border-left: 6px solid #558abb;
        border-width: medium medium medium 6px;
        color: #4d4e53;
        height: 100px;
        width: 90%;
        padding: 10px 10px 0;
    }

    .playable-canvas {
        border: 1px solid #4d4e53;
        border-radius: 2px;
    }

    .playable-buttons {
        text-align: right;
        width: 90%;
        padding: 5px 10px 5px 26px;
    }

    .compForm {
        width: calc(100% - 2px);
    }

    .button {
        padding: 5px;
        background: green;
        color: white;
        text-decoration: none;
        display: inline-block;
        width: 100%;
    }

    .top-panel {
        top: 0px;
        padding: 2px;
        position: sticky;
        background: rgba(0,0,0,0.1);
        display: grid;
        grid-template-columns: 1fr 200px 130px;
        height: 30px;
    }
</style>

<style>
    .content {
        display: none;
    }

    .content::after {
        display: block;
    }

    form {
        display: inline-block;
        background-color: rgba(180, 180, 180, .8);
        border: 1px solid rgba(155, 155, 155, .6);
    }

    .intLink {
        cursor: pointer;
    }

    img.intLink {
        border: 0;
    }

    #toolBar1 select {
        font-size: 10px;
        background-color: #eff;
    }

    #textBox {
        min-width: 500px;
        border: 1px solid rgba(155, 155, 155, .6);
        padding: 12px;
        overflow: scroll;
        background-color: #eff;
        height: calc(100vh - 30px - 26px - 18px - 40px);
    }

    #textBox #sourceText {
        padding: 0;
        margin: 0;
        max-width: 800px;
        min-height: 200px;
    }

    #switchBox,
    label,
    #btn {
        cursor: pointer;
    }
</style>