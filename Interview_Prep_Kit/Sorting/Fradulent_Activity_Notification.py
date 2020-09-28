#Working not efficent
def activityNotifications(expenditure, d):
    n = len(expenditure)
    notices = 0
    for i in range(d, n, 1):
        fraud_limit = 2 * median(expenditure[(i - d):i])
        if expenditure[i] >= fraud_limit:
            notices += 1
    return notices
