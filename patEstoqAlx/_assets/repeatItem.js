let formNumber = 1;
function repeatItem() {

    formNumber++;
    var srcItem = document.querySelector("#item-1");
    var srcMarca = document.querySelector("#marca-1");
    var srcModelo = document.querySelector("#modelo-1");
    var srcCondicao = document.querySelector("#condicao-1");
    var srcLocal = document.querySelector("#local-1");
    var srcUe = document.querySelector("#ue-1");
    var srcAquisicao = document.querySelector("#aquisicao-1");
    var srcValor = document.querySelector("#valor-1");
    var srcCor = document.querySelector("#cor-1");
    var srcLargura = document.querySelector("#largura-1");
    var srcUndMedLarg = document.querySelector("#undMedLarg-1");
    var srcAltura = document.querySelector("#altura-1");
    var srcUndMedAlt = document.querySelector("#undMedAlt-1");
    var srcComprimento = document.querySelector("#comprimento-1");
    var srcUndMedComp = document.querySelector("#undMedCompr-1");
    var srcEspessura = document.querySelector("#espessura-1");
    var srcUndMedEspe = document.querySelector("#undMedEspe-1");
    var srcProfundidade = document.querySelector("#profundidade-1");
    var srcUndMedProfund = document.querySelector("#undMedProfund-1");
    var srcDiametro = document.querySelector("#diametro-1");
    var srcUndMedDiametro = document.querySelector("#undMedDiametro-1");
    var srcLargTampo = document.querySelector("#largTampo-1");
    var srcUndMedLargTampo = document.querySelector("#undMedLargTampo-1");
    var srcCompTampo = document.querySelector("#compTampo-1");
    var srcUndMedCompTampo = document.querySelector("#undMedCompTampo-1");
    var srcEspessuraTampo = document.querySelector("#espessuraTampo-1");
    var srcUndMedEspeTampo = document.querySelector("#undMedEspeTampo-1");
    var srcAltPernas = document.querySelector("#altPernas-1");
    var srcUndMedAltPernas = document.querySelector("#undMedAltPernas-1");
    var srcEspessuraPernas = document.querySelector("#espessuraPernas-1");
    var srcUndMedEspesPernas = document.querySelector("#undMedEspesPernas-1");
    var srcPerna = document.querySelector("#qtdPerna-1");
    var srcPorta = document.querySelector("#qtdPorta-1");
    var srcPrateleira = document.querySelector("#qtdPrate-1");
    var srcGaveta = document.querySelector("#qtdGav-1");
    var srcHelice = document.querySelector("#qtdHelice-1");
    var srcVeloc = document.querySelector("#qtdVelox-1");
    var srcPolegada = document.querySelector("#qtdPol-1");
    var srcBtu = document.querySelector("#btu-1");
    var srcAddInfo = document.querySelector("#addInfo-1");
    var srcChave = document.querySelector("#chave-1");

    for (let i=2; i <= formNumber; i++){
        var dstItem = document.querySelector(`#item-${i}`);
        var dstMarca = document.querySelector(`#marca-${i}`);
        var dstModelo = document.querySelector(`#modelo-${i}`);
        var dstCondicao = document.querySelector(`#condicao-${i}`);
        var dstLocal = document.querySelector(`#local-${i}`);
        var dstUe = document.querySelector(`#ue-${i}`);
        var dstAquisicao = document.querySelector(`#aquisicao-${i}`);
        var dstValor = document.querySelector(`#valor-${i}`);
        var dstCor = document.querySelector(`#cor-${i}`);
        var dstLargura = document.querySelector(`#largura-${i}`);
        var dstUndMedLarg = document.querySelector(`#undMedLarg-${i}`);
        var dstAltura = document.querySelector(`#altura-${i}`);
        var dstUndMedAlt = document.querySelector(`#undMedAlt-${i}`);
        var dstComprimento = document.querySelector(`#comprimento-${i}`);
        var dstUndMedComp = document.querySelector(`#undMedCompr-${i}`);
        var dstEspessura = document.querySelector(`#espessura-${i}`);
        var dstUndMedEspe = document.querySelector(`#undMedEspe-${i}`);
        var dstProfundidade = document.querySelector(`#profundidade-${i}`);
        var dstUndMedProfund = document.querySelector(`#undMedProfund-${i}`);
        var dstDiametro = document.querySelector(`#diametro-${i}`);
        var dstUndMedDiametro = document.querySelector(`#undMedDiametro-${i}`);
        var dstLargTampo = document.querySelector(`#largTampo-${i}`);
        var dstUndMedLargTampo = document.querySelector(`#undMedLargTampo-${i}`);
        var dstCompTampo = document.querySelector(`#compTampo-${i}`);
        var dstUndMedCompTampo = document.querySelector(`#undMedCompTampo-${i}`);
        var dstEspessuraTampo = document.querySelector(`#espessuraTampo-${i}`);
        var dstUndMedEspeTampo = document.querySelector(`#undMedEspeTampo-${i}`);
        var dstAltPernas = document.querySelector(`#altPernas-${i}`);
        var dstUndMedAltPernas = document.querySelector(`#undMedAltPernas-${i}`);
        var dstEspessuraPernas = document.querySelector(`#espessuraPernas-${i}`);
        var dstUndMedEspesPernas = document.querySelector(`#undMedEspesPernas-${i}`);
        var dstPerna = document.querySelector(`#qtdPerna-${i}`);
        var dstPorta = document.querySelector(`#qtdPorta-${i}`);
        var dstPrateleira = document.querySelector(`#qtdPrate-${i}`);
        var dstGaveta = document.querySelector(`#qtdGav-${i}`);
        var dstHelice = document.querySelector(`#qtdHelice-${i}`);
        var dstVeloc = document.querySelector(`#qtdVelox-${i}`);
        var dstPolegada = document.querySelector(`#qtdPol-${i}`);
        var dstBtu = document.querySelector(`#btu-${i}`);
        var dstAddInfo = document.querySelector(`#addInfo-${i}`);
        var dstChave = document.querySelector(`#chave-${i}`);
    }


    if (dstItem) {
        dstItem.value = srcItem.value;
        dstMarca.value = srcMarca.value;
        dstModelo.value = srcModelo.value;
        dstCondicao.value = srcCondicao.value;
        dstLocal.value = srcLocal.value;
        dstUe.value = srcUe.value;
        dstAquisicao.value = srcAquisicao.value;
        dstValor.value = srcValor.value;
        dstCor.value = srcCor.value;
        dstLargura.value = srcLargura.value;
        dstUndMedLarg.value = srcUndMedLarg.value;
        dstAltura.value = srcAltura.value;
        dstUndMedAlt.value = srcUndMedAlt.value;
        dstComprimento.value = srcComprimento.value;
        dstUndMedComp.value = srcUndMedComp.value;
        dstEspessura.value = srcEspessura.value;
        dstUndMedEspe.value = srcUndMedEspe.value;
        dstProfundidade.value = srcProfundidade.value;
        dstUndMedProfund.value = srcUndMedProfund.value;
        dstDiametro.value = srcDiametro.value;
        dstUndMedDiametro.value = srcUndMedDiametro.value;
        dstLargTampo.value = srcLargTampo.value;
        dstUndMedLargTampo.value = srcUndMedLargTampo.value;
        dstCompTampo.value = srcCompTampo.value;
        dstUndMedCompTampo.value = srcUndMedCompTampo.value;
        dstEspessuraTampo.value = srcEspessuraTampo.value;
        dstUndMedEspeTampo.value = srcUndMedEspeTampo.value;
        dstAltPernas.value = srcAltPernas.value;
        dstUndMedAltPernas.value = srcUndMedAltPernas.value;
        dstEspessuraPernas.value = srcEspessuraPernas.value;
        dstUndMedEspesPernas.value = srcUndMedEspesPernas.value;
        dstPerna.value = srcPerna.value;
        dstPorta.value = srcPorta.value;
        dstPrateleira.value = srcPrateleira.value;
        dstGaveta.value = srcGaveta.value;
        dstHelice.value = srcHelice.value;
        dstVeloc.value = srcVeloc.value;
        dstPolegada.value = srcPolegada.value;
        dstBtu.value = srcBtu.value;
        dstAddInfo.value = srcAddInfo.value;
        dstChave.value = srcChave.value;
    } else {
        alert("Não há mais campos para copiar neste formulário.");
    }
}