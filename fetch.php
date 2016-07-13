<script type="text/javascript">

	function fetch_data(token) {

		if(window.XMLHttpRequest) {
			var xhttp = new XMLHttpRequest();
		}else {
			var xhttp = new ActiveXObject('Microsoft.XMLHTTP');
		}

			xhttp.onreadystatechange = function() {
				if(xhttp.readyState == 4 && xhttp.status == 200) {
					var data = xhttp.responseText;
					//console.log(data);
					//data = JSON.stringify(data);
					data = JSON.parse(data);
					console.log(data);
					var len = data.length;
					var i = 0;
					var str1 = "<figure class = 'figure col-md-3 col-sm-6 col-xs-6 text-xs-left'><img src = \'images/";
					var str2 = "\' class = 'figure-img img-responsive img-thumbnail center-block' /><figcaption class = 'figure-caption text-center' > ";
					var str3 = " </figcaption></figure>";
					for (i = 0; i < len; i++) {
						//console.log(str1 + arr[i]['img_name'] + str2 + arr[i]['description'] + str3);

						$(str1 + data[i]['img_name'] + str2 + data[i]['description'] + str3).appendTo('#mypins .container .row');
					}

				}
			}

		xhttp.open('POST', 'core.php');
		xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
		xhttp.send('token_id_fetch='+token);
	}
</script>