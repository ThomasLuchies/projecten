const loginButton = document.getElementById("login");
const signupButton = document.getElementById("signup");
const signupScreen = document.getElementById("signupScreenContent");
const loginScreen = document.getElementById("loginScreen");
const closeLogin = document.getElementById("closeLogin");
const closeSignup = document.getElementById("closeSignup");
const container = document.getElementById("container");
const accountHover = document.getElementById("accountHover");
const account = document.getElementById("account");
const body = document.getElementsByTagName("body")[0];

loginButton.addEventListener('click', () =>
{
  showLoginScreen();
});

closeLogin.addEventListener('click', () =>
{
  loginScreen.style.display = "none";
  loginScreenContent.style.display = "none";
  container.style.overflow = "scroll";
});

signupButton.addEventListener('click', () =>
{
  showSignupScreen();
})

closeSignup.addEventListener('click', () =>
{
  loginScreen.style.display = "none";
  signupScreenContent.style.display = "none";
  body.style.overflow = "scroll";
})

function showLoginScreen()
{
  loginScreen.style.display = "flex";
  body.style.overflow = "hidden";
  loginScreenContent.style.display = "flex";
}

function showSignupScreen()
{
  loginScreen.style.display = "flex";
  body.style.overflow = "hidden";
  signupScreenContent.style.display = "flex";
}

function showAccountHover()
{
  accountHover.style.display = "flex";
}

function hideAcountHover()
{
  accountHover.style.display = "none";
}