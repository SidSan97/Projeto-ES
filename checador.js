const fs = require('fs');
const txtfile = require('./file');

module.exports = class checador{
    checar(arquivo, diretorio){
        var database = fs.readdirSync(diretorio, 'utf8');
        this.apagarResultado(arquivo.nome.replace('files/', ''));

        for (var i=0; i<database.length; i++){
            var sum = 0;
            var test = new txtfile((diretorio+database[i]));
            for (var j=0; j<test.extrairTexto().length; j++){
                sum += this.similar_text(arquivo.extrairTexto()[j], test.extrairTexto()[j], 1);
            }
            var likeness = sum/(test.extrairTexto().length);
            this.salvarResultado(arquivo.nome.replace('files/', ''), likeness, arquivo.nome, test.nome);
        }




    }

    salvarResultado(filename, likeness, file1, file2){
        var directory = "results/"
        const content = ("\nSemelhança entre os arquivos " + file1.nome + " e " + file2.nome + ": " + String(likeness) + "%")
        fs.appendFileSync((directory + filename), content, 'utf8');
    }

    apagarResultado(filename){
        var directory = "results/"
        const content = ("");
        fs.writeFileSync((directory + filename), content, 'utf8');
    }


    //...A PARTIR DAQUI É A FUNÇÃO SIMILAR_TEXT COPIADA DO GITHUB...//

    similar_text (first, second, percent) { // eslint-disable-line camelcase
        //  discuss at: https://locutus.io/php/similar_text/
        // original by: Rafał Kukawski (https://blog.kukawski.pl)
        // bugfixed by: Chris McMacken
        // bugfixed by: Jarkko Rantavuori original by findings in stackoverflow (https://stackoverflow.com/questions/14136349/how-does-similar-text-work)
        // improved by: Markus Padourek (taken from https://www.kevinhq.com/2012/06/php-similartext-function-in-javascript_16.html)
        //   example 1: similar_text('Hello World!', 'Hello locutus!')
        //   returns 1: 8
        //   example 2: similar_text('Hello World!', null)
        //   returns 2: 0
        if (first === null ||
          second === null ||
          typeof first === 'undefined' ||
          typeof second === 'undefined') {
          return 0
        }
        first += ''
        second += ''
        let pos1 = 0
        let pos2 = 0
        let max = 0
        const firstLength = first.length
        const secondLength = second.length
        let p
        let q
        let l
        let sum
        for (p = 0; p < firstLength; p++) {
          for (q = 0; q < secondLength; q++) {
            for (l = 0; (p + l < firstLength) && (q + l < secondLength) && (first.charAt(p + l) === second.charAt(q + l)); l++) { // eslint-disable-line max-len
              // @todo: ^-- break up this crazy for loop and put the logic in its body
            }
            if (l > max) {
              max = l
              pos1 = p
              pos2 = q
            }
          }
        }
        sum = max
        if (sum) {
          if (pos1 && pos2) {
            sum += this.similar_text(first.substr(0, pos1), second.substr(0, pos2))
          }
          if ((pos1 + max < firstLength) && (pos2 + max < secondLength)) {
            sum += this.similar_text(first.substr(pos1 + max, firstLength - pos1 - max), second.substr(pos2 + max,secondLength - pos2 - max))
          }
        }
        if (!percent) {
          return sum
        }
        return (sum * 200) / (firstLength + secondLength)
      }
}