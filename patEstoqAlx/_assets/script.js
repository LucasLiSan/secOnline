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
    morePats.action="patCadastro.php";
    morePats.classList.add('formCadastro');
    morePats.id = `form-${formCount}`;

    morePats.innerHTML = 
    `
    <div class="rowForm">
        <div class="colForm">
            <label for="cod">CÓDIGO</label><br>
            <input id="cod-${formCount}" type="text" name="cod-${formCount}" required>
        </div>
        <div class="colForm">
            <label for="item">ITEM</label><br>
            <input type="text" name="item-${formCount}" id="item-${formCount}" required>
        </div>
        <div class="colForm">
            <label for="marca">MARCA</label><br>
            <input type="text" name="marca-${formCount}" id="marca-${formCount}">
        </div>
        <div class="colForm">
            <label for="modelo">MODELO</label><br>
            <input type="text" name="modelo-${formCount}" id="modelo-${formCount}">
        </div>
        <div class="colForm">
            <label for="condicao">CONDIÇÃO</label><br>
            <select id="condicao-${formCount}" name="condicao-${formCount}">
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
            <input type="text" name="local-${formCount}" id="local-${formCount}" required>
        </div>
        <div class="colForm">
            <label for="ue">UE</label><br>
            <input type="text" name="ue-${formCount}" id="ue-${formCount}" required>
        </div>
        <div class="colForm">
            <label for="valor">VALOR</label><br>
            <input type="text" name="valor-${formCount}" id="valor-${formCount}">
        </div>
        <div class="colForm">
            <label for="dataAquisit">DATA AQUISIÇÃO</label><br>
            <input type="date" name="aquisicao-${formCount}" id="aquisicao-${formCount}">
        </div>
        <div class="colForm">
            <label for="cor">COR</label><br>
            <input type="text" name="cor-${formCount}" id="cor-${formCount}">
        </div>
    </div>
    <div class="rowForm desk">
        <div class="colForm">
            <label for="largura">Largura</label><br>
            <input type="number" name="largura-${formCount}" id="largura-${formCount}">
            <select name="undMedLarg-${formCount}" id="undMedLarg-${formCount}">
                <option value="" title="" selected="selected"></option>
                <option value="mm" title="mm">MM</option>
                <option value="cm" title="cm">CM</option>
                <option value="m" title="m">M</option>
                <option value="km" title="km">KM</option>
            </select>
        </div>
        <div class="colForm">
            <label for="altura">Altura</label><br>
            <input type="number" name="altura-${formCount}" id="altura-${formCount}">
            <select name="undMedAlt-${formCount}" id="undMedAlt-${formCount}">
                <option value="" title="" selected="selected"></option>
                <option value="mm" title="mm">MM</option>
                <option value="cm" title="cm">CM</option>
                <option value="m" title="m">M</option>
                <option value="km" title="km">KM</option>
            </select>
        </div>
        <div class="colForm">
            <label for="comprimento">Comprimento</label><br>
            <input type="number" name="comprimento-${formCount}" id="comprimento-${formCount}">
            <select name="undMedCompr-${formCount}" id="undMedCompr-${formCount}">
                <option value="" title="" selected="selected"></option>
                <option value="mm" title="mm">MM</option>
                <option value="cm" title="cm">CM</option>
                <option value="m" title="m">M</option>
                <option value="km" title="km">KM</option>
            </select>
        </div>
        <div class="colForm">
            <label for="espessura">espessura</label><br>
            <input type="number" name="espessura-${formCount}" id="espessura-${formCount}">
            <select name="undMedEspe-${formCount}" id="undMedEspe-${formCount}">
                <option value="" title="" selected="selected"></option>
                <option value="mm" title="mm">MM</option>
                <option value="cm" title="cm">CM</option>
                <option value="m" title="m">M</option>
                <option value="km" title="km">KM</option>
            </select>
        </div>
        <div class="colForm">
            <label for="profundidade">profundidade</label><br>
            <input type="number" name="profundidade-${formCount}" id="profundidade-${formCount}">
            <select name="undMedProfund-${formCount}" id="undMedProfund-${formCount}">
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
            <input  type="number" name="diametro-${formCount}" id="diametro-${formCount}">
            <select name="undMedDiametro-${formCount}" id="undMedDiametro-${formCount}">
                <option value="" title="" selected="selected"></option>
                <option value="mm" title="mm">MM</option>
                <option value="cm" title="cm">CM</option>
                <option value="m" title="m">M</option>
                <option value="km" title="km">KM</option>
            </select>
        </div>
        <div class="colForm">
            <label for="largTampo">largura do tampo</label><br>
            <input  type="number" name="largTampo-${formCount}" id="largTampo-${formCount}">
            <select name="undMedLargTampo-${formCount}" id="undMedLargTampo-${formCount}">
                <option value="" title="" selected="selected"></option>
                <option value="mm" title="mm">MM</option>
                <option value="cm" title="cm">CM</option>
                <option value="m" title="m">M</option>
                <option value="km" title="km">KM</option>
            </select>
        </div>
        <div class="colForm">
            <label for="compTampo">comprimento do Tampo</label><br>
            <input type="number" name="compTampo-${formCount}" id="compTampo-${formCount}">
            <select name="undMedCompTampo-${formCount}" id="undMedCompTampo-${formCount}">
                <option value="" title="" selected="selected"></option>
                <option value="mm" title="mm">MM</option>
                <option value="cm" title="cm">CM</option>
                <option value="m" title="m">M</option>
                <option value="km" title="km">KM</option>
            </select>
        </div>
        <div class="colForm">
            <label for="espessuraTampo">espessura do tampo</label><br>
            <input type="number" name="espessuraTampo-${formCount}" id="espessuraTampo-${formCount}">
            <select name="undMedEspeTampo-${formCount}" id="undMedEspeTampo-${formCount}">
                <option value="" title="" selected="selected"></option>
                <option value="mm" title="mm">MM</option>
                <option value="cm" title="cm">CM</option>
                <option value="m" title="m">M</option>
                <option value="km" title="km">KM</option>
            </select>
        </div>
        <div class="colForm">
            <label for="altPernas">Altura das pernas</label><br>
            <input type="number" name="altPernas-${formCount}" id="altPernas-${formCount}">
            <select name="undMedAltPernas-${formCount}" id="undMedAltPernas-${formCount}">
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
            <input type="number" name="espessuraPernas-${formCount}" id="espessuraPernas-${formCount}">
            <select name="undMedEspesPernas-${formCount}" id="undMedEspesPernas-${formCount}">
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
            <input type="number" name="qtdPerna-${formCount}" id="qtdPerna-${formCount}">
        </div>
        <div class="colForm">
            <label for="qtdPortas">qtd. de portas</label><br>
            <input type="number" name="qtdPorta-${formCount}" id="qtdPorta-${formCount}">
        </div>
        <div class="colForm">
            <label for="qtdPrateleiras">qtd. de prateleiras</label><br>
            <input type="number" name="qtdPrate-${formCount}" id="qtdPrate-${formCount}">
        </div>
        <div class="colForm">
            <label for="qtdGavetas">qtd. de gavetas</label><br>
            <input type="number" name="qtdGav-${formCount}" id="qtdGav-${formCount}">
        </div>
        <div class="colForm">
            <label for="qtdHelices">qtd. de helices</label><br>
            <input type="number" name="qtdHelice-${formCount}" id="qtdHelice-${formCount}">
        </div>
    </div>
    <div class="rowForm">
        <div class="colForm">
            <label for="qtdVelox">qtd. de velocidades</label><br>
            <input type="number" name="qtdVelox-${formCount}" id="qtdVelox-${formCount}">
        </div>
        <div class="colForm">
            <label for="chave">CHAVE</label><br>
            <select id="chave-${formCount}" name="chave-${formCount}">
                <option value="" title="" selected="selected"></option>
                <option value="SIM" title="SIM">SIM</option>
                <option value="NÃO" title="NÃO">NÃO</option>
            </select>
        </div>
        <div class="colForm">
            <label for="qtdPol">Polegadas (tela)</label><br>
            <input type="number" name="qtdPol-${formCount}" id="qtdPol-${formCount}">
        </div>
    </div>
    <div class="rowForm">
        <div class="colForm">
            <label for="arCondBTU">BTUs (Ar condicionado)</label><br>
            <input type="number" name="btu-${formCount}" id="btu-${formCount}">
        </div>
        <div class="colForm">
            <label for="infoAdd">Informação adicional</label><br>
            <input type="text" name="addInfo-${formCount}" id="addInfo-${formCount}">
        </div>
    </div>
    <div class="btnForm">
    <span class="spanBtn"><i class="fas fa-paper-plane"></i><input class="button cadastro" type="submit" value="CADASTRAR"></span>
    <span class="spanBtn"><i class="fas fa-plus"></i><input class="button moreItem" type="button" value="+ITEM" onclick="moreForm()"></span>
    <span class="spanBtn"><i class="fas fa-file-import"></i><input class="button repeat" type="button" value="REPETIR" onclick="repeatItem(this.form, ${formCount})"></span>
    </div>
    `;
    const hiddenInput = document.createElement('input');
    hiddenInput.type = 'hidden';
    hiddenInput.name = 'formCount';
    hiddenInput.value = formCount;
    morePats.appendChild(hiddenInput);
    newForm.appendChild(morePats);
}

