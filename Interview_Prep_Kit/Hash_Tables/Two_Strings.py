def twoStrings(s1, s2):
    map_dict = {}
    for char in s1:
        map_dict[char] = 1
    
    for char in s2:
        if char in map_dict : 
            return 'YES'
    return 'NO'
