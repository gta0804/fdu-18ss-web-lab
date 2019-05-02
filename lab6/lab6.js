window.onload=function(){
    var bigPicture=document.getElementById("featured").getElementsByTagName("img");
    var smallPicture=document.getElementById("thumbnails").getElementsByTagName("img");
    var figCaption=document.getElementById("featured").getElementsByTagName("figcaption");
    var i;
    var onclickFunction;
    var pictureSrc;
    var title =new Array("Battle","Luneburg","Bermuda","Athens","Florence");
    var figure=document.getElementById("featured");

    for(i=0;i<smallPicture.length;i++){
        click(i);
        }

    function click(i){
        smallPicture[i].onclick=function () {
            bigPicture[0].src=this.src.replace("small","medium");
            bigPicture[0].title=this.title;
            figCaption[0].innerHTML=this.title;
        }
    }

    figure.onmouseover=function(){
        setOpacityUp(figCaption[0],12.5);
    };

    figure.onmouseout=function(){
        setOpacityDown(figCaption[0],12.5);
    }

    function setOpacityUp(element,number){
        if(Math.abs(element.style.opacity-0.8)>0.001){
            var count=0;
            var timer;
            timer=setInterval(function(){
                count++;
                element.style.opacity=count*0.01;
                if(count>=80){
                    clearInterval(timer);
                }
            },number);


        }
    }

    function setOpacityDown(element,number){
        if(Math.abs(element.style.opacity-0)>0.001){
            var count = 80;
            var timer;
            timer=setInterval(function(){
                count--;
                element.style.opacity=count*0.01;
                if(count<=0){
                    clearInterval(timer);
                }
            },number);


        }
    }

};