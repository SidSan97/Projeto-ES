<?php
class checador {
    public function checar($arquivo){
        $diretorio = $arquivo->getDiretorio();
        $database = array_values(array_diff(scandir($diretorio), array('.', '..', $arquivo->getNome() )));
        
        $this->clearResultado($arquivo);

        for ($i=0; $i<sizeof($database); $i++){
            $tested = new txtfile( str_replace("files/", "", $diretorio), $database[$i]);
            $maxSimilarity = $this->maxSimilarity($arquivo, $tested);
            $avgSimilarity = $this->avgSimilarity($arquivo, $tested);
            $similarityScore = ((2*$maxSimilarity + $avgSimilarity) / 3);
            //$similarityScore = pow((pow($maxSimilarity , 2) * $avgSimilarity), 1/3);

            //echo ("similarity between " . $arquivo->getNome() . " and " . $tested->getNome() . ": " . strval($similarityScore) . "%" . "\n");
            $this->salvarResultado($arquivo, $tested, $similarityScore);
            
        }

    }

    public function avgSimilarity($arquivo1, $arquivo2){
        $sum = 0;
        for ($i=0; $i < sizeof($arquivo1->extrairTexto()); $i++){
            $sum += $this->similarityByLine($i, $arquivo1, $arquivo2);
        }
        return ($sum/sizeof($arquivo1->extrairTexto()));
    }

    public function maxSimilarity($arquivo1, $arquivo2){
        $maxSimilarity = 0;
        for ($i=0; $i < sizeof($arquivo1->extrairTexto()); $i++){
            $localSimilarity = $this->similarityByLine($i, $arquivo1, $arquivo2);
            if ($localSimilarity > $maxSimilarity){
                $maxSimilarity = $localSimilarity;
            }
        }

        return $maxSimilarity;
    }

    private function similarityByLine($line, $arquivo1, $arquivo2){
        $similarity = 0;
        for ($i=0; $i < sizeof($arquivo2->extrairTexto()) ; $i++){

            $maintxt = strtolower($arquivo1->extrairTexto()[$line]);
            $compared = strtolower($arquivo2->extrairTexto()[$i]);

            similar_text($maintxt, $compared, $perc);
            if ($perc > $similarity) {
                $similarity = $perc;
            }
        }

        return $similarity;
    }

    private function salvarResultado($arquivo1, $arquivo2, $score){
        $assignment = str_replace("files/", "", $arquivo1->getDiretorio());
        $nome = $arquivo1->getNome();
        $filepath = "scan results/" . $assignment . "/" . $nome . ".csv";

        $content = ($arquivo1->getNome()) . ", " . ($arquivo2->getNome()) . ", " . strval($score) . "\n";
        
        $file = fopen($filepath, "a");
        fwrite($file, $content);
    }

    private function clearResultado($arquivo){
        $assignment = str_replace("files/", "", $arquivo->getDiretorio());
        $nome = $arquivo->getNome();

        @mkdir(("scan results" . "/" .  $assignment));

        $filepath = "scan results/" . $assignment . "/" . $nome . ".csv";
        file_put_contents($filepath, '');
    }

}