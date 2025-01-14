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
 * The function is expected to return a STRING.
 * The function accepts following parameters:
 *  1. LONG_INTEGER a
 *  2. LONG_INTEGER b
 *  3. LONG_INTEGER x
 *  4. LONG_INTEGER y
 */

function solve(a, b, x, y) {
  // Write your code here
  const gcd = (a, b) => (b === 0n ? a : gcd(b, a % b));
  return gcd(BigInt(a), BigInt(b)) === gcd(BigInt(x), BigInt(y)) ? "YES" : "NO";
}

function main() {
  const ws = fs.createWriteStream(process.env.OUTPUT_PATH);

  const t = parseInt(readLine().trim(), 10);

  for (let tItr = 0; tItr < t; tItr++) {
    const firstMultipleInput = readLine().replace(/\s+$/g, "").split(" ");

    const a = parseInt(firstMultipleInput[0], 10);

    const b = parseInt(firstMultipleInput[1], 10);

    const x = parseInt(firstMultipleInput[2], 10);

    const y = parseInt(firstMultipleInput[3], 10);

    const result = solve(a, b, x, y);

    ws.write(result + "\n");
  }

  ws.end();
}

/**
 * 
 * 
 * Adam is standing at point (a, b) in an infinite 2D grid. He wants to know if he can reach point (x, y) or not. The only operation he can do is to move to point (a + b, b), (a, a + b), (a - b, b) or (a, b-a) from some point (a, b). It is given that he can move to any point on this 2D grid, i.e., the points having positive or negative x- or y-coordinates.

Tell Adam whether he can reach (x, y) or not.

Input Format

The first line contains an integer, t, followed by t lines, each containing 4 space-separated integers, i.e., a, b, x, and y.

Constraints
	•	1 <=  T <= 10^5
	•	1 <= a,b,x,y <= 10^18

Output Format

For each test case, display “YES” or “NO” that indicates if Adam can reach (x, y) or not.

sample input
3
1 1 2 3
2 1 2 3
3 3 1 1

sample output
YES
YES
NO

Explanation

(1,1) -> (2,1) -> (2,3)
 */
