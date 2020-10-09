def isValid(s):
    dict = {}
    string = {}
    for c in s:
        dict[c] = dict.get(c, 0) + 1

    for v in dict.values():
        string[v] = string.get(v, 0) + 1

    if len(string.keys())==1:
        return "YES"

    elif len(string.values())==2:
        key1,key2=string.keys()
        if string[key1]==1 and (key1-1==key2 or key1-1==0):
            return "YES"
        elif string[key2]==1 and (key2-1==key1 or key2-1==0):
            return "YES"
        else:
            return "NO"

    else:
        return "NO"
