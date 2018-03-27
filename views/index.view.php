<?php
/**
 * Created by PhpStorm.
 * User: qronix
 * Date: 3/27/18
 * Time: 10:12 AM
 */
include_once ('includes/header.php');

?>
<!--    <link rel="stylesheet" href="./css/style.css" type="text/css">-->

    <div id="heroImg">
<!--        Photo by Chris Rhoads on Unsplash-->
    </div>
    <div id="heroPanel">
        <p id="heroText">Kronofire</p>
        <p id="heroDescription"></p>
<!--        <img src="/resources/img/heroImgSmall.jpg" id="heroImg">-->

    </div>
    <div id="particles-js"></div>


<script src="/vendor/scripts/particles.js"></script>
<script type="text/javascript">
    particlesJS.load('particles-js','/vendor/scripts/particlesjs-config.json');
</script>

<script type="text/javascript">
    function buildDescription(){
        var missionStatement = "Modern software and web development";
        var missionStatementPieces= missionStatement.split('');
        var heroDescription = document.querySelector("#heroDescription");

        missionStatementPieces.forEach(function(piece){
            heroDescription.innerHTML += "<p class='descriptionPieceHidden'>"+piece+"</p>";
        });
        showDescription();
    }

    function reveal(ms){
        return new Promise(resolve=>setTimeout(resolve,ms));
    }

    function showDescription(){
        var pieces = document.querySelectorAll(".descriptionPieceHidden");
        var maxChanges = 1;
        console.log("Max changes are:" + maxChanges);

        pieces.forEach( async function (piece) {
             await reveal(5).then(function(){
                var currentChanges = 0;
                piece.classList.remove("descriptionPieceHidden");
                piece.classList.add("descriptionPieceShown");
                var realContents = piece.innerHTML;

                var changer = setInterval(function(){
                        if(currentChanges<maxChanges){
                            var junkChar = Math.floor(32+Math.random()*94);
                            piece.innerText = String.fromCharCode(junkChar);
                            currentChanges++;
                        }else{
                            piece.innerHTML = realContents;
                            maxChanges+=1;
                            clearInterval(changer);
                        }
                    }.bind(piece)
                    ,5);
            });
        });
    }
    window.onload = buildDescription();


</script>


<?php

include_once ('includes/footer.php');

?>