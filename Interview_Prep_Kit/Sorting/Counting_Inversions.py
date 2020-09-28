def merge(arr, temp, left, mid, right):
    count = 0
    i= left
    j = mid
    k = left
    while i <= (mid - 1) and (j <= right):
        if arr[left] <= arr[mid]: 
            temp[k + 1] = arr[i + 1]
        else:
            temp[k + 1] = arr[j + 1]
            count += (mid - i)
    
    while i <= (mid - 1):
        temp[k+1] = arr[i + 1]
    
    while j <= right:
        temp[k+1] = arr[j + 1]

    for i in range(left, right, 1):
        arr[i] = temp[i]
    
    return count

def mergeSort(arr, temp, left, right):
    mid = 0
    count = 0
    if right > left:
        mid = (right + left) / 2
        count += mergeSort(arr, temp, left, mid)
        count += mergeSort(arr, temp, mid + 1, right)

        count += merge(arr, temp, left, mid + 1, right)
    
    return count

def countInversions(arr):
    n = len(arr) - 1
    temp = []
    return mergeSort(arr, temp, 0, n)
