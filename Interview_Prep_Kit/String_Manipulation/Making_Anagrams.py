#!/bin/python3

import math
import os
import random
import re
import sys
from collections import Counter 

# Complete the makeAnagram function below.
def makeAnagram(a, b):
    dict = {}
    for i in a:
        dict[i] = dict.get(i, 0) + 1
    
    for j in b:
        dict[j] = dict.get(j, 0) - 1

    counter = 0
    for char, val in dict.items():
        counter += abs(val)
    return counter

if __name__ == '__main__':
    fptr = open(os.environ['OUTPUT_PATH'], 'w')

    a = input()

    b = input()

    res = makeAnagram(a, b)

    fptr.write(str(res) + '\n')

    fptr.close()
