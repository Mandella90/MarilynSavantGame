const cards = document.querySelectorAll('.card');
var rightCard = document.querySelector('.answer-right');
var wrongCard1 = document.querySelector('.answer-wrong1');
var wrongCard2 = document.querySelector('.answer-wrong2');
var sessionScore = document.getElementById('session-score');
var allTimeScore = document.getElementById('all-time-score');
let firstCard, secondCard;
let winsSame = gamesSame = winsChange = gamesChange = 0;
let sWinsSame = sGamesSame = sWinsChange = sGamesChange = 0;




let hasFlipped = false;


(function shuffle() {
    cards.forEach(card => {
        let randomPos = Math.floor(Math.random()* 3);
        card.style.order = randomPos;
    })})();

function reset(){
rightCard.classList.remove("flip", "disable");
wrongCard1.classList.remove("flip", "disable");
wrongCard2.classList.remove("flip", "disable");
firstCard, secondCard = null;
reshuffle();
}


cards.forEach(card => card.addEventListener('click', flipCard));
function flipCard(){    
    if (!hasFlipped){
        hasFlipped = true;
        firstCard = this;
        firstChoice();
    }else {
        hasFlipped = false;
        secondCard = this;
        secondChoice();
        score();
        ajaxUpdate();
        // resetSQL();
        setTimeout(() => { reset();},800);
    }
}


function firstChoice() {
    if(firstCard == wrongCard1){  
        flip(wrongCard2);
    }else if(firstCard == wrongCard2){
        flip(wrongCard1);
    }else {
        pickedRightCard();
    }
    console.log(firstCard);
}


function pickedRightCard() {
    let rando = Math.floor(Math.random() * 2);
    if(rando == 0){
        flip(wrongCard1);      
    }else{
        flip(wrongCard2);
    }
}

////////////// SQL FUNCTIONS SQL FUNCTIONS SQL FUNCTIONS SQL FUNCTIONS SQL FUNCTIONS
function secondChoice(){
    flip(secondCard);
    if(secondCard == firstCard && secondCard == rightCard){
        winsSameCard();
    }else if(secondCard == rightCard && secondCard != firstCard){
        winsChangeCard();
    }else if(secondCard == firstCard && secondCard != rightCard){
        lossSameCard();
    }else{
        lossChangeCard();
    }


}

function reset(){
    
    rightCard.classList.remove("flip", "disable");
    wrongCard1.classList.remove("flip", "disable");
    wrongCard2.classList.remove("flip", "disable");
    firstCard, secondCard = null;
    reshuffle();
    }
function reshuffle() {
    cards.forEach(card => {
        let randomPos = Math.floor(Math.random()* 3);
        card.style.order = randomPos;
    })}



function winsSameCard(){
    winsSame++;
    gamesSame++;
    allWinsSame++;
    allGamesSame++;
    sGamesSame++;
    sWinsSame++;
}
function lossSameCard(){
    gamesSame++;
    allGamesSame++;
    sGamesSame++;
}
function winsChangeCard(){
    winsChange++;
    gamesChange++;
    allWinsChange++;
    allGamesChange++;
    sGamesChange++;
    sWinsChange++;
}
function lossChangeCard(){
    gamesChange++;
    allGamesChange++;
    sGamesChange++;
}
function flip(a){
    a.classList.add('flip');
}
function disable(a){
    a.classList.add('disable');
}


function score(){
    let sameWinPerc = Math.floor((winsSame/gamesSame)*100);
    let savantWinPerc = Math.floor((winsChange/gamesChange)*100);
    let allSameWincPerc = Math.floor((allWinsSame/allGamesSame)*100);
    let allSavantWinPerc = Math.floor((allWinsChange/allGamesChange)*100);

    sessionScore.innerHTML = 'Same Card Score: ' + "<span style='margin-left:30px; color:orange;'>" + winsSame + '/' + gamesSame + "<span style='margin-left:30px;'></span>" + '%' + sameWinPerc + "</span><br>" +
    'Savant Card Score: ' + "<span style='margin-left:30px; color:orange;'>" + winsChange + '/' + gamesChange + "<span style='margin-left:30px;'></span>" + '%' + savantWinPerc + "</span>";

    allTimeScore.innerHTML = 'All-Time Same Score: ' + "<span style='margin-left:30px; color:orange;'>" + allWinsSame + '/' + allGamesSame + "<span style='margin-left:30px;'></span>" + '%' + allSameWincPerc + "</span><br>" +
    'All-Time Savant Score: ' + "<span style='margin-left:30px; color:orange;'>" + allWinsChange + '/' + allGamesChange + "<span style='margin-left:30px;'></span>" + '%' + allSavantWinPerc + "</span>";    
}

// function resetSQL(){
//     let sWinsSame = sGamesSame = sWinsChange = sGamesChange = 0;
// }




