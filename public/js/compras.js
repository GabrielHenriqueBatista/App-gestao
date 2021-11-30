class Compras {
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

		//array de compras
		let compras = Array()

		let id = localStorage.getItem('id')

		//recuperar todas as compras cadastradas em localStorage
		for(let i = 1; i <= id; i++) {

			//recuperar a compras
			let compra = JSON.parse(localStorage.getItem(i))

			//existe a possibilidade de haver índices que foram pulados/removidos

			if(compra === null) {
				continue
			}
			compra.id = i
			compras.push(compra)
		}

		return compras
	}

	pesquisar(compra){

		let comprasFiltradas = Array()
		comprasFiltradas = this.recuperarTodosRegistros()
		console.log(comprasFiltradas);
		console.log(compra)

		//ano
		if(compra.ano != ''){
			console.log("filtro de ano");
			comprasFiltradas = comprasFiltradas.filter(d => d.ano == compra.ano)
		}
			
		//mes
		if(compra.mes != ''){
			console.log("filtro de mes");
			comprasFiltradas = comprasFiltradas.filter(d => d.mes == compra.mes)
		}

		//dia
		if(compra.dia != ''){
			console.log("filtro de dia");
			comprasFiltradas = comprasFiltradas.filter(d => d.dia == compra.dia)
		}

		//tipo
		if(compra.tipo != ''){
			console.log("filtro de tipo");
			comprasFiltradas = comprasFiltradas.filter(d => d.tipo == compra.tipo)
		}

		//descricao
		if(compra.descricao != ''){
			console.log("filtro de descricao");
			comprasFiltradas = comprasFiltradas.filter(d => d.descricao == compra.descricao)
		}

		//valor
		if(compra.valor != ''){
			console.log("filtro de valor");
			comprasFiltradas = comprasFiltradas.filter(d => d.valor == compra.valor)
		}

		
		return comprasFiltradas

	}

	remover(id){
		localStorage.removeItem(id)
	}
}
let bd = new Bd()
function cadastrarCompra() {

	let ano = document.getElementById('ano')
	let mes = document.getElementById('mes')
	let dia = document.getElementById('dia')
	let tipo = document.getElementById('tipo')
	let descricao = document.getElementById('descricao')
	let valor = document.getElementById('valor')

	let compra = new Compras(
		ano.value, 
		mes.value, 
		dia.value, 
		tipo.value, 
		descricao.value,
		valor.value
	)
	if(compra.validarDados()) {
		bd.gravar(compra)

		document.getElementById('modal_titulo').innerHTML = 'Registro inserido com sucesso'
		document.getElementById('modal_titulo_div').className = 'modal-header text-success'
		document.getElementById('modal_conteudo').innerHTML = 'Compra foi cadastrada com sucesso!'
		document.getElementById('modal_btn').innerHTML = 'Voltar'
		document.getElementById('modal_btn').className = 'btn btn-success'
		//dialog de sucesso
		$('#modalRegistraCompra').modal('show') 
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
		$('#modalRegistraCompra').modal('show') 
	}
}
function carregaListaCompras(compras = Array(), filtro = false) {
    if(compras.length == 0 && filtro == false){
		compras = bd.recuperarTodosRegistros() 
	}
	let listaCompras = document.getElementById("listaCompras")
    listaCompras.innerHTML = ''
	compras.forEach(function(d){

		//Criando a linha (tr)
		var linha = listaCompras.insertRow();

		//Criando as colunas (td)
		linha.insertCell(0).innerHTML = `${d.dia}/${d.mes}/${d.ano}` 

		//Ajustar o tipo
		switch(d.tipo){
			case '1': d.tipo = 'Alimentação'
				break
			case '2': d.tipo = 'Bebidas'
				break
			case '3': d.tipo = 'Outros'
				break
			
		}
		linha.insertCell(1).innerHTML = d.tipo
		linha.insertCell(2).innerHTML = d.descricao
		linha.insertCell(3).innerHTML = d.valor

		//Criar o botão de exclusão
		let btn = document.createElement('button')
		btn.className = 'btn btn-danger'
		btn.innerHTML = '<i class="fa fa-times"  ></i>'
		btn.id = `id_compra_${d.id}`
		btn.onclick = function(){
			let id = this.id.replace('id_compra_','')
			//alert(id)
			bd.remover(id)
			window.location.reload()
		}
		linha.insertCell(4).append(btn)
		console.log(d)
	})
 }

 
 function pesquisarCompras(){
	let ano  = document.getElementById("ano").value
	let mes = document.getElementById("mes").value
	let dia = document.getElementById("dia").value
	let tipo = document.getElementById("tipo").value
	let descricao = document.getElementById("descricao").value
	let valor = document.getElementById("valor").value

	let compra = new Compras(ano, mes, dia, tipo, descricao, valor)
	let compras = bd.pesquisar(compra)
	this.carregaListaCompras(compras, true)

 }