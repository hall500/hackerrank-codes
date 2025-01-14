"use strict";

const fs = require("fs");

process.stdin.resume();
process.stdin.setEncoding("utf-8");

let inputString = "";
let currentLine = 0;

process.stdin.on("data", function (inputStdin) {
  inputString += inputStdin;
});

process.stdin.on("end", function () {
  inputString = inputString.split("\n");

  main();
});

function readLine() {
  return inputString[currentLine++];
}

/*
 * Complete the 'isFibo' function below.
 *
 * The function is expected to return a STRING.
 * The function accepts LONG_INTEGER n as parameter.
 */

function isPerfectSquare(x) {
  const sqrt = Math.floor(Math.sqrt(x));
  return sqrt * sqrt === x;
}

function isFibo(n) {
  const eq1 = 5 * n * n + 4;
  const eq2 = 5 * n * n - 4;
  return isPerfectSquare(eq1) || isPerfectSquare(eq2) ? "IsFibo" : "IsNotFibo";
}

function main() {
  const ws = fs.createWriteStream(process.env.OUTPUT_PATH);

  const t = parseInt(readLine().trim(), 10);

  for (let tItr = 0; tItr < t; tItr++) {
    const n = parseInt(readLine().trim(), 10);

    const result = isFibo(n);

    ws.write(result + "\n");
  }

  ws.end();
}
