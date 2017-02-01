 		var clickedTime;
        var createdTime;
        var reactionTime;
        var shapeNum;
       
        
        Date.now();
        
        
        
        // This function initiates the game
        startGame();
        

   
    
        /*
        * This function creates a countdown timer before shape reappears
        *
        */
        function startGame() {
            setTimeout(reappear, randomNum(5000, 0));   
        }
        
    
        
        
        /*
        * This function reacts whenever the user clicks on shape
        *
        */
        document.getElementById("box").onclick=function() {
            clickedTime = Date.now();
            reactionTime = (clickedTime - createdTime)/1000;        
            document.getElementById("displayTime").innerHTML=reactionTime;
            this.style.display="none";
            startGame();
        }
     
 
    
    
        /*
        * This function calculates a random value and returns it
        *
        *@param min - smallestest random value
        *@param max - largest random value
        *@returns randomValue - between 0 and and 5s
        */
        function randomNum(max, min) {
            var randomValue = Math.random() * (max - min) + min;
            return randomValue;
        }
        
        
        
        
        /*
        * This function makes a shape visible 
        *
        */
        function reappear() {
            var x = Math.random(); // generate random number 
			x = 2 * x;
			var shapeNum = Math.floor(x);
           
            if (shapeNum < 1) {
                document.getElementById("box").style.backgroundColor=getRandomColor();
                document.getElementById("box").style.borderRadius="0";
                document.getElementById("box").style.display="block";
                
            } else {    
                document.getElementById("box").style.left=leftPosition() + "px";
                document.getElementById("box").style.top=topPosition() + "px";
                document.getElementById("box").style.backgroundColor=getRandomColor();
                document.getElementById("box").style.borderRadius="100px";
                document.getElementById("box").style.display="block";  
            }
            createdTime = Date.now();
        }
        
        
        
        function getRandomColor() {
            var letters = '0123456789ABCDEF';
            var color = '#';
            for (var i = 0; i < 6; i++ ) {
                color += letters[Math.floor(Math.random() * 16)];
                
            }
            return color;
        }
        
        function topPosition() {
            var y = Math.random(); // generate random number 
			y = 300 * y;
            
			return Math.floor(y);
        }
        
        function leftPosition() {
            var x = Math.random(); // generate random number 
			x = 300 * x;
			return Math.floor(x);
        }
