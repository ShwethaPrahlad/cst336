            var randomNumber = Math.floor(Math.random() * 99) + 1;
            //console.log (randomNumber);
            var guesses = document.querySelector("#guesses");
            var lastResult = document.querySelector('#lastResult');
            var lowOrHi = document.querySelector('#lowOrHi');
            var guessSubmit = document.querySelector(".guessSubmit");
            var guessField = document.querySelector(".guessField");
            var guessCount = 1;
            var resetButton = document.querySelector("#reset");
            resetButton.style.display = 'none';
            guessField.focus();
            var gc = document.querySelector('#gc');
            //var resetButton;
            
            function checkGuess(){
            var userGuess = Number(guessField.value);
            if (userGuess > 99)
            {
             lastResult.innerHTML = 'Error, the number you have typed is higher than 99!';
             guessCount = guessCount - 1;
            }
            else{
              if (guessCount === 1) {
                guesses.innerHTML = 'Previous guesses: ';
                }
              guesses.innerHTML += userGuess + ' ';
              if (userGuess === randomNumber){
               lastResult.innerHTML = 'Congratulations, you got it right!';
               lastResult.style.backgroundColor= 'green';
               lowOrHi.innerHTML = '';
               wonCount++;
               setGameOver();
              }else if (guessCount === 7){
              lastResult.innerHTML = 'Sorry, you lost!';
              lostCount++;
              setGameOver();
              }else {
              lastResult.innerHTML = 'Wrong!';
              lastResult.style.backgroundColor= 'red';
              if (userGuess < randomNumber){
              lowOrHi.innerHTML = 'Your last guess was too low!';
              }
              if (userGuess > randomNumber){
              lowOrHi.innerHTML = 'Your last guess was too high!';
              }
             }
            }
             guessCount++;
             guessField.value = '';
             guessField.focus();
            }
            
            guessSubmit.addEventListener ('click', checkGuess);
            
            function setGameOver(){
                guessField.disabled = true;
                guessSubmit.disabled = true;
                resetButton.style.display = 'inline';
                resetButton.addEventListener('click', resetGame);
            }
            function resetGame(){
                guessCount = 1;
                var resetParas = document.querySelectorAll('.resultParas p');
                for (var i=0; i < resetParas.length ; i++){
                    resetParas[i].textContent = '';
                }
                resetButton.style.display = 'none';
                guessField.disabled = false;
                guessSubmit.disabled = false;
                guessField.value = '';
                guessField.focus();
                lastResult.style.backgroundColor= 'white';
                randomNumber = Math.floor(Math.random() * 99) + 1;
                
                //console.log (randomNumber);
            }
            
            $("#guessHeader").append("!");
            $("#submitBtn").css("background-color", "cyan");
            $("#guessHeader").css("color", "#364F80")
            $("#guessHeader").css("font-size", "60px")
            $("#guessHeader").css("font-family", "Open sans")

