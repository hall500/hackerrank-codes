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
 * The function accepts INTEGER_ARRAY a as parameter.
 */

function solve(groups) {
  const totalPeople = groups.reduce((sum, group) => sum + group, 0);
  const maxGroupSize = Math.max(...groups);
  const divisors = [];
  for (let i = 1; i * i <= totalPeople; i++) {
    if (totalPeople % i === 0) {
      divisors.push(i);
      if (i !== totalPeople / i) divisors.push(totalPeople / i);
    }
  }
  divisors.sort((a, b) => a - b);

  // Step 2: Validate each divisor
  const validBusSizes = [];
  for (const x of divisors) {
    if (x < maxGroupSize) continue; // Skip if the bus size is smaller than the largest group

    let currentSum = 0;
    let valid = true;

    for (const group of groups) {
      currentSum += group;

      if (currentSum > x) {
        // Overfill
        valid = false;
        break;
      } else if (currentSum === x) {
        // Bus is full
        currentSum = 0; // Reset
      }
    }

    if (valid && currentSum === 0) {
      validBusSizes.push(x); // Add valid bus size
    }
  }

  return validBusSizes;
}

function main() {
  const ws = fs.createWriteStream(process.env.OUTPUT_PATH);

  const aCount = parseInt(readLine().trim(), 10);

  const a = readLine()
    .replace(/\s+$/g, "")
    .split(" ")
    .map((aTemp) => parseInt(aTemp, 10));

  const result = solve(a);

  ws.write(result.join(" ") + "\n");

  ws.end();
}
