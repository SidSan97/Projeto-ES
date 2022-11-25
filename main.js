const fs = require('fs')
const txtfile = require("./file.js")
const checador = require("./checador.js")

var outline = new txtfile("files/test.txt");
var checagem = new checador();

checagem.checar(outline, "files/");
