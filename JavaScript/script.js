var score = [0,0];
var marker = ["X", "O"];
var player = 0;
var winValues = [7,56,448,73,146,292,273,84];
var win = false;
var playerWins = [0,0];
var playerNames = ["",""];
var player0Name = null;
var player1Name = null;


function initialize()
{
	player0Name = document.getElementById("player0Name").value;
	player1Name = document.getElementById("player1Name").value;
	if ((player0Name == null))
	{
		document.getElementById("tbTacToe").style.display = "none";
	}
	else
	{
		playerNames = [player0Name,player1Name];
		document.getElementById("registration").style.display = "none";
		document.getElementById("tbTacToe").style.display = "inline";
		document.getElementById("log").innerHTML += "Registered Players<br />" + player0Name + " & " + player1Name +"<hr />";
		document.body.innerHTML = document.body.innerHTML.replace('Player 1: ', player0Name);
		document.body.innerHTML = document.body.innerHTML.replace('Player 2: ', player1Name);
	}		
}

function resetGame()
{
	score = [0,0];
	playerWins = [0,0];
	player = 0;
	document.getElementById("player0Score").innerHTML = "Score: " + (playerWins[0]);
	document.getElementById("player1Score").innerHTML = "Score: " + (playerWins[1]);
	nextGame();	
}
function nextGame()
{
	score = [0,0];
	document.getElementById("sqr1").className = "sqr-blank";
	win = false;
	
	var i,
    tags = document.getElementById("gameDiv").getElementsByTagName("*"),
    total = tags.length;
	for ( i = 0; i < total; i++ ) 
	{
		tags[i].className = "sqr-blank";
	}
	document.getElementById("catGame").style.display = "none";
	document.getElementById("winGame").style.display = "none";
	document.getElementById("log").innerHTML = "";
	document.getElementById("log").innerHTML += "New Game<br />";
	document.getElementById("log").innerHTML += "<hr />";
	turnIndicator();

}
function checkDraw()
{
	if (win == false)  
		{
			if ((document.getElementById("sqr1").className != "sqr-blank") &&
			 (document.getElementById("sqr2").className != "sqr-blank") &&
			 (document.getElementById("sqr3").className != "sqr-blank") &&
			 (document.getElementById("sqr4").className != "sqr-blank") &&
			 (document.getElementById("sqr5").className != "sqr-blank") &&
			 (document.getElementById("sqr6").className != "sqr-blank") &&
			 (document.getElementById("sqr7").className != "sqr-blank") &&
			 (document.getElementById("sqr8").className != "sqr-blank") &&
			 (document.getElementById("sqr9").className != "sqr-blank"))
			{
				document.getElementById("catGame").style.display = "inline";
				document.getElementById("log").innerHTML += "This game is a DRAW!<br />";
				
			}
		}
}

function turnIndicator()
{
	document.getElementById("log").innerHTML += (playerNames[player]) + " 's turn! <br />";
	var activePlayerId = "player" + player;
	var inActivePlayerId = "player" + player;
	
	if (player == 0 ) 
	{
	document.getElementById("player0").className = "isTurn";
	document.getElementById("player1").className = "isNotTurn";	
	}
	else
	{
	document.getElementById("player1").className = "isTurn";
	document.getElementById("player0").className = "isNotTurn";	
	}	
}

function updateScore(element, value)
{
	if (element.className == "sqr-blank" && !win)
	{	
		if ([player] == "0")
		{
			element.className = "sqr-player0";
		}
		else
		{
			element.className = "sqr-player1";
		}
		score[player] += value;
		isWin(score[player]);
		if (player == 0 ) player = 1; else player = 0;
		turnIndicator();
		checkDraw();
	
	}
}

function isWin(score)
{		
		for (i = 0; i < winValues.length; i++)
		{
			
			if ((winValues[i] & score) == winValues[i]) 
			{
				win = true;

				if ([player] == 0)
				{
					document.getElementById("winnerDiv").innerHTML = "<table class='tbClass'><tr><td width='100'><img src='./img/red-x.png'></td><td width='200'>" + (playerNames[player]) + "<br />is the Winner!</td></tr></table>";
				}
				else
				{
					document.getElementById("winnerDiv").innerHTML = "<table class='tbClass'><tr><td width='100'><img src='./img/otac.png'></td><td width='200'>" + (playerNames[player]) + "<br />is the Winner!</td></tr></table>";
				}
				document.getElementById("winGame").style.display = "inline";
				
				(playerWins[player]) ++;
				var playerElementId = "player" + [player] + "Score"
				document.getElementById(playerElementId).innerHTML = "Score: " + (playerWins[player]) + "<br />";
				document.getElementById("log").innerHTML += (playerNames[player]) + " is the Winner! <br />";
				document.getElementById("log").innerHTML += (playerNames[player]) + "'s New Score: " + (playerWins[player])  + "<br />";
				document.getElementById("log").innerHTML += "<hr />";
				
			}
			
		}
	
}
