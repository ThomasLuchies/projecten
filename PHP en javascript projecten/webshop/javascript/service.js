const otherQuestion = document.getElementById("otherQuestion");
const questionSelect = document.getElementById("questionSelect");
const questionContent = document.getElementsByClassName("questionContent");
const questionMainContent = document.getElementById("questionMain");

questionSelect.addEventListener("click", ()=>
{
  if(questionSelect.value == "other")
  {
    otherQuestion.style.display = "block";
  }
  else
  {
    otherQuestion.style.display = "none";
  }
});

function showQuestionContent(question)
{
  if(questionContent[question].style.display == "")
  {
    questionContent[question].style.display = "block";
  }
  else
  {
    questionContent[question].style.display = "";
  }
}

function showQuestionMain()
{
  if(questionMainContent.style.display == "")
  {
    questionMainContent.style.display = "block";
    for(let n = 0; n < questionMainContent.childNodes.length; n++)
    {
      questionMainContent.childNodes[n].style.display = "block";
    }
  }
  else
  {
    questionMainContent.style.display = "";
    for(let n = 0; n < questionMainContent.childNodes.length; n++)
    {
      questionMainContent.childNodes[n].style.display = "";
    }
  }
}
