# -*- coding: utf-8 -*-
# -*- coding: utf-8 -*-
import bs4
import urllib2
import urlparse
import string
import sys
from operator import itemgetter



def getFinalCourseURL(url):
	url = url.replace('https','http').strip()
	html = urllib2.urlopen(url)
	soup = bs4.BeautifulSoup(html)
	urls = soup.find_all('a')
	return urls[4]['href'].replace('https','http').strip()


def main(curso):
	link = "http://fenix.tecnico.ulisboa.pt/cursos/"+curso+"/curriculo"
	html = urllib2.urlopen(link)
	soup = bs4.BeautifulSoup(html)
	urls = soup.find_all('a')

	final_html = """\
			<tr>
				<td>
					<h3>Escolher&nbspuma&nbspcadeira</h3>
				</td>
				<td>
			  		<select class="form-control" id="courseURL">
"""

	silly = 0
	lista = []
	for url in urls:
		if 'disciplina-curricular' in str(url):
			silly = 1
			url1 = url.get_text().strip()
			if not any(url1 in tup for tup in lista):
				url2 = getFinalCourseURL(url['href'])
				lista.append( (url2, url1) )
		else:
			if silly == 1:
				break

	lista = sorted(lista,key=itemgetter(1))

	for url2, url1 in lista:
		final_html += "\n						<option value='%s'>%s</option>" % (url2, url1)


	final_html +="""\
					</select>
				</td>
				<td>
					<button type="button" class="btn btn-primary" onclick="processCourseURL()"><span class="glyphicon glyphicon-plus"></span></button>
				</td>
			</tr>
"""

	return final_html.encode('utf-8','ignore')

cursos = ['meaer', 'meambi', 'lean', 'mebiol', 'mebiom', 'mec', 'lee', 'meec', 'meft', 'legm', 'legi', 'leic-a', 'leic-t', 'lemat', 'memec', 'meq', 'lerc', 'lmac']

html = ""


for curso in cursos:
	html += """\
				<?php case '{0}': ?>
							<div id="loading">
		  						<h1>A calcular os melhores horários...</h1>
							</div>
							<div id='errorMessage' style="font-family:'Verdana';color:#DD0000;visibility:hidden">Ocorreu um erro na obtenção da disciplina. É possível que o URL esteja mal formado.</div>
							<div class='container'>
								<form action="generate_timetables.php" method="post">
									  <table style="width:70%;">
	""".format(curso)

	html += main(curso)
	html += """\
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
"""

print(html)