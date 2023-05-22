document.addEventListener('DOMContentLoaded', function () {

	let mess = document.getElementById('mess');

	let lbtn = document.getElementById('login');
	if(lbtn){
		lbtn.onclick = function(e){
			e.preventDefault();
			let login = document.getElementById('pan-over');
			login.style.display = 'block';
		}
	}

	let form = document.getElementById('loginform');
	if(form){
	form.addEventListener('submit', formSubmit);
	async function formSubmit(e) {
		e.preventDefault();
	        let formData = new FormData(form);
		let response = await fetch('/login.php?do=login', {
			method: 'POST',
	                body: formData
		})
		if (response.ok) {
			let result = await response.json();
			if(result.result == 'success'){
				window.location.href = '/';
				mess.innerHTML = '';
			}else{
				//alert(result.message);
				mess.innerHTML = result.message;
				return false;
			}
		}else{
	                alert('Ошибка');
			return false;
		}
	}
	}


	let ndb = document.getElementById('ndbox-close');
	if(ndb){
			ndb.onclick = function(e){
				e.preventDefault();
				box = document.getElementById('simple-over');
				box.style.display = 'none';
				

			}
	}


	let tritem = document.querySelectorAll('.btn-ex');
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

	let tra = document.querySelectorAll('.tree-item');
	if(tra){
		for(let el of tra){
			el.onclick = function(e){
				e.preventDefault();
				descr = this.getAttribute('data-descr');
				box = document.getElementById('simple-over');
				box.style.display = 'block';
				
				ul = document.getElementById('simple-box');
				ul.innerText = descr;
			}
		}
	}


});