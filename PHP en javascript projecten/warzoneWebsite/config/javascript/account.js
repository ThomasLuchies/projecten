const accountBackground = document.getElementById("accountBackground");
const signup = document.getElementById("signup");
const login = document.getElementById("login");

function showLoginScreen(screen)
{
    window.scrollTo(0, 0);
    accountBackground.style.display = "flex";
    document.body.style.overflow = "hidden";
    accountBackground.style.overflowY = "scroll";
    if(screen == "signup")
    {
        signup.style.display = "flex";
    }
    else
    {
        login.style.display = "flex";
    }
}

function exitLoginScreen(screen)
{
    accountBackground.style.display = "none";
    document.body.style.overflowY = "scroll";
    if(screen == "signup")
    {
        signup.style.display = "none";
    }
    else if(screen = "login")
    {
        login.style.display = "none";
    }
}
