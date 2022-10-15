const registerScreen = document.getElementById("registerScreen");
const registerScreenCenter = document.getElementById("registerScreenCenter");
const registerOverview = document.getElementById("registerOverview");
const extraMembers = document.getElementById("extraMembers");

function register(tournamentId)
{
    document.cookie = "tournamentId = " + tournamentId;
    window.scrollTo(0, 0);
    registerScreen.style.display = "flex";
    document.body.style.overflow = "hidden";
    registerScreenCenter.style.display = "flex";
    $.ajax({
        type: "post",
        url: "config/checkTournament.php",
        data: {"tournamentId": tournamentId},
        async: false,
    }).done(function (data) 
    {
        console.log("test");
        if(data == "true")
        {
            registerOverview.innerHTML = "<h1>Already Registered</h1>";
            extraMembers.innerHTML = "";
            console.log("test");
        }
        else
        {
            $.ajax(
                {
                type: "post",
                url: "config/getTournamentInfo.php",
                data: {"tournamentId": tournamentId},
                dataType: "JSON",
                success: function (response) 
                {
                    document.getElementById("tournamentName").innerHTML = response["tournamentName"];
                    document.getElementById("tournamentType").innerHTML = response["tournamentType"];
                    document.getElementById("tournamentDate").innerHTML = response["date"];
                    document.getElementById("tournamentStartTime").innerHTML = response["startTime"];
                    document.getElementById("tournamentEndTime").innerHTML = response["endTime"];
                }
            });
        }
    }).fail(function(jqXHR, textStatus)
    {
        console.log("test");
    });
}

function closeRegister()
{
    registerScreen.style.display = "none";
    document.body.style.overflowY = "scroll";
    registerScreenCenter.style.display = "none";
    location.reload();
}