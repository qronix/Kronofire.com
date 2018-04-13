var video = document.getElementById("fireVid");
video.playbackRate = 0.8;

var checker = setInterval(function(){
    if(video.currentTime>=4){
        video.currentTime=2;
        console.log("Setting time");
    }
},10);
