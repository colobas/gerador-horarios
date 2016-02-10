<?php
if (PHP_SAPI === 'cli') {
    $curso = $argv[1];
}
else {
	if(isset($_GET['curso'])){
	    $curso = $_GET['curso'];
	    $id = $_GET['id'];
	}
}
?>
<!DOCTYPE html>
		<html>
		<head>
			<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
			<meta name='viewport' content='width=device-width, initial-scale=1'>
			<link rel='stylesheet' href='http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css'>
			<script src='https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js'></script>
			<script src='http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js'></script>
			<script type="text/javascript">
				  var courseCount = 0;
				  
			      function showErrorMessage() { document.getElementById("errorMessage").style.visibility = "visible" }
			      function hideErrorMessage() { document.getElementById("errorMessage").style.visibility = "hidden" }
			      
				  function processCourseURL() {
			     
			        
				    var xmlhttp = new XMLHttpRequest();
			        xmlhttp.onreadystatechange = function() {
					  if (xmlhttp.readyState==4 && xmlhttp.status==200) {
			            if (xmlhttp.responseText == '')
			              showErrorMessage();
			            else {
			              hideErrorMessage();
			              document.getElementById("courseURL").value = "";
					      document.getElementById("courses").innerHTML += xmlhttp.responseText;
			            }
					  }
					}
					
					courseCount++;
					var encodedURL = encodeURIComponent(document.getElementById("courseURL").value);
					xmlhttp.open("POST", "process_course_url.php", true);
					xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
					xmlhttp.send("course_id="+courseCount + "&url="+encodedURL);
				  }
			      
			      function removeCourse(course) { course.innerHTML = "" }
			</script>
			<style>
				.form-control{
				    text-overflow: ellipsis !important;
				}
				.container{
				    margin: auto;
				    width: 60%;
				    padding: 10px;
				}

				#loading {
				   width: 100%;
				   height: 100%;
				   top: 0px;
				   left: 0px;
				   position: fixed;
				   display: block;
				   background-color: #fff;
				   z-index: 99;
				   text-align: center;
				}

				#footer {
					  text-align: right;
					  position: absolute;
					  bottom: 0;
					  width: 100%;
					  height: 20px;
					  background-color: #f5f5f5;
				}
				td {
					text-align: center;
					padding: 4px;
				}
			</style>
		</head>
		<body>
 				<?php
					if (isset($curso)) {
						$command = "python2 get_degree_courses.py $curso";
						$course_selector = shell_exec($command);
						?>
					<div id="loading">
  						<h1>A calcular os melhores horários...</h1>
					</div>
					<div id='errorMessage' style="font-family:'Verdana';color:#DD0000;visibility:hidden">Ocorreu um erro na obtenção da disciplina. É possível que o URL esteja mal formado.</div>
						<div class='container'>
					<form action="generate_timetables.php" method="post">
				          <table style="width:70%;">
			      			<?php echo($course_selector); ?>
			           		<tr><td></td><td>
			           		<div id="courses">
			      			</div>
			           		</td><td></td></tr>
			           		<tr><td></td><td><input class="btn btn-primary-outline" type="submit" value="Submit"></td><td></td></tr>
				      	  </table>
					</form>
				      	 </div>
					<?php } 
					else{ ?>
						<div id="loading">
	  						<h1>A carregar a lista das cadeiras...</h1>
						</div>
						<div class='container'>
							<h3 align='center'>Gerador de Horários 2.0</h3>
							Selecciona o teu curso. Na próxima página vão aparecer as cadeiras disponíveis (demora um bocadinho a carregar...)<br> 
							Na página seguinte adiciona as tuas cadeiras uma a uma e clicka em Submit.<br><br>
						<div class='dropdown'>
						    <button class='btn btn-primary dropdown-toggle' type='button' data-toggle='dropdown'>Cursos<span class='caret'></span></button>
						    <ul class='dropdown-menu'>
				 				<li><a href='index.php?curso=meaer'>Engenharia Aeroespacial</a></li>
				 				<li><a href='index.php?curso=meambi'>Engenharia do Ambiente</a></li>
				 				<li><a href='index.php?curso=lean'>Engenharia e Arquitetura Naval</a></li>
				 				<li><a href='index.php?curso=mebiol'>Engenharia Biológica</a></li>
				 				<li><a href='index.php?curso=mebiom'>Engenharia Biomédica</a></li>
				 				<li><a href='index.php?curso=mec'>Engenharia Civil</a></li>
				 				<li><a href='index.php?curso=lee'>Engenharia Eletrónica</a></li>
				 				<li><a href='index.php?curso=meec'>Engenharia Eletrotécnica e de Computadores</a></li>
				 				<li><a href='index.php?curso=meft'>Engenharia Física Tecnológica</a></li>
				 				<li><a href='index.php?curso=legm'>Engenharia Geológica e de Minas</a></li>
				 				<li><a href='index.php?curso=legi'>Engenharia e Gestão Industrial</a></li>
				 				<li><a href='index.php?curso=leic-a'>Engenharia Informática e de Computadores (Alameda)</a></li>
				 				<li><a href='index.php?curso=leic-t'>Engenharia Informática e de Computadores (Tagus)</a></li>
				 				<li><a href='index.php?curso=lemat'>Engenharia de Materiais</a></li>
				 				<li><a href='index.php?curso=memec'>Engenharia Mecânica</a></li>
				 				<li><a href='index.php?curso=meq'>Engenharia Química</a></li>
				 				<li><a href='index.php?curso=lerc'>Engenharia de Telecomunicações e Informática</a></li>
				 				<li><a href='index.php?curso=lmac'>Matemática Aplicada e Computação</a></li>
							</ul>
 		 				</div>
						</div>

					<?php } ?>
    	<div id="footer">
            Créditos: Pedro P. Ramos (<a href="http://web.ist.utl.pt/pedropramos/horarios/">Original version</a>)
        </div>
        <script language="javascript" type="text/javascript">
				     $('#loading').hide();
				     window.onbeforeunload = function () { $('#loading').show(); }
		</script>
   </body>
   </html>
