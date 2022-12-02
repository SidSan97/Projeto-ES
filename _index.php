<?php

/*
IMPORTANTE!

COMO UTILIZAR:
1) INCLUA NO SCRIPTS "checador/main.php", COMO ABAIXO;
2) UTILIZE A FUNÇÃO fazerChecagem(NomeDaPasta);
3) Os resultados das checagens são salvos em arquivos .csv no diretório "scan results/[NomeDaPasta]]";

obs: o nome da pasta da atividade pode ser qualquer coisa, não precisa ser "assignment 1";
obs: É necessário que a as pastas das atividades estejam dentro da pasta files;
obs: É necessário que arquivos PDFs estejam separados no diretório filesPDF, em uma pasta de atividades com o mesmo nome;
obs: o script cria uma cópia dos arquivos .pdf na pasta dos arquivos txt;
*/


require_once ("checador/main.php");

fazerChecagem("assignment 1");