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
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/ACED1245179/2016-2017/1-semestre'>Análise Complexa e Equações Diferenciais</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/ACom2051113/2015-2016/2-semestre'>Arquitectura de Computadores</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/CMat25179/2016-2017/1-semestre'>Ciência de Materiais</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/CMM25179/2016-2017/1-semestre'>Comportamento Mecânico dos Materiais</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/CVoo36451113/2015-2016/2-semestre'>Controlo de Voo</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/CC25179/2016-2017/1-semestre'>Controlo por Computador</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/CDI3025179/2016-2017/1-semestre'>Cálculo Diferencial e Integral I</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/CDI2125179/2016-2017/1-semestre'>Cálculo Diferencial e Integral II</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/D36451113/2015-2016/2-semestre'>Desempenho</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/DMG225179/2016-2017/1-semestre'>Desenho e Modelação Geométrica I</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/DSM236451113/2015-2016/2-semestre'>Dinâmica de Sistemas Mecânicos</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/DMEA25179/2016-2017/1-semestre'>Dissertação de Mestrado em Engenharia Aeroespacial</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/EO425179/2016-2017/1-semestre'>Electromagnetismo e Óptica</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/EGer25179/2016-2017/1-semestre'>Electrónica Geral</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/ER76451113/2015-2016/2-semestre'>Electrónica Rápida</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/Emi25179/2016-2017/1-semestre'>Emissões</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/EV36451113/2015-2016/2-semestre'>Ensaios em Voo</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/EVoo25179/2016-2017/1-semestre'>Estabilidade de Voo</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/EAer25179/2016-2017/1-semestre'>Estruturas Aeroespaciais</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/FI225179/2016-2017/1-semestre'>Fenómenos Interactivos</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/Ges536451113/2015-2016/2-semestre'>Gestão</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/GProj236451113/2015-2016/2-semestre'>Gestão de Projectos</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/GTA179/2016-2017/1-semestre'>Gestão de Tráfego Aéreo</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/H45179/2016-2017/1-semestre'>Helicópteros</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/IM56451113/2015-2016/2-semestre'>Instrumentação e Medidas</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/IASD25179/2016-2017/1-semestre'>Inteligência Artificial e Sistemas de Decisão</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/IC25179/2016-2017/1-semestre'>Introdução ao Controlo</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MSeg6451113/2015-2016/2-semestre'>Manutenção e Segurança</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MC235179/2016-2017/1-semestre'>Matemática Computacional</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MCL25179/2016-2017/1-semestre'>Materiais Compósitos Laminados</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MA25179/2016-2017/1-semestre'>Mecânica Aplicada I</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MA236451113/2015-2016/2-semestre'>Mecânica Aplicada II</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MComp25179/2016-2017/1-semestre'>Mecânica Computacional</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MEstru1113/2015-2016/2-semestre'>Mecânica Estrutural</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MFC35179/2016-2017/1-semestre'>Mecânica de Fluídos Computacional</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MF25179/2016-2017/1-semestre'>Mecânica dos Fluidos I</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MMat36451113/2015-2016/2-semestre'>Mecânica dos Materiais</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MSol9/2016-2017/1-semestre'>Mecânica dos Sólidos</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MO236451113/2015-2016/2-semestre'>Mecânica e Ondas</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/Micro25179/2016-2017/1-semestre'>Microelectrónica</option>
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
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/PME25179/2016-2017/1-semestre'>Planeamento de Missões Espaciais</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/PEst2335179/2016-2017/1-semestre'>Probabilidades e Estatística</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/PDS56451113/2015-2016/2-semestre'>Processamento Digital de Sinais</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/Pro55179/2016-2017/1-semestre'>Programação</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/PSis6451113/2015-2016/2-semestre'>Programação de Sistemas</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/PAer25179/2016-2017/1-semestre'>Projecto Aeroespacial</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/PSD17/2016-2017/1-semestre'>Projecto de Sistemas Digitais</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/Prop36451113/2015-2016/2-semestre'>Propulsão</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/Qui225179/2016-2017/1-semestre'>Química</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/Sat25179/2016-2017/1-semestre'>Satélites</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/SA25179/2016-2017/1-semestre'>Seminário Aeroespacial I</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/SA36451113/2015-2016/2-semestre'>Seminário Aeroespacial II</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/I35179/2016-2017/1-semestre'>Sensores e Sistemas</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/SAut17/2016-2017/1-semestre'>Sistemas Autónomos</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/SAInt25179/2016-2017/1-semestre'>Sistemas Aviónicos Integrados</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/SD36451113/2015-2016/2-semestre'>Sistemas Digitais</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/SEE35179/2016-2017/1-semestre'>Sistemas Eléctricos e Electromecânicos</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/SAA25179/2016-2017/1-semestre'>Sistemas de Alimentação Autónomos</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/SCDTR25179/2016-2017/1-semestre'>Sistemas de Controlo Distribuído em Tempo Real</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/SCT25179/2016-2017/1-semestre'>Sistemas de Controlo de Tráfego</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/SN36451113/2015-2016/2-semestre'>Sistemas de Navegação</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/SRad25179/2016-2017/1-semestre'>Sistemas de Radar</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/TM56451113/2015-2016/2-semestre'>Tecnologia Mecânica</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/T25179/2016-2017/1-semestre'>Telecomunicações</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/TCFE336451113/2015-2016/2-semestre'>Teoria dos Circuitos e Fundamentos de Electrónica</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/T36451113/2015-2016/2-semestre'>Termodinâmica I</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/T225179/2016-2017/1-semestre'>Termodinâmica II</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/TCal25179/2016-2017/1-semestre'>Transmissão de Calor</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/VRui25179/2016-2017/1-semestre'>Vibrações e Ruído</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/AL1525179/2016-2017/1-semestre'>Álgebra Linear</option>					</select>
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
							<?php break ?>
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
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/ACED1625179/2016-2017/1-semestre'>Análise Complexa e Equações Diferenciais</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/AAE225179/2016-2017/1-semestre'>Avaliação Ambiental Estratégica</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/Bioc25179/2016-2017/1-semestre'>Biocombustíveis</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/BBM25179/2016-2017/1-semestre'>Bioquímica e Biologia Molecular</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/BAmb2/2013-2014/1-semestre'>Biotecnologia Ambiental</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/CQA36451113/2015-2016/2-semestre'>Características e Química da Água</option>
									<option value='http://fenix.tecnico.ulisboa.pt/cursos/meambi/descricao'>Combustiveis Alternativos</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/CP325179/2016-2017/1-semestre'>Computação e Programação</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/CDI2029179/2016-2017/1-semestre'>Cálculo Diferencial e Integral I</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/CDI2925179/2016-2017/1-semestre'>Cálculo Diferencial e Integral II</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/Des36451113/2015-2016/2-semestre'>Desenho</option>
									<option value='http://fenix.tecnico.ulisboa.pt/cursos/meambi/descricao'>Direito e Políticas de Ambiente</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/DEA25179/2016-2017/1-semestre'>Dissertação em Engenharia do Ambiente</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/DUCP225179/2016-2017/1-semestre'>Drenagem Urbana e Controlo da Poluição</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/EA36451113/2015-2016/2-semestre'>Ecologia Aplicada</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/EG25179/2016-2017/1-semestre'>Ecologia Geral</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/EI225179/2016-2017/1-semestre'>Ecologia Industrial</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/EAmb25179/2016-2017/1-semestre'>Economia do Ambiente</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/EO525179/2016-2017/1-semestre'>Electromagnetismo e Óptica</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/EITT325179/2016-2017/1-semestre'>Empreendedorismo, Inovação e Transferência de Tecnologia</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/EAmbi/2016-2017/1-semestre'>Energia e Ambiente</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/ERen25179/2016-2017/1-semestre'>Energias Renováveis</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/EAmbie25179/2016-2017/1-semestre'>Estatística Ambiental</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/FAO25179/2016-2017/1-semestre'>Física da Atmosfera e dos Oceanos</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/GAmbi25179/2016-2017/1-semestre'>Geologia Ambiental</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/Ges/2016-2017/1-semestre'>Gestão</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/GIBH25179/2016-2017/1-semestre'>Gestão Integrada de Bacias Hidrográficas</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/GTVR336451113/2015-2016/2-semestre'>Gestão Tratamento e Valorização de Resíduos</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/GAT36451113/2015-2016/2-semestre'>Gestão de Ambiente e Território</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/GEne5179/2016-2017/1-semestre'>Gestão de Energia</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/PGRN/2016-2017/1-semestre'>Gestão de Recursos Naturais</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/Hidr/2016-2017/1-semestre'>Hidrogeologia</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/HARH25179/2016-2017/1-semestre'>Hidrologia, Ambiente e Recursos Hídricos</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/HA36451113/2015-2016/2-semestre'>Hidráulica Aplicada</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/IA25179/2016-2017/1-semestre'>Impactes Ambientais</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/ITra/2016-2017/1-semestre'>Instalações de Tratamento</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MC436451113/2015-2016/2-semestre'>Matemática Computacional</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MFA25179/2016-2017/1-semestre'>Mecânica de Fluidos Ambiental</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MO336451113/2015-2016/2-semestre'>Mecânica e Ondas</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/Mic36451113/2015-2016/2-semestre'>Microbiologia</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MAmb/2016-2017/1-semestre'>Modelação Ambiental</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/PSep25179/2016-2017/1-semestre'>Operações Unitárias em Estações de Tratamento</option>
									<option value='http://fenix.tecnico.ulisboa.pt/cursos/meambi/descricao'>Opção Livre 1</option>
									<option value='http://fenix.tecnico.ulisboa.pt/cursos/meambi/descricao'>Opção Livre 2</option>
									<option value='http://fenix.tecnico.ulisboa.pt/cursos/meambi/descricao'>Opção Livre 3</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/P225179/2016-2017/1-semestre'>Pedologia</option>
									<option value='http://fenix.tecnico.ulisboa.pt/cursos/meambi/descricao'>Petroleo e Gás</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/PBOT-2/2016-2017/1-semestre'>Planeamento Biofísico e Ordenamento do Território</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/PATEG36451113/2015-2016/2-semestre'>Poluição Atmosférica e Tratamento de Efluentes Gasosos</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/PPAS25179/2016-2017/1-semestre'>Poluição e Protecção de Águas Subterrâneas</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/PRA25179/2016-2017/1-semestre'>População, Recursos e Ambiente</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/PEst65179/2016-2017/1-semestre'>Probabilidades e Estatística</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/PEB25179/2016-2017/1-semestre'>Processos de Engenharia Biológica</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/Qui525179/2016-2017/1-semestre'>Química</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/QO336451113/2015-2016/2-semestre'>Química Orgânica</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/RNT36451113/2015-2016/2-semestre'>Riscos Naturais e Tecnológicos</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/S/2016-2017/1-semestre'>Saneamento</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/SIDS9/2016-2017/1-semestre'>Seminários sobre Inovação e Desenvolvimento Sustentável</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/SGA25179/2016-2017/1-semestre'>Sistemas de Gestão Ambiental</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/SIG225179/2016-2017/1-semestre'>Sistemas de Informação Geográfica</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/T36451113/2015-2016/2-semestre'>Termodinâmica I</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/TEMas1113/2015-2016/2-semestre'>Transferência de Energia e Massa</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/VER/2016-2017/1-semestre'>Valorização Energética de Resíduos</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/AL1425179/2016-2017/1-semestre'>Álgebra Linear</option>					</select>
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
							<?php break ?>
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

									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/ACED1235179/2016-2017/1-semestre'>Análise Complexa e Equações Diferenciais</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/ANav25179/2016-2017/1-semestre'>Arquitectura Naval</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/CMat25179/2016-2017/1-semestre'>Ciência de Materiais</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/CP225179/2016-2017/1-semestre'>Computação e Programação</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/CSis36451113/2015-2016/2-semestre'>Controlo de Sistemas</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/CDI20210179/2016-2017/1-semestre'>Cálculo Diferencial e Integral I</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/CDI2125179/2016-2017/1-semestre'>Cálculo Diferencial e Integral II</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/DCN36451113/2015-2016/2-semestre'>Desenho de Construção Naval</option>
									<option value='http://fenix.tecnico.ulisboa.pt/cursos/lean/descricao'>Desenho e Modelação Geométrica</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/EO425179/2016-2017/1-semestre'>Electromagnetismo e Óptica</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/Ges536451113/2015-2016/2-semestre'>Gestão</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/Hid36451113/2015-2016/2-semestre'>Hidrodinâmica</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/HN36451113/2015-2016/2-semestre'>Hidrostática do Navio</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/IEN25179/2016-2017/1-semestre'>Introdução à Engenharia Naval</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/IOpe312451113/2015-2016/2-semestre'>Investigação Operacional</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MC235179/2016-2017/1-semestre'>Matemática Computacional</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MA125179/2016-2017/1-semestre'>Mecânica Aplicada I</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MA36451113/2015-2016/2-semestre'>Mecânica Aplicada II</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MComp36451113/2015-2016/2-semestre'>Mecânica Computacional</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MF225179/2016-2017/1-semestre'>Mecânica dos Fluidos I</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MMat36451113/2015-2016/2-semestre'>Mecânica dos Materiais</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MSol25179/2016-2017/1-semestre'>Mecânica dos Sólidos</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MO436451113/2015-2016/2-semestre'>Mecânica e Ondas</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/PPes236451113/2015-2016/2-semestre'>Portfólio Pessoal</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/PEst2445179/2016-2017/1-semestre'>Probabilidades e Estatística</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/Qui325179/2016-2017/1-semestre'>Química</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/SSM25179/2016-2017/1-semestre'>Sinais e Sistemas Mecatrónicos</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/SEE35179/2016-2017/1-semestre'>Sistemas Eléctricos e Electromecânicos</option>
									<option value='http://fenix.tecnico.ulisboa.pt/cursos/lean/descricao'>Tecnologia de Construção Naval</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/T36451113/2015-2016/2-semestre'>Termodinâmica I</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/VRui25179/2016-2017/1-semestre'>Vibrações e Ruído</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/AL1025179/2016-2017/1-semestre'>Álgebra Linear</option>					</select>
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
							<?php break ?>
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

									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/ACED1425179/2016-2017/1-semestre'>Análise Complexa e Equações Diferenciais</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/AQ25179/2016-2017/1-semestre'>Análise Química</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/BCE25179/2016-2017/1-semestre'>Bioengenharia de Células Estaminais</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/BMer336451113/2015-2016/2-semestre'>Bioengenharia e Mercado</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/BEst51113/2015-2016/2-semestre'>Biologia Estrutural</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/Biomi11451113/2015-2016/2-semestre'>Biomimetismo</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/BBM25179/2016-2017/1-semestre'>Bioquímica e Biologia Molecular</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/BFM36451113/2015-2016/2-semestre'>Bioquímica e Fisiologia Microbiana</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/BAmb51113/2015-2016/2-semestre'>Biotecnologia Ambiental</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/CP325179/2016-2017/1-semestre'>Computação e Programação</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/CDI2029179/2016-2017/1-semestre'>Cálculo Diferencial e Integral I</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/CDI2925179/2016-2017/1-semestre'>Cálculo Diferencial e Integral II</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/DSCP36451113/2015-2016/2-semestre'>Dinâmica de Sistemas e Controle de Processos</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/DMEB25179/2016-2017/1-semestre'>Dissertação de Mestrado em Engenharia Biológica</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/EO36451113/2015-2016/2-semestre'>Electromagnetismo e Óptica</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/EBioe25179/2016-2017/1-semestre'>Empreendedorismo em Bioengenharia</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/EBI25179/2016-2017/1-semestre'>Engenharia Biológica Integrada I</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/EBI36451113/2015-2016/2-semestre'>Engenharia Biológica Integrada II</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/EEnz36451113/2015-2016/2-semestre'>Engenharia Enzimática</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/EGen25179/2016-2017/1-semestre'>Engenharia Genética</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/ER25179/2016-2017/1-semestre'>Engenharia das Reacções I</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/ECTec851113/2015-2016/2-semestre'>Engenharia de Células e Tecidos</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/FT35179/2016-2017/1-semestre'>Fenómenos de Transferência I</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/FT45179/2016-2017/1-semestre'>Fenómenos de Transferência II</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/GFB36451113/2015-2016/2-semestre'>Genómica Funcional e Bioinformática</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/Ges236451113/2015-2016/2-semestre'>Gestão</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/GPO25179/2016-2017/1-semestre'>Gestão da Produção e das Operações</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/IEBio5179/2016-2017/1-semestre'>Introdução à Engenharia Biológica</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/LCEQ25179/2016-2017/1-semestre'>Laboratórios de Ciências de Engenharia Química</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/LEB36451113/2015-2016/2-semestre'>Laboratórios de Engenharia Biológica I</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/LEB25179/2016-2017/1-semestre'>Laboratórios de Engenharia Biológica II</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/LQ25179/2016-2017/1-semestre'>Laboratórios de Química I</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/LQ36451113/2015-2016/2-semestre'>Laboratórios de Química II</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/LQ225179/2016-2017/1-semestre'>Laboratórios de Química III</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MC425179/2016-2017/1-semestre'>Matemática Computacional</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MO336451113/2015-2016/2-semestre'>Mecânica e Ondas</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/Mic36451113/2015-2016/2-semestre'>Microbiologia</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MMCel35179/2016-2017/1-semestre'>Microbiologia Molecular e Celular</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/N325179/2016-2017/1-semestre'>Nanotecnologias</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/Neur35179/2016-2017/1-semestre'>Neuroimagiologia</option>
									<option value='http://fenix.tecnico.ulisboa.pt/cursos/mebiol/descricao'>Opção I</option>
									<option value='http://fenix.tecnico.ulisboa.pt/cursos/mebiol/descricao'>Opção II</option>
									<option value='http://fenix.tecnico.ulisboa.pt/cursos/mebiol/descricao'>Opção III</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/PEBiol6451113/2015-2016/2-semestre'>Portfolio em Engenharia Biológica I</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/PEB5179/2016-2017/1-semestre'>Portfolio em Engenharia Biológica II</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/PEst30179/2016-2017/1-semestre'>Probabilidades e Estatística</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/PEQB45179/2016-2017/1-semestre'>Processos de Engenharia Química e Biológica</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/PS45179/2016-2017/1-semestre'>Processos de Separação I</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/PEBiolo5179/2016-2017/1-semestre'>Processos em Engenharia Biológica</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/PEBio25179/2016-2017/1-semestre'>Projecto de Engenharia Biológica</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/Q325179/2016-2017/1-semestre'>Química I</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/Q36451113/2015-2016/2-semestre'>Química II</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/QO325179/2016-2017/1-semestre'>Química Orgânica I</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/QO425179/2016-2017/1-semestre'>Química Orgânica II</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/Quim236451113/2015-2016/2-semestre'>Química-Física</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/RB25179/2016-2017/1-semestre'>Reactores Biológicos</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/SPPB25179/2016-2017/1-semestre'>Separação e Purificação de Produtos Biológicos</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/TA25179/2016-2017/1-semestre'>Tecnologia Alimentar</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/TAmb35179/2016-2017/1-semestre'>Tecnologia Ambiental</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/TV6451113/2015-2016/2-semestre'>Tecnologias Verdes e Estratégias de Decisão</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/TQui45179/2016-2017/1-semestre'>Termodinâmica Química</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/TEQ25339/2016-2017/1-semestre'>Termodinâmica de Engenharia Química</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/AL1425179/2016-2017/1-semestre'>Álgebra Linear</option>					</select>
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
							<?php break ?>
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
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/AH25179/2016-2017/1-semestre'>Anatomia e Histologia</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/ACED1325179/2016-2017/1-semestre'>Análise Complexa e Equações Diferenciais</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/AAut25179/2016-2017/1-semestre'>Aprendizagem Automática</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/BE36451113/2015-2016/2-semestre'>Bio-Electricidade</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/BCE51113/2015-2016/2-semestre'>Bioengenharia de Células Estaminais</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/BC25179/2016-2017/1-semestre'>Biologia Computacional</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/BM25179/2016-2017/1-semestre'>Biomecânica do Movimento</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/BT36451113/2015-2016/2-semestre'>Biomecânica dos Tecidos</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/BBM25179/2016-2017/1-semestre'>Bioquímica e Biologia Molecular</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/CB51113/2015-2016/2-semestre'>Ciência dos Biomateriais</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/CDI725179/2016-2017/1-semestre'>Cálculo Diferencial e Integral I</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/CDI2125179/2016-2017/1-semestre'>Cálculo Diferencial e Integral II</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/DMEBio25179/2016-2017/1-semestre'>Dissertação de Mestrado em Engenharia Biomédica</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/EO336451113/2015-2016/2-semestre'>Electromagnetismo e Óptica</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/EGer66451113/2015-2016/2-semestre'>Electrónica Geral</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/EPro35179/2016-2017/1-semestre'>Elementos de Programação</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/EGen25179/2016-2017/1-semestre'>Engenharia Genética</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/ECTec25179/2016-2017/1-semestre'>Engenharia de Células e Tecidos</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/FSis25179/2016-2017/1-semestre'>Fisiologia de Sistemas</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/FRad25179/2016-2017/1-semestre'>Física da Radiação</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/GFC5179/2016-2017/1-semestre'>Genómica Funcional e Comparativa</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/Ges236451113/2015-2016/2-semestre'>Gestão</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/GLO1113/2015-2016/2-semestre'>Gestão Logística e de Operações</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/GCMG5179/2016-2017/1-semestre'>Gráfica Computacional e Modelação Geométrica</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/IMed51113/2015-2016/2-semestre'>Imagiologia Médica</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/IBiome-2/2015-2016/2-semestre'>Informática Biomédica</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/IAS51113/2015-2016/2-semestre'>Instrumentação e Aquisição de Sinais em Bioengenharia</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/IEB25179/2016-2017/1-semestre'>Introdução à Engenharia Biomédica</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MC525179/2016-2017/1-semestre'>Matemática Computacional</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MGD25179/2016-2017/1-semestre'>Mecanismos Gerais de Doença</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MApl25179/2016-2017/1-semestre'>Mecânica Aplicada</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MQ225179/2016-2017/1-semestre'>Mecânica Quântica I</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MBio/2016-2017/1-semestre'>Mecânica dos Biofluidos</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MMC36451113/2015-2016/2-semestre'>Mecânica dos Meios Contínuos</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MMCom51113/2015-2016/2-semestre'>Mecânica e Modelação Computacional</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MO5311451113/2015-2016/2-semestre'>Mecânica e Ondas</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MMB349/2016-2017/1-semestre'>Modelos Matemáticos em Biomedicina</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MADec179/2016-2017/1-semestre'>Modelos de Apoio à Decisão</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/N325179/2016-2017/1-semestre'>Nanotecnologias</option>
									<option value='http://fenix.tecnico.ulisboa.pt/cursos/mebiom/descricao'>Neuroengenharia</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/Neur35179/2016-2017/1-semestre'>Neuroimagiologia</option>
									<option value='http://fenix.tecnico.ulisboa.pt/cursos/mebiom/descricao'>Opção Livre</option>
									<option value='http://fenix.tecnico.ulisboa.pt/cursos/mebiom/descricao'>Opção Livre I</option>
									<option value='http://fenix.tecnico.ulisboa.pt/cursos/mebiom/descricao'>Opção Livre II</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/PQF36451113/2015-2016/2-semestre'>Princípios de Química-Física</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/PEst2445179/2016-2017/1-semestre'>Probabilidades e Estatística</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/PIV25179/2016-2017/1-semestre'>Processamento de Imagem e Visão</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/PDSB6451113/2015-2016/2-semestre'>Processamento de Sinais em Bioengenharia</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/PEBiom5179/2016-2017/1-semestre'>Projeto em Engenharia Biomédica</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/Qui36451113/2015-2016/2-semestre'>Química</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/QO336451113/2015-2016/2-semestre'>Química Orgânica</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/Rob36451113/2015-2016/2-semestre'>Robótica</option>
									<option value='http://fenix.tecnico.ulisboa.pt/cursos/mebiom/descricao'>Seminários em Tecnologias Hospitalares - FM/UL</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/SA51113/2015-2016/2-semestre'>Sensores e Actuadores</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/SS25179/2016-2017/1-semestre'>Sinais e Sistemas</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/SSB5179/2016-2017/1-semestre'>Sinais e Sistemas em Bioengenharia</option>
									<option value='http://fenix.tecnico.ulisboa.pt/cursos/mebiom/descricao'>Sistemas Integrados e Regulação Metabólica - FM/UL</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/SIBD25179/2016-2017/1-semestre'>Sistemas de Informação e Bases de Dados</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/SSau/2015-2016/2-semestre'>Sistemas de Saúde</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/TB5179/2016-2017/1-semestre'>Tecnologia dos Biomateriais</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/TCFE51113/2015-2016/2-semestre'>Teoria dos Circuitos e Fundamentos de Electrónica</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/TEM25179/2016-2017/1-semestre'>Termodinâmica e Estrutura da Matéria</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/AL1745179/2016-2017/1-semestre'>Álgebra Linear</option>					</select>
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
							<?php break ?>
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

									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/ACED1725179/2016-2017/1-semestre'>Análise Complexa e Equações Diferenciais</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/AEG25179/2016-2017/1-semestre'>Análise de Estruturas Geotécnicas</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/AE-I/2016-2017/1-semestre'>Análise de Estruturas I</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/AE25179/2016-2017/1-semestre'>Análise de Estruturas II</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/Arq25179/2016-2017/1-semestre'>Arquitectura</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/CT236451113/2015-2016/2-semestre'>Competência Transversal I</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/CT36451113/2015-2016/2-semestre'>Competência Transversal II</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/CP25179/2016-2017/1-semestre'>Computação e Programação</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/CSPG/2016-2017/1-semestre'>Conceitos de Segurança e Projecto Geotécnico</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/CAE/2016-2017/1-semestre'>Conforto Ambiental em Edifícios</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/CITra/2016-2017/1-semestre'>Conservação de Infraestruturas de Transporte</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/CDI3425179/2016-2017/1-semestre'>Cálculo Diferencial e Integral I</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/CDI1325179/2016-2017/1-semestre'>Cálculo Diferencial e Integral II</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/DASE25179/2016-2017/1-semestre'>Desafios Ambientais e da Sustentabilidade em Engenharia</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/DAC36451113/2015-2016/2-semestre'>Desenho Assistido por Computador</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/DT25179/2016-2017/1-semestre'>Desenho Técnico</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/DEst36451113/2015-2016/2-semestre'>Dimensionamento de Estruturas</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/DEES45179/2016-2017/1-semestre'>Dinâmica Estrutural e Engenharia Sísmica</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/DMEC225179/2016-2017/1-semestre'>Dissertação de Mestrado em Engenharia Civil - C</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/DMEC525179/2016-2017/1-semestre'>Dissertação de Mestrado em Engenharia Civil - G</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/DMEC425179/2016-2017/1-semestre'>Dissertação de Mestrado em Engenharia Civil - Hrh</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/DMEC25179/2016-2017/1-semestre'>Dissertação de Mestrado em Engenharia Civil - Uts</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/DMEC325179/2016-2017/1-semestre'>Dissertação de Mestrado em Engenharia Civil - e</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/DUCP225179/2016-2017/1-semestre'>Drenagem Urbana e Controlo da Poluição</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/EO625179/2016-2017/1-semestre'>Electromagnetismo e Óptica</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/ECon/2016-2017/1-semestre'>Empreendimentos e Contratos</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/ECA25179/2016-2017/1-semestre'>Engenharia Civil e Ambiente</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/EF25179/2016-2017/1-semestre'>Engenharia Ferroviária</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/ESG25179/2016-2017/1-semestre'>Engenharia Sísmica Geotécnica</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/ETR225179/2016-2017/1-semestre'>Engenharia de Tráfego Rodoviário</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/ECIA/2016-2017/1-semestre'>Espaços Construídos e Impactes Ambientais</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/EEF/2016-2017/1-semestre'>Estruturas Especiais</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/EMet25179/2016-2017/1-semestre'>Estruturas Metálicas</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/EMM25179/2016-2017/1-semestre'>Estruturas Metálicas e Mistas</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/EAM/2016-2017/1-semestre'>Estruturas de Alvenaria e Madeira</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/EB225179/2016-2017/1-semestre'>Estruturas de Betão I</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/EB36451113/2015-2016/2-semestre'>Estruturas de Betão II</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/EEdi/2016-2017/1-semestre'>Estruturas de Edifícios</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/EAH25179/2016-2017/1-semestre'>Estruturas e Aproveitamentos Hidráulicos</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/FE/2016-2017/1-semestre'>Fundações Especiais</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/FCon25179/2016-2017/1-semestre'>Física das Construções</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/Ges236451113/2015-2016/2-semestre'>Gestão</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/GUEI25179/2016-2017/1-semestre'>Gestão Urbanística e Economia do Imobiliário</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/GRSol/2016-2017/1-semestre'>Gestão de Resíduos Sólidos</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/GTD25179/2016-2017/1-semestre'>Gestão e Teoria da Decisão</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/HRH36451113/2015-2016/2-semestre'>Hidrologia e Recursos Hídricos</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/H36451113/2015-2016/2-semestre'>Hidráulica I</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/H225179/2016-2017/1-semestre'>Hidráulica II</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/HOM25179/2016-2017/1-semestre'>Hidráulica e Obras Marítimas</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/HRF/2016-2017/1-semestre'>Hidráulica e Reabilitação Fluvial</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/IP25179/2016-2017/1-semestre'>Instalações Prediais</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/ITra25179/2016-2017/1-semestre'>Instalações de Tratamento</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/ISIG36451113/2015-2016/2-semestre'>Introdução aos Sistemas de Informação Geográfica</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/IOpe312451113/2015-2016/2-semestre'>Investigação Operacional</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MC536451113/2015-2016/2-semestre'>Matemática Computacional</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MC56451113/2015-2016/2-semestre'>Materiais de Construção I</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MC325179/2016-2017/1-semestre'>Materiais de Construção II</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MPRR/2016-2017/1-semestre'>Materiais de Protecção, Reparação e Reforço</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/Mec-I/2016-2017/1-semestre'>Mecânica I</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/Mec25179/2016-2017/1-semestre'>Mecânica II</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MSR36451113/2015-2016/2-semestre'>Mecânica dos Solos e das Rochas</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MGeo36451113/2015-2016/2-semestre'>Mineralogia e Geologia</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MAG25179/2016-2017/1-semestre'>Modelação Avançada em Geotecnia</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MAS35179/2016-2017/1-semestre'>Modelação e Avaliação de Sistemas</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MPRH36451113/2015-2016/2-semestre'>Modelação e Planeamento de Recursos Hídricos</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/OG36451113/2015-2016/2-semestre'>Obras Geotécnicas</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/OAte25179/2016-2017/1-semestre'>Obras de Aterro</option>
									<option value='http://fenix.tecnico.ulisboa.pt/cursos/mec/descricao'>Opção Livre</option>
									<option value='http://fenix.tecnico.ulisboa.pt/cursos/mec/descricao'>Opção Livre 1</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/OGO36451113/2015-2016/2-semestre'>Organização e Gestão de Obras</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/PRC36451113/2015-2016/2-semestre'>Patologia e Reabilitação da Construção</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/PBOT-2/2016-2017/1-semestre'>Planeamento Biofísico e Ordenamento do Território</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/PU436451113/2015-2016/2-semestre'>Planeamento Urbano</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/Pon25179/2016-2017/1-semestre'>Pontes</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/PEst65179/2016-2017/1-semestre'>Probabilidades e Estatística</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/QSAC225179/2016-2017/1-semestre'>Qualidade, Segurança e Ambiente na Construção</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/Qui425179/2016-2017/1-semestre'>Química</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/RREst/2016-2017/1-semestre'>Reabilitação e Reforço de Estruturas</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/RM-I/2016-2017/1-semestre'>Resistência de Materiais I</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/RM25179/2016-2017/1-semestre'>Resistência de Materiais II</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/S6451113/2015-2016/2-semestre'>Saneamento</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/TES25179/2016-2017/1-semestre'>Taludes e Estruturas de Suporte</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/TCE25179/2016-2017/1-semestre'>Tecnologia da Construção de Edifícios</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/TCOE/2016-2017/1-semestre'>Tecnologia da Construção de Obras de Engenharia</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/TEM236451113/2015-2016/2-semestre'>Termodinâmica e Estrutura da Matéria</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/Top25179/2016-2017/1-semestre'>Topografia</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/TML/2016-2017/1-semestre'>Transporte de Mercadorias e Logística</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/Tra66451113/2015-2016/2-semestre'>Transportes</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/Tun/2016-2017/1-semestre'>Túneis</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/VC25179/2016-2017/1-semestre'>Vias de Comunicação</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/AL1735179/2016-2017/1-semestre'>Álgebra Linear</option>					</select>
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
							<?php break ?>
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
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/ACED21179/2016-2017/1-semestre'>Análise Complexa e Equações Diferenciais</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/ACom101113/2015-2016/2-semestre'>Arquitectura de Computadores</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/CEB5179/2016-2017/1-semestre'>Circuitos Electrónicos Básicos</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/COE51113/2015-2016/2-semestre'>Comunicação Oral e Escrita</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/CDI54179/2016-2017/1-semestre'>Cálculo Diferencial e Integral I</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/CDI51179/2016-2017/1-semestre'>Cálculo Diferencial e Integral II</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/DMG101113/2015-2016/2-semestre'>Desenho e Modelação Geométrica</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/DEle51113/2015-2016/2-semestre'>Dispositivos Electrónicos</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/EO22179/2016-2017/1-semestre'>Electromagnetismo e Óptica</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/ESEmb101113/2015-2016/2-semestre'>Electrónica dos Sistemas Embebidos</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/FL15179/2016-2017/1-semestre'>Formação Livre I</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/FCont5179/2016-2017/1-semestre'>Fundamentos de Controlo</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/Ges11179/2016-2017/1-semestre'>Gestão</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/IASin51113/2015-2016/2-semestre'>Instrumentação e Aquisição de Sinais</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/ICSE8179/2016-2017/1-semestre'>Introdução aos Circuitos e Sistemas Electrónicos</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/IRC101113/2015-2016/2-semestre'>Introdução às Redes de Computadores</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MC9179/2016-2017/1-semestre'>Matemática Computacional</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MO151113/2015-2016/2-semestre'>Mecânica e Ondas</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MN51113/2015-2016/2-semestre'>Micro e Nanoelectrónica</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/PEst31179/2016-2017/1-semestre'>Probabilidades e Estatística</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/FP179/2016-2017/1-semestre'>Programação</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/PSComp5179/2016-2017/1-semestre'>Programação de Sistemas Computacionais</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/PAnt9179/2016-2017/1-semestre'>Propagação e Antenas</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/Qui14179/2016-2017/1-semestre'>Química</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/SD9179/2016-2017/1-semestre'>Sistemas Digitais</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/SElect/2015-2016/1-semestre'>Sistemas Electromecânicos</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/SCom101113/2015-2016/2-semestre'>Sistemas de Comunicações</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/SSina101113/2015-2016/2-semestre'>Sistemas e Sinais</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/TEM51113/2015-2016/2-semestre'>Termodinâmica e Estrutura da Matéria</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/AL29179/2016-2017/1-semestre'>Álgebra Linear</option>					</select>
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
							<?php break ?>
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
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/ADRC25179/2016-2017/1-semestre'>Algoritmia e Desempenho em Redes de Computadores</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/AED25179/2016-2017/1-semestre'>Algoritmos e Estrutura de Dados</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/AT25179/2016-2017/1-semestre'>Alta Tensão</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/Ant36451113/2015-2016/2-semestre'>Antenas</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/ACED1625179/2016-2017/1-semestre'>Análise Complexa e Equações Diferenciais</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/AC25179/2016-2017/1-semestre'>Análise de Circuitos</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/ARed25179/2016-2017/1-semestre'>Análise de Redes</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/AAut25179/2016-2017/1-semestre'>Aprendizagem Automática</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/ACom116451113/2015-2016/2-semestre'>Arquitectura de Computadores</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/ASInt179/2016-2017/1-semestre'>Arquitectura de Sistemas de Internet</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/AAC36451113/2015-2016/2-semestre'>Arquitecturas Avançadas de Computadores</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/APInd25179/2016-2017/1-semestre'>Automação de Processos Industriais</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/BC25179/2016-2017/1-semestre'>Biologia Computacional</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/BBM25179/2016-2017/1-semestre'>Bioquímica e Biologia Molecular</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/-HW6451113/2015-2016/2-semestre'>Co-Projecto Hw/Sw</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/CCD25179/2016-2017/1-semestre'>Compressão e Codificação de Dados</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/CPD13/2015-2016/2-semestre'>Computação Paralela e Distribuída</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/CAV179/2016-2017/1-semestre'>Comunicação de Áudio e Vídeo</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/Cont25179/2016-2017/1-semestre'>Controlo</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/COSE6451113/2015-2016/2-semestre'>Controlo e Optimização de Sistemas de Energia</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/CEE36451113/2015-2016/2-semestre'>Controlo em Espaço de Estados</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/CC25179/2016-2017/1-semestre'>Controlo por Computador</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/CCER6451113/2015-2016/2-semestre'>Conversores Comutados para Energias Renováveis</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/CSC/2016-2017/1-semestre'>Criptografia e Seguranca das Comunicacoes</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/CDI3325179/2016-2017/1-semestre'>Cálculo Diferencial e Integral I</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/CDI2925179/2016-2017/1-semestre'>Cálculo Diferencial e Integral II</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/DMEEC25179/2016-2017/1-semestre'>Dissertação de Mestrado em Engenharia Electrotécnica e de Computadores</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/EMEne25179/2016-2017/1-semestre'>Economia e Mercados de Energia</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/EO55179/2016-2017/1-semestre'>Electromagnetismo e Óptica</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/ETeo25179/2016-2017/1-semestre'>Electrotecnia Teórica</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/E225179/2016-2017/1-semestre'>Electrónica I</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/E25179/2016-2017/1-semestre'>Electrónica II</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/ER76451113/2015-2016/2-semestre'>Electrónica Rápida</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/ECom25179/2016-2017/1-semestre'>Electrónica de Computadores</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/EEner25179/2016-2017/1-semestre'>Electrónica de Energia</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/EPot25179/2016-2017/1-semestre'>Electrónica de Potência</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/EITT25179/2016-2017/1-semestre'>Empreendedorismo, Inovação e Transferência de Tecnologia</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/ERPD36451113/2015-2016/2-semestre'>Energias Renováveis e Produção Descentralizada</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/FAD25179/2016-2017/1-semestre'>Filtros Analógicos e Digitais</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/Fot36451113/2015-2016/2-semestre'>Fotónica</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/FEle25179/2016-2017/1-semestre'>Fundamentos de Electrónica</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/FEE25179/2016-2017/1-semestre'>Fundamentos de Energia Eléctrica</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/FTel25179/2016-2017/1-semestre'>Fundamentos de Telecomunicações</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/GFB36451113/2015-2016/2-semestre'>Genómica Funcional e Bioinformática</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/Ges536451113/2015-2016/2-semestre'>Gestão</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/GPE179/2016-2017/1-semestre'>Gestão de Projectos de Engenharia</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/ISCP179/2016-2017/1-semestre'>Instrumentação Suportada em Computadores Pessoais</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/IM25179/2016-2017/1-semestre'>Instrumentação e Medidas</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/IASD25179/2016-2017/1-semestre'>Inteligência Artificial e Sistemas de Decisão</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/IIPEEC25179/2016-2017/1-semestre'>Introdução à Investigação em Engenharia Electrotécnica e de Computadores</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MC45179/2016-2017/1-semestre'>Matemática Computacional</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MO636451113/2015-2016/2-semestre'>Mecânica e Ondas</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/Micro25179/2016-2017/1-semestre'>Microelectrónica</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/Microo25179/2016-2017/1-semestre'>Microondas</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/CIP36451125/2015-2016/2-semestre'>Modelação e Controlo de Sistemas de Manufactura</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MSim36451113/2015-2016/2-semestre'>Modelação e Simulação</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MEle25179/2016-2017/1-semestre'>Máquinas Eléctricas</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/OA25179/2016-2017/1-semestre'>Optimização e Algoritmos</option>
									<option value='http://fenix.tecnico.ulisboa.pt/cursos/meec/meec'>Opção Livre</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/PMee25179/2016-2017/1-semestre'>Portfólio Meec</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/PEst2445179/2016-2017/1-semestre'>Probabilidades e Estatística</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/PDS56451113/2015-2016/2-semestre'>Processamento Digital de Sinais</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/PF36451113/2015-2016/2-semestre'>Processamento da Fala</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/PIV25179/2016-2017/1-semestre'>Processamento de Imagem e Visão</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/PCEEle25179/2016-2017/1-semestre'>Produção e Consumo de Energia Eléctrica</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/Pro55179/2016-2017/1-semestre'>Programação</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/POO36451113/2015-2016/2-semestre'>Programação Orientada por Objectos</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/PSis6451113/2015-2016/2-semestre'>Programação de Sistemas</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/PSD17/2016-2017/1-semestre'>Projecto de Sistemas Digitais</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/PROE25179/2016-2017/1-semestre'>Propagação e Radiação de Ondas Electromagnéticas</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/PASE25179/2016-2017/1-semestre'>Protecções e Automação em Sistemas de Energia</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/Qui45179/2016-2017/1-semestre'>Química</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/R25179/2016-2017/1-semestre'>Radiopropagação</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/RMSF36451113/2015-2016/2-semestre'>Redes Móveis e Sem Fios</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/RCI6451113/2015-2016/2-semestre'>Redes de Computadores e Internet</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/RT25179/2016-2017/1-semestre'>Redes de Telecomunicações</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/RIE36451113/2015-2016/2-semestre'>Redes e Instalações Eléctricas</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/RSI25179/2016-2017/1-semestre'>Redes e Serviços Internet</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/RTR6451113/2015-2016/2-semestre'>Regime Transitório em Redes</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/Rob36451113/2015-2016/2-semestre'>Robótica</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/SA51113/2015-2016/2-semestre'>Sensores e Actuadores</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/SS25179/2016-2017/1-semestre'>Sinais e Sistemas</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/SAut17/2016-2017/1-semestre'>Sistemas Autónomos</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/SC51113/2015-2016/2-semestre'>Sistemas Computacionais Embebidos</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/SD45179/2016-2017/1-semestre'>Sistemas Digitais</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/SEPS36451113/2015-2016/2-semestre'>Sistemas Electrónicos de Processamento de Sinal</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/SER6451113/2015-2016/2-semestre'>Sistemas Embebidos em Rede</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/SIA36451113/2015-2016/2-semestre'>Sistemas Integrados Analógicos</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/SAA25179/2016-2017/1-semestre'>Sistemas de Alimentação Autónomos</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/SCM36451113/2015-2016/2-semestre'>Sistemas de Comunicações Móveis</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/SCDTR25179/2016-2017/1-semestre'>Sistemas de Controlo Distribuído em Tempo Real</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/SCC6451113/2015-2016/2-semestre'>Sistemas de Conversão Comutada</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/SIBD25179/2016-2017/1-semestre'>Sistemas de Informação e Bases de Dados</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/STel451113/2015-2016/2-semestre'>Sistemas de Telecomunicações</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/STVR25179/2016-2017/1-semestre'>Sistemas de Telecomunicações Via Rádio</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/STFO36451113/2015-2016/2-semestre'>Sistemas de Telecomunicações por Fibra Óptica</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/TComu5179/2016-2017/1-semestre'>Teoria da Comunicação</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/TEM56451113/2015-2016/2-semestre'>Termodinâmica e Estrutura da Matéria</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/TDig451113/2015-2016/2-semestre'>Transmissão Digital</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/AL1625179/2016-2017/1-semestre'>Álgebra Linear</option>					</select>
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
							<?php break ?>
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

									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/ACED1325179/2016-2017/1-semestre'>Análise Complexa e Equações Diferenciais</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/Ast6451113/2015-2016/2-semestre'>Astrofísica</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/B336451113/2015-2016/2-semestre'>Biofísica</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/CEle25179/2016-2017/1-semestre'>Complementos de Electrónica</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/CMQ25179/2016-2017/1-semestre'>Complementos de Mecânica Quântica</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/CTR25179/2016-2017/1-semestre'>Controlo em Tempo Real</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/CDI725179/2016-2017/1-semestre'>Cálculo Diferencial e Integral I</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/CDI1325179/2016-2017/1-semestre'>Cálculo Diferencial e Integral II</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/DG36451113/2015-2016/2-semestre'>Descargas em Gases</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/DMEFT25179/2016-2017/1-semestre'>Dissertação de Mestrado em Engª Física Tecnológica</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/ECla25179/2016-2017/1-semestre'>Electrodinâmica Clássica</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/EO336451113/2015-2016/2-semestre'>Electromagnetismo e Óptica</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/EGer25179/2016-2017/1-semestre'>Electrónica Geral</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/ESpi36451113/2015-2016/2-semestre'>Electrónica de Spin</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/ESF-2/2015-2016/1-semestre'>Energia Solar Fotovoltaica</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/EST-2/2015-2016/1-semestre'>Energia Solar Térmica</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/EES25179/2016-2017/1-semestre'>Estrutura Electrónica dos Sólidos</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/FN451113/2015-2016/2-semestre'>Fusão Nuclear</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/FC25179/2016-2017/1-semestre'>Física Computacional</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/FEsta36451113/2015-2016/2-semestre'>Física Estatística</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/FNuc36451113/2015-2016/2-semestre'>Física Nuclear</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/FMC25179/2016-2017/1-semestre'>Física da Matéria Condensada</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/FPar9/2016-2017/1-semestre'>Física de Partículas</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/FES36451113/2015-2016/2-semestre'>Física do Estado Sólido</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/FG36451113/2015-2016/2-semestre'>Física do Globo</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/FCL36451113/2015-2016/2-semestre'>Física dos Cristais Líquidos</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/FMCon25179/2016-2017/1-semestre'>Física dos Meios Contínuos</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/FEN36451113/2015-2016/2-semestre'>Física e Engenharia Nuclear</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/FTR36451113/2015-2016/2-semestre'>Física e Tecnologia das Radiações</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/FTP25179/2016-2017/1-semestre'>Física e Tecnologia dos Plasmas</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/FTS36451113/2015-2016/2-semestre'>Física e Tecnologia dos Semicondutores</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/Ges236451113/2015-2016/2-semestre'>Gestão</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/GCT36451113/2015-2016/2-semestre'>Gestão de Ciência e Tecnologia</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/IElec36451113/2015-2016/2-semestre'>Instrumentação Electrónica</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/II25179/2016-2017/1-semestre'>Introdução à Investigação</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/LA25179/2016-2017/1-semestre'>Laboratório de Astrofísica</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/LCET36451113/2015-2016/2-semestre'>Laboratório de Complementos de Electromagnetismo e Termodinâmica</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/LFAOFR25179/2016-2017/1-semestre'>Laboratório de Física Atómica, Óptica e Física das Radiações</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/LFEA36451113/2015-2016/2-semestre'>Laboratório de Física Experimental Avançada</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/LFEB25179/2016-2017/1-semestre'>Laboratório de Física Experimental Básica</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/LFMC25179/2016-2017/1-semestre'>Laboratório de Física da Matéria Condensada</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/LIDes6451113/2015-2016/2-semestre'>Laboratório de Inovação e Desenvolvimento</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/O116451113/2015-2016/2-semestre'>Laboratório de Oficinas</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/LOO25179/2016-2017/1-semestre'>Laboratório de Oscilações e Ondas</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/LRC36451113/2015-2016/2-semestre'>Laboratório de Raios Cósmicos</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MC245179/2016-2017/1-semestre'>Matemática Computacional</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MAna36451113/2015-2016/2-semestre'>Mecânica Analítica</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/METF36451113/2015-2016/2-semestre'>Mecânica Estatística e Transições de Fase</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MGer6451113/2015-2016/2-semestre'>Mecânica Geral</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MQ25179/2016-2017/1-semestre'>Mecânica Quântica I</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MQ6451113/2015-2016/2-semestre'>Mecânica Quântica II</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MO45179/2016-2017/1-semestre'>Mecânica e Ondas</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/Microc25179/2016-2017/1-semestre'>Microcontroladores</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MEFP25179/2016-2017/1-semestre'>Métodos Experimentais em Física de Partículas</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/NN225179/2016-2017/1-semestre'>Nanotecnologias e Nanoelectrónica</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/OIP25179/2016-2017/1-semestre'>Ondas e Instabilidades em Plasmas</option>
									<option value='http://fenix.tecnico.ulisboa.pt/cursos/meft/descricao'>Opção Livre</option>
									<option value='http://fenix.tecnico.ulisboa.pt/cursos/meft/descricao'>Opção de Engenharia 1</option>
									<option value='http://fenix.tecnico.ulisboa.pt/cursos/meft/descricao'>Opção de Engenharia 2</option>
									<option value='http://fenix.tecnico.ulisboa.pt/cursos/meft/descricao'>Opção de Engenharia 3</option>
									<option value='http://fenix.tecnico.ulisboa.pt/cursos/meft/descricao'>Opção de Física 1</option>
									<option value='http://fenix.tecnico.ulisboa.pt/cursos/meft/descricao'>Opção de Física 2</option>
									<option value='http://fenix.tecnico.ulisboa.pt/cursos/meft/descricao'>Opção de Física 3</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/PEst30179/2016-2017/1-semestre'>Probabilidades e Estatística</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/Pro225179/2016-2017/1-semestre'>Programação</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/PCLD36451113/2015-2016/2-semestre'>Projecto e Controlo em Lógica Digital</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/Proj25179/2016-2017/1-semestre'>Projecto-Meft</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/Qui36451113/2015-2016/2-semestre'>Química</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/RN36451113/2015-2016/2-semestre'>Reacções Nucleares</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/RCos25179/2016-2017/1-semestre'>Relatividade e Cosmologia</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/SEne/2015-2016/1-semestre'>Serviços de Energia</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/SD36451113/2015-2016/2-semestre'>Sistemas Digitais</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/SDin9/2016-2017/1-semestre'>Sistemas Dinâmicos</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/SADad25179/2016-2017/1-semestre'>Sistemas de Aquisição de Dados</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/TE36451113/2015-2016/2-semestre'>Tecnologias Energéticas</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/TPPM25179/2016-2017/1-semestre'>Tecnologias a Plasma para Processamento de Materiais</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/TCP25179/2016-2017/1-semestre'>Teoria Cinética dos Plasmas</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/TCam36451113/2015-2016/2-semestre'>Teoria de Campo</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/TGF25179/2016-2017/1-semestre'>Teoria de Grupos em Física</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/TCFE336451113/2015-2016/2-semestre'>Teoria dos Circuitos e Fundamentos de Electrónica</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/TU36451113/2015-2016/2-semestre'>Teorias de Unificação</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/TEM179/2016-2017/1-semestre'>Termodinâmica e Estrutura da Matéria</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/TMF25179/2016-2017/1-semestre'>Técnicas Matemáticas da Física</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/TDM25179/2016-2017/1-semestre'>Técnicas de Diagnóstico e Medida</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/TIN36451113/2015-2016/2-semestre'>Técnicas de Instrumentação Nuclear</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/TMN56451113/2015-2016/2-semestre'>Técnicas de Micro e Nanofabricação</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/TFPAC25179/2016-2017/1-semestre'>Tópicos Física de Partículas, Astrofísica e Cosmologia</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/TMCon25179/2016-2017/1-semestre'>Tópicos de Matéria Condensada</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/TRGC6451113/2015-2016/2-semestre'>Tópicos em Relatividade Geral e Cosmologia</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/AL1745179/2016-2017/1-semestre'>Álgebra Linear</option>
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
							<?php break ?>
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

									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/ACED1725179/2016-2017/1-semestre'>Análise Complexa e Equações Diferenciais</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/CP25179/2016-2017/1-semestre'>Computação e Programação</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/CDI3425179/2016-2017/1-semestre'>Cálculo Diferencial e Integral I</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/CDI1325179/2016-2017/1-semestre'>Cálculo Diferencial e Integral II</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/Des36451113/2015-2016/2-semestre'>Desenho</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/EM325179/2016-2017/1-semestre'>Economia Mineral</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/EO625179/2016-2017/1-semestre'>Electromagnetismo e Óptica</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/Est236451113/2015-2016/2-semestre'>Estática</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/EOEG36451113/2015-2016/2-semestre'>Expressão Oral e Escrita-Geológica</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/Geol51113/2015-2016/2-semestre'>Geologia</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/Geom25179/2016-2017/1-semestre'>Geomatemática</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/GApl36451113/2015-2016/2-semestre'>Geoquímica Aplicada</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/Ges236451113/2015-2016/2-semestre'>Gestão</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/Hidr9/2016-2017/1-semestre'>Hidrogeologia</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/Hidra36451113/2015-2016/2-semestre'>Hidráulica</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/IOpe311451113/2015-2016/2-semestre'>Investigação Operacional</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MC536451113/2015-2016/2-semestre'>Matemática Computacional</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MRoc25179/2016-2017/1-semestre'>Mecânica das Rochas</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MS36451113/2015-2016/2-semestre'>Mecânica dos Solos</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MO5311451113/2015-2016/2-semestre'>Mecânica e Ondas</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MPet5179/2016-2017/1-semestre'>Mineralogia e Petrologia</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/P225179/2016-2017/1-semestre'>Pedologia</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/PP116451113/2015-2016/2-semestre'>Portfólio Pessoal - Geológica</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/PEst65179/2016-2017/1-semestre'>Probabilidades e Estatística</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/PGS5179/2016-2017/1-semestre'>Prospecção Geofisica e Sondagens</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/Qui425179/2016-2017/1-semestre'>Química</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/RG451113/2015-2016/2-semestre'>Recursos Geológicos</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/RMin9/2016-2017/1-semestre'>Recursos Mineiros</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/RMat225179/2016-2017/1-semestre'>Resistência dos Materiais</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/SCET25179/2016-2017/1-semestre'>Seminários em Ciências de Engenharia da Terra</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/SIG45179/2016-2017/1-semestre'>Sistemas de Informação Geográfica</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/TEM236451113/2015-2016/2-semestre'>Termodinâmica e Estrutura da Matéria</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/Top36451113/2015-2016/2-semestre'>Topografia</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/AL1735179/2016-2017/1-semestre'>Álgebra Linear</option>					</select>
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
							<?php break ?>
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

									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/ACED21179/2016-2017/1-semestre'>Análise Complexa e Equações Diferenciais</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/APro51113/2015-2016/2-semestre'>Avaliação de Projectos</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/CMat51113/2015-2016/2-semestre'>Ciência de Materiais</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/Con5179/2016-2017/1-semestre'>Contabilidade</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/CDI54179/2016-2017/1-semestre'>Cálculo Diferencial e Integral I</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/CDI51179/2016-2017/1-semestre'>Cálculo Diferencial e Integral II</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/DMG101113/2015-2016/2-semestre'>Desenho e Modelação Geométrica</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/Dir51113/2015-2016/2-semestre'>Direito Empresarial</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/EO23179/2016-2017/1-semestre'>Electromagnetismo e Óptica</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/EEle51113/2015-2016/2-semestre'>Elementos de Electrotecnia</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/EEC51113/2015-2016/2-semestre'>Elementos de Engenharia Civil</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/EEM5179/2016-2017/1-semestre'>Elementos de Engenharia Mecânica</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/EEQ5179/2016-2017/1-semestre'>Elementos de Engenharia Química</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/EPro5179/2016-2017/1-semestre'>Elementos de Programação</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/FIO51113/2015-2016/2-semestre'>Fundamentos de Investigação Operacional</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/GFin5179/2016-2017/1-semestre'>Gestão Financeira</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/GIA9/2016-2017/1-semestre'>Gestão Industrial e Ambiente</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/GQS51113/2015-2016/2-semestre'>Gestão da Qualidade e Segurança</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/GO51113/2015-2016/2-semestre'>Gestão de Operações</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/GSE/2015-2016/2-semestre'>Gestão de Sistemas Energéticos</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/IGes5179/2016-2017/1-semestre'>Introdução à Gestão</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/M9/2016-2017/1-semestre'>Macroeconomia</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/Mar5179/2016-2017/1-semestre'>Marketing</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MC51113/2015-2016/2-semestre'>Matemática Computacional</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MO131113/2015-2016/2-semestre'>Mecânica e Ondas</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/Micr51113/2015-2016/2-semestre'>Microeconomia</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/PEst31179/2016-2017/1-semestre'>Probabilidades e Estatística</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/Qui14179/2016-2017/1-semestre'>Química</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/SEGI9/2016-2017/1-semestre'>Seminários em Engenharia e Gestão Industrial</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/SIBD51113/2015-2016/2-semestre'>Sistemas de Informação e Bases de Dados</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/TFT91113/2015-2016/2-semestre'>Termodinâmica e Fenómenos de Transporte</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/AL29179/2016-2017/1-semestre'>Álgebra Linear</option>					</select>
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
							<?php break ?>
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

									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/ACED425179/2016-2017/1-semestre'>Análise Complexa e Equações Diferenciais</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/AMS1113/2015-2016/2-semestre'>Análise e Modelação de Sistemas</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/ASA76451113/2015-2016/2-semestre'>Análise e Síntese de Algoritmos</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/BD225179/2016-2017/1-semestre'>Bases de Dados</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/Com56451113/2015-2016/2-semestre'>Compiladores</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/CGra45179/2016-2017/1-semestre'>Computação Gráfica</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/CS1113/2015-2016/2-semestre'>Computação e Sociedade</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/CDI925179/2016-2017/1-semestre'>Cálculo Diferencial e Integral I</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/CDI825179/2016-2017/1-semestre'>Cálculo Diferencial e Integral II</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/EO101113/2015-2016/2-semestre'>Electromagnetismo e Óptica</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/ESof96451113/2015-2016/2-semestre'>Engenharia de Software</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/FP45179/2016-2017/1-semestre'>Fundamentos da Programação</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/Ges55179/2016-2017/1-semestre'>Gestão</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/IArt45179/2016-2017/1-semestre'>Inteligência Artificial</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/IPM201113/2015-2016/2-semestre'>Interfaces Pessoa Máquina</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/IAED76451113/2015-2016/2-semestre'>Introdução aos Algoritmos e Estruturas de Dados</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/IAC45179/2016-2017/1-semestre'>Introdução à Arquitetura de Computadores</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/IEI7179/2016-2017/1-semestre'>Introdução à Engenharia Informática</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/LP56451113/2015-2016/2-semestre'>Lógica para Programação</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MD56451113/2015-2016/2-semestre'>Matemática Discreta</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MO65179/2016-2017/1-semestre'>Mecânica e Ondas</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/OC11179/2016-2017/1-semestre'>Organização de Computadores</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/PEst30179/2016-2017/1-semestre'>Probabilidades e Estatística</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/PO65179/2016-2017/1-semestre'>Programação com Objectos</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/RC45179/2016-2017/1-semestre'>Redes de Computadores</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/SDis126451113/2015-2016/2-semestre'>Sistemas Distribuídos</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/SO45179/2016-2017/1-semestre'>Sistemas Operativos</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/TCom51113/2015-2016/2-semestre'>Teoria da Computação</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/AL425179/2016-2017/1-semestre'>Álgebra Linear</option>					</select>
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
							<?php break ?>
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

									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/ACED21179/2016-2017/1-semestre'>Análise Complexa e Equações Diferenciais</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/AMS1113/2015-2016/2-semestre'>Análise e Modelação de Sistemas</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/ASA101113/2015-2016/2-semestre'>Análise e Síntese de Algoritmos</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/BD8179/2016-2017/1-semestre'>Bases de Dados</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/Com56451113/2015-2016/2-semestre'>Compiladores</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/CGra8179/2016-2017/1-semestre'>Computação Gráfica</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/CS1113/2015-2016/2-semestre'>Computação e Sociedade</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/CDI54179/2016-2017/1-semestre'>Cálculo Diferencial e Integral I</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/CDI51179/2016-2017/1-semestre'>Cálculo Diferencial e Integral II</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/EO91113/2015-2016/2-semestre'>Electromagnetismo e Óptica</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/ESof141113/2015-2016/2-semestre'>Engenharia de Software</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/FP179/2016-2017/1-semestre'>Fundamentos da Programação</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/Ges11179/2016-2017/1-semestre'>Gestão</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/IArt9179/2016-2017/1-semestre'>Inteligência Artificial</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/IPM171113/2015-2016/2-semestre'>Interfaces Pessoa Máquina</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/IAED101113/2015-2016/2-semestre'>Introdução aos Algoritmos e Estruturas de Dados</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/IAC3179/2016-2017/1-semestre'>Introdução à Arquitetura de Computadores</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/IEI7179/2016-2017/1-semestre'>Introdução à Engenharia Informática</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/LP51113/2015-2016/2-semestre'>Lógica para Programação</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MD51113/2015-2016/2-semestre'>Matemática Discreta</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MO3179/2016-2017/1-semestre'>Mecânica e Ondas</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/OC12179/2016-2017/1-semestre'>Organização de Computadores</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/PEst31179/2016-2017/1-semestre'>Probabilidades e Estatística</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/PO17179/2016-2017/1-semestre'>Programação com Objectos</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/RC9179/2016-2017/1-semestre'>Redes de Computadores</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/SDis151113/2015-2016/2-semestre'>Sistemas Distribuídos</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/SO7179/2016-2017/1-semestre'>Sistemas Operativos</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/TCom1113/2015-2016/2-semestre'>Teoria da Computação</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/AL29179/2016-2017/1-semestre'>Álgebra Linear</option>					</select>
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
							<?php break ?>
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

									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/ACED1245179/2016-2017/1-semestre'>Análise Complexa e Equações Diferenciais</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/BBM25179/2016-2017/1-semestre'>Bioquímica e Biologia Molecular</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/CP325179/2016-2017/1-semestre'>Computação e Programação</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/CEM36451113/2015-2016/2-semestre'>Cristalografia e Estrutura de Materiais</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/CDI20210179/2016-2017/1-semestre'>Cálculo Diferencial e Integral I</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/CDI2125179/2016-2017/1-semestre'>Cálculo Diferencial e Integral II</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/DPM36451113/2015-2016/2-semestre'>Degradação e Protecção de Materiais</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/DMG225179/2016-2017/1-semestre'>Desenho e Modelação Geométrica I</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/DM36451113/2015-2016/2-semestre'>Design e Selecção de Materiais</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/EO525179/2016-2017/1-semestre'>Electromagnetismo e Óptica</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/ECTec51113/2015-2016/2-semestre'>Engenharia de Células e Tecidos</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/ECM25179/2016-2017/1-semestre'>Ensaios e Caracterização de Materiais</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/FT325179/2016-2017/1-semestre'>Fenómenos de Transferência</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/FM25179/2016-2017/1-semestre'>Física dos Materiais</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/Ges236451113/2015-2016/2-semestre'>Gestão</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/IEM25179/2016-2017/1-semestre'>Introdução à Engenharia de Materiais</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MC625179/2016-2017/1-semestre'>Matemática Computacional</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MCV36451113/2015-2016/2-semestre'>Materiais Cerâmicos e Vidros</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MM36451113/2015-2016/2-semestre'>Materiais Metálicos</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MP25179/2016-2017/1-semestre'>Materiais Poliméricos</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MCon36451113/2015-2016/2-semestre'>Materiais de Construção</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MMat36451113/2015-2016/2-semestre'>Mecânica dos Materiais</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MO336451113/2015-2016/2-semestre'>Mecânica e Ondas</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/PEst30179/2016-2017/1-semestre'>Probabilidades e Estatística</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/PExt179/2016-2017/1-semestre'>Processos Extractivos</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/PMMat25179/2016-2017/1-semestre'>Propriedades Mecânicas dos Materiais</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/Qui525179/2016-2017/1-semestre'>Química</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/QO336451113/2015-2016/2-semestre'>Química Orgânica</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/SEM36451113/2015-2016/2-semestre'>Seminários de Engenharia de Materiais I</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/SEMII36451113/2015-2016/2-semestre'>Seminários de Engenharia de Materiais II</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/SInte36451113/2015-2016/2-semestre'>Superfícies e Interfaces</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/TQui325179/2016-2017/1-semestre'>Termodinâmica Química</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/TF36451113/2015-2016/2-semestre'>Transformações de Fase</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/AL1025179/2016-2017/1-semestre'>Álgebra Linear</option>					</select>
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
							<?php break ?>
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

									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/Aer25179/2016-2017/1-semestre'>Aerodinâmica</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/ACED1235179/2016-2017/1-semestre'>Análise Complexa e Equações Diferenciais</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/AInd36451113/2015-2016/2-semestre'>Automação Industrial</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/CMat25179/2016-2017/1-semestre'>Ciência de Materiais</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/CE35179/2016-2017/1-semestre'>Climatização de Edifícios</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/C36451113/2015-2016/2-semestre'>Combustão</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/CTM25179/2016-2017/1-semestre'>Complementos de Tecnologia Mecânica</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/CTCal36451113/2015-2016/2-semestre'>Complementos de Transmissão de Calor</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/CMM25179/2016-2017/1-semestre'>Comportamento Mecânico dos Materiais</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/CP225179/2016-2017/1-semestre'>Computação e Programação</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/CIP-RAAI/2015-2016/2-semestre'>Controlo Integrado da Produção</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/CSis36451113/2015-2016/2-semestre'>Controlo de Sistemas</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/CO6451113/2015-2016/2-semestre'>Controlo Óptimo</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/CDI2525179/2016-2017/1-semestre'>Cálculo Diferencial e Integral I</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/CDI2125179/2016-2017/1-semestre'>Cálculo Diferencial e Integral II</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/DMG225179/2016-2017/1-semestre'>Desenho e Modelação Geométrica I</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/DMG76451113/2015-2016/2-semestre'>Desenho e Modelação Geométrica II</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/DPE25179/2016-2017/1-semestre'>Desenvolvimento de Produto e Empreendedorismo</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/DSM236451113/2015-2016/2-semestre'>Dinâmica de Sistemas Mecânicos</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/DMEM25179/2016-2017/1-semestre'>Dissertação de Mestrado em Engenharia Mecânica</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/EI225179/2016-2017/1-semestre'>Ecologia Industrial</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/EO225179/2016-2017/1-semestre'>Electromagnetismo e Óptica</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/ETra35179/2016-2017/1-semestre'>Energia nos Transportes</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/ERen25179/2016-2017/1-semestre'>Energias Renováveis</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/EPla25179/2016-2017/1-semestre'>Enformação Plástica</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/ETer36451113/2015-2016/2-semestre'>Equipamentos Térmicos</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/FInd45179/2016-2017/1-semestre'>Frio Industrial</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/Ges536451113/2015-2016/2-semestre'>Gestão</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/GPro25179/2016-2017/1-semestre'>Gestão da Produção</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/GEne5179/2016-2017/1-semestre'>Gestão de Energia</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/GProj36451113/2015-2016/2-semestre'>Gestão de Projectos</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/ISis25179/2016-2017/1-semestre'>Identificação de Sistemas</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/IDS45179/2016-2017/1-semestre'>Inovação e Desenvolvimento Sustentável</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/IEMec25179/2016-2017/1-semestre'>Introdução à Engenharia Mecânica</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/Maq36451113/2015-2016/2-semestre'>Maquinagem</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MC235179/2016-2017/1-semestre'>Matemática Computacional</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MCL25179/2016-2017/1-semestre'>Materiais Compósitos Laminados</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MEng25179/2016-2017/1-semestre'>Materiais em Engenharia</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MA125179/2016-2017/1-semestre'>Mecânica Aplicada I</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MA36451113/2015-2016/2-semestre'>Mecânica Aplicada II</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MComp36451113/2015-2016/2-semestre'>Mecânica Computacional</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MEstru25179/2016-2017/1-semestre'>Mecânica Estrutural</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MFC35179/2016-2017/1-semestre'>Mecânica de Fluídos Computacional</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MF225179/2016-2017/1-semestre'>Mecânica dos Fluidos I</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MF36451113/2015-2016/2-semestre'>Mecânica dos Fluídos II</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MMat36451113/2015-2016/2-semestre'>Mecânica dos Materiais</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MSol25179/2016-2017/1-semestre'>Mecânica dos Sólidos</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MO436451113/2015-2016/2-semestre'>Mecânica e Ondas</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MQua25179/2016-2017/1-semestre'>Metrologia e Qualidade</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/M35179/2016-2017/1-semestre'>Micro-Fabrico</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MTer25179/2016-2017/1-semestre'>Motores Térmicos</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MF236451113/2015-2016/2-semestre'>Máquinas-Ferramenta</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MEEA25179/2016-2017/1-semestre'>Métodos Experimentais em Energia e Ambiente</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/OESM225179/2016-2017/1-semestre'>Optimização de Estruturas e Sistemas Mecânicos</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/OD6451113/2015-2016/2-semestre'>Optimização e Decisão</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/OM336451113/2015-2016/2-semestre'>Orgãos de Máquinas</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/PPes36451113/2015-2016/2-semestre'>Portfólio Pessoal</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/PEst2445179/2016-2017/1-semestre'>Probabilidades e Estatística</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/PLig36451113/2015-2016/2-semestre'>Processos de Ligação</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/POBD25179/2016-2017/1-semestre'>Programação por Objectos e Bases de Dados</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/PMeca25179/2016-2017/1-semestre'>Projecto Mecânico</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/Qui325179/2016-2017/1-semestre'>Química</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/RMan36451113/2015-2016/2-semestre'>Robótica de Manipulação</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/SI25179/2016-2017/1-semestre'>Segurança Industrial</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/SSM25179/2016-2017/1-semestre'>Sinais e Sistemas Mecatrónicos</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/SEE35179/2016-2017/1-semestre'>Sistemas Eléctricos e Electromecânicos</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/CDI105179/2016-2017/1-semestre'>Sistemas Inteligentes</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/SMec25179/2016-2017/1-semestre'>Sistemas Mecatrónicos</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/TM236451113/2015-2016/2-semestre'>Tecnologia Mecânica</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/T36451113/2015-2016/2-semestre'>Termodinâmica I</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/T225179/2016-2017/1-semestre'>Termodinâmica II</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/TPF25179/2016-2017/1-semestre'>Transformação de Polímeros e Fundição</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/TCal25179/2016-2017/1-semestre'>Transmissão de Calor</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/TMan25179/2016-2017/1-semestre'>Tribologia e Manutenção</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/Tur36451113/2015-2016/2-semestre'>Turbomáquinas</option>
									<option value='http://fenix.tecnico.ulisboa.pt/cursos/memec/descricao'>UC de Qualquer Área de Especialização</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/VRui25179/2016-2017/1-semestre'>Vibrações e Ruído</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/VComp25179/2016-2017/1-semestre'>Visão Computacional</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/AL1225179/2016-2017/1-semestre'>Álgebra Linear</option>					</select>
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
							<?php break ?>
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

									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/ACED1425179/2016-2017/1-semestre'>Análise Complexa e Equações Diferenciais</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/AQ25179/2016-2017/1-semestre'>Análise Química</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/AEne9/2016-2017/1-semestre'>Armazenamento de Energia</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/Bioc25179/2016-2017/1-semestre'>Biocombustíveis</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/BBM25179/2016-2017/1-semestre'>Bioquímica e Biologia Molecular</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/Biot36451113/2015-2016/2-semestre'>Biotecnologia</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/BAmb51113/2015-2016/2-semestre'>Biotecnologia Ambiental</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/CPC25179/2016-2017/1-semestre'>Catálise e Processos Catalíticos</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/CTP36451113/2015-2016/2-semestre'>Ciência e Tecnologia de Polímeros</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/CAlt51113/2015-2016/2-semestre'>Combustiveis Alternativos</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/CFT36451113/2015-2016/2-semestre'>Complementos de Fenómenos de Transferência</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/CP325179/2016-2017/1-semestre'>Computação e Programação</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/CAP13/2015-2016/2-semestre'>Controlo Avançado de Processos</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/CDI20210179/2016-2017/1-semestre'>Cálculo Diferencial e Integral I</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/CDI2125179/2016-2017/1-semestre'>Cálculo Diferencial e Integral II</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/DPM36451113/2015-2016/2-semestre'>Degradação e Protecção de Materiais</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/DE36451113/2015-2016/2-semestre'>Dimensionamento de Equipamento</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/DSCP36451113/2015-2016/2-semestre'>Dinâmica de Sistemas e Controle de Processos</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/DMEQ25179/2016-2017/1-semestre'>Dissertação de Mestrado em Engenharia Química</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/EO36451113/2015-2016/2-semestre'>Electromagnetismo e Óptica</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/EEne751113/2015-2016/2-semestre'>Electroquímica e Energia</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/EITT325179/2016-2017/1-semestre'>Empreendedorismo, Inovação e Transferência de Tecnologia</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/EQI25179/2016-2017/1-semestre'>Engenharia Química Integrada</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/EQBS225179/2016-2017/1-semestre'>Engenharia Química, Biotecnologia e Sociedade</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/ER25179/2016-2017/1-semestre'>Engenharia das Reacções I</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/ER225179/2016-2017/1-semestre'>Engenharia das Reacções II</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/EAS25179/2016-2017/1-semestre'>Estratégias Avançadas de Síntese</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/FT35179/2016-2017/1-semestre'>Fenómenos de Transferência I</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/FT45179/2016-2017/1-semestre'>Fenómenos de Transferência II</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/GPetr13/2015-2016/2-semestre'>Geoquímica do Petróleo</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/Ges236451113/2015-2016/2-semestre'>Gestão</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/GLO1113/2015-2016/2-semestre'>Gestão Logística e de Operações</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/GPQT36451113/2015-2016/2-semestre'>Gestão Pela Qualidade Total</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/GPO25179/2016-2017/1-semestre'>Gestão da Produção e das Operações</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/LCEQ225179/2016-2017/1-semestre'>Laboratórios de Ciências de Engenharia Química</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/LEQ236451113/2015-2016/2-semestre'>Laboratórios de Engenharia Química I</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/LEQ25179/2016-2017/1-semestre'>Laboratórios de Engenharia Química II</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/LEQ36451113/2015-2016/2-semestre'>Laboratórios de Engenharia Química III</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/LQ25179/2016-2017/1-semestre'>Laboratórios de Química I</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/LQ36451113/2015-2016/2-semestre'>Laboratórios de Química II</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/LQ225179/2016-2017/1-semestre'>Laboratórios de Química III</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MC625179/2016-2017/1-semestre'>Matemática Computacional</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/Mat36451113/2015-2016/2-semestre'>Materiais</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MO336451113/2015-2016/2-semestre'>Mecânica e Ondas</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/N325179/2016-2017/1-semestre'>Nanotecnologias</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/OSM36451113/2015-2016/2-semestre'>Operações em Sistemas Multifásicos</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/OPro25179/2016-2017/1-semestre'>Optimização de Processos</option>
									<option value='http://fenix.tecnico.ulisboa.pt/cursos/meq/descricao'>Opção I</option>
									<option value='http://fenix.tecnico.ulisboa.pt/cursos/meq/descricao'>Opção II</option>
									<option value='http://fenix.tecnico.ulisboa.pt/cursos/meq/descricao'>Opção III</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/PIO66451113/2015-2016/2-semestre'>Planificação e Investigação Operacional</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/PATEG36451113/2015-2016/2-semestre'>Poluição Atmosférica e Tratamento de Efluentes Gasosos</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/PEQ6451113/2015-2016/2-semestre'>Portfolio em Engenharia Química I</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/PEQui179/2016-2017/1-semestre'>Portfolio em Engenharia Química II</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/PEst30179/2016-2017/1-semestre'>Probabilidades e Estatística</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/PEQB36851113/2015-2016/2-semestre'>Processos de Engenharia Química</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/PEQB325179/2016-2017/1-semestre'>Processos de Engenharia Química e Biológica</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/PS45179/2016-2017/1-semestre'>Processos de Separação I</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/PS225179/2016-2017/1-semestre'>Processos de Separação II</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/PEQ236451113/2015-2016/2-semestre'>Projecto de Engenharia Química I</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/PEQ225179/2016-2017/1-semestre'>Projecto de Engenharia Química II</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/PTFMP451113/2015-2016/2-semestre'>Propriedades Termofísicas de Fluidos; Medição e Previsão</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/Q525179/2016-2017/1-semestre'>Quimiometria</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/Q25179/2016-2017/1-semestre'>Química I</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/Q236451113/2015-2016/2-semestre'>Química II</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/QI225179/2016-2017/1-semestre'>Química Industrial</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/QM25179/2016-2017/1-semestre'>Química Medicinal</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/QO325179/2016-2017/1-semestre'>Química Orgânica I</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/QO225179/2016-2017/1-semestre'>Química Orgânica II</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/QQ25179/2016-2017/1-semestre'>Química Quântica</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/Quim36451113/2015-2016/2-semestre'>Química-Física</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/RPP35179/2016-2017/1-semestre'>Refinação de Petróleo e Petroquímica</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/SHI51113/2015-2016/2-semestre'>Segurança e Higiene Industrial</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/SIDS9/2016-2017/1-semestre'>Seminários sobre Inovação e Desenvolvimento Sustentável</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/SIC179/2016-2017/1-semestre'>Superfícies, Interfaces e Colóides</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/SDP25179/2016-2017/1-semestre'>Supervisão e Diagnóstico de Processos</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/SIPro36451113/2015-2016/2-semestre'>Síntese e Integração de Processos</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/TA25179/2016-2017/1-semestre'>Tecnologia Alimentar</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/TAmb35179/2016-2017/1-semestre'>Tecnologia Ambiental</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/TV6451113/2015-2016/2-semestre'>Tecnologias Verdes e Estratégias de Decisão</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/TQui325179/2016-2017/1-semestre'>Termodinâmica Química</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/TEQ25349/2016-2017/1-semestre'>Termodinâmica de Engenharia Química</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/TMN56451113/2015-2016/2-semestre'>Técnicas de Micro e Nanofabricação</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/VER5179/2016-2017/1-semestre'>Valorização Energética de Resíduos</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/AL1025179/2016-2017/1-semestre'>Álgebra Linear</option>					</select>
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
							<?php break ?>
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

									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/ACED21179/2016-2017/1-semestre'>Análise Complexa e Equações Diferenciais</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/ACom101113/2015-2016/2-semestre'>Arquitectura de Computadores</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/ARede9179/2016-2017/1-semestre'>Arquitecturas de Redes</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/BD8179/2016-2017/1-semestre'>Bases de Dados</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/CDI54179/2016-2017/1-semestre'>Cálculo Diferencial e Integral I</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/CDI51179/2016-2017/1-semestre'>Cálculo Diferencial e Integral II</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/EO22179/2016-2017/1-semestre'>Electromagnetismo e Óptica</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/ESEmb101113/2015-2016/2-semestre'>Electrónica dos Sistemas Embebidos</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/EMD/2015-2016/1-semestre'>Elementos de Matemática Discreta</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/ESof141113/2015-2016/2-semestre'>Engenharia de Software</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/FP179/2016-2017/1-semestre'>Fundamentos da Programação</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/Ges11179/2016-2017/1-semestre'>Gestão</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/GRS51113/2015-2016/2-semestre'>Gestão e Segurança de Redes</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/IAED101113/2015-2016/2-semestre'>Introdução aos Algoritmos e Estruturas de Dados</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/ICSE8179/2016-2017/1-semestre'>Introdução aos Circuitos e Sistemas Electrónicos</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/IETI1113/2015-2016/2-semestre'>Introdução à Engenharia de Telecomunicações e Informática</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/IIPM51113/2015-2016/2-semestre'>Introdução às Interfaces Pessoa-Máquina</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/IRC101113/2015-2016/2-semestre'>Introdução às Redes de Computadores</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MC9179/2016-2017/1-semestre'>Matemática Computacional</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MO151113/2015-2016/2-semestre'>Mecânica e Ondas</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/PPess51113/2015-2016/2-semestre'>Portfolio Pessoal A</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/PEst31179/2016-2017/1-semestre'>Probabilidades e Estatística</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/PO17179/2016-2017/1-semestre'>Programação com Objectos</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/PAnt9179/2016-2017/1-semestre'>Propagação e Antenas</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/SD9179/2016-2017/1-semestre'>Sistemas Digitais</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/SDis151113/2015-2016/2-semestre'>Sistemas Distribuídos</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/SO7179/2016-2017/1-semestre'>Sistemas Operativos</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/SCom101113/2015-2016/2-semestre'>Sistemas de Comunicações</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/SSina101113/2015-2016/2-semestre'>Sistemas e Sinais</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/AL29179/2016-2017/1-semestre'>Álgebra Linear</option>					</select>
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
							<?php break ?>
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
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/AC225179/2016-2017/1-semestre'>Análise Complexa</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/ACED1325179/2016-2017/1-semestre'>Análise Complexa e Equações Diferenciais</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/AF36451113/2015-2016/2-semestre'>Análise Funcional</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/AN25179/2016-2017/1-semestre'>Análise Numérica</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/AFA9/2016-2017/1-semestre'>Análise Numérica Funcional e Optimização</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/ANEDP236451113/2015-2016/2-semestre'>Análise Numérica de Equações Diferenciais Parciais</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/AR36451113/2015-2016/2-semestre'>Análise Real</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/AML25179/2016-2017/1-semestre'>Análise de Modelos Lineares</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/CTC36451113/2015-2016/2-semestre'>Combinatória e Teoria de Códigos</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/CAMC/2015-2016/2-semestre'>Complementos de Algoritmos e Modelação Computacional</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/CCDI/2015-2016/2-semestre'>Complementos de Cálculo Diferencial e Integral</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/CEO/2015-2016/2-semestre'>Complementos de Electromagnetismo e Óptica</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/CPE36451113/2015-2016/2-semestre'>Complementos de Probabilidades e Estatística</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/CDI725179/2016-2017/1-semestre'>Cálculo Diferencial e Integral I</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/CDI2125179/2016-2017/1-semestre'>Cálculo Diferencial e Integral II</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/EO336451113/2015-2016/2-semestre'>Electromagnetismo e Óptica</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/EMF25179/2016-2017/1-semestre'>Elementos de Matemática Finita</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/EPro35179/2016-2017/1-semestre'>Elementos de Programação</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/EDO25179/2016-2017/1-semestre'>Equações Diferenciais Ordinárias</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/EDP36451113/2015-2016/2-semestre'>Equações Diferenciais Parciais</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/FCQ25179/2016-2017/1-semestre'>Fiabilidade e Controlo de Qualidade</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/FA25179/2016-2017/1-semestre'>Fundamentos de Álgebra</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/GR25179/2016-2017/1-semestre'>Geometria Riemanniana</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/Ges236451113/2015-2016/2-semestre'>Gestão</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/IPE6451113/2015-2016/2-semestre'>Introdução aos Processos Estocásticos</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/ICC25179/2016-2017/1-semestre'>Introdução à Computabilidade e Complexidade</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/IG25179/2016-2017/1-semestre'>Introdução à Geometria</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/IO36451113/2015-2016/2-semestre'>Introdução à Optimização</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/IAlg451113/2015-2016/2-semestre'>Introdução à Álgebra</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/LMC/2015-2016/2-semestre'>Laboratório de Matemática Computacional</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/LM236451113/2015-2016/2-semestre'>Lógica Matemática</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MC336451113/2015-2016/2-semestre'>Matemática Computacional</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/ME25179/2016-2017/1-semestre'>Matemática Experimental</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/MO5311451113/2015-2016/2-semestre'>Mecânica e Ondas</option>
									<option value='http://fenix.tecnico.ulisboa.pt/cursos/lmac/descricao'>Opção A</option>
									<option value='http://fenix.tecnico.ulisboa.pt/cursos/lmac/descricao'>Opção IST I</option>
									<option value='http://fenix.tecnico.ulisboa.pt/cursos/lmac/descricao'>Opção IST II</option>
									<option value='http://fenix.tecnico.ulisboa.pt/cursos/lmac/descricao'>Opção de Matemática I</option>
									<option value='http://fenix.tecnico.ulisboa.pt/cursos/lmac/descricao'>Opção de Matemática II</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/PEst2335179/2016-2017/1-semestre'>Probabilidades e Estatística</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/PMat25179/2016-2017/1-semestre'>Projecto em Matemática</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/SM25179/2016-2017/1-semestre'>Seminário de Matemática</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/SMon25179/2016-2017/1-semestre'>Seminário e Monografia</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/SRCA36451113/2015-2016/2-semestre'>Superfícies de Riemann e Curvas Algébricas</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/TEM25179/2016-2017/1-semestre'>Termodinâmica e Estrutura da Matéria</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/Topo25179/2016-2017/1-semestre'>Topologia</option>
									<option value='http://fenix.tecnico.ulisboa.pt/disciplinas/AL1745179/2016-2017/1-semestre'>Álgebra Linear</option>					</select>
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
							<?php break ?>







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
