function escapeTags(string){
    res = string.replace("<","&lt;");
    res = string.replace(">","&gt;");
    return res;
}