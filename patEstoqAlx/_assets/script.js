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
            <input id="cod-${formCount}" type="text" name="cod" required>
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
            <select id="condicao-${formCount}" name="condicao">
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
            <input type="number" name="largura" id="largura-${formCount}">
            <select name="undMedLarg" id="undMedLarg-${formCount}">
                <option value="" title="" selected="selected"></option>
                <option value="mm" title="mm">MM</option>
                <option value="cm" title="cm">CM</option>
                <option value="m" title="m">M</option>
                <option value="km" title="km">KM</option>
            </select>
        </div>
        <div class="colForm">
            <label for="altura">Altura</label><br>
            <input type="number" name="altura" id="altura-${formCount}">
            <select name="undMedAlt" id="undMedAlt-${formCount}">
                <option value="" title="" selected="selected"></option>
                <option value="mm" title="mm">MM</option>
                <option value="cm" title="cm">CM</option>
                <option value="m" title="m">M</option>
                <option value="km" title="km">KM</option>
            </select>
        </div>
        <div class="colForm">
            <label for="comprimento">Comprimento</label><br>
            <input type="number" name="comprimento" id="comprimento-${formCount}">
            <select name="undMedCompr" id="undMedCompr-${formCount}">
                <option value="" title="" selected="selected"></option>
                <option value="mm" title="mm">MM</option>
                <option value="cm" title="cm">CM</option>
                <option value="m" title="m">M</option>
                <option value="km" title="km">KM</option>
            </select>
        </div>
        <div class="colForm">
            <label for="espessura">espessura</label><br>
            <input type="number" name="espessura" id="espessura-${formCount}">
            <select name="undMedEspe" id="undMedEspe-${formCount}">
                <option value="" title="" selected="selected"></option>
                <option value="mm" title="mm">MM</option>
                <option value="cm" title="cm">CM</option>
                <option value="m" title="m">M</option>
                <option value="km" title="km">KM</option>
            </select>
        </div>
        <div class="colForm">
            <label for="profundidade">profundidade</label><br>
            <input type="number" name="profundidade" id="profundidade-${formCount}">
            <select name="undMedProfund" id="undMedProfund-${formCount}">
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
            <label for="diametro">diâmetro</label><br>
            <input  type="number" name="diametro" id="diametro-${formCount}">
            <select name="undMedDiametro" id="undMedDiametro-${formCount}">
                <option value="" title="" selected="selected"></option>
                <option value="mm" title="mm">MM</option>
                <option value="cm" title="cm">CM</option>
                <option value="m" title="m">M</option>
                <option value="km" title="km">KM</option>
            </select>
        </div>
        <div class="colForm">
            <label for="largTampo">largura do tampo</label><br>
            <input  type="number" name="largTampo" id="largTampo-${formCount}">
            <select name="undMedLargTampo" id="undMedLargTampo-${formCount}">
                <option value="" title="" selected="selected"></option>
                <option value="mm" title="mm">MM</option>
                <option value="cm" title="cm">CM</option>
                <option value="m" title="m">M</option>
                <option value="km" title="km">KM</option>
            </select>
        </div>
        <div class="colForm">
            <label for="compTampo">comprimento do Tampo</label><br>
            <input type="number" name="compTampo" id="compTampo-${formCount}">
            <select name="undMedCompTampo" id="undMedCompTampo-${formCount}">
                <option value="" title="" selected="selected"></option>
                <option value="mm" title="mm">MM</option>
                <option value="cm" title="cm">CM</option>
                <option value="m" title="m">M</option>
                <option value="km" title="km">KM</option>
            </select>
        </div>
        <div class="colForm">
            <label for="espessuraTampo">espessura do tampo</label><br>
            <input type="number" name="espessuraTampo" id="espessuraTampo-${formCount}">
            <select name="undMedEspeTampo" id="undMedEspeTampo-${formCount}">
                <option value="" title="" selected="selected"></option>
                <option value="mm" title="mm">MM</option>
                <option value="cm" title="cm">CM</option>
                <option value="m" title="m">M</option>
                <option value="km" title="km">KM</option>
            </select>
        </div>
        <div class="colForm">
            <label for="altPernas">Altura das pernas</label><br>
            <input type="number" name="altPernas" id="altPernas-${formCount}">
            <select name="undMedAltPernas" id="undMedAltPernas-${formCount}">
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
            <label for="espessuraPernas">espessura das pernas</label><br>
            <input type="number" name="espessuraPernas" id="espessuraPernas-${formCount}">
            <select name="undMedEspesPernas" id="undMedEspesPernas-${formCount}">
                <option value="" title="" selected="selected"></option>
                <option value="mm" title="mm">MM</option>
                <option value="cm" title="cm">CM</option>
                <option value="m" title="m">M</option>
                <option value="km" title="km">KM</option>
            </select>
        </div>
        <div class="colForm">
            <label for="largPernas">Largura das pernas</label><br>
            <input type="number" name="largPernas" id="largPernas-${formCount}">
            <select name="undMedLargPernas" id="undMedLargPernas-${formCount}">
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
                <input type="radio" name="chave-${formCount}" id="sim" value="SIM">
                <label for="sim">SIM</label><br>
                <input type="radio" name="chave-${formCount}" id="nao" value="NÃO">
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
            <input type="text" name="infoAdd" id="addInfo-${formCount}">
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

