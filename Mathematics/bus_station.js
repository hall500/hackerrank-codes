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


/**
 * Problem  Statement:
 * 
 * There are n groups of friends, and each group is numbered from 1 to n. The i-th group contains a^i people.

 * They live near a bus stop, and only a single bus operates on this route. An empty bus arrives at the bus stop, and all the groups want to travel by the bus.

 * However, a group of friends does not want to get separated. So they enter the bus only if the bus can carry the entire group.

 * Moreover, the groups do not want to change their relative positioning while traveling. In other words, group 3 cannot travel by bus unless group 1 and group 2 have either (a) already traveled by the bus in the previous trip or (b) they are also sitting inside the bus at present.

 * You are given that a bus of size x can carry x people simultaneously.

 * Find the size x of the bus so that (1) the bus can transport all the groups and (2) every time when the bus starts from the bus station, there is no empty space in the bus (i.e., the total number of people present inside the bus is equal to x).

 *
 */