def swap(a, j):
    temp = a[j + 1]
    a[j + 1] = a[j]
    a[j] = temp

def countSwaps(a):
    l = len(a)
    swaps = 0
    for i in range(l):
        for j in range(l-1):
            if a[j] > a[j + 1]:
                swaps += 1
                swap(a, j)

    return [swaps, a[0], a[l-1]]
