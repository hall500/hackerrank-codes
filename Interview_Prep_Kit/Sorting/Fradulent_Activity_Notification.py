# Working Efficient code
def median(aux, half, even):
    if  even:
            return (aux[half] + aux[half + 1]) / 2
    else:
            return aux[half]
                
def activityNotifications(expenditure, d):
    notices = 0 

    median_arr = sorted(expenditure[0:d]) 
    
    n_median = len(median_arr)
    half = math.ceil(n_median/2) - 1 
    even = True if n_median % 2 == 0 else False 

    n = len(expenditure)
    
    for i in range(d, n, 1):
        fraud_limit = 2 * median(median_arr, half, even)
        current = expenditure[i]
        if current >= fraud_limit:
            notices += 1
        bisect_pos = bisect.bisect_left(median_arr, expenditure[i - d]) 
        del median_arr[bisect_pos]
        bisect.insort(median_arr, current)
            
    return notices
