def maximumToys(prices, k):
    p = sorted(prices)
    toys = []
    sum = 0
    for i in range(len(p) - 1):
        sum += p[i] 
        if sum > k :
            break
        toys.append(p[i])
    return len(toys)
    
print(maximumToys([1, 12, 5, 111, 200, 1000, 10], 50))
print(maximumToys([1, 2, 3, 4], 7))
