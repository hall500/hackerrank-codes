#!/bin/python3

import math
import os
import random
import re
import sys
sys.setrecursionlimit(10 ** 6)

#
# Complete the 'solve' function below.
#
# The function is expected to return an INTEGER_ARRAY.
# The function accepts following parameters:
#  1. INTEGER a
#  2. INTEGER b
#  3. LONG_INTEGER k
#  4. INTEGER m
#

def solve(xr, xi, n, m):
    while n & 1 == 0:
        nxr = xr * xr - xi * xi
        nxi = 2 * xr * xi
        xr = nxr % m
        xi = nxi % m
        n >>= 1
    pr = xr
    pi = xi
    n >>= 1
    while n > 0:
        nxr = xr * xr - xi * xi
        nxi = 2 * xr * xi
        xr = nxr % m
        xi = nxi % m
        if n & 1 != 0:
            npr = pr * xr - pi * xi
            npi = pi * xr + pr * xi
            pr = npr % m
            pi = npi % m
        n >>= 1
    return (pr, pi)

if __name__ == '__main__':
    fptr = open(os.environ['OUTPUT_PATH'], 'w')

    q = int(input().strip())

    for q_itr in range(q):
        first_multiple_input = input().rstrip().split()

        a = int(first_multiple_input[0])

        b = int(first_multiple_input[1])

        k = int(first_multiple_input[2])

        m = int(first_multiple_input[3])

        result = solve(a, b, k, m)

        fptr.write(' '.join(map(str, result)))
        fptr.write('\n')

    fptr.close()
