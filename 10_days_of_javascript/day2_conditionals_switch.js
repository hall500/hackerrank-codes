'use strict';

process.stdin.resume();
process.stdin.setEncoding('utf-8');

let inputString = '';
let currentLine = 0;

process.stdin.on('data', inputStdin => {
    inputString += inputStdin;
});

process.stdin.on('end', _ => {
    inputString = inputString.trim().split('\n').map(string => {
        return string.trim();
    });
    
    main();    
});

function readLine() {
    return inputString[currentLine++];
}

function getLetter(s) {
    let letter;
    // Write your code here
    switch(s.charAt(0)){
        case 'a': case 'e': case 'i': case 'o': case 'u':
        letter = 'A';
        break;
        case 'b': case 'c': case 'd': case 'f': case 'g':
        letter = 'B';
        break;
        case 'h': case 'j': case 'k': case 'l' : case 'm':
        letter = 'C';
        break;
        case 'n': case 'p': case 'q': case 'r' : case 's':
        case 't': case 'v': case 'w': case 'x' : case 'y': case 'z':
        letter = 'D';
        break;
        default:
        letter = 'D';
        break;
    }
    return letter;
}

/* 
** ALTERNATIVE CODE
*/

/* function getLetter(s) {
  let letter;
  // Write your code here
  const A = "aeiou";
  const B = "bcdfg";
  const C = "hjklm";
  const D = "npqrstuvwxyz";
  const first = s.charAt(0);
  if(A.includes(first)) letter = 'A';
  else if(B.includes(first)) letter = 'B';
  else if(C.includes(first)) letter = 'C';
  else if(D.includes(first)) letter = 'D';
  else letter = 'D';
  return letter;
} */
