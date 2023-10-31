function showHideRow(row) {
  // Encontre o próximo elemento com a classe 'hidden_row' a partir do elemento clicado
  var hiddenRow = $(row).next('.hidden_row');

  // Alternar a exibição desse elemento
  hiddenRow.toggle();
}

let formCount = 1;
function moreForm() {
    formCount++;
    const newForm = document.getElementById('newForm');
    const morePats = document.createElement('FORM');
    morePats.method='POST';
    morePats.classList.add('formCadastro');
    morePats.id = `form-${formCount}`;

    morePats.innerHTML = 
    `
    <div class="rowForm">
    <div class="colForm">
        <label for="cod">CÓDIGO</label><br>
        <input type="text" name="cod" required>
    </div>
    <div class="colForm">
        <label for="item">ITEM</label><br>
        <input type="text" name="item" id="item-${formCount}" required>
    </div>
    <div class="colForm">
        <label for="marca">MARCA</label><br>
        <input type="text" name="marca" id="marca-${formCount}">
    </div>
    <div class="colForm">
        <label for="modelo">MODELO</label><br>
        <input type="text" name="modelo" id="modelo-${formCount}">
    </div>
    <div class="colForm">
        <label for="condicao">CONDIÇÃO</label><br>
        <select name="condicao">
            <option value="" title="" selected="selected"></option>
            <option value="ÓTIMO" title="ÓTIMO">ÓTIMO</option>
            <option value="BOM" title="BOM">BOM</option>
            <option value="REGULAR" title="REGULAR">REGULAR</option>
            <option value="RUIM" title="RUIM">RUIM</option>
            <option value="INSERVÍVEL" title="INSERVÍVEL">INSERVÍVEL</option>
        </select>
    </div>
    </div>
    <div class="rowForm">
    <div class="colForm">
        <label for="local">LOCAL</label><br>
        <input type="text" name="local" id="local-${formCount}" required>
    </div>
    <div class="colForm">
        <label for="ue">UE</label><br>
        <input type="text" name="ue" id="ue-${formCount}" required>
    </div>
    <div class="colForm">
        <label for="valor">VALOR</label><br>
        <input type="text" name="valor" id="valor-${formCount}">
    </div>
    <div class="colForm">
        <label for="dataAquisit">DATA AQUISIÇÃO</label><br>
        <input type="date" name="dataAquisit" id="aquisicao-${formCount}">
    </div>
    <div class="colForm">
        <label for="cor">COR</label><br>
        <input type="text" name="cor" id="cor-${formCount}">
    </div>
    </div>
    <div class="rowForm desk">
    <div class="colForm">
        <label for="largura">Largura</label><br>
        <input type="number" name="largura">
        <select name="undMedLarg">
            <option value="" title="" selected="selected"></option>
            <option value="mm" title="mm">MM</option>
            <option value="cm" title="cm">CM</option>
            <option value="m" title="m">M</option>
            <option value="km" title="km">KM</option>
        </select>
    </div>
    <div class="colForm">
        <label for="altura">Altura</label><br>
        <input type="number" name="altura">
        <select name="undMedAlt">
            <option value="" title="" selected="selected"></option>
            <option value="mm" title="mm">MM</option>
            <option value="cm" title="cm">CM</option>
            <option value="m" title="m">M</option>
            <option value="km" title="km">KM</option>
        </select>
    </div>
    <div class="colForm">
        <label for="comprimento">Comprimento</label><br>
        <input type="number" name="comprimento">
        <select name="undMedCompr">
            <option value="" title="" selected="selected"></option>
            <option value="mm" title="mm">MM</option>
            <option value="cm" title="cm">CM</option>
            <option value="m" title="m">M</option>
            <option value="km" title="km">KM</option>
        </select>
    </div>
    <div class="colForm">
        <label for="espessura">espessura</label><br>
        <input type="number" name="espessura">
        <select name="undMedEspe">
            <option value="" title="" selected="selected"></option>
            <option value="mm" title="mm">MM</option>
            <option value="cm" title="cm">CM</option>
            <option value="m" title="m">M</option>
            <option value="km" title="km">KM</option>
        </select>
    </div>
    <div class="colForm">
        <label for="profundidade">profundidade</label><br>
        <input type="number" name="profundidade">
        <select name="undMedProfund">
            <option value="" title="" selected="selected"></option>
            <option value="mm" title="mm">MM</option>
            <option value="cm" title="cm">CM</option>
            <option value="m" title="m">M</option>
            <option value="km" title="km">KM</option>
        </select>
    </div>
    </div>
    <div class="rowForm desk">
    <div class="colForm">
        <label for="largTampo">largura do tampo</label><br>
        <input  type="number" name="largTampo">
        <select name="undMedLargTampo">
            <option value="" title="" selected="selected"></option>
            <option value="mm" title="mm">MM</option>
            <option value="cm" title="cm">CM</option>
            <option value="m" title="m">M</option>
            <option value="km" title="km">KM</option>
        </select>
    </div>
    <div class="colForm">
        <label for="compTampo">comprimento do Tampo</label><br>
        <input type="number" name="compTampo">
        <select name="undMedCompTampo">
            <option value="" title="" selected="selected"></option>
            <option value="mm" title="mm">MM</option>
            <option value="cm" title="cm">CM</option>
            <option value="m" title="m">M</option>
            <option value="km" title="km">KM</option>
        </select>
    </div>
    <div class="colForm">
        <label for="espessuraTampo">espessura do tampo</label><br>
        <input type="number" name="espessuraTampo">
        <select name="undMedEspeTampo">
            <option value="" title="" selected="selected"></option>
            <option value="mm" title="mm">MM</option>
            <option value="cm" title="cm">CM</option>
            <option value="m" title="m">M</option>
            <option value="km" title="km">KM</option>
        </select>
    </div>
    <div class="colForm">
        <label for="altPernas">Altura das pernas</label><br>
        <input type="number" name="altPernas">
        <select name="undMedAltPernas">
            <option value="" title="" selected="selected"></option>
            <option value="mm" title="mm">MM</option>
            <option value="cm" title="cm">CM</option>
            <option value="m" title="m">M</option>
            <option value="km" title="km">KM</option>
        </select>
    </div>
    <div class="colForm">
        <label for="espessuraPernas">espessura das pernas</label><br>
        <input type="number" name="espessuraPernas">
        <select name="undMedEspesPernas">
            <option value="" title="" selected="selected"></option>
            <option value="mm" title="mm">MM</option>
            <option value="cm" title="cm">CM</option>
            <option value="m" title="m">M</option>
            <option value="km" title="km">KM</option>
        </select>
    </div>
    </div>
    <div class="rowForm desk">
    <div class="colForm">
        <label for="largPernas">Largura das pernas</label><br>
        <input type="number" name="largPernas">
        <select name="undMedLargPernas">
            <option value="" title="" selected="selected"></option>
            <option value="mm" title="mm">MM</option>
            <option value="cm" title="cm">CM</option>
            <option value="m" title="m">M</option>
            <option value="km" title="km">KM</option>
        </select>
    </div>
    </div>
    <div class="rowForm">
    <div class="colForm">
        <label for="qtdPernas">qtd. de pernas</label><br>
        <input type="number" name="qtdPernas" id="qtdPerna-${formCount}">
    </div>
    <div class="colForm">
        <label for="qtdPortas">qtd. de portas</label><br>
        <input type="number" name="qtdPortas" id="qtdPorta-${formCount}">
    </div>
    <div class="colForm">
        <label for="qtdPrateleiras">qtd. de prateleiras</label><br>
        <input type="number" name="qtdPrateleiras" id="qtdPrate-${formCount}">
    </div>
    <div class="colForm">
        <label for="qtdGavetas">qtd. de gavetas</label><br>
        <input type="number" name="qtdGavetas" id="qtdGav-${formCount}">
    </div>
    <div class="colForm">
        <label for="qtdHelices">qtd. de helices</label><br>
        <input type="number" name="qtdHelices" id="qtdHelice-${formCount}">
    </div>
    </div>
    <div class="rowForm">
    <div class="colForm">
        <label for="qtdVelox">qtd. de velocidades</label><br>
        <input type="number" name="qtdVelox" id="qtdVelox-${formCount}">
    </div>
    <div class="colForm radio">
        <label>CHAVE</label>
        <div class="inptRadio">
            <input type="radio" name="chave" id="sim" value="SIM">
            <label for="sim">SIM</label><br>
            <input type="radio" name="chave" id="nao" value="NÃO">
            <label for="nao">não</label><br>
        </div>
    </div>
    <div class="colForm">
        <label for="telaPolegadas">Polegadas (tela)</label><br>
        <input type="number" name="telaPolegadas" id="qtdPol-${formCount}">
    </div>
    </div>
    <div class="rowForm">
    <div class="colForm">
        <label for="arCondBTU">BTUs (Ar condicionado)</label><br>
        <input type="number" name="arCondBTU" id="btu-${formCount}">
    </div>
    <div class="colForm">
        <label for="infoAdd">Informação adicional</label><br>
        <input type="text" name="infoAdd" id="addInfo">
    </div>
    </div>
    <div class="btnForm">
    <span class="spanBtn"><i class="fas fa-paper-plane"></i><input class="button cadastro" type="submit" value="CADASTRAR"></span>
    <span class="spanBtn"><i class="fas fa-plus"></i><input class="button moreItem" type="button" value="+ITEM" onclick="moreForm()"></span>
    <span class="spanBtn"><i class="fas fa-file-import"></i><input class="button repeat" type="button" value="REPETIR" onclick="repeatItem(this.form, ${formCount})"></span>
    </div>
    `;
    newForm.appendChild(morePats);
}

