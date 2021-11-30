class Faturamento {
	constructor(ano, mes, dia, tipo, descricao, valor) {
		this.ano = ano
		this.mes = mes
		this.dia = dia
		this.tipo = tipo
		this.descricao = descricao
		this.valor = valor
	}

	validarDados() {
		for(let i in this) {
			if(this[i] == undefined || this[i] == '' || this[i] == null) {
				return false
			}
		}
		return true
	}
}

class Bd {

	constructor() {
		let id = localStorage.getItem('id')

		if(id === null) {
			localStorage.setItem('id', 0)
		}
	}

	getProximoId() {
		let proximoId = localStorage.getItem('id')
		return parseInt(proximoId) + 1
	}

	gravar(d) {
		let id = this.getProximoId()

		localStorage.setItem(id, JSON.stringify(d))

		localStorage.setItem('id', id)
	}

	recuperarTodosRegistros() {

		//array de faturamento
		let faturamentos = Array()

		let id = localStorage.getItem('id')

		//recuperar todas os faturamento cadastradas em localStorage
		for(let i = 1; i <= id; i++) {

			//recuperar os faturamentos
			let faturamento = JSON.parse(localStorage.getItem(i))

			//existe a possibilidade de haver índices que foram pulados/removidos

			if(faturamento === null) {
				continue
			}
			faturamento.id = i
			faturamentos.push(faturamento)
		}

		return faturamentos
	}

	pesquisar(faturamento){

		let faturamentoFiltradas = Array()
		faturamentoFiltradas = this.recuperarTodosRegistros()
		console.log(faturamentoFiltradas);
		console.log(faturamento)

		//ano
		if(faturamento.ano != ''){
			console.log("filtro de ano");
			faturamentoFiltradas = faturamentoFiltradas.filter(d => d.ano == faturamento.ano)
		}
			
		//mes
		if(faturamento.mes != ''){
			console.log("filtro de mes");
			faturamentoFiltradas = faturamentoFiltradas.filter(d => d.mes == faturamento.mes)
		}

		//dia
		if(faturamento.dia != ''){
			console.log("filtro de dia");
			faturamentoFiltradas = faturamentoFiltradas.filter(d => d.dia == faturamento.dia)
		}

		//tipo
		if(faturamento.tipo != ''){
			console.log("filtro de tipo");
			faturamentoFiltradas = faturamentoFiltradas.filter(d => d.tipo == faturamento.tipo)
		}

		//descricao
		if(faturamento.descricao != ''){
			console.log("filtro de descricao");
			faturamentoFiltradas = faturamentoFiltradas.filter(d => d.descricao == faturamento.descricao)
		}

		//valor
		if(faturamento.valor != ''){
			console.log("filtro de valor");
			faturamentoFiltradas = faturamentoFiltradas.filter(d => d.valor == faturamento.valor)
		}

		
		return faturamentoFiltradas

	}

	remover(id){
		localStorage.removeItem(id)
	}
}
let bd = new Bd()
function cadastrarFaturamento() {

	let ano = document.getElementById('ano')
	let mes = document.getElementById('mes')
	let dia = document.getElementById('dia')
	let tipo = document.getElementById('tipo')
	let descricao = document.getElementById('descricao')
	let valor = document.getElementById('valor')

	let faturamento = new Faturamento(
		ano.value, 
		mes.value, 
		dia.value, 
		tipo.value, 
		descricao.value,
		valor.value
	)
	if(faturamento.validarDados()) {
		bd.gravar(faturamento)

		document.getElementById('modal_titulo').innerHTML = 'Registro inserido com sucesso'
		document.getElementById('modal_titulo_div').className = 'modal-header text-success'
		document.getElementById('modal_conteudo').innerHTML = 'Faturamento foi cadastrado com sucesso!'
		document.getElementById('modal_btn').innerHTML = 'Voltar'
		document.getElementById('modal_btn').className = 'btn btn-success'
		//dialog de sucesso
		$('#modalRegistraFaturamento').modal('show') 
		ano.value = '' 
		mes.value = ''
		dia.value = ''
		tipo.value = ''
		descricao.value = ''
		valor.value = ''
	} else {
		document.getElementById('modal_titulo').innerHTML = 'Erro na inclusão do registro'
		document.getElementById('modal_titulo_div').className = 'modal-header text-danger'
		document.getElementById('modal_conteudo').innerHTML = 'Erro na gravação, verifique se todos os campos foram preenchidos corretamente!'
		document.getElementById('modal_btn').innerHTML = 'Voltar e corrigir'
		document.getElementById('modal_btn').className = 'btn btn-danger'
		//dialog de erro
		$('#modalRegistraFaturamento').modal('show') 
	}
}
function carregaListaFaturamentos(Faturamentos = Array(), filtro = false) {
    if(Faturamentos.length == 0 && filtro == false){
		Faturamentos = bd.recuperarTodosRegistros() 
	}
	let listaFaturamentos = document.getElementById("listaFaturamentos")
	listaFaturamentos.innerHTML = ''
	Faturamentos.forEach(function(d){

		//Criando a linha (tr)
		var linha = listaFaturamentos.insertRow();

		//Criando as colunas (td)
		linha.insertCell(0).innerHTML = `${d.dia}/${d.mes}/${d.ano}` 

		//Ajustar o tipo
		switch(d.tipo){
			case '1': d.tipo = 'Faturamento'
				break
			
		}
		linha.insertCell(1).innerHTML = d.tipo
		linha.insertCell(2).innerHTML = d.descricao
		linha.insertCell(3).innerHTML = d.valor

		//Criar o botão de exclusão
		let btn = document.createElement('button')
		btn.className = 'btn btn-danger'
		btn.innerHTML = '<i class="fa fa-times"  ></i>'
		btn.id = `id_faturamento_${d.id}`
		btn.onclick = function(){
			let id = this.id.replace('id_faturamento_','')
			//alert(id)
			bd.remover(id)
			window.location.reload()
		}
		linha.insertCell(4).append(btn)
		console.log(d)
	})
 }

 
 function pesquisarFaturamento(){
	let ano  = document.getElementById("ano").value
	let mes = document.getElementById("mes").value
	let dia = document.getElementById("dia").value
	let tipo = document.getElementById("tipo").value
	let descricao = document.getElementById("descricao").value
	let valor = document.getElementById("valor").value

	let faturamento = new Faturamento(ano, mes, dia, tipo, descricao, valor)
	let faturamentos = bd.pesquisar(faturamento)
	this.carregaListaFaturamentos(faturamentos, true)

 }