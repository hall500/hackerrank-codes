#!/bin/python3

import math
import os
import random
import re
import sys

#
# Complete the 'solve' function below.
#
# The function is expected to return an INTEGER.
# The function accepts following parameters:
#  1. INTEGER n
#  2. INTEGER k
#

def solve(n, k):
    return math.comb(n + k - 1, k) % 10 ** 9

if __name__ == '__main__':
    fptr = open(os.environ['OUTPUT_PATH'], 'w')

    t = int(input().strip())

    for t_itr in range(t):
        n = int(input().strip())

        k = int(input().strip())

        result = solve(n, k)
        
        fptr.write(str(result))

        fptr.write('\n')

    fptr.close()
