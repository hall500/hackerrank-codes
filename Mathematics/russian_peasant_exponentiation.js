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
 * Complete the 'solve' function below.
 *
 * The function is expected to return an INTEGER_ARRAY.
 * The function accepts following parameters:
 *  1. INTEGER a
 *  2. INTEGER b
 *  3. LONG_INTEGER k
 *  4. INTEGER m
 */
function pair(real, imag) {
  this.real = BigInt(real);
  this.imag = BigInt(imag);
}

function multiply(p, q, M) {
  M = BigInt(M); // Ensure modulus is also a BigInt
  let x = (((p.real * q.real) % M) - ((p.imag * q.imag) % M) + M) % M;
  let y = (((p.real * q.imag) % M) + ((p.imag * q.real) % M) + M) % M;
  return new pair(x, y);
}

function solve(a, b, k, m) {
  let complex = new pair(BigInt(a), BigInt(b));
  let result = new pair(BigInt(1), BigInt(0));
  k = BigInt(k);
  m = BigInt(m);

  while (k > 0) {
    if (k % BigInt(2) === BigInt(1)) {
      result = multiply(result, complex, m);
    }
    complex = multiply(complex, complex, m);
    k = k >> BigInt(1);
    return [Number(result.real), Number(result.imag)];
  }
}

function main() {
  const ws = fs.createWriteStream(process.env.OUTPUT_PATH);

  const q = parseInt(readLine().trim(), 10);

  for (let qItr = 0; qItr < q; qItr++) {
    const firstMultipleInput = readLine().replace(/\s+$/g, "").split(" ");

    const a = parseInt(firstMultipleInput[0], 10);

    const b = parseInt(firstMultipleInput[1], 10);

    const k = parseInt(firstMultipleInput[2], 10);

    const m = parseInt(firstMultipleInput[3], 10);

    const result = solve(a, b, k, m);

    ws.write(result.join(" ") + "\n");
  }

  ws.end();
}

main();
