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
						switch($curso){ 
							case 'meaer': ?>
							<div id="loading">
		  						<h1>A calcular os melhores horários...</h1>
							</div>
							<div id='errorMessage' style="font-family:'Verdana';color:#DD0000;visibility:hidden">Ocorreu um erro na obtenção da disciplina. É possível que o URL esteja mal formado.</div>
							<div class='container'>
								<form action="generate_timetables.php" method="post">
							          <table style="width:70%;">
				<tr>
				<td>
					<h3>Escolher&nbspuma&nbspcadeira</h3>
				</td>
				<td>
		      		<select class="form-control" id="courseURL">

						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/A266451113/2015-2016/2-semestre'>Aeroacústica</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/A36451113/2015-2016/2-semestre'>Aerodinâmica I</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/A256451113/2015-2016/2-semestre'>Aerodinâmica II</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/AEsp6451113/2015-2016/2-semestre'>Ambiente Espacial</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/AP36451113/2015-2016/2-semestre'>Antenas e Propagação</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/ACED6751113/2015-2016/2-semestre'>Análise Complexa e Equações Diferenciais</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/ACom2051113/2015-2016/2-semestre'>Arquitectura de Computadores</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/CMat56451113/2015-2016/2-semestre'>Ciência de Materiais</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/CMM2517/2015-2016/1-semestre'>Comportamento Mecânico dos Materiais</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/CVoo36451113/2015-2016/2-semestre'>Controlo de Voo</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/CC2517/2015-2016/1-semestre'>Controlo por Computador</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/CDI13251113/2015-2016/2-semestre'>Cálculo Diferencial e Integral I</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/CDI131101113/2015-2016/2-semestre'>Cálculo Diferencial e Integral II</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/D36451113/2015-2016/2-semestre'>Desempenho</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/DMG22517/2015-2016/1-semestre'>Desenho e Modelação Geométrica I</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/DSM236451113/2015-2016/2-semestre'>Dinâmica de Sistemas Mecânicos</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/DMEA36451113/2015-2016/2-semestre'>Dissertação de Mestrado em Engenharia Aeroespacial</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/EO42517/2015-2016/1-semestre'>Electromagnetismo e Óptica</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/EGer2517/2015-2016/1-semestre'>Electrónica Geral</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/ER76451113/2015-2016/2-semestre'>Electrónica Rápida</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/Emi2517/2015-2016/1-semestre'>Emissões</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/EV36451113/2015-2016/2-semestre'>Ensaios em Voo</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/EVoo2517/2015-2016/1-semestre'>Estabilidade de Voo</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/EAer2517/2015-2016/1-semestre'>Estruturas Aeroespaciais</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/FI22517/2015-2016/1-semestre'>Fenómenos Interactivos</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/Ges536451113/2015-2016/2-semestre'>Gestão</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/GProj236451113/2015-2016/2-semestre'>Gestão de Projectos</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/GTA17/2015-2016/1-semestre'>Gestão de Tráfego Aéreo</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/H4517/2015-2016/1-semestre'>Helicópteros</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/IM56451113/2015-2016/2-semestre'>Instrumentação e Medidas</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/IASD2517/2015-2016/1-semestre'>Inteligência Artificial e Sistemas de Decisão</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/IC2517/2015-2016/1-semestre'>Introdução ao Controlo</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MSeg6451113/2015-2016/2-semestre'>Manutenção e Segurança</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MC23517/2015-2016/1-semestre'>Matemática Computacional</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MCL2517/2015-2016/1-semestre'>Materiais Compósitos Laminados</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MA2517/2015-2016/1-semestre'>Mecânica Aplicada I</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MA236451113/2015-2016/2-semestre'>Mecânica Aplicada II</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MComp2517/2015-2016/1-semestre'>Mecânica Computacional</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MEstru1113/2015-2016/2-semestre'>Mecânica Estrutural</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MFC3517/2015-2016/1-semestre'>Mecânica de Fluídos Computacional</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MF2517/2015-2016/1-semestre'>Mecânica dos Fluidos I</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MMat36451113/2015-2016/2-semestre'>Mecânica dos Materiais</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MSol/2015-2016/1-semestre'>Mecânica dos Sólidos</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MO236451113/2015-2016/2-semestre'>Mecânica e Ondas</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/Micro2517/2015-2016/1-semestre'>Microelectrónica</option>
						<option value='http://fenix.tecnico.ulisboa.pt/cursos/meaer/descricao'>Opção TUDelft 1</option>
						<option value='http://fenix.tecnico.ulisboa.pt/cursos/meaer/descricao'>Opção TUDelft 10</option>
						<option value='http://fenix.tecnico.ulisboa.pt/cursos/meaer/descricao'>Opção TUDelft 2</option>
						<option value='http://fenix.tecnico.ulisboa.pt/cursos/meaer/descricao'>Opção TUDelft 3</option>
						<option value='http://fenix.tecnico.ulisboa.pt/cursos/meaer/descricao'>Opção TUDelft 4</option>
						<option value='http://fenix.tecnico.ulisboa.pt/cursos/meaer/descricao'>Opção TUDelft 5</option>
						<option value='http://fenix.tecnico.ulisboa.pt/cursos/meaer/descricao'>Opção TUDelft 6</option>
						<option value='http://fenix.tecnico.ulisboa.pt/cursos/meaer/descricao'>Opção TUDelft 7</option>
						<option value='http://fenix.tecnico.ulisboa.pt/cursos/meaer/descricao'>Opção TUDelft 8</option>
						<option value='http://fenix.tecnico.ulisboa.pt/cursos/meaer/descricao'>Opção TUDelft 9</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/PME2517/2015-2016/1-semestre'>Planeamento de Missões Espaciais</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/PEst6364101113/2015-2016/2-semestre'>Probabilidades e Estatística</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/PDS56451113/2015-2016/2-semestre'>Processamento Digital de Sinais</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/Pro5517/2015-2016/1-semestre'>Programação</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/PSis6451113/2015-2016/2-semestre'>Programação de Sistemas</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/PAer2517/2015-2016/1-semestre'>Projecto Aeroespacial</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/PSD-2/2015-2016/1-semestre'>Projecto de Sistemas Digitais</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/Prop36451113/2015-2016/2-semestre'>Propulsão</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/Qui22517/2015-2016/1-semestre'>Química</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/Sat2517/2015-2016/1-semestre'>Satélites</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/SA2517/2015-2016/1-semestre'>Seminário Aeroespacial I</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/SA36451113/2015-2016/2-semestre'>Seminário Aeroespacial II</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/I3517/2015-2016/1-semestre'>Sensores e Sistemas</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/SAut-2/2015-2016/1-semestre'>Sistemas Autónomos</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/SAInt2517/2015-2016/1-semestre'>Sistemas Aviónicos Integrados</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/SD36451113/2015-2016/2-semestre'>Sistemas Digitais</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/SEE36451113/2015-2016/2-semestre'>Sistemas Eléctricos e Electromecânicos</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/SAA2517/2015-2016/1-semestre'>Sistemas de Alimentação Autónomos</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/SCDTR2517/2015-2016/1-semestre'>Sistemas de Controlo Distribuído em Tempo Real</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/SCT2517/2015-2016/1-semestre'>Sistemas de Controlo de Tráfego</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/SN36451113/2015-2016/2-semestre'>Sistemas de Navegação</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/SRad2517/2015-2016/1-semestre'>Sistemas de Radar</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/TM56451113/2015-2016/2-semestre'>Tecnologia Mecânica</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/T2517/2015-2016/1-semestre'>Telecomunicações</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/TCFE336451113/2015-2016/2-semestre'>Teoria dos Circuitos e Fundamentos de Electrónica</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/T36451113/2015-2016/2-semestre'>Termodinâmica I</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/T22517/2015-2016/1-semestre'>Termodinâmica II</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/TCal2517/2015-2016/1-semestre'>Transmissão de Calor</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/VRui2517/2015-2016/1-semestre'>Vibrações e Ruído</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/AL7051113/2015-2016/2-semestre'>Álgebra Linear</option>					</select>
				</td>
				<td>
					<button type="button" class="btn btn-primary" onclick="processCourseURL()"><span class="glyphicon glyphicon-plus"></span></button>
				</td>
			</tr>
						           		<tr><td></td><td>
						           		<div id="courses">
						      			</div>
						           		</td><td></td></tr>
						           		<tr><td></td><td><input class="btn btn-primary-outline" type="submit" value="Submit"></td><td></td></tr>
							      	  </table>
								</form>
				      	 	</div>
				      	 	</div>
				<?php break; ?>
				<?php case 'meambi': ?>
							<div id="loading">
		  						<h1>A calcular os melhores horários...</h1>
							</div>
							<div id='errorMessage' style="font-family:'Verdana';color:#DD0000;visibility:hidden">Ocorreu um erro na obtenção da disciplina. É possível que o URL esteja mal formado.</div>
							<div class='container'>
								<form action="generate_timetables.php" method="post">
							          <table style="width:70%;">
				<tr>
				<td>
					<h3>Escolher&nbspuma&nbspcadeira</h3>
				</td>
				<td>
		      		<select class="form-control" id="courseURL">

						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/AMAA36451113/2015-2016/2-semestre'>Amostragem e Métodos de Análise Ambiental</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/ACED6451113/2015-2016/2-semestre'>Análise Complexa e Equações Diferenciais</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/ADDR36451113/2015-2016/2-semestre'>Aquisição de Dados e Detecção Remota</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/AAE22517/2015-2016/1-semestre'>Avaliação Ambiental Estratégica</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/Bioc2517/2015-2016/1-semestre'>Biocombustíveis</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/BBM2517/2015-2016/1-semestre'>Bioquímica e Biologia Molecular</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/CQA36451113/2015-2016/2-semestre'>Características e Química da Água</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/CMat56451113/2015-2016/2-semestre'>Ciência de Materiais</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/CP32517/2015-2016/1-semestre'>Computação e Programação</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/CDI13251113/2015-2016/2-semestre'>Cálculo Diferencial e Integral I</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/CDI-II-3/2015-2016/2-semestre'>Cálculo Diferencial e Integral II</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/Des36451113/2015-2016/2-semestre'>Desenho</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/DSA2517/2015-2016/1-semestre'>Direito e Sociologia do Ambiente</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/DMEAmb36451113/2015-2016/2-semestre'>Dissertação em Engenharia do Ambiente</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/DUCP22517/2015-2016/1-semestre'>Drenagem Urbana e Controlo da Poluição</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/EA36451113/2015-2016/2-semestre'>Ecologia Aplicada</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/EG2517/2015-2016/1-semestre'>Ecologia Geral</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/EI22517/2015-2016/1-semestre'>Ecologia Industrial</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/EAmb2517/2015-2016/1-semestre'>Economia do Ambiente</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/EO52517/2015-2016/1-semestre'>Electromagnetismo e Óptica</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/EITT32517/2015-2016/1-semestre'>Empreendedorismo, Inovação e Transferência de Tecnologia</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/EAmbi36451113/2015-2016/2-semestre'>Energia e Ambiente</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/ETra3517/2015-2016/1-semestre'>Energia nos Transportes</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/ERen2517/2015-2016/1-semestre'>Energias Renováveis</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/EAmbie2517/2015-2016/1-semestre'>Estatística Ambiental</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/FAO2517/2015-2016/1-semestre'>Física da Atmosfera e dos Oceanos</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/GAmbi2517/2015-2016/1-semestre'>Geologia Ambiental</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/Ges236451113/2015-2016/2-semestre'>Gestão</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/GIBH2517/2015-2016/1-semestre'>Gestão Integrada de Bacias Hidrográficas</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/GTVR336451113/2015-2016/2-semestre'>Gestão Tratamento e Valorização de Resíduos</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/GAT36451113/2015-2016/2-semestre'>Gestão de Ambiente e Território</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/GEne517/2015-2016/1-semestre'>Gestão de Energia</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/HARH2517/2015-2016/1-semestre'>Hidrologia, Ambiente e Recursos Hídricos</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/HA36451113/2015-2016/2-semestre'>Hidráulica Aplicada</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/IA2517/2015-2016/1-semestre'>Impactes Ambientais</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/ITA36451113/2015-2016/2-semestre'>Instalações e Tecnologias Ambientais</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MC436451113/2015-2016/2-semestre'>Matemática Computacional</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MFA2517/2015-2016/1-semestre'>Mecânica de Fluidos Ambiental</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MO336451113/2015-2016/2-semestre'>Mecânica e Ondas</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/Mic36451113/2015-2016/2-semestre'>Microbiologia</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MAmb36451113/2015-2016/2-semestre'>Modelação Ambiental</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MEEA2517/2015-2016/1-semestre'>Métodos Experimentais em Energia e Ambiente</option>
						<option value='http://fenix.tecnico.ulisboa.pt/cursos/meambi/descricao'>Opção</option>
						<option value='http://fenix.tecnico.ulisboa.pt/cursos/meambi/descricao'>Opção Livre</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/P22517/2015-2016/1-semestre'>Pedologia</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/PBOT66451113/2015-2016/2-semestre'>Planeamento Biofísico e Ordenamento do Território</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/PGRN36451113/2015-2016/2-semestre'>Planeamento e Gestão de Recursos Naturais</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/PATEG36451113/2015-2016/2-semestre'>Poluição Atmosférica e Tratamento de Efluentes Gasosos</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/PS236451113/2015-2016/2-semestre'>Poluição Sonora</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/PPAS2517/2015-2016/1-semestre'>Poluição e Protecção de Águas Subterrâneas</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/PA2517/2015-2016/1-semestre'>Políticas de Ambiente</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/PRA2517/2015-2016/1-semestre'>População, Recursos e Ambiente</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/PEst-3/2015-2016/2-semestre'>Probabilidades e Estatística</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/PEB2517/2015-2016/1-semestre'>Processos de Engenharia Biológica</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/PSep2517/2015-2016/1-semestre'>Processos de Separação</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/PIT2517/2015-2016/1-semestre'>Projecto de Instalações de Tratamento</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/PSan2517/2015-2016/1-semestre'>Projecto de Saneamento</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/QSAC22517/2015-2016/1-semestre'>Qualidade, Segurança e Ambiente na Construção</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/Qui52517/2015-2016/1-semestre'>Química</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/QO336451113/2015-2016/2-semestre'>Química Orgânica</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/RNT36451113/2015-2016/2-semestre'>Riscos Naturais e Tecnológicos</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/SIDS/2015-2016/1-semestre'>Seminários sobre Inovação e Desenvolvimento Sustentável</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/SGA2517/2015-2016/1-semestre'>Sistemas de Gestão Ambiental</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/SIG22517/2015-2016/1-semestre'>Sistemas de Informação Geográfica</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/T36451113/2015-2016/2-semestre'>Termodinâmica I</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/TEMas1113/2015-2016/2-semestre'>Transferência de Energia e Massa</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/VAE36451113/2015-2016/2-semestre'>Valências Ambientais em Engenharia</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/AL7051113/2015-2016/2-semestre'>Álgebra Linear</option>					</select>
				</td>
				<td>
					<button type="button" class="btn btn-primary" onclick="processCourseURL()"><span class="glyphicon glyphicon-plus"></span></button>
				</td>
			</tr>
						           		<tr><td></td><td>
						           		<div id="courses">
						      			</div>
						           		</td><td></td></tr>
						           		<tr><td></td><td><input class="btn btn-primary-outline" type="submit" value="Submit"></td><td></td></tr>
							      	  </table>
								</form>
				      	 	</div>
				      	 	</div>
				<?php break; ?>
				<?php case 'lean': ?>
							<div id="loading">
		  						<h1>A calcular os melhores horários...</h1>
							</div>
							<div id='errorMessage' style="font-family:'Verdana';color:#DD0000;visibility:hidden">Ocorreu um erro na obtenção da disciplina. É possível que o URL esteja mal formado.</div>
							<div class='container'>
								<form action="generate_timetables.php" method="post">
							          <table style="width:70%;">
				<tr>
				<td>
					<h3>Escolher&nbspuma&nbspcadeira</h3>
				</td>
				<td>
		      		<select class="form-control" id="courseURL">

						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/ACED6751113/2015-2016/2-semestre'>Análise Complexa e Equações Diferenciais</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/ANav2517/2015-2016/1-semestre'>Arquitectura Naval</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/CMat56451113/2015-2016/2-semestre'>Ciência de Materiais</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/CP22517/2015-2016/1-semestre'>Computação e Programação</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/CSis36451113/2015-2016/2-semestre'>Controlo de Sistemas</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/CDI13251113/2015-2016/2-semestre'>Cálculo Diferencial e Integral I</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/CDI131101113/2015-2016/2-semestre'>Cálculo Diferencial e Integral II</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/DCN36451113/2015-2016/2-semestre'>Desenho de Construção Naval</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/DMG22517/2015-2016/1-semestre'>Desenho e Modelação Geométrica I</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/EO42517/2015-2016/1-semestre'>Electromagnetismo e Óptica</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/Ges536451113/2015-2016/2-semestre'>Gestão</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/Hid36451113/2015-2016/2-semestre'>Hidrodinâmica</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/HN36451113/2015-2016/2-semestre'>Hidrostática do Navio</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/IEN2517/2015-2016/1-semestre'>Introdução à Engenharia Naval</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/IOpe312451113/2015-2016/2-semestre'>Investigação Operacional</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MC23517/2015-2016/1-semestre'>Matemática Computacional</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MEng2517/2015-2016/1-semestre'>Materiais em Engenharia</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MA12517/2015-2016/1-semestre'>Mecânica Aplicada I</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MA36451113/2015-2016/2-semestre'>Mecânica Aplicada II</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MComp36451113/2015-2016/2-semestre'>Mecânica Computacional</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MF22517/2015-2016/1-semestre'>Mecânica dos Fluidos I</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MMat36451113/2015-2016/2-semestre'>Mecânica dos Materiais</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MSol2517/2015-2016/1-semestre'>Mecânica dos Sólidos</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MO436451113/2015-2016/2-semestre'>Mecânica e Ondas</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/PPes236451113/2015-2016/2-semestre'>Portfólio Pessoal</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/PEst-3/2015-2016/2-semestre'>Probabilidades e Estatística</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/Qui32517/2015-2016/1-semestre'>Química</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/SSM2517/2015-2016/1-semestre'>Sinais e Sistemas Mecatrónicos</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/SEE36451113/2015-2016/2-semestre'>Sistemas Eléctricos e Electromecânicos</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/T36451113/2015-2016/2-semestre'>Termodinâmica I</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/VRui2517/2015-2016/1-semestre'>Vibrações e Ruído</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/AL7051113/2015-2016/2-semestre'>Álgebra Linear</option>					</select>
				</td>
				<td>
					<button type="button" class="btn btn-primary" onclick="processCourseURL()"><span class="glyphicon glyphicon-plus"></span></button>
				</td>
			</tr>
						           		<tr><td></td><td>
						           		<div id="courses">
						      			</div>
						           		</td><td></td></tr>
						           		<tr><td></td><td><input class="btn btn-primary-outline" type="submit" value="Submit"></td><td></td></tr>
							      	  </table>
								</form>
				      	 	</div>
				      	 	</div>
				<?php break; ?>
				<?php case 'mebiol': ?>
							<div id="loading">
		  						<h1>A calcular os melhores horários...</h1>
							</div>
							<div id='errorMessage' style="font-family:'Verdana';color:#DD0000;visibility:hidden">Ocorreu um erro na obtenção da disciplina. É possível que o URL esteja mal formado.</div>
							<div class='container'>
								<form action="generate_timetables.php" method="post">
							          <table style="width:70%;">
				<tr>
				<td>
					<h3>Escolher&nbspuma&nbspcadeira</h3>
				</td>
				<td>
		      		<select class="form-control" id="courseURL">

						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/ACED6451113/2015-2016/2-semestre'>Análise Complexa e Equações Diferenciais</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/AQ2517/2015-2016/1-semestre'>Análise Química</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/BCE2517/2015-2016/1-semestre'>Bioengenharia de Células Estaminais</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/BMer336451113/2015-2016/2-semestre'>Bioengenharia e Mercado</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/BEst51113/2015-2016/2-semestre'>Biologia Estrutural</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/Biomi11451113/2015-2016/2-semestre'>Biomimetismo</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/BBM36451113/2015-2016/2-semestre'>Bioquímica e Biologia Molecular</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/BFM36451113/2015-2016/2-semestre'>Bioquímica e Fisiologia Microbiana</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/BAmb51113/2015-2016/2-semestre'>Biotecnologia Ambiental</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/CP32517/2015-2016/1-semestre'>Computação e Programação</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/CDI14051113/2015-2016/2-semestre'>Cálculo Diferencial e Integral I</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/CDI13191113/2015-2016/2-semestre'>Cálculo Diferencial e Integral II</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/DSCP36451113/2015-2016/2-semestre'>Dinâmica de Sistemas e Controle de Processos</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/DMEB36451113/2015-2016/2-semestre'>Dissertação de Mestrado em Engenharia Biológica</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/EO36451113/2015-2016/2-semestre'>Electromagnetismo e Óptica</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/EBioe2517/2015-2016/1-semestre'>Empreendedorismo em Bioengenharia</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/EBI2517/2015-2016/1-semestre'>Engenharia Biológica Integrada I</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/EBI36451113/2015-2016/2-semestre'>Engenharia Biológica Integrada II</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/EEnz36451113/2015-2016/2-semestre'>Engenharia Enzimática</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/EGen2517/2015-2016/1-semestre'>Engenharia Genética</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/ER2517/2015-2016/1-semestre'>Engenharia das Reacções I</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/ECTec851113/2015-2016/2-semestre'>Engenharia de Células e Tecidos</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/FT36451113/2015-2016/2-semestre'>Fenómenos de Transferência I</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/FT236451113/2015-2016/2-semestre'>Fenómenos de Transferência II</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/GFB36451113/2015-2016/2-semestre'>Genómica Funcional e Bioinformática</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/Ges236451113/2015-2016/2-semestre'>Gestão</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/GPO2517/2015-2016/1-semestre'>Gestão da Produção e das Operações</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/IEBio517/2015-2016/1-semestre'>Introdução à Engenharia Biológica</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/LCEQ2517/2015-2016/1-semestre'>Laboratórios de Ciências de Engenharia Química</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/LEB36451113/2015-2016/2-semestre'>Laboratórios de Engenharia Biológica I</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/LEB2517/2015-2016/1-semestre'>Laboratórios de Engenharia Biológica II</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/LQ2517/2015-2016/1-semestre'>Laboratórios de Química I</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/LQ36451113/2015-2016/2-semestre'>Laboratórios de Química II</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/LQ22517/2015-2016/1-semestre'>Laboratórios de Química III</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MC42517/2015-2016/1-semestre'>Matemática Computacional</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MO336451113/2015-2016/2-semestre'>Mecânica e Ondas</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/Mic36451113/2015-2016/2-semestre'>Microbiologia</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MMCel3517/2015-2016/1-semestre'>Microbiologia Molecular e Celular</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/N1113/2015-2016/2-semestre'>Nanotecnologias</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/Neur3517/2015-2016/1-semestre'>Neuroimagiologia</option>
						<option value='http://fenix.tecnico.ulisboa.pt/cursos/mebiol/descricao'>Opção I</option>
						<option value='http://fenix.tecnico.ulisboa.pt/cursos/mebiol/descricao'>Opção II</option>
						<option value='http://fenix.tecnico.ulisboa.pt/cursos/mebiol/descricao'>Opção III</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/PEBiol6451113/2015-2016/2-semestre'>Portfolio em Engenharia Biológica I</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/PEB517/2015-2016/1-semestre'>Portfolio em Engenharia Biológica II</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/PEst336751113/2015-2016/2-semestre'>Probabilidades e Estatística</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/PEQB11451113/2015-2016/2-semestre'>Processos de Engenharia Química e Biológica</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/PS66451113/2015-2016/2-semestre'>Processos de Separação I</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/PEBiolo51113/2015-2016/2-semestre'>Processos em Engenharia Biológica</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/PEBio36451113/2015-2016/2-semestre'>Projecto de Engenharia Biológica</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/Q32517/2015-2016/1-semestre'>Química I</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/Q36451113/2015-2016/2-semestre'>Química II</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/QO236451113/2015-2016/2-semestre'>Química Orgânica I</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/QO36451113/2015-2016/2-semestre'>Química Orgânica II</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/Quim236451113/2015-2016/2-semestre'>Química-Física</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/RB2517/2015-2016/1-semestre'>Reactores Biológicos</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/SPPB2517/2015-2016/1-semestre'>Separação e Purificação de Produtos Biológicos</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/TA2517/2015-2016/1-semestre'>Tecnologia Alimentar</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/TAmb3517/2015-2016/1-semestre'>Tecnologia Ambiental</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/TV6451113/2015-2016/2-semestre'>Tecnologias Verdes e Estratégias de Decisão</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/TQui4517/2015-2016/1-semestre'>Termodinâmica Química</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/TEQ36451113/2015-2016/2-semestre'>Termodinâmica de Engenharia Química</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/AL7051113/2015-2016/2-semestre'>Álgebra Linear</option>					</select>
				</td>
				<td>
					<button type="button" class="btn btn-primary" onclick="processCourseURL()"><span class="glyphicon glyphicon-plus"></span></button>
				</td>
			</tr>
						           		<tr><td></td><td>
						           		<div id="courses">
						      			</div>
						           		</td><td></td></tr>
						           		<tr><td></td><td><input class="btn btn-primary-outline" type="submit" value="Submit"></td><td></td></tr>
							      	  </table>
								</form>
				      	 	</div>
				      	 	</div>
				<?php break; ?>
				<?php case 'mebiom': ?>
							<div id="loading">
		  						<h1>A calcular os melhores horários...</h1>
							</div>
							<div id='errorMessage' style="font-family:'Verdana';color:#DD0000;visibility:hidden">Ocorreu um erro na obtenção da disciplina. É possível que o URL esteja mal formado.</div>
							<div class='container'>
								<form action="generate_timetables.php" method="post">
							          <table style="width:70%;">
				<tr>
				<td>
					<h3>Escolher&nbspuma&nbspcadeira</h3>
				</td>
				<td>
		      		<select class="form-control" id="courseURL">

						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/AMC236451113/2015-2016/2-semestre'>Algoritmos e Modelação Computacional</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/AH2517/2015-2016/1-semestre'>Anatomia e Histologia</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/ACED6751113/2015-2016/2-semestre'>Análise Complexa e Equações Diferenciais</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/AAut2517/2015-2016/1-semestre'>Aprendizagem Automática</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/BE36451113/2015-2016/2-semestre'>Bio-Electricidade</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/BCE51113/2015-2016/2-semestre'>Bioengenharia de Células Estaminais</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/BC2517/2015-2016/1-semestre'>Biologia Computacional</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/BM2517/2015-2016/1-semestre'>Biomecânica do Movimento</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/BT36451113/2015-2016/2-semestre'>Biomecânica dos Tecidos</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/BBM236451113/2015-2016/2-semestre'>Bioquímica e Biologia Molecular</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/CB51113/2015-2016/2-semestre'>Ciência dos Biomateriais</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/CDI14151113/2015-2016/2-semestre'>Cálculo Diferencial e Integral I</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/CDI13451113/2015-2016/2-semestre'>Cálculo Diferencial e Integral II</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/DMEBio36451113/2015-2016/2-semestre'>Dissertação de Mestrado em Engenharia Biomédica</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/EO336451113/2015-2016/2-semestre'>Electromagnetismo e Óptica</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/EGer66451113/2015-2016/2-semestre'>Electrónica Geral</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/EPro3517/2015-2016/1-semestre'>Elementos de Programação</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/EGen2517/2015-2016/1-semestre'>Engenharia Genética</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/ECTec2517/2015-2016/1-semestre'>Engenharia de Células e Tecidos</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/FSis2517/2015-2016/1-semestre'>Fisiologia de Sistemas</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/FRad2517/2015-2016/1-semestre'>Física da Radiação</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/GFC517/2015-2016/1-semestre'>Genómica Funcional e Comparativa</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/Ges236451113/2015-2016/2-semestre'>Gestão</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/GLO1113/2015-2016/2-semestre'>Gestão Logística e de Operações</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/GCMG51113/2015-2016/2-semestre'>Gráfica Computacional e Modelação Geométrica</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/IMed51113/2015-2016/2-semestre'>Imagiologia Médica</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/IBiome-2/2015-2016/2-semestre'>Informática Biomédica</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/IAS51113/2015-2016/2-semestre'>Instrumentação e Aquisição de Sinais em Bioengenharia</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/IEB2517/2015-2016/1-semestre'>Introdução à Engenharia Biomédica</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MC52517/2015-2016/1-semestre'>Matemática Computacional</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MGD2517/2015-2016/1-semestre'>Mecanismos Gerais de Doença</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MApl2517/2015-2016/1-semestre'>Mecânica Aplicada</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MQ22517/2015-2016/1-semestre'>Mecânica Quântica I</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MBio/2015-2016/1-semestre'>Mecânica dos Biofluidos</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MMC36451113/2015-2016/2-semestre'>Mecânica dos Meios Contínuos</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MMCom51113/2015-2016/2-semestre'>Mecânica e Modelação Computacional</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MO5311451113/2015-2016/2-semestre'>Mecânica e Ondas</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MMB34/2015-2016/1-semestre'>Modelos Matemáticos em Biomedicina</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MADec17/2015-2016/1-semestre'>Modelos de Apoio à Decisão</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/N1113/2015-2016/2-semestre'>Nanotecnologias</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/Neur3517/2015-2016/1-semestre'>Neuroimagiologia</option>
						<option value='http://fenix.tecnico.ulisboa.pt/cursos/mebiom/descricao'>Opção Livre</option>
						<option value='http://fenix.tecnico.ulisboa.pt/cursos/mebiom/descricao'>Opção Livre I</option>
						<option value='http://fenix.tecnico.ulisboa.pt/cursos/mebiom/descricao'>Opção Livre II</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/PQF36451113/2015-2016/2-semestre'>Princípios de Química-Física</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/PEst6364101113/2015-2016/2-semestre'>Probabilidades e Estatística</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/PIV2517/2015-2016/1-semestre'>Processamento de Imagem e Visão</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/PDSB6451113/2015-2016/2-semestre'>Processamento de Sinais em Bioengenharia</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/PEBiom517/2015-2016/1-semestre'>Projeto em Engenharia Biomédica</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/Qui36451113/2015-2016/2-semestre'>Química</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/QO336451113/2015-2016/2-semestre'>Química Orgânica</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/Rob36451113/2015-2016/2-semestre'>Robótica</option>
						<option value='http://fenix.tecnico.ulisboa.pt/cursos/mebiom/descricao'>Seminários em Tecnologias Hospitalares - FM/UL</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/SA51113/2015-2016/2-semestre'>Sensores e Actuadores</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/SS2517/2015-2016/1-semestre'>Sinais e Sistemas</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/SSB517/2015-2016/1-semestre'>Sinais e Sistemas em Bioengenharia</option>
						<option value='http://fenix.tecnico.ulisboa.pt/cursos/mebiom/descricao'>Sistemas Integrados e Regulação Metabólica - FM/UL</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/SIBD2517/2015-2016/1-semestre'>Sistemas de Informação e Bases de Dados</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/SSau/2015-2016/2-semestre'>Sistemas de Saúde</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/TB517/2015-2016/1-semestre'>Tecnologia dos Biomateriais</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/TCFE51113/2015-2016/2-semestre'>Teoria dos Circuitos e Fundamentos de Electrónica</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/TEM2517/2015-2016/1-semestre'>Termodinâmica e Estrutura da Matéria</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/AL5751113/2015-2016/2-semestre'>Álgebra Linear</option>					</select>
				</td>
				<td>
					<button type="button" class="btn btn-primary" onclick="processCourseURL()"><span class="glyphicon glyphicon-plus"></span></button>
				</td>
			</tr>
						           		<tr><td></td><td>
						           		<div id="courses">
						      			</div>
						           		</td><td></td></tr>
						           		<tr><td></td><td><input class="btn btn-primary-outline" type="submit" value="Submit"></td><td></td></tr>
							      	  </table>
								</form>
				      	 	</div>
				      	 	</div>
				<?php break; ?>
				<?php case 'mec': ?>
							<div id="loading">
		  						<h1>A calcular os melhores horários...</h1>
							</div>
							<div id='errorMessage' style="font-family:'Verdana';color:#DD0000;visibility:hidden">Ocorreu um erro na obtenção da disciplina. É possível que o URL esteja mal formado.</div>
							<div class='container'>
								<form action="generate_timetables.php" method="post">
							          <table style="width:70%;">
				<tr>
				<td>
					<h3>Escolher&nbspuma&nbspcadeira</h3>
				</td>
				<td>
		      		<select class="form-control" id="courseURL">

						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/ACED7151113/2015-2016/2-semestre'>Análise Complexa e Equações Diferenciais</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/AEG2517/2015-2016/1-semestre'>Análise de Estruturas Geotécnicas</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/AE36451113/2015-2016/2-semestre'>Análise de Estruturas I</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/AE2517/2015-2016/1-semestre'>Análise de Estruturas II</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/Arq36451113/2015-2016/2-semestre'>Arquitectura</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/AIMC36451113/2015-2016/2-semestre'>Avaliação Imobiliária e Manutenção das Construções</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/CT236451113/2015-2016/2-semestre'>Competência Transversal I</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/CT36451113/2015-2016/2-semestre'>Competência Transversal II</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/CP2517/2015-2016/1-semestre'>Computação e Programação</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/CSPG451113/2015-2016/2-semestre'>Conceitos de Segurança e Projecto Geotécnico</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/CAE36451113/2015-2016/2-semestre'>Conforto Ambiental em Edifícios</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/CITra451113/2015-2016/2-semestre'>Conservação de Infraestruturas de Transporte</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/CDI14151113/2015-2016/2-semestre'>Cálculo Diferencial e Integral I</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/CDI142101113/2015-2016/2-semestre'>Cálculo Diferencial e Integral II</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/DASE2517/2015-2016/1-semestre'>Desafios Ambientais e da Sustentabilidade em Engenharia</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/DAC36451113/2015-2016/2-semestre'>Desenho Assistido por Computador</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/DT2517/2015-2016/1-semestre'>Desenho Técnico</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/DEst36451113/2015-2016/2-semestre'>Dimensionamento de Estruturas</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/DEES4517/2015-2016/1-semestre'>Dinâmica Estrutural e Engenharia Sísmica</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/DMEC536451113/2015-2016/2-semestre'>Dissertação de Mestrado em Engenharia Civil - C</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/DMEC436451113/2015-2016/2-semestre'>Dissertação de Mestrado em Engenharia Civil - G</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/DMEC236451113/2015-2016/2-semestre'>Dissertação de Mestrado em Engenharia Civil - Hrh</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/DMEC36451113/2015-2016/2-semestre'>Dissertação de Mestrado em Engenharia Civil - Uts</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/DMEC336451113/2015-2016/2-semestre'>Dissertação de Mestrado em Engenharia Civil - e</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/DUCP22517/2015-2016/1-semestre'>Drenagem Urbana e Controlo da Poluição</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/EPC2517/2015-2016/1-semestre'>Economia e Planeamento na Construção</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/EO62517/2015-2016/1-semestre'>Electromagnetismo e Óptica</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/ECon751113/2015-2016/2-semestre'>Empreendimentos e Contratos</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/ECA2517/2015-2016/1-semestre'>Engenharia Civil e Ambiente</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/EF2517/2015-2016/1-semestre'>Engenharia Ferroviária</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/ESG2517/2015-2016/1-semestre'>Engenharia Sísmica Geotécnica</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/ETR22517/2015-2016/1-semestre'>Engenharia de Tráfego Rodoviário</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/EE56451113/2015-2016/2-semestre'>Estruturas Especiais</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/EMet2517/2015-2016/1-semestre'>Estruturas Metálicas</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/EMM2517/2015-2016/1-semestre'>Estruturas Metálicas e Mistas</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/EAM36451113/2015-2016/2-semestre'>Estruturas de Alvenaria e Madeira</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/EB22517/2015-2016/1-semestre'>Estruturas de Betão I</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/EB36451113/2015-2016/2-semestre'>Estruturas de Betão II</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/EEdi36451113/2015-2016/2-semestre'>Estruturas de Edifícios</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/EAH2517/2015-2016/1-semestre'>Estruturas e Aproveitamentos Hidráulicos</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/FE451113/2015-2016/2-semestre'>Fundações Especiais</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/FCon2517/2015-2016/1-semestre'>Física das Construções</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/Ges236451113/2015-2016/2-semestre'>Gestão</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/GUEI2517/2015-2016/1-semestre'>Gestão Urbanística e Economia do Imobiliário</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/GMU66451113/2015-2016/2-semestre'>Gestão da Mobilidade Urbana</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/GRSol36451113/2015-2016/2-semestre'>Gestão de Resíduos Sólidos</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/GTD2517/2015-2016/1-semestre'>Gestão e Teoria da Decisão</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/HRH36451113/2015-2016/2-semestre'>Hidrologia e Recursos Hídricos</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/H36451113/2015-2016/2-semestre'>Hidráulica I</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/H22517/2015-2016/1-semestre'>Hidráulica II</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/HOM2517/2015-2016/1-semestre'>Hidráulica e Obras Marítimas</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/HRF36451113/2015-2016/2-semestre'>Hidráulica e Reabilitação Fluvial</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/IA56451113/2015-2016/2-semestre'>Impactes Ambientais</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/ITZU851113/2015-2016/2-semestre'>Infraestruturas de Transportes em Zona Urbana</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/IP2517/2015-2016/1-semestre'>Instalações Prediais</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/ITra2517/2015-2016/1-semestre'>Instalações de Tratamento</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/ISIG36451113/2015-2016/2-semestre'>Introdução aos Sistemas de Informação Geográfica</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/IOpe312451113/2015-2016/2-semestre'>Investigação Operacional</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MC536451113/2015-2016/2-semestre'>Matemática Computacional</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MC56451113/2015-2016/2-semestre'>Materiais de Construção I</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MC32517/2015-2016/1-semestre'>Materiais de Construção II</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MPRR36451113/2015-2016/2-semestre'>Materiais de Protecção, Reparação e Reforço</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/Mec36451113/2015-2016/2-semestre'>Mecânica I</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/Mec2517/2015-2016/1-semestre'>Mecânica II</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MSR36451113/2015-2016/2-semestre'>Mecânica dos Solos e das Rochas</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MGeo36451113/2015-2016/2-semestre'>Mineralogia e Geologia</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MAG2517/2015-2016/1-semestre'>Modelação Avançada em Geotecnia</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MAEst36451113/2015-2016/2-semestre'>Modelação e Análise Estrutural</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MAS3517/2015-2016/1-semestre'>Modelação e Avaliação de Sistemas</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MPRH36451113/2015-2016/2-semestre'>Modelação e Planeamento de Recursos Hídricos</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/OG36451113/2015-2016/2-semestre'>Obras Geotécnicas</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/OAte2517/2015-2016/1-semestre'>Obras de Aterro</option>
						<option value='http://fenix.tecnico.ulisboa.pt/cursos/mec/descricao'>Opção Livre</option>
						<option value='http://fenix.tecnico.ulisboa.pt/cursos/mec/descricao'>Opção Livre 1</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/OTP751113/2015-2016/2-semestre'>Ordenamento do Território e da Paisagem</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/OGO36451113/2015-2016/2-semestre'>Organização e Gestão de Obras</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/PRC36451113/2015-2016/2-semestre'>Patologia e Reabilitação da Construção</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/PRU22517/2015-2016/1-semestre'>Planeamento Regional e Urbano</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/PU436451113/2015-2016/2-semestre'>Planeamento Urbano</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/Pon2517/2015-2016/1-semestre'>Pontes</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/PEst6517/2015-2016/1-semestre'>Probabilidades e Estatística</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/PCITra2517/2015-2016/1-semestre'>Processos de Construção em Infraestruturas de Transportes</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/QSAC22517/2015-2016/1-semestre'>Qualidade, Segurança e Ambiente na Construção</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/Qui42517/2015-2016/1-semestre'>Química</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/RREst36451113/2015-2016/2-semestre'>Reabilitação e Reforço de Estruturas</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/RM36451113/2015-2016/2-semestre'>Resistência de Materiais I</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/RM2517/2015-2016/1-semestre'>Resistência de Materiais II</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/S6451113/2015-2016/2-semestre'>Saneamento</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/TES2517/2015-2016/1-semestre'>Taludes e Estruturas de Suporte</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/TCE2517/2015-2016/1-semestre'>Tecnologia da Construção de Edifícios</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/TCOE36451113/2015-2016/2-semestre'>Tecnologia da Construção de Obras de Engenharia</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/TEM236451113/2015-2016/2-semestre'>Termodinâmica e Estrutura da Matéria</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/Top36451113/2015-2016/2-semestre'>Topografia</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/TML851113/2015-2016/2-semestre'>Transporte de Mercadorias e Logística</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/Tra66451113/2015-2016/2-semestre'>Transportes</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/Tun451113/2015-2016/2-semestre'>Túneis</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/UEP2517/2015-2016/1-semestre'>Urbanização e Espaço Público</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/VC2517/2015-2016/1-semestre'>Vias de Comunicação</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/AL5751113/2015-2016/2-semestre'>Álgebra Linear</option>					</select>
				</td>
				<td>
					<button type="button" class="btn btn-primary" onclick="processCourseURL()"><span class="glyphicon glyphicon-plus"></span></button>
				</td>
			</tr>
						           		<tr><td></td><td>
						           		<div id="courses">
						      			</div>
						           		</td><td></td></tr>
						           		<tr><td></td><td><input class="btn btn-primary-outline" type="submit" value="Submit"></td><td></td></tr>
							      	  </table>
								</form>
				      	 	</div>
				      	 	</div>
				<?php break; ?>
				<?php case 'lee': ?>
							<div id="loading">
		  						<h1>A calcular os melhores horários...</h1>
							</div>
							<div id='errorMessage' style="font-family:'Verdana';color:#DD0000;visibility:hidden">Ocorreu um erro na obtenção da disciplina. É possível que o URL esteja mal formado.</div>
							<div class='container'>
								<form action="generate_timetables.php" method="post">
							          <table style="width:70%;">
				<tr>
				<td>
					<h3>Escolher&nbspuma&nbspcadeira</h3>
				</td>
				<td>
		      		<select class="form-control" id="courseURL">

						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/AED101113/2015-2016/2-semestre'>Algoritmos e Estrutura de Dados</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/ACED251113/2015-2016/2-semestre'>Análise Complexa e Equações Diferenciais</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/ACom101113/2015-2016/2-semestre'>Arquitectura de Computadores</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/CEB517/2015-2016/1-semestre'>Circuitos Electrónicos Básicos</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/COE51113/2015-2016/2-semestre'>Comunicação Oral e Escrita</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/CDI391113/2015-2016/2-semestre'>Cálculo Diferencial e Integral I</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/CDI401113/2015-2016/2-semestre'>Cálculo Diferencial e Integral II</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/DMG101113/2015-2016/2-semestre'>Desenho e Modelação Geométrica</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/DEle51113/2015-2016/2-semestre'>Dispositivos Electrónicos</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/EO2217/2015-2016/1-semestre'>Electromagnetismo e Óptica</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/ESEmb101113/2015-2016/2-semestre'>Electrónica dos Sistemas Embebidos</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/FL1517/2015-2016/1-semestre'>Formação Livre I</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/FCont517/2015-2016/1-semestre'>Fundamentos de Controlo</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/Ges1117/2015-2016/1-semestre'>Gestão</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/IASin51113/2015-2016/2-semestre'>Instrumentação e Aquisição de Sinais</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/ICSE817/2015-2016/1-semestre'>Introdução aos Circuitos e Sistemas Electrónicos</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/IRC101113/2015-2016/2-semestre'>Introdução às Redes de Computadores</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MC917/2015-2016/1-semestre'>Matemática Computacional</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MO151113/2015-2016/2-semestre'>Mecânica e Ondas</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MN51113/2015-2016/2-semestre'>Micro e Nanoelectrónica</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/PEst201113/2015-2016/2-semestre'>Probabilidades e Estatística</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/FP17/2015-2016/1-semestre'>Programação</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/PSComp517/2015-2016/1-semestre'>Programação de Sistemas Computacionais</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/PAnt917/2015-2016/1-semestre'>Propagação e Antenas</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/Qui1417/2015-2016/1-semestre'>Química</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/SD917/2015-2016/1-semestre'>Sistemas Digitais</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/SElect/2015-2016/1-semestre'>Sistemas Electromecânicos</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/SCom101113/2015-2016/2-semestre'>Sistemas de Comunicações</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/SSina101113/2015-2016/2-semestre'>Sistemas e Sinais</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/TEM51113/2015-2016/2-semestre'>Termodinâmica e Estrutura da Matéria</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/AL201113/2015-2016/2-semestre'>Álgebra Linear</option>					</select>
				</td>
				<td>
					<button type="button" class="btn btn-primary" onclick="processCourseURL()"><span class="glyphicon glyphicon-plus"></span></button>
				</td>
			</tr>
						           		<tr><td></td><td>
						           		<div id="courses">
						      			</div>
						           		</td><td></td></tr>
						           		<tr><td></td><td><input class="btn btn-primary-outline" type="submit" value="Submit"></td><td></td></tr>
							      	  </table>
								</form>
				      	 	</div>
				      	 	</div>
				<?php break; ?>
				<?php case 'meec': ?>
							<div id="loading">
		  						<h1>A calcular os melhores horários...</h1>
							</div>
							<div id='errorMessage' style="font-family:'Verdana';color:#DD0000;visibility:hidden">Ocorreu um erro na obtenção da disciplina. É possível que o URL esteja mal formado.</div>
							<div class='container'>
								<form action="generate_timetables.php" method="post">
							          <table style="width:70%;">
				<tr>
				<td>
					<h3>Escolher&nbspuma&nbspcadeira</h3>
				</td>
				<td>
		      		<select class="form-control" id="courseURL">

						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/AVE6451113/2015-2016/2-semestre'>Accionamentos e Veículos Eléctricos</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/ADRC2517/2015-2016/1-semestre'>Algoritmia e Desempenho em Redes de Computadores</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/AED91113/2015-2016/2-semestre'>Algoritmos e Estrutura de Dados</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/AT2517/2015-2016/1-semestre'>Alta Tensão</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/Ant36451113/2015-2016/2-semestre'>Antenas</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/ACED-2/2015-2016/2-semestre'>Análise Complexa e Equações Diferenciais</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/AC36451113/2015-2016/2-semestre'>Análise de Circuitos</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/ARed2517/2015-2016/1-semestre'>Análise de Redes</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/AAut2517/2015-2016/1-semestre'>Aprendizagem Automática</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/ACom116451113/2015-2016/2-semestre'>Arquitectura de Computadores</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/ASInt17/2015-2016/1-semestre'>Arquitectura de Sistemas de Internet</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/AAC36451113/2015-2016/2-semestre'>Arquitecturas Avançadas de Computadores</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/APInd2517/2015-2016/1-semestre'>Automação de Processos Industriais</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/BC2517/2015-2016/1-semestre'>Biologia Computacional</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/BBM2517/2015-2016/1-semestre'>Bioquímica e Biologia Molecular</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/-HW6451113/2015-2016/2-semestre'>Co-Projecto Hw/Sw</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/CCD2517/2015-2016/1-semestre'>Compressão e Codificação de Dados</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/CPD13/2015-2016/2-semestre'>Computação Paralela e Distribuída</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/CAV17/2015-2016/1-semestre'>Comunicação de Áudio e Vídeo</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/Cont2517/2015-2016/1-semestre'>Controlo</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/COSE6451113/2015-2016/2-semestre'>Controlo e Optimização de Sistemas de Energia</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/CEE36451113/2015-2016/2-semestre'>Controlo em Espaço de Estados</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/CC2517/2015-2016/1-semestre'>Controlo por Computador</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/CCER6451113/2015-2016/2-semestre'>Conversores Comutados para Energias Renováveis</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/CDI14051113/2015-2016/2-semestre'>Cálculo Diferencial e Integral I</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/CDI13951113/2015-2016/2-semestre'>Cálculo Diferencial e Integral II</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/DMEEC36451113/2015-2016/2-semestre'>Dissertação de Mestrado em Engenharia Electrotécnica e de Computadores</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/EMEne2517/2015-2016/1-semestre'>Economia e Mercados de Energia</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/EO236451113/2015-2016/2-semestre'>Electromagnetismo e Óptica</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/ETeo36451113/2015-2016/2-semestre'>Electrotecnia Teórica</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/E236451113/2015-2016/2-semestre'>Electrónica I</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/E36451113/2015-2016/2-semestre'>Electrónica II</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/ER76451113/2015-2016/2-semestre'>Electrónica Rápida</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/ECom2517/2015-2016/1-semestre'>Electrónica de Computadores</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/EEner2517/2015-2016/1-semestre'>Electrónica de Energia</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/EPot2517/2015-2016/1-semestre'>Electrónica de Potência</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/EITT2517/2015-2016/1-semestre'>Empreendedorismo, Inovação e Transferência de Tecnologia</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/ERPD36451113/2015-2016/2-semestre'>Energias Renováveis e Produção Descentralizada</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/FAD2517/2015-2016/1-semestre'>Filtros Analógicos e Digitais</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/Fot36451113/2015-2016/2-semestre'>Fotónica</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/FEle36451113/2015-2016/2-semestre'>Fundamentos de Electrónica</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/FEE36451113/2015-2016/2-semestre'>Fundamentos de Energia Eléctrica</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/FTel36451113/2015-2016/2-semestre'>Fundamentos de Telecomunicações</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/GFB36451113/2015-2016/2-semestre'>Genómica Funcional e Bioinformática</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/Ges536451113/2015-2016/2-semestre'>Gestão</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/GPE101113/2015-2016/2-semestre'>Gestão de Projectos de Engenharia</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/ISCP17/2015-2016/1-semestre'>Instrumentação Suportada em Computadores Pessoais</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/IM56451113/2015-2016/2-semestre'>Instrumentação e Medidas</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/IASD2517/2015-2016/1-semestre'>Inteligência Artificial e Sistemas de Decisão</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/IIPEEC6451113/2015-2016/2-semestre'>Introdução à Investigação em Engenharia Electrotécnica e de Computadores</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MC4517/2015-2016/1-semestre'>Matemática Computacional</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MO636451113/2015-2016/2-semestre'>Mecânica e Ondas</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/Micro2517/2015-2016/1-semestre'>Microelectrónica</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/Microo2517/2015-2016/1-semestre'>Microondas</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/CIP36451125/2015-2016/2-semestre'>Modelação e Controlo de Sistemas de Manufactura</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MSim36451113/2015-2016/2-semestre'>Modelação e Simulação</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MEle2517/2015-2016/1-semestre'>Máquinas Eléctricas</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/OA2517/2015-2016/1-semestre'>Optimização e Algoritmos</option>
						<option value='http://fenix.tecnico.ulisboa.pt/cursos/meec/meec15'>Opção Livre</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/PMee2517/2015-2016/1-semestre'>Portfólio Meec</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/PEst-3/2015-2016/2-semestre'>Probabilidades e Estatística</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/PDS56451113/2015-2016/2-semestre'>Processamento Digital de Sinais</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/PF36451113/2015-2016/2-semestre'>Processamento da Fala</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/PIV2517/2015-2016/1-semestre'>Processamento de Imagem e Visão</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/PCEEle2517/2015-2016/1-semestre'>Produção e Consumo de Energia Eléctrica</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/Pro36451113/2015-2016/2-semestre'>Programação</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/POO36451113/2015-2016/2-semestre'>Programação Orientada por Objectos</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/PSis6451113/2015-2016/2-semestre'>Programação de Sistemas</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/PSD-2/2015-2016/1-semestre'>Projecto de Sistemas Digitais</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/PROE36451113/2015-2016/2-semestre'>Propagação e Radiação de Ondas Electromagnéticas</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/PASE2517/2015-2016/1-semestre'>Protecções e Automação em Sistemas de Energia</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/Qui4517/2015-2016/1-semestre'>Química</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/R2517/2015-2016/1-semestre'>Radiopropagação</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/RMSF36451113/2015-2016/2-semestre'>Redes Móveis e Sem Fios</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/RCI6451113/2015-2016/2-semestre'>Redes de Computadores e Internet</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/RT2517/2015-2016/1-semestre'>Redes de Telecomunicações</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/RIE36451113/2015-2016/2-semestre'>Redes e Instalações Eléctricas</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/RSI2517/2015-2016/1-semestre'>Redes e Serviços Internet</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/RTR6451113/2015-2016/2-semestre'>Regime Transitório em Redes</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/Rob36451113/2015-2016/2-semestre'>Robótica</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/SIRS17/2015-2016/1-semestre'>Segurança Informática em Redes e Sistemas</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/SA51113/2015-2016/2-semestre'>Sensores e Actuadores</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/SS76451113/2015-2016/2-semestre'>Sinais e Sistemas</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/SAut-2/2015-2016/1-semestre'>Sistemas Autónomos</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/SC51113/2015-2016/2-semestre'>Sistemas Computacionais Embebidos</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/SD4517/2015-2016/1-semestre'>Sistemas Digitais</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/SEPS36451113/2015-2016/2-semestre'>Sistemas Electrónicos de Processamento de Sinal</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/SER6451113/2015-2016/2-semestre'>Sistemas Embebidos em Rede</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/SIA36451113/2015-2016/2-semestre'>Sistemas Integrados Analógicos</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/SAA2517/2015-2016/1-semestre'>Sistemas de Alimentação Autónomos</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/SCM36451113/2015-2016/2-semestre'>Sistemas de Comunicações Móveis</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/SCDTR2517/2015-2016/1-semestre'>Sistemas de Controlo Distribuído em Tempo Real</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/SCC6451113/2015-2016/2-semestre'>Sistemas de Conversão Comutada</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/SIBD2517/2015-2016/1-semestre'>Sistemas de Informação e Bases de Dados</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/STel451113/2015-2016/2-semestre'>Sistemas de Telecomunicações</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/STVR2517/2015-2016/1-semestre'>Sistemas de Telecomunicações Via Rádio</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/STFO36451113/2015-2016/2-semestre'>Sistemas de Telecomunicações por Fibra Óptica</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/TComu517/2015-2016/1-semestre'>Teoria da Comunicação</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/TEM56451113/2015-2016/2-semestre'>Termodinâmica e Estrutura da Matéria</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/TDig451113/2015-2016/2-semestre'>Transmissão Digital</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/AL7051113/2015-2016/2-semestre'>Álgebra Linear</option>					</select>
				</td>
				<td>
					<button type="button" class="btn btn-primary" onclick="processCourseURL()"><span class="glyphicon glyphicon-plus"></span></button>
				</td>
			</tr>
						           		<tr><td></td><td>
						           		<div id="courses">
						      			</div>
						           		</td><td></td></tr>
						           		<tr><td></td><td><input class="btn btn-primary-outline" type="submit" value="Submit"></td><td></td></tr>
							      	  </table>
								</form>
				      	 	</div>
				      	 	</div>
				<?php break; ?>
				<?php case 'meft': ?>
							<div id="loading">
		  						<h1>A calcular os melhores horários...</h1>
							</div>
							<div id='errorMessage' style="font-family:'Verdana';color:#DD0000;visibility:hidden">Ocorreu um erro na obtenção da disciplina. É possível que o URL esteja mal formado.</div>
							<div class='container'>
								<form action="generate_timetables.php" method="post">
							          <table style="width:70%;">
				<tr>
				<td>
					<h3>Escolher&nbspuma&nbspcadeira</h3>
				</td>
				<td>
		      		<select class="form-control" id="courseURL">

						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/ACED6751113/2015-2016/2-semestre'>Análise Complexa e Equações Diferenciais</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/Ast6451113/2015-2016/2-semestre'>Astrofísica</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/B336451113/2015-2016/2-semestre'>Biofísica</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/CEle2517/2015-2016/1-semestre'>Complementos de Electrónica</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/CMQ2517/2015-2016/1-semestre'>Complementos de Mecânica Quântica</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/CTR2517/2015-2016/1-semestre'>Controlo em Tempo Real</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/CDI14151113/2015-2016/2-semestre'>Cálculo Diferencial e Integral I</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/CDI13451113/2015-2016/2-semestre'>Cálculo Diferencial e Integral II</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/DG36451113/2015-2016/2-semestre'>Descargas em Gases</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/DMEFT36451113/2015-2016/2-semestre'>Dissertação de Mestrado em Engª Física Tecnológica</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/ECla2517/2015-2016/1-semestre'>Electrodinâmica Clássica</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/EO336451113/2015-2016/2-semestre'>Electromagnetismo e Óptica</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/EGer2517/2015-2016/1-semestre'>Electrónica Geral</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/ESpi36451113/2015-2016/2-semestre'>Electrónica de Spin</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/ESF-2/2015-2016/1-semestre'>Energia Solar Fotovoltaica</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/EST-2/2015-2016/1-semestre'>Energia Solar Térmica</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/EES2517/2015-2016/1-semestre'>Estrutura Electrónica dos Sólidos</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/FN451113/2015-2016/2-semestre'>Fusão Nuclear</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/FC2517/2015-2016/1-semestre'>Física Computacional</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/FEsta36451113/2015-2016/2-semestre'>Física Estatística</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/FNuc36451113/2015-2016/2-semestre'>Física Nuclear</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/FMC2517/2015-2016/1-semestre'>Física da Matéria Condensada</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/FPar/2015-2016/1-semestre'>Física de Partículas</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/FES36451113/2015-2016/2-semestre'>Física do Estado Sólido</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/FG36451113/2015-2016/2-semestre'>Física do Globo</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/FCL36451113/2015-2016/2-semestre'>Física dos Cristais Líquidos</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/FMCon2517/2015-2016/1-semestre'>Física dos Meios Contínuos</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/FEN36451113/2015-2016/2-semestre'>Física e Engenharia Nuclear</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/FTR36451113/2015-2016/2-semestre'>Física e Tecnologia das Radiações</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/FTP2517/2015-2016/1-semestre'>Física e Tecnologia dos Plasmas</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/FTS36451113/2015-2016/2-semestre'>Física e Tecnologia dos Semicondutores</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/Ges236451113/2015-2016/2-semestre'>Gestão</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/GCT36451113/2015-2016/2-semestre'>Gestão de Ciência e Tecnologia</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/IElec36451113/2015-2016/2-semestre'>Instrumentação Electrónica</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/II451113/2015-2016/2-semestre'>Introdução à Investigação</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/LA2517/2015-2016/1-semestre'>Laboratório de Astrofísica</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/LCET36451113/2015-2016/2-semestre'>Laboratório de Complementos de Electromagnetismo e Termodinâmica</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/LFAOFR2517/2015-2016/1-semestre'>Laboratório de Física Atómica, Óptica e Física das Radiações</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/LFEA36451113/2015-2016/2-semestre'>Laboratório de Física Experimental Avançada</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/LFEB2517/2015-2016/1-semestre'>Laboratório de Física Experimental Básica</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/LFMC2517/2015-2016/1-semestre'>Laboratório de Física da Matéria Condensada</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/LIDes6451113/2015-2016/2-semestre'>Laboratório de Inovação e Desenvolvimento</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/O116451113/2015-2016/2-semestre'>Laboratório de Oficinas</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/LOO2517/2015-2016/1-semestre'>Laboratório de Oscilações e Ondas</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/LRC36451113/2015-2016/2-semestre'>Laboratório de Raios Cósmicos</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MC24517/2015-2016/1-semestre'>Matemática Computacional</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MAna36451113/2015-2016/2-semestre'>Mecânica Analítica</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/METF36451113/2015-2016/2-semestre'>Mecânica Estatística e Transições de Fase</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MGer6451113/2015-2016/2-semestre'>Mecânica Geral</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MQ2517/2015-2016/1-semestre'>Mecânica Quântica I</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MQ6451113/2015-2016/2-semestre'>Mecânica Quântica II</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MO4517/2015-2016/1-semestre'>Mecânica e Ondas</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/Microc2517/2015-2016/1-semestre'>Microcontroladores</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MEFP2517/2015-2016/1-semestre'>Métodos Experimentais em Física de Partículas</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/NN22517/2015-2016/1-semestre'>Nanotecnologias e Nanoelectrónica</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/OIP2517/2015-2016/1-semestre'>Ondas e Instabilidades em Plasmas</option>
						<option value='http://fenix.tecnico.ulisboa.pt/cursos/meft/descricao'>Opção Livre</option>
						<option value='http://fenix.tecnico.ulisboa.pt/cursos/meft/descricao'>Opção de Engenharia 1</option>
						<option value='http://fenix.tecnico.ulisboa.pt/cursos/meft/descricao'>Opção de Engenharia 2</option>
						<option value='http://fenix.tecnico.ulisboa.pt/cursos/meft/descricao'>Opção de Engenharia 3</option>
						<option value='http://fenix.tecnico.ulisboa.pt/cursos/meft/descricao'>Opção de Física 1</option>
						<option value='http://fenix.tecnico.ulisboa.pt/cursos/meft/descricao'>Opção de Física 2</option>
						<option value='http://fenix.tecnico.ulisboa.pt/cursos/meft/descricao'>Opção de Física 3</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/PEst6364101113/2015-2016/2-semestre'>Probabilidades e Estatística</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/Pro22517/2015-2016/1-semestre'>Programação</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/PCLD36451113/2015-2016/2-semestre'>Projecto e Controlo em Lógica Digital</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/Proj451113/2015-2016/2-semestre'>Projecto-Meft</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/Qui36451113/2015-2016/2-semestre'>Química</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/RN36451113/2015-2016/2-semestre'>Reacções Nucleares</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/RCos2517/2015-2016/1-semestre'>Relatividade e Cosmologia</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/SEne/2015-2016/1-semestre'>Serviços de Energia</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/SD36451113/2015-2016/2-semestre'>Sistemas Digitais</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/SDin/2015-2016/1-semestre'>Sistemas Dinâmicos</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/SADad2517/2015-2016/1-semestre'>Sistemas de Aquisição de Dados</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/TE36451113/2015-2016/2-semestre'>Tecnologias Energéticas</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/TPPM2517/2015-2016/1-semestre'>Tecnologias a Plasma para Processamento de Materiais</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/TCP2517/2015-2016/1-semestre'>Teoria Cinética dos Plasmas</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/TCam36451113/2015-2016/2-semestre'>Teoria de Campo</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/TGF2517/2015-2016/1-semestre'>Teoria de Grupos em Física</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/TCFE336451113/2015-2016/2-semestre'>Teoria dos Circuitos e Fundamentos de Electrónica</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/TU36451113/2015-2016/2-semestre'>Teorias de Unificação</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/TEM17/2015-2016/1-semestre'>Termodinâmica e Estrutura da Matéria</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/TMF2517/2015-2016/1-semestre'>Técnicas Matemáticas da Física</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/TDM2517/2015-2016/1-semestre'>Técnicas de Diagnóstico e Medida</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/TIN36451113/2015-2016/2-semestre'>Técnicas de Instrumentação Nuclear</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/TMN56451113/2015-2016/2-semestre'>Técnicas de Micro e Nanofabricação</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/TFPAC2517/2015-2016/1-semestre'>Tópicos Física de Partículas, Astrofísica e Cosmologia</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/TMCon2517/2015-2016/1-semestre'>Tópicos de Matéria Condensada</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/TRGC6451113/2015-2016/2-semestre'>Tópicos em Relatividade Geral e Cosmologia</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/AL5751113/2015-2016/2-semestre'>Álgebra Linear</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/OQL36451113/2015-2016/2-semestre'>Óptica Quântica e Lasers</option>					</select>
				</td>
				<td>
					<button type="button" class="btn btn-primary" onclick="processCourseURL()"><span class="glyphicon glyphicon-plus"></span></button>
				</td>
			</tr>
						           		<tr><td></td><td>
						           		<div id="courses">
						      			</div>
						           		</td><td></td></tr>
						           		<tr><td></td><td><input class="btn btn-primary-outline" type="submit" value="Submit"></td><td></td></tr>
							      	  </table>
								</form>
				      	 	</div>
				      	 	</div>
				<?php break; ?>
				<?php case 'legm': ?>
							<div id="loading">
		  						<h1>A calcular os melhores horários...</h1>
							</div>
							<div id='errorMessage' style="font-family:'Verdana';color:#DD0000;visibility:hidden">Ocorreu um erro na obtenção da disciplina. É possível que o URL esteja mal formado.</div>
							<div class='container'>
								<form action="generate_timetables.php" method="post">
							          <table style="width:70%;">
				<tr>
				<td>
					<h3>Escolher&nbspuma&nbspcadeira</h3>
				</td>
				<td>
		      		<select class="form-control" id="courseURL">

						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/ACED7151113/2015-2016/2-semestre'>Análise Complexa e Equações Diferenciais</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/CP2517/2015-2016/1-semestre'>Computação e Programação</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/CDI14151113/2015-2016/2-semestre'>Cálculo Diferencial e Integral I</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/CDI142101113/2015-2016/2-semestre'>Cálculo Diferencial e Integral II</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/Des36451113/2015-2016/2-semestre'>Desenho</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/EM13/2015-2016/2-semestre'>Economia Mineral</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/EO62517/2015-2016/1-semestre'>Electromagnetismo e Óptica</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/Est236451113/2015-2016/2-semestre'>Estática</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/EOEG36451113/2015-2016/2-semestre'>Expressão Oral e Escrita-Geológica</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/Geol51113/2015-2016/2-semestre'>Geologia</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/Geom2517/2015-2016/1-semestre'>Geomatemática</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/GApl36451113/2015-2016/2-semestre'>Geoquímica Aplicada</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/Ges236451113/2015-2016/2-semestre'>Gestão</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/Hidr36451113/2015-2016/2-semestre'>Hidrogeologia</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/Hidra36451113/2015-2016/2-semestre'>Hidráulica</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/IOpe311451113/2015-2016/2-semestre'>Investigação Operacional</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MC536451113/2015-2016/2-semestre'>Matemática Computacional</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MRoc2517/2015-2016/1-semestre'>Mecânica das Rochas</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MS36451113/2015-2016/2-semestre'>Mecânica dos Solos</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MO5311451113/2015-2016/2-semestre'>Mecânica e Ondas</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MPet517/2015-2016/1-semestre'>Mineralogia e Petrologia</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/P22517/2015-2016/1-semestre'>Pedologia</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/PP116451113/2015-2016/2-semestre'>Portfólio Pessoal - Geológica</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/PEst36451113/2015-2016/2-semestre'>Probabilidades e Estatística</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/PGS517/2015-2016/1-semestre'>Prospecção Geofisica e Sondagens</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/Qui42517/2015-2016/1-semestre'>Química</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/RG451113/2015-2016/2-semestre'>Recursos Geológicos</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/RMin36451113/2015-2016/2-semestre'>Recursos Mineiros</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/RMat22517/2015-2016/1-semestre'>Resistência dos Materiais</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/SCET2517/2015-2016/1-semestre'>Seminários em Ciências de Engenharia da Terra</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/SIG4517/2015-2016/1-semestre'>Sistemas de Informação Geográfica</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/TEM236451113/2015-2016/2-semestre'>Termodinâmica e Estrutura da Matéria</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/Top36451113/2015-2016/2-semestre'>Topografia</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/AL5751113/2015-2016/2-semestre'>Álgebra Linear</option>					</select>
				</td>
				<td>
					<button type="button" class="btn btn-primary" onclick="processCourseURL()"><span class="glyphicon glyphicon-plus"></span></button>
				</td>
			</tr>
						           		<tr><td></td><td>
						           		<div id="courses">
						      			</div>
						           		</td><td></td></tr>
						           		<tr><td></td><td><input class="btn btn-primary-outline" type="submit" value="Submit"></td><td></td></tr>
							      	  </table>
								</form>
				      	 	</div>
				      	 	</div>
				<?php break; ?>
				<?php case 'legi': ?>
							<div id="loading">
		  						<h1>A calcular os melhores horários...</h1>
							</div>
							<div id='errorMessage' style="font-family:'Verdana';color:#DD0000;visibility:hidden">Ocorreu um erro na obtenção da disciplina. É possível que o URL esteja mal formado.</div>
							<div class='container'>
								<form action="generate_timetables.php" method="post">
							          <table style="width:70%;">
				<tr>
				<td>
					<h3>Escolher&nbspuma&nbspcadeira</h3>
				</td>
				<td>
		      		<select class="form-control" id="courseURL">

						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/ACED251113/2015-2016/2-semestre'>Análise Complexa e Equações Diferenciais</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/APro51113/2015-2016/2-semestre'>Avaliação de Projectos</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/CMat51113/2015-2016/2-semestre'>Ciência de Materiais</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/Con517/2015-2016/1-semestre'>Contabilidade</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/CDI391113/2015-2016/2-semestre'>Cálculo Diferencial e Integral I</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/CDI401113/2015-2016/2-semestre'>Cálculo Diferencial e Integral II</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/DMG101113/2015-2016/2-semestre'>Desenho e Modelação Geométrica</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/Dir51113/2015-2016/2-semestre'>Direito Empresarial</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/EO2317/2015-2016/1-semestre'>Electromagnetismo e Óptica</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/EEle51113/2015-2016/2-semestre'>Elementos de Electrotecnia</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/EEC51113/2015-2016/2-semestre'>Elementos de Engenharia Civil</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/EEM517/2015-2016/1-semestre'>Elementos de Engenharia Mecânica</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/EEQ517/2015-2016/1-semestre'>Elementos de Engenharia Química</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/EPro517/2015-2016/1-semestre'>Elementos de Programação</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/FIO51113/2015-2016/2-semestre'>Fundamentos de Investigação Operacional</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/GFin517/2015-2016/1-semestre'>Gestão Financeira</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/GIA/2015-2016/1-semestre'>Gestão Industrial e Ambiente</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/GQS51113/2015-2016/2-semestre'>Gestão da Qualidade e Segurança</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/GO51113/2015-2016/2-semestre'>Gestão de Operações</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/GSE/2015-2016/2-semestre'>Gestão de Sistemas Energéticos</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/IGes517/2015-2016/1-semestre'>Introdução à Gestão</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/M/2015-2016/1-semestre'>Macroeconomia</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/Mar517/2015-2016/1-semestre'>Marketing</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MC51113/2015-2016/2-semestre'>Matemática Computacional</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MO131113/2015-2016/2-semestre'>Mecânica e Ondas</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/Micr51113/2015-2016/2-semestre'>Microeconomia</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/PEst201113/2015-2016/2-semestre'>Probabilidades e Estatística</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/Qui1417/2015-2016/1-semestre'>Química</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/SEGI/2015-2016/1-semestre'>Seminários em Engenharia e Gestão Industrial</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/SIBD51113/2015-2016/2-semestre'>Sistemas de Informação e Bases de Dados</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/TFT91113/2015-2016/2-semestre'>Termodinâmica e Fenómenos de Transporte</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/AL201113/2015-2016/2-semestre'>Álgebra Linear</option>					</select>
				</td>
				<td>
					<button type="button" class="btn btn-primary" onclick="processCourseURL()"><span class="glyphicon glyphicon-plus"></span></button>
				</td>
			</tr>
						           		<tr><td></td><td>
						           		<div id="courses">
						      			</div>
						           		</td><td></td></tr>
						           		<tr><td></td><td><input class="btn btn-primary-outline" type="submit" value="Submit"></td><td></td></tr>
							      	  </table>
								</form>
				      	 	</div>
				      	 	</div>
				<?php break; ?>
				<?php case 'leic-a': ?>
							<div id="loading">
		  						<h1>A calcular os melhores horários...</h1>
							</div>
							<div id='errorMessage' style="font-family:'Verdana';color:#DD0000;visibility:hidden">Ocorreu um erro na obtenção da disciplina. É possível que o URL esteja mal formado.</div>
							<div class='container'>
								<form action="generate_timetables.php" method="post">
							          <table style="width:70%;">
				<tr>
				<td>
					<h3>Escolher&nbspuma&nbspcadeira</h3>
				</td>
				<td>
		      		<select class="form-control" id="courseURL">

						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/ACED5851113/2015-2016/2-semestre'>Análise Complexa e Equações Diferenciais</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/AMS1113/2015-2016/2-semestre'>Análise e Modelação de Sistemas</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/ASA76451113/2015-2016/2-semestre'>Análise e Síntese de Algoritmos</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/BD22517/2015-2016/1-semestre'>Bases de Dados</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/Com56451113/2015-2016/2-semestre'>Compiladores</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/CGra4517/2015-2016/1-semestre'>Computação Gráfica</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/CS1113/2015-2016/2-semestre'>Computação e Sociedade</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/CDI11651113/2015-2016/2-semestre'>Cálculo Diferencial e Integral I</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/CDI14291113/2015-2016/2-semestre'>Cálculo Diferencial e Integral II</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/EO101113/2015-2016/2-semestre'>Electromagnetismo e Óptica</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/ESof96451113/2015-2016/2-semestre'>Engenharia de Software</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/FP4517/2015-2016/1-semestre'>Fundamentos da Programação</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/Ges5517/2015-2016/1-semestre'>Gestão</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/IArt4517/2015-2016/1-semestre'>Inteligência Artificial</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/IPM201113/2015-2016/2-semestre'>Interfaces Pessoa Máquina</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/IAED76451113/2015-2016/2-semestre'>Introdução aos Algoritmos e Estruturas de Dados</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/IAC4517/2015-2016/1-semestre'>Introdução à Arquitetura de Computadores</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/IEI717/2015-2016/1-semestre'>Introdução à Engenharia Informática</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/LP56451113/2015-2016/2-semestre'>Lógica para Programação</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MD56451113/2015-2016/2-semestre'>Matemática Discreta</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MO6517/2015-2016/1-semestre'>Mecânica e Ondas</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/OC1117/2015-2016/1-semestre'>Organização de Computadores</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/PEst36451113/2015-2016/2-semestre'>Probabilidades e Estatística</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/PO6517/2015-2016/1-semestre'>Programação com Objectos</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/RC4517/2015-2016/1-semestre'>Redes de Computadores</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/SDis126451113/2015-2016/2-semestre'>Sistemas Distribuídos</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/SO4517/2015-2016/1-semestre'>Sistemas Operativos</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/TCom51113/2015-2016/2-semestre'>Teoria da Computação</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/AL7051113/2015-2016/2-semestre'>Álgebra Linear</option>					</select>
				</td>
				<td>
					<button type="button" class="btn btn-primary" onclick="processCourseURL()"><span class="glyphicon glyphicon-plus"></span></button>
				</td>
			</tr>
						           		<tr><td></td><td>
						           		<div id="courses">
						      			</div>
						           		</td><td></td></tr>
						           		<tr><td></td><td><input class="btn btn-primary-outline" type="submit" value="Submit"></td><td></td></tr>
							      	  </table>
								</form>
				      	 	</div>
				      	 	</div>
				<?php break; ?>
				<?php case 'leic-t': ?>
							<div id="loading">
		  						<h1>A calcular os melhores horários...</h1>
							</div>
							<div id='errorMessage' style="font-family:'Verdana';color:#DD0000;visibility:hidden">Ocorreu um erro na obtenção da disciplina. É possível que o URL esteja mal formado.</div>
							<div class='container'>
								<form action="generate_timetables.php" method="post">
							          <table style="width:70%;">
				<tr>
				<td>
					<h3>Escolher&nbspuma&nbspcadeira</h3>
				</td>
				<td>
		      		<select class="form-control" id="courseURL">

						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/ACED251113/2015-2016/2-semestre'>Análise Complexa e Equações Diferenciais</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/AMS1113/2015-2016/2-semestre'>Análise e Modelação de Sistemas</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/ASA101113/2015-2016/2-semestre'>Análise e Síntese de Algoritmos</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/BD817/2015-2016/1-semestre'>Bases de Dados</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/Com56451113/2015-2016/2-semestre'>Compiladores</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/CGra817/2015-2016/1-semestre'>Computação Gráfica</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/CS1113/2015-2016/2-semestre'>Computação e Sociedade</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/CDI391113/2015-2016/2-semestre'>Cálculo Diferencial e Integral I</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/CDI401113/2015-2016/2-semestre'>Cálculo Diferencial e Integral II</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/EO91113/2015-2016/2-semestre'>Electromagnetismo e Óptica</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/ESof141113/2015-2016/2-semestre'>Engenharia de Software</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/FP17/2015-2016/1-semestre'>Fundamentos da Programação</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/Ges1117/2015-2016/1-semestre'>Gestão</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/IArt917/2015-2016/1-semestre'>Inteligência Artificial</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/IPM171113/2015-2016/2-semestre'>Interfaces Pessoa Máquina</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/IAED101113/2015-2016/2-semestre'>Introdução aos Algoritmos e Estruturas de Dados</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/IAC317/2015-2016/1-semestre'>Introdução à Arquitetura de Computadores</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/IEI717/2015-2016/1-semestre'>Introdução à Engenharia Informática</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/LP51113/2015-2016/2-semestre'>Lógica para Programação</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MD51113/2015-2016/2-semestre'>Matemática Discreta</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MO317/2015-2016/1-semestre'>Mecânica e Ondas</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/OC1217/2015-2016/1-semestre'>Organização de Computadores</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/PEst201113/2015-2016/2-semestre'>Probabilidades e Estatística</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/PO1717/2015-2016/1-semestre'>Programação com Objectos</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/RC917/2015-2016/1-semestre'>Redes de Computadores</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/SDis151113/2015-2016/2-semestre'>Sistemas Distribuídos</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/SO717/2015-2016/1-semestre'>Sistemas Operativos</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/TCom1113/2015-2016/2-semestre'>Teoria da Computação</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/AL201113/2015-2016/2-semestre'>Álgebra Linear</option>					</select>
				</td>
				<td>
					<button type="button" class="btn btn-primary" onclick="processCourseURL()"><span class="glyphicon glyphicon-plus"></span></button>
				</td>
			</tr>
						           		<tr><td></td><td>
						           		<div id="courses">
						      			</div>
						           		</td><td></td></tr>
						           		<tr><td></td><td><input class="btn btn-primary-outline" type="submit" value="Submit"></td><td></td></tr>
							      	  </table>
								</form>
				      	 	</div>
				      	 	</div>
				<?php break; ?>
				<?php case 'lemat': ?>
							<div id="loading">
		  						<h1>A calcular os melhores horários...</h1>
							</div>
							<div id='errorMessage' style="font-family:'Verdana';color:#DD0000;visibility:hidden">Ocorreu um erro na obtenção da disciplina. É possível que o URL esteja mal formado.</div>
							<div class='container'>
								<form action="generate_timetables.php" method="post">
							          <table style="width:70%;">
				<tr>
				<td>
					<h3>Escolher&nbspuma&nbspcadeira</h3>
				</td>
				<td>
		      		<select class="form-control" id="courseURL">

						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/ACED-2/2015-2016/2-semestre'>Análise Complexa e Equações Diferenciais</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/BBM236451113/2015-2016/2-semestre'>Bioquímica e Biologia Molecular</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/CP32517/2015-2016/1-semestre'>Computação e Programação</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/CEM36451113/2015-2016/2-semestre'>Cristalografia e Estrutura de Materiais</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/CDI14051113/2015-2016/2-semestre'>Cálculo Diferencial e Integral I</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/CDI131101113/2015-2016/2-semestre'>Cálculo Diferencial e Integral II</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/DPM36451113/2015-2016/2-semestre'>Degradação e Protecção de Materiais</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/DMG22517/2015-2016/1-semestre'>Desenho e Modelação Geométrica I</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/DM36451113/2015-2016/2-semestre'>Design e Selecção de Materiais</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/EO52517/2015-2016/1-semestre'>Electromagnetismo e Óptica</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/ECTec51113/2015-2016/2-semestre'>Engenharia de Células e Tecidos</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/ECM2517/2015-2016/1-semestre'>Ensaios e Caracterização de Materiais</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/FT32517/2015-2016/1-semestre'>Fenómenos de Transferência</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/FM2517/2015-2016/1-semestre'>Física dos Materiais</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/Ges236451113/2015-2016/2-semestre'>Gestão</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/IEM2517/2015-2016/1-semestre'>Introdução à Engenharia de Materiais</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MC62517/2015-2016/1-semestre'>Matemática Computacional</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MCV36451113/2015-2016/2-semestre'>Materiais Cerâmicos e Vidros</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MM36451113/2015-2016/2-semestre'>Materiais Metálicos</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MP2517/2015-2016/1-semestre'>Materiais Poliméricos</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MCon36451113/2015-2016/2-semestre'>Materiais de Construção</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MMat36451113/2015-2016/2-semestre'>Mecânica dos Materiais</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MO336451113/2015-2016/2-semestre'>Mecânica e Ondas</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/PEst-3/2015-2016/2-semestre'>Probabilidades e Estatística</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/PExt17/2015-2016/1-semestre'>Processos Extractivos</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/PMMat2517/2015-2016/1-semestre'>Propriedades Mecânicas dos Materiais</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/Qui52517/2015-2016/1-semestre'>Química</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/QO336451113/2015-2016/2-semestre'>Química Orgânica</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/SEM36451113/2015-2016/2-semestre'>Seminários de Engenharia de Materiais I</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/SEMII36451113/2015-2016/2-semestre'>Seminários de Engenharia de Materiais II</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/SInte36451113/2015-2016/2-semestre'>Superfícies e Interfaces</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/TQui32517/2015-2016/1-semestre'>Termodinâmica Química</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/TF36451113/2015-2016/2-semestre'>Transformações de Fase</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/AL7051113/2015-2016/2-semestre'>Álgebra Linear</option>					</select>
				</td>
				<td>
					<button type="button" class="btn btn-primary" onclick="processCourseURL()"><span class="glyphicon glyphicon-plus"></span></button>
				</td>
			</tr>
						           		<tr><td></td><td>
						           		<div id="courses">
						      			</div>
						           		</td><td></td></tr>
						           		<tr><td></td><td><input class="btn btn-primary-outline" type="submit" value="Submit"></td><td></td></tr>
							      	  </table>
								</form>
				      	 	</div>
				      	 	</div>
				<?php break; ?>
				<?php case 'memec': ?>
							<div id="loading">
		  						<h1>A calcular os melhores horários...</h1>
							</div>
							<div id='errorMessage' style="font-family:'Verdana';color:#DD0000;visibility:hidden">Ocorreu um erro na obtenção da disciplina. É possível que o URL esteja mal formado.</div>
							<div class='container'>
								<form action="generate_timetables.php" method="post">
							          <table style="width:70%;">
				<tr>
				<td>
					<h3>Escolher&nbspuma&nbspcadeira</h3>
				</td>
				<td>
		      		<select class="form-control" id="courseURL">

						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/Aer2517/2015-2016/1-semestre'>Aerodinâmica</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/ACED6651113/2015-2016/2-semestre'>Análise Complexa e Equações Diferenciais</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/AInd36451113/2015-2016/2-semestre'>Automação Industrial</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/CMat56451113/2015-2016/2-semestre'>Ciência de Materiais</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/CE3517/2015-2016/1-semestre'>Climatização de Edifícios</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/C36451113/2015-2016/2-semestre'>Combustão</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/CTM2517/2015-2016/1-semestre'>Complementos de Tecnologia Mecânica</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/CTCal36451113/2015-2016/2-semestre'>Complementos de Transmissão de Calor</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/CMM2517/2015-2016/1-semestre'>Comportamento Mecânico dos Materiais</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/CP22517/2015-2016/1-semestre'>Computação e Programação</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/CIP-RAAI/2015-2016/2-semestre'>Controlo Integrado da Produção</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/CSis36451113/2015-2016/2-semestre'>Controlo de Sistemas</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/CO6451113/2015-2016/2-semestre'>Controlo Óptimo</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/CDI13251113/2015-2016/2-semestre'>Cálculo Diferencial e Integral I</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/CDI-II-3/2015-2016/2-semestre'>Cálculo Diferencial e Integral II</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/DMG22517/2015-2016/1-semestre'>Desenho e Modelação Geométrica I</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/DMG76451113/2015-2016/2-semestre'>Desenho e Modelação Geométrica II</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/DPE2517/2015-2016/1-semestre'>Desenvolvimento de Produto e Empreendedorismo</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/DSM236451113/2015-2016/2-semestre'>Dinâmica de Sistemas Mecânicos</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/DMEM36451113/2015-2016/2-semestre'>Dissertação de Mestrado em Engenharia Mecânica</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/EI22517/2015-2016/1-semestre'>Ecologia Industrial</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/EO22517/2015-2016/1-semestre'>Electromagnetismo e Óptica</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/ETra3517/2015-2016/1-semestre'>Energia nos Transportes</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/ERen2517/2015-2016/1-semestre'>Energias Renováveis</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/EPla2517/2015-2016/1-semestre'>Enformação Plástica</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/ETer36451113/2015-2016/2-semestre'>Equipamentos Térmicos</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/FInd4517/2015-2016/1-semestre'>Frio Industrial</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/Ges536451113/2015-2016/2-semestre'>Gestão</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/GPro2517/2015-2016/1-semestre'>Gestão da Produção</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/GEne517/2015-2016/1-semestre'>Gestão de Energia</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/GProj36451113/2015-2016/2-semestre'>Gestão de Projectos</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/ISis2517/2015-2016/1-semestre'>Identificação de Sistemas</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/IDS4517/2015-2016/1-semestre'>Inovação e Desenvolvimento Sustentável</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/IEMec2517/2015-2016/1-semestre'>Introdução à Engenharia Mecânica</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/Maq36451113/2015-2016/2-semestre'>Maquinagem</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MC23517/2015-2016/1-semestre'>Matemática Computacional</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MCL2517/2015-2016/1-semestre'>Materiais Compósitos Laminados</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MEng2517/2015-2016/1-semestre'>Materiais em Engenharia</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MA12517/2015-2016/1-semestre'>Mecânica Aplicada I</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MA36451113/2015-2016/2-semestre'>Mecânica Aplicada II</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MComp36451113/2015-2016/2-semestre'>Mecânica Computacional</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MEstru2517/2015-2016/1-semestre'>Mecânica Estrutural</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MFC3517/2015-2016/1-semestre'>Mecânica de Fluídos Computacional</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MF22517/2015-2016/1-semestre'>Mecânica dos Fluidos I</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MF36451113/2015-2016/2-semestre'>Mecânica dos Fluídos II</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MMat36451113/2015-2016/2-semestre'>Mecânica dos Materiais</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MSol2517/2015-2016/1-semestre'>Mecânica dos Sólidos</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MO436451113/2015-2016/2-semestre'>Mecânica e Ondas</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MQua2517/2015-2016/1-semestre'>Metrologia e Qualidade</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/M3517/2015-2016/1-semestre'>Micro-Fabrico</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MTer2517/2015-2016/1-semestre'>Motores Térmicos</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MF236451113/2015-2016/2-semestre'>Máquinas-Ferramenta</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MEEA2517/2015-2016/1-semestre'>Métodos Experimentais em Energia e Ambiente</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/OESM22517/2015-2016/1-semestre'>Optimização de Estruturas e Sistemas Mecânicos</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/OD6451113/2015-2016/2-semestre'>Optimização e Decisão</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/OM336451113/2015-2016/2-semestre'>Orgãos de Máquinas</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/PPes36451113/2015-2016/2-semestre'>Portfólio Pessoal</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/PEst-2/2015-2016/2-semestre'>Probabilidades e Estatística</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/PLig36451113/2015-2016/2-semestre'>Processos de Ligação</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/POBD2517/2015-2016/1-semestre'>Programação por Objectos e Bases de Dados</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/PMeca2517/2015-2016/1-semestre'>Projecto Mecânico</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/Qui32517/2015-2016/1-semestre'>Química</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/RMan36451113/2015-2016/2-semestre'>Robótica de Manipulação</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/SI2517/2015-2016/1-semestre'>Segurança Industrial</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/SSM2517/2015-2016/1-semestre'>Sinais e Sistemas Mecatrónicos</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/SEE36451113/2015-2016/2-semestre'>Sistemas Eléctricos e Electromecânicos</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/CDI10517/2015-2016/1-semestre'>Sistemas Inteligentes</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/SMec2517/2015-2016/1-semestre'>Sistemas Mecatrónicos</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/TM236451113/2015-2016/2-semestre'>Tecnologia Mecânica</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/T36451113/2015-2016/2-semestre'>Termodinâmica I</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/T22517/2015-2016/1-semestre'>Termodinâmica II</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/TPF2517/2015-2016/1-semestre'>Transformação de Polímeros e Fundição</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/TCal2517/2015-2016/1-semestre'>Transmissão de Calor</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/TMan2517/2015-2016/1-semestre'>Tribologia e Manutenção</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/Tur36451113/2015-2016/2-semestre'>Turbomáquinas</option>
						<option value='http://fenix.tecnico.ulisboa.pt/cursos/memec/descricao'>UC de Qualquer Área de Especialização</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/VRui2517/2015-2016/1-semestre'>Vibrações e Ruído</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/VComp2517/2015-2016/1-semestre'>Visão Computacional</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/AL7051113/2015-2016/2-semestre'>Álgebra Linear</option>					</select>
				</td>
				<td>
					<button type="button" class="btn btn-primary" onclick="processCourseURL()"><span class="glyphicon glyphicon-plus"></span></button>
				</td>
			</tr>
						           		<tr><td></td><td>
						           		<div id="courses">
						      			</div>
						           		</td><td></td></tr>
						           		<tr><td></td><td><input class="btn btn-primary-outline" type="submit" value="Submit"></td><td></td></tr>
							      	  </table>
								</form>
				      	 	</div>
				      	 	</div>
				<?php break; ?>
				<?php case 'meq': ?>
							<div id="loading">
		  						<h1>A calcular os melhores horários...</h1>
							</div>
							<div id='errorMessage' style="font-family:'Verdana';color:#DD0000;visibility:hidden">Ocorreu um erro na obtenção da disciplina. É possível que o URL esteja mal formado.</div>
							<div class='container'>
								<form action="generate_timetables.php" method="post">
							          <table style="width:70%;">
				<tr>
				<td>
					<h3>Escolher&nbspuma&nbspcadeira</h3>
				</td>
				<td>
		      		<select class="form-control" id="courseURL">

						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/ACED6451113/2015-2016/2-semestre'>Análise Complexa e Equações Diferenciais</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/AQ2517/2015-2016/1-semestre'>Análise Química</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/AEne/2015-2016/1-semestre'>Armazenamento de Energia</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/Bioc2517/2015-2016/1-semestre'>Biocombustíveis</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/BBM236451113/2015-2016/2-semestre'>Bioquímica e Biologia Molecular</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/Biot36451113/2015-2016/2-semestre'>Biotecnologia</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/BAmb51113/2015-2016/2-semestre'>Biotecnologia Ambiental</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/CPC2517/2015-2016/1-semestre'>Catálise e Processos Catalíticos</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/CTP36451113/2015-2016/2-semestre'>Ciência e Tecnologia de Polímeros</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/CAlt51113/2015-2016/2-semestre'>Combustiveis Alternativos</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/CFT36451113/2015-2016/2-semestre'>Complementos de Fenómenos de Transferência</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/CP32517/2015-2016/1-semestre'>Computação e Programação</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/CAP13/2015-2016/2-semestre'>Controlo Avançado de Processos</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/CDI14051113/2015-2016/2-semestre'>Cálculo Diferencial e Integral I</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/CDI13191113/2015-2016/2-semestre'>Cálculo Diferencial e Integral II</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/DPM36451113/2015-2016/2-semestre'>Degradação e Protecção de Materiais</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/DE36451113/2015-2016/2-semestre'>Dimensionamento de Equipamento</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/DSCP36451113/2015-2016/2-semestre'>Dinâmica de Sistemas e Controle de Processos</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/DMEQ36451113/2015-2016/2-semestre'>Dissertação de Mestrado em Engenharia Química</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/EO36451113/2015-2016/2-semestre'>Electromagnetismo e Óptica</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/EEne751113/2015-2016/2-semestre'>Electroquímica e Energia</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/EITT32517/2015-2016/1-semestre'>Empreendedorismo, Inovação e Transferência de Tecnologia</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/EQI2517/2015-2016/1-semestre'>Engenharia Química Integrada</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/EQBS22517/2015-2016/1-semestre'>Engenharia Química, Biotecnologia e Sociedade</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/ER2517/2015-2016/1-semestre'>Engenharia das Reacções I</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/ER22517/2015-2016/1-semestre'>Engenharia das Reacções II</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/EAS2517/2015-2016/1-semestre'>Estratégias Avançadas de Síntese</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/FT36451113/2015-2016/2-semestre'>Fenómenos de Transferência I</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/FT236451113/2015-2016/2-semestre'>Fenómenos de Transferência II</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/GPetr13/2015-2016/2-semestre'>Geoquímica do Petróleo</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/Ges236451113/2015-2016/2-semestre'>Gestão</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/GLO1113/2015-2016/2-semestre'>Gestão Logística e de Operações</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/GPQT36451113/2015-2016/2-semestre'>Gestão Pela Qualidade Total</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/GPO2517/2015-2016/1-semestre'>Gestão da Produção e das Operações</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/LCEQ22517/2015-2016/1-semestre'>Laboratórios de Ciências de Engenharia Química</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/LEQ236451113/2015-2016/2-semestre'>Laboratórios de Engenharia Química I</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/LEQ2517/2015-2016/1-semestre'>Laboratórios de Engenharia Química II</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/LEQ36451113/2015-2016/2-semestre'>Laboratórios de Engenharia Química III</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/LQ2517/2015-2016/1-semestre'>Laboratórios de Química I</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/LQ36451113/2015-2016/2-semestre'>Laboratórios de Química II</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/LQ22517/2015-2016/1-semestre'>Laboratórios de Química III</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MC62517/2015-2016/1-semestre'>Matemática Computacional</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/Mat36451113/2015-2016/2-semestre'>Materiais</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MO336451113/2015-2016/2-semestre'>Mecânica e Ondas</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/N32517/2015-2016/1-semestre'>Nanotecnologias</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/OSM36451113/2015-2016/2-semestre'>Operações em Sistemas Multifásicos</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/OPro2517/2015-2016/1-semestre'>Optimização de Processos</option>
						<option value='http://fenix.tecnico.ulisboa.pt/cursos/meq/descricao'>Opção I</option>
						<option value='http://fenix.tecnico.ulisboa.pt/cursos/meq/descricao'>Opção II</option>
						<option value='http://fenix.tecnico.ulisboa.pt/cursos/meq/descricao'>Opção III</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/PIO66451113/2015-2016/2-semestre'>Planificação e Investigação Operacional</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/PATEG36451113/2015-2016/2-semestre'>Poluição Atmosférica e Tratamento de Efluentes Gasosos</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/PEQ6451113/2015-2016/2-semestre'>Portfolio em Engenharia Química I</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/PEQui17/2015-2016/1-semestre'>Portfolio em Engenharia Química II</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/PEst336751113/2015-2016/2-semestre'>Probabilidades e Estatística</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/PEQB36851113/2015-2016/2-semestre'>Processos de Engenharia Química</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/PEQB12451113/2015-2016/2-semestre'>Processos de Engenharia Química e Biológica</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/PS66451113/2015-2016/2-semestre'>Processos de Separação I</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/PS22517/2015-2016/1-semestre'>Processos de Separação II</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/PEQ236451113/2015-2016/2-semestre'>Projecto de Engenharia Química I</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/PEQ36451113/2015-2016/2-semestre'>Projecto de Engenharia Química II</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/PTFMP451113/2015-2016/2-semestre'>Propriedades Termofísicas de Fluidos; Medição e Previsão</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/Q52517/2015-2016/1-semestre'>Quimiometria</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/Q2517/2015-2016/1-semestre'>Química I</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/Q236451113/2015-2016/2-semestre'>Química II</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/QI22517/2015-2016/1-semestre'>Química Industrial</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/QM2517/2015-2016/1-semestre'>Química Medicinal</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/QO236451113/2015-2016/2-semestre'>Química Orgânica I</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/QO36451113/2015-2016/2-semestre'>Química Orgânica II</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/QQ2517/2015-2016/1-semestre'>Química Quântica</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/Quim36451113/2015-2016/2-semestre'>Química-Física</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/RPP3517/2015-2016/1-semestre'>Refinação de Petróleo e Petroquímica</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/SHI51113/2015-2016/2-semestre'>Segurança e Higiene Industrial</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/SIDS/2015-2016/1-semestre'>Seminários sobre Inovação e Desenvolvimento Sustentável</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/SIC17/2015-2016/1-semestre'>Superfícies, Interfaces e Colóides</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/SDP2517/2015-2016/1-semestre'>Supervisão e Diagnóstico de Processos</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/SIPro36451113/2015-2016/2-semestre'>Síntese e Integração de Processos</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/TA2517/2015-2016/1-semestre'>Tecnologia Alimentar</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/TAmb3517/2015-2016/1-semestre'>Tecnologia Ambiental</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/TV6451113/2015-2016/2-semestre'>Tecnologias Verdes e Estratégias de Decisão</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/TQui36451113/2015-2016/2-semestre'>Termodinâmica Química</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/TEQ36451113/2015-2016/2-semestre'>Termodinâmica de Engenharia Química</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/TMN56451113/2015-2016/2-semestre'>Técnicas de Micro e Nanofabricação</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/VER517/2015-2016/1-semestre'>Valorização Energética de Resíduos</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/AL7051113/2015-2016/2-semestre'>Álgebra Linear</option>					</select>
				</td>
				<td>
					<button type="button" class="btn btn-primary" onclick="processCourseURL()"><span class="glyphicon glyphicon-plus"></span></button>
				</td>
			</tr>
						           		<tr><td></td><td>
						           		<div id="courses">
						      			</div>
						           		</td><td></td></tr>
						           		<tr><td></td><td><input class="btn btn-primary-outline" type="submit" value="Submit"></td><td></td></tr>
							      	  </table>
								</form>
				      	 	</div>
				      	 	</div>
				<?php break; ?>
				<?php case 'lerc': ?>
							<div id="loading">
		  						<h1>A calcular os melhores horários...</h1>
							</div>
							<div id='errorMessage' style="font-family:'Verdana';color:#DD0000;visibility:hidden">Ocorreu um erro na obtenção da disciplina. É possível que o URL esteja mal formado.</div>
							<div class='container'>
								<form action="generate_timetables.php" method="post">
							          <table style="width:70%;">
				<tr>
				<td>
					<h3>Escolher&nbspuma&nbspcadeira</h3>
				</td>
				<td>
		      		<select class="form-control" id="courseURL">

						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/ACED251113/2015-2016/2-semestre'>Análise Complexa e Equações Diferenciais</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/ACom101113/2015-2016/2-semestre'>Arquitectura de Computadores</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/ARede917/2015-2016/1-semestre'>Arquitecturas de Redes</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/BD817/2015-2016/1-semestre'>Bases de Dados</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/CDI391113/2015-2016/2-semestre'>Cálculo Diferencial e Integral I</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/CDI401113/2015-2016/2-semestre'>Cálculo Diferencial e Integral II</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/EO2217/2015-2016/1-semestre'>Electromagnetismo e Óptica</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/ESEmb101113/2015-2016/2-semestre'>Electrónica dos Sistemas Embebidos</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/EMD/2015-2016/1-semestre'>Elementos de Matemática Discreta</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/ESof141113/2015-2016/2-semestre'>Engenharia de Software</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/FP17/2015-2016/1-semestre'>Fundamentos da Programação</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/Ges1117/2015-2016/1-semestre'>Gestão</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/GRS51113/2015-2016/2-semestre'>Gestão e Segurança de Redes</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/IAED101113/2015-2016/2-semestre'>Introdução aos Algoritmos e Estruturas de Dados</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/ICSE817/2015-2016/1-semestre'>Introdução aos Circuitos e Sistemas Electrónicos</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/IETI1113/2015-2016/2-semestre'>Introdução à Engenharia de Telecomunicações e Informática</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/IIPM51113/2015-2016/2-semestre'>Introdução às Interfaces Pessoa-Máquina</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/IRC101113/2015-2016/2-semestre'>Introdução às Redes de Computadores</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MC917/2015-2016/1-semestre'>Matemática Computacional</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MO151113/2015-2016/2-semestre'>Mecânica e Ondas</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/PPess51113/2015-2016/2-semestre'>Portfolio Pessoal A</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/PEst201113/2015-2016/2-semestre'>Probabilidades e Estatística</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/PO1717/2015-2016/1-semestre'>Programação com Objectos</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/PAnt917/2015-2016/1-semestre'>Propagação e Antenas</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/SD917/2015-2016/1-semestre'>Sistemas Digitais</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/SDis151113/2015-2016/2-semestre'>Sistemas Distribuídos</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/SO717/2015-2016/1-semestre'>Sistemas Operativos</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/SCom101113/2015-2016/2-semestre'>Sistemas de Comunicações</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/SSina101113/2015-2016/2-semestre'>Sistemas e Sinais</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/AL201113/2015-2016/2-semestre'>Álgebra Linear</option>					</select>
				</td>
				<td>
					<button type="button" class="btn btn-primary" onclick="processCourseURL()"><span class="glyphicon glyphicon-plus"></span></button>
				</td>
			</tr>
						           		<tr><td></td><td>
						           		<div id="courses">
						      			</div>
						           		</td><td></td></tr>
						           		<tr><td></td><td><input class="btn btn-primary-outline" type="submit" value="Submit"></td><td></td></tr>
							      	  </table>
								</form>
				      	 	</div>
				      	 	</div>
				<?php break; ?>
				<?php case 'lmac': ?>
							<div id="loading">
		  						<h1>A calcular os melhores horários...</h1>
							</div>
							<div id='errorMessage' style="font-family:'Verdana';color:#DD0000;visibility:hidden">Ocorreu um erro na obtenção da disciplina. É possível que o URL esteja mal formado.</div>
							<div class='container'>
								<form action="generate_timetables.php" method="post">
							          <table style="width:70%;">
				<tr>
				<td>
					<h3>Escolher&nbspuma&nbspcadeira</h3>
				</td>
				<td>
		      		<select class="form-control" id="courseURL">

						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/AMC236451113/2015-2016/2-semestre'>Algoritmos e Modelação Computacional</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/AC22517/2015-2016/1-semestre'>Análise Complexa</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/ACED6751113/2015-2016/2-semestre'>Análise Complexa e Equações Diferenciais</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/AF36451113/2015-2016/2-semestre'>Análise Funcional</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/AN2517/2015-2016/1-semestre'>Análise Numérica</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/AFA-ANFO/2015-2016/1-semestre'>Análise Numérica Funcional e Optimização</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/ANEDP236451113/2015-2016/2-semestre'>Análise Numérica de Equações Diferenciais Parciais</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/AR36451113/2015-2016/2-semestre'>Análise Real</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/AML2517/2015-2016/1-semestre'>Análise de Modelos Lineares</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/CTC36451113/2015-2016/2-semestre'>Combinatória e Teoria de Códigos</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/CAMC/2015-2016/2-semestre'>Complementos de Algoritmos e Modelação Computacional</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/CCDI/2015-2016/2-semestre'>Complementos de Cálculo Diferencial e Integral</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/CEO/2015-2016/2-semestre'>Complementos de Electromagnetismo e Óptica</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/CPE36451113/2015-2016/2-semestre'>Complementos de Probabilidades e Estatística</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/CDI14151113/2015-2016/2-semestre'>Cálculo Diferencial e Integral I</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/CDI13451113/2015-2016/2-semestre'>Cálculo Diferencial e Integral II</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/EO336451113/2015-2016/2-semestre'>Electromagnetismo e Óptica</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/EMF2517/2015-2016/1-semestre'>Elementos de Matemática Finita</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/EPro3517/2015-2016/1-semestre'>Elementos de Programação</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/EDO2517/2015-2016/1-semestre'>Equações Diferenciais Ordinárias</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/EDP36451113/2015-2016/2-semestre'>Equações Diferenciais Parciais</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/FCQ2517/2015-2016/1-semestre'>Fiabilidade e Controlo de Qualidade</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/FA2517/2015-2016/1-semestre'>Fundamentos de Álgebra</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/GR2517/2015-2016/1-semestre'>Geometria Riemanniana</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/Ges236451113/2015-2016/2-semestre'>Gestão</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/IPE6451113/2015-2016/2-semestre'>Introdução aos Processos Estocásticos</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/ICC2517/2015-2016/1-semestre'>Introdução à Computabilidade e Complexidade</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/IG2517/2015-2016/1-semestre'>Introdução à Geometria</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/IO36451113/2015-2016/2-semestre'>Introdução à Optimização</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/IAlg451113/2015-2016/2-semestre'>Introdução à Álgebra</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/LMC/2015-2016/2-semestre'>Laboratório de Matemática Computacional</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/LM236451113/2015-2016/2-semestre'>Lógica Matemática</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MC336451113/2015-2016/2-semestre'>Matemática Computacional</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/ME2517/2015-2016/1-semestre'>Matemática Experimental</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MO5311451113/2015-2016/2-semestre'>Mecânica e Ondas</option>
						<option value='http://fenix.tecnico.ulisboa.pt/cursos/lmac/descricao'>Opção A</option>
						<option value='http://fenix.tecnico.ulisboa.pt/cursos/lmac/descricao'>Opção IST I</option>
						<option value='http://fenix.tecnico.ulisboa.pt/cursos/lmac/descricao'>Opção IST II</option>
						<option value='http://fenix.tecnico.ulisboa.pt/cursos/lmac/descricao'>Opção de Matemática I</option>
						<option value='http://fenix.tecnico.ulisboa.pt/cursos/lmac/descricao'>Opção de Matemática II</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/PEst6364101113/2015-2016/2-semestre'>Probabilidades e Estatística</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/PMat36451113/2015-2016/2-semestre'>Projecto em Matemática</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/SM2517/2015-2016/1-semestre'>Seminário de Matemática</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/SMon36451113/2015-2016/2-semestre'>Seminário e Monografia</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/SRCA36451113/2015-2016/2-semestre'>Superfícies de Riemann e Curvas Algébricas</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/TEM2517/2015-2016/1-semestre'>Termodinâmica e Estrutura da Matéria</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/Topo2517/2015-2016/1-semestre'>Topologia</option>
						<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/AL5751113/2015-2016/2-semestre'>Álgebra Linear</option>					</select>
				</td>
				<td>
					<button type="button" class="btn btn-primary" onclick="processCourseURL()"><span class="glyphicon glyphicon-plus"></span></button>
				</td>
			</tr>
						           		<tr><td></td><td>
						           		<div id="courses">
						      			</div>
						           		</td><td></td></tr>
						           		<tr><td></td><td><input class="btn btn-primary-outline" type="submit" value="Submit"></td><td></td></tr>
							      	  </table>
								</form>
				      	 	</div>
				      	 	</div>
				<?php break; ?>





					<?php
					}
				}else{ ?>
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