function repeatItem(form, formNumber) {

    var srcItem = document.getElementById("item-1");
    var srcMarca = document.getElementById("marca-1");
    var srcModelo = document.getElementById("modelo-1");
    var srcLocal = document.getElementById("local-1");
    var srcUe = document.getElementById("ue-1");
    var srcAquisicao = document.getElementById("aquisicao-1");
    var srcValor = document.getElementById("valor-1");
    var srcCor = document.getElementById("cor-1");
    var srcPerna = document.getElementById("qtdPerna-1");
    var srcPorta = document.getElementById("qtdPorta-1");
    var srcPrateleira = document.getElementById("qtdPrate-1");
    var srcGaveta = document.getElementById("qtdGav-1");
    var srcHelice = document.getElementById("qtdHelice-1");
    var srcVeloc = document.getElementById("qtdVelox-1");
    var srcPolegada = document.getElementById("qtdPol-1");
    var srcBtu = document.getElementById("btu-1");
    var srcAddInfo = document.getElementById("addInfo-1");

    var dstItem = document.getElementById(`item-${formNumber}`);
    var dstMarca = document.getElementById(`marca-${formNumber}`);
    var dstModelo = document.getElementById(`modelo-${formNumber}`);
    var dstLocal = document.getElementById(`local-${formNumber}`);
    var dstUe = document.getElementById(`ue-${formNumber}`);
    var dstAquisicao = document.getElementById(`aquisicao-${formNumber}`);
    var dstValor = document.getElementById(`valor-${formNumber}`);
    var dstCor = document.getElementById(`cor-${formNumber}`);
    var dstPerna = document.getElementById(`qtdPerna-${formNumber}`);
    var dstPorta = document.getElementById(`qtdPorta-${formNumber}`);
    var dstPrateleira = document.getElementById(`qtdPrate-${formNumber}`);
    var dstGaveta = document.getElementById(`qtdGav-${formNumber}`);
    var dstHelice = document.getElementById(`qtdHelice-${formNumber}`);
    var dstVeloc = document.getElementById(`qtdVelox-${formNumber}`);
    var dstPolegada = document.getElementById(`qtdPol-${formNumber}`);
    var dstBtu = document.getElementById(`btu-${formNumber}`);
    var dstAddInfo = document.getElementById(`addInfo-${formNumber}`);

    if (dstItem) {
        dstItem.value = srcItem.value;
        dstMarca.value = srcMarca.value;
        dstModelo.value = srcModelo.value;
        dstLocal.value = srcLocal.value;
        dstUe.value = srcUe.value;
        dstAquisicao.value = srcAquisicao.value;
        dstValor.value = srcValor.value;
        dstCor.value = srcCor.value;
        dstPerna.value = srcPerna.value;
        dstPorta.value = srcPorta.value;
        dstPrateleira.value = srcPrateleira.value;
        dstGaveta.value = srcGaveta.value;
        dstHelice.value = srcHelice.value;
        dstVeloc.value = srcVeloc.value;
        dstPolegada.value = srcPolegada.value;
        dstBtu.value = srcBtu.value;
        dstAddInfo.value = srcAddInfo.value;
    } else {
      alert("Não há mais campos para copiar neste formulário.");
    }
  }
  
let k = [...document.getElementById('form-1').querySelectorAll("input[type=text]")].map(item => item.id);
console.log(k);