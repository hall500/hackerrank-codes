#!/bin/python3

import math
import os
import random
import re
import sys

# Complete the abbreviation function below.
def abbreviation(a, b):
    if len(a) < len(b):
        return("NO")
    j=len(b)-1
    res=[]
    n=-1*len(a)
    for i in range(-1,n-1,-1):
        if(a[i].upper()==b[j] and j>(len(b)*-1)):
            if a[i].islower():
                res.append(a[i])
            j-=1
        elif a[i].isupper() and a[i].lower() in res:
            res.remove(a[i].lower())
        elif a[i].isupper():
            return("NO")
    return("YES")

if __name__ == '__main__':
    fptr = open(os.environ['OUTPUT_PATH'], 'w')

    q = int(input())

    for q_itr in range(q):
        a = input()

        b = input()

        result = abbreviation(a, b)

        fptr.write(result + '\n')

    fptr.close()
