<script language='javascript'>
	function submenu_next(id_menu) {
		var ajaxRequest;
	
		try {
			ajaxRequest = new XMLHttpRequest(); //Opera 8.0+, Firefox, Safari
		} catch(e) {
			//Untuk IE
			try {
				ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
			} catch(e) {
				try {
					ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
				} catch(e) {
					alert("Gagal karena browser anda tidak mendukung ajax");
					return false;
				}
			}
		}

		ajaxRequest.onreadystatechange = function() {
			if (ajaxRequest.readyState == 4) {
				var ajaxTampil = document.getElementById('submenu');
				ajaxTampil.innerHTML = ajaxRequest.responseText;
			}
		}
		
		
		var url="http://localhost/pep/application/proses/proses_submenu_next.php?id_menu="+id_menu;
		
		ajaxRequest.open("GET",url,true);
		ajaxRequest.send(null);
	}
	
	function submenu_prev(id_menu) {
		var ajaxRequest;
	
		try {
			ajaxRequest = new XMLHttpRequest(); //Opera 8.0+, Firefox, Safari
		} catch(e) {
			//Untuk IE
			try {
				ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
			} catch(e) {
				try {
					ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
				} catch(e) {
					alert("Gagal karena browser anda tidak mendukung ajax");
					return false;
				}
			}
		}

		ajaxRequest.onreadystatechange = function() {
			if (ajaxRequest.readyState == 4) {
				var ajaxTampil = document.getElementById('submenu');
				ajaxTampil.innerHTML = ajaxRequest.responseText;
			}
		}
		
		
		var url="http://localhost/pep/application/proses/proses_submenu_prev.php?id_menu="+id_menu;
		
		ajaxRequest.open("GET",url,true);
		ajaxRequest.send(null);
	}

	function menu(id_menu) {
		var ajaxRequest;
	
		try {
			ajaxRequest = new XMLHttpRequest(); //Opera 8.0+, Firefox, Safari
		} catch(e) {
			//Untuk IE
			try {
				ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
			} catch(e) {
				try {
					ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
				} catch(e) {
					alert("Gagal karena browser anda tidak mendukung ajax");
					return false;
				}
			}
		}

		ajaxRequest.onreadystatechange = function() {
			if (ajaxRequest.readyState == 4) {
				var ajaxTampil = document.getElementById('body');
				ajaxTampil.innerHTML = ajaxRequest.responseText;
			}
		}
		
		
		var url="http://localhost/WebGIS/proses/proses_menu.php?id_menu="+id_menu;
		
		ajaxRequest.open("GET",url,true);
		ajaxRequest.send(null);
	}

</script>