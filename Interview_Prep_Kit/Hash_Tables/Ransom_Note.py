def checkMagazine(magazine, note):
    map_dict = {}
    for word in magazine:
        if word in map_dict : map_dict[word] += 1
        else : map_dict[word] = 1
    for word in note:
        if not word in map_dict or map_dict[word] == 0 : 
            return False
        map_dict[word] -= 1
    return True
