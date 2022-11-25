const fs = require('fs')


class file{ //defines a file parent class. Abstract classes in js seem weird
    constructor(filename, arrayLinhas){
        this.nome = filename;
        this.linhas = arrayLinhas;
    }

    extrairTexto(){
        return this.linhas;
    }
}

module.exports = class txtfile extends file{
    constructor(filename) {
        //BELOW IS WHERE YOU IMPLEMENT THE CODE TO FETCH AND READ THE FILE//

        var arrayLinhas = fs.readFileSync(filename, 'utf8').split("\n"); //this just creates the array of lines;

        //ABOVE IS WHERE YOU IMPLEMENT THE CODE TO FETCH AND READ THE FILE//


        super(filename, arrayLinhas); //super calls the constructor for the parent class, passed name and lines array;
    }
}
