<?php

class file {
    private $nome;
    private $diretorio;
    private $linhas;
    public function __construct($filename, $diretorio, $arrayLines){
        $this->nome = $filename;
        $this->diretorio = $diretorio;
        $this->linhas = $arrayLines;
    }

    public function extrairTexto(){
        return $this->linhas;
    }

    public function getNome(){
        return $this->nome;
    }

    public function getDiretorio(){
        return $this->diretorio;
    }
}

class txtfile extends file {
    public function __construct($assignment, $filename){
        $diretorio = "files/" . $assignment;
        $filepath = $diretorio . "/" . $filename;
    
    
        $content = explode("\n" ,file_get_contents($filepath));
        parent::__construct($filename, $diretorio, $content);
    }

}

