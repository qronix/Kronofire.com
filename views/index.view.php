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
        <div id="heroCTA">
            <a href="#">Learn more</a>
        </div>
    </div>
    <div id="content" class="hidden">

    </div>
    <div id="particles-js"></div>


<script src="/vendor/scripts/particles.js"></script>
<script type="text/javascript">
     particlesJS.load('particles-js','/vendor/scripts/particlesjs-config.json');
</script>

<script type="text/javascript">

    function setupButton(){
        var ctaButton = document.getElementById("heroCTA");
        var heroPanel = document.getElementById("heroPanel");
        var heroImg = document.getElementById("heroImg");
        var contentPanel = document.getElementById("content");


        ctaButton.addEventListener("click",async function(event){
            heroPanel.classList.add("flyOut");
            heroImg.classList.add("flyOut");
            event.preventDefault();

            await sleep(1000).then(function(){
                heroPanel.classList.add("hidden");
                heroImg.classList.add("hidden");
            });

            $.ajax({
                url:"/main",
                type:'post',
                data:{'action':'load'},
                success:function(data){
                    contentPanel.innerHTML = data;
                    contentPanel.classList.remove("hidden");
                    var particles = document.querySelector(".particles-js-canvas-el");
                    particles.classList.add("blur_4px");
                },
                error: function(xhr,desc,err){
                    console.log(xhr);
                    console.log("Details: " + desc + "\nError:" + err);
                }
            });
        });
    }


    function buildDescription(){
        var missionStatement = "Modern software and web development";
        var missionStatementPieces= missionStatement.split('');
        var heroDescription = document.querySelector("#heroDescription");

        missionStatementPieces.forEach(function(piece){
            heroDescription.innerHTML += "<p class='descriptionPieceHidden'>"+piece+"</p>";
        });
        showDescription();
    }

    function sleep(ms){
        return new Promise(resolve=>setTimeout(resolve,ms));
    }

    function showDescription(){
        var pieces = document.querySelectorAll(".descriptionPieceHidden");
        var maxChanges = 1;

        pieces.forEach( async function (piece) {
             await sleep(50).then(function(){
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
                    ,50);
            });
        });
    }
    window.onload = buildDescription();
    setupButton();


</script>


<?php

include_once ('includes/footer.php');

?>