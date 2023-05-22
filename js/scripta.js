document.addEventListener('DOMContentLoaded', function () {

	let mess = document.getElementById('mess');

	let lobtn = document.getElementById('logout');
	if(lobtn){
		lobtn.addEventListener('click', lobtnClick);
		async function lobtnClick(e) {
			e.preventDefault();
			let response = await fetch('/login.php?do=logout', {
				method: 'POST'
			})
			if (response.ok) {
				let result = await response.json();
				if(result.result == 'success'){
					window.location.href = '/';
				}else{
					mess.innerHTML = result.message;
					return false;
				}
			}else{
	        	        alert('Ошибка');
				return false;
			}

		}
	}
	
	let tritem = document.querySelectorAll('.simple-tree-cont .btn-ex');
	if(tritem){
		for(let el of tritem){
			el.onclick = function(e){
				e.preventDefault();
				id = this.getAttribute('data-id');
				ul = document.getElementById('ul_'+id);
				ul.style.display = (ul.style.display == 'none') ? 'block' : 'none';
			}
		}
	}

	let tra = document.querySelectorAll('.simple-tree-cont .tree-item');
	if(tra){
		for(let el of tra){
			el.onclick = function(e){
				e.preventDefault();
				els = document.querySelectorAll('.tree-item.active');
				for(let el of els)
					el.classList.remove('active');
				this.classList.add('active');
				cc =this.getBoundingClientRect();
				box = document.getElementById('ndbox-wrap-1');
				box.style.display = 'block';
				box.style.top = (parseInt(cc.top) + 20) + 'px';
			}
		}
	}

	let ndb = document.getElementById('ndbox-close');
	if(ndb){
			ndb.onclick = function(e){
				e.preventDefault();
				box = document.getElementById('ndbox-wrap-1');
				box.style.display = 'none';
				

			}
	}

	let badd = document.getElementById('but-add');
	if(badd){
		badd.addEventListener('click', baddClick);
		async function baddClick(e) {
			e.preventDefault();

			id = document.querySelector('.tree-item.active').getAttribute('data-id');
			let pdata = {id:id};

			let response = await fetch('/tr_ajax.php?do=gettreedata', {
				method: 'POST',
				body: JSON.stringify(pdata),
				headers: {'Content-type' : 'application/json'}
			})
			if (response.ok) {
				let result = await response.json();
				if(result.result == 'success'){
					box = document.getElementById('ndbox-over-2');
					box.style.display = 'block';
					document.querySelector('input[name=mode]').value = 'add';
					document.querySelector('input[name=inpcat]').value = result.data.name;
					document.querySelector('input[name=pcat]').value = result.data.id;
					document.getElementById('delivery-1').setAttribute('checked','');
					mess.innerHTML = '';
				}else{
					mess.innerHTML = result.message;
					return false;
				}
			}else{
        		        alert('Ошибка');
				return false;
			}
		}
	}

	let bedit = document.getElementById('but-edit');
	if(bedit){

		bedit.addEventListener('click', beditClick);
		async function beditClick(e) {
			e.preventDefault();

			id = document.querySelector('.tree-item.active').getAttribute('data-id');
			let pdata = {id:id};

			let response = await fetch('/tr_ajax.php?do=gettreedata', {
				method: 'POST',
				body: JSON.stringify(pdata),
				headers: {'Content-type' : 'application/json'}
			})
			if (response.ok) {
				let result = await response.json();
				if(result.result == 'success'){
					box = document.getElementById('ndbox-over-2');
					box.style.display = 'block';
					document.querySelector('input[name=mode]').value = 'edit';
					document.querySelector('input[name=id]').value = result.data.id;
					document.querySelector('input[name=name]').value = result.data.name;
					document.querySelector('input[name=description]').value = result.data.description;
					document.querySelector('input[name=inpcat]').value = result.data.parentname;
					document.querySelector('input[name=pcat]').value = result.data.parent;
					if(result.data.parent > 0)
						document.getElementById('delivery-1').setAttribute('checked','');
					else
						document.getElementById('delivery-2').setAttribute('checked','');

				}else{
					mess.innerHTML = result.message;
					return false;
				}
			}else{
        		        alert('Ошибка');
				return false;
			}
		}
	}

	let bdel = document.getElementById('but-remove');
	if(bdel){
		bdel.addEventListener('click', bdelClick);
		async function bdelClick(e) {
			e.preventDefault();

			id = document.querySelector('.tree-item.active').getAttribute('data-id');
			let pdata = {id:id};

			let response = await fetch('/tr_ajax.php?do=delitem', {
				method: 'POST',
				body: JSON.stringify(pdata),
				headers: {'Content-type' : 'application/json'}
			})
			if (response.ok) {
				let result = await response.json();
				if(result.result == 'success'){
					window.location.href = '/';

				}else{
					mess.innerHTML = result.message;
					return false;
				}
			}else{
        		        alert('Ошибка');
				return false;
			}
		}
	}

	let bcan = document.getElementById('btn-cancel');
	if(bcan){
			bcan.onclick = function(e){
				e.preventDefault();
				document.querySelector('input[name=name]').value = '';
				document.querySelector('input[name=description]').value = '';
				document.querySelector('input[name=inpcat]').value = '';
				document.querySelector('input[name=pcat]').value = '';

				box = document.getElementById('ndbox-over-2');
				box.style.display = 'none';
				

			}
	}


	let bttr = document.getElementById('treebut');
	if(bttr){
			bttr.onclick = function(e){
				e.preventDefault();
				box = document.getElementById('treewrap');
				if(box.style.display == 'block')
					box.style.display = 'none';
				else
					box.style.display = 'block';
				

			}
	}

	let tra1 = document.querySelectorAll('.treewrap .tree-item');
	if(tra1){
		for(let el of tra1){
			el.onclick = function(e){
				e.preventDefault();
				document.querySelector('input[name=inpcat]').value = this.textContent;
				document.querySelector('input[name=pcat]').value = this.getAttribute('data-id');
				document.getElementById('treewrap').style.display = 'none';
			}
		}
	}

	let bdl = document.getElementById('delivery-2');
	if(bdl){
			bdl.onclick = function(e){
				document.querySelector('input[name=pcat]').value = 0;
				

			}
	}

});