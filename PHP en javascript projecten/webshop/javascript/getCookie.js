function getCookieByName(name)
{
    let cookiesArray = document.cookie.split(";");
    
    for(let i = 0; i < cookiesArray.length; i++)
    {
        let cookiePair = cookiesArray[i].split("=")
        if(cookiePair[0].trim() == name)
        {
            return cookiePair[1];
        } 
    }
    return null;
}