    var div=document.getElementById("is_form");
    var display=0;

    function Form(){
        if(display==1){
            div.style.display='block';
            display=0;
        }
        else{
            div.style.display='none';
            display=1;
        }
    }