var campoFiltro =document.querySelector("#filtro");

campoFiltro.addEventListener("input",function(){
console.log(this.value);
var produtos= document.querySelectorAll(".produto");


if(this.value.length > 0){
			for(var i=0; i< produtos.length;i++){
			var produtos=produtos[i];
			var tdnome=produtos.querySelector(".nomes");
			console.log(tdnome);
			var nome = tdnome.textContent;

			var umaletra = new RegExp(this.value,"i");
				if(!umaletra.test(nome)){
				produtos.classList.add("invisivel");
			}else{
				produtos.classList.remove("invisivel");
			}
		}

	}else{
		for(var i=0; i < produtos.length;i++){
			var produtos=produtos[i];
			produtos.classList.remove("invisivel");
		}

	}
	
});