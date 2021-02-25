#!/bin/python3

import math
import os
import random
import re
import sys

from collections import defaultdict

# Complete the riddle function below.
def riddle(arr):
    # complete this function
    stack = []
    arr.append(0)
    d = defaultdict(int)
    
    for i,j in enumerate(arr):
        t = i
        while stack and stack[-1][0] >= j:
            val, li = stack.pop()
            d[j] = max(d[j], i - li + 1)
            d[val] = max(d[val], i - li)
            t = li
        stack.append((j,t))
        
    del d[0]
    e = defaultdict(int)
    for i in d:                          
        e[d[i]]=max(e[d[i]],i)
    l=len(arr)
    ans=[e[l-1]]
    
    for i in range(len(arr)-2,0,-1):
        if e[i]<ans[-1]:
            ans.append(ans[-1])
        else:
            ans.append(e[i])
    return ans[::-1]
    
if __name__ == '__main__':
    fptr = open(os.environ['OUTPUT_PATH'], 'w')

    n = int(input())

    arr = list(map(int, input().rstrip().split()))

    res = riddle(arr)

    fptr.write(' '.join(map(str, res)))
    fptr.write('\n')

    fptr.close()
