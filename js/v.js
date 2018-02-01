// 

$(document).ready(function () { 
    document.querySelector( "form" )
        .addEventListener( "invalid", function( event ) {
            event.preventDefault();
        }, true );
});

function Validate(_this){
    var spanerrormsg = document.getElementById("span-error-msg");
    var spanwarningmsg = document.getElementById("span-warning-msg");
    var divicon = document.getElementById("div-icon");
    spanerrormsg.innerHTML = "";
    spanwarningmsg.innerHTML = "";

    if(_this.validity.valueMissing){
        $(divicon).css({"border": "1px solid #fff", "color":"red", "background-color":"#fff"});
        if(_this.name == "email"){
            spanerrormsg.innerHTML = "<span class='span-arrow'></span> Cannot be left blank.";
            if($(spanwarningmsg).is(":visible")){
                $(spanwarningmsg).fadeOut('fast',function () { 
                    $(divicon).css("color","red");
                        $(spanerrormsg).fadeIn('fast',function () { 
                    });
                });
            }else{
                $(spanerrormsg).fadeIn('fast',function () { 
                    $(divicon).css("color","red");
                });
            }
        }
    }else{
        $(spanerrormsg).fadeOut('fast',function () { 
            spanerrormsg.innerHTML = "";
            if(_this.validity.typeMismatch){
                $(divicon).css({"border": "1px solid #fff", "color":"red", "background-color":"#fff"});
                if(_this.name == "email"){
                    spanwarningmsg.innerHTML = "<span class='span-arrow0'></span> e.g [ you@example.com ]";
                    $(divicon).css("color","orange");
                    $(spanwarningmsg).fadeIn('fast',function () { 
                    });
                }
            }else{
                $(divicon).css({"border": "1px solid #fff", "color":"#bbb", "background-color":"#fff"});
                if($(spanwarningmsg).is(":visible")){
                    $(spanwarningmsg).fadeOut('fast',function () { 
                    });
                }
            }
        });
    }
}

function Validate0(_this){
    var spanerrormsg = document.getElementById("span-error-msgp1");
    var spanwarningmsg = document.getElementById("span-warning-msgp1");
    var divicon = document.getElementById("div-icon1");
    spanerrormsg.innerHTML = "";
    spanwarningmsg.innerHTML = "";

    if(_this.validity.valueMissing){
        $(divicon).css({"border": "1px solid #fff", "color":"red", "background-color":"#fff"});
        if(_this.name == "password"){
            spanerrormsg.innerHTML = "<span class='span-arrow'></span> Cannot be left blank.";
            if($(spanwarningmsg).is(":visible")){
                $(spanwarningmsg).fadeOut('fast',function () { 
                    $(divicon).css("color","red");
                        $(spanerrormsg).fadeIn('fast',function () { 
                    });
                });
            }else{
                $(spanerrormsg).fadeIn('fast',function () { 
                    $(divicon).css("color","red");
                });
            }
        }
    }else{
        $(spanerrormsg).fadeOut('fast',function () { 
            spanerrormsg.innerHTML = "";
            if(_this.validity.typeMismatch){
                $(divicon).css({"border": "1px solid #fff", "color":"red", "background-color":"#fff"});
                if(_this.name == "password"){
                    spanwarningmsg.innerHTML = "<span class='span-arrow0'></span> e.g [ you@example.com ]";
                    $(divicon).css("color","orange");
                    $(spanwarningmsg).fadeIn('fast',function () { 
                    });
                }
            }else{
                $(divicon).css({"border": "1px solid #fff", "color":"#bbb", "background-color":"#fff"});
                if($(spanwarningmsg).is(":visible")){
                    $(spanwarningmsg).fadeOut('fast',function () { 
                    });
                }
            }
        });
        
    }
}

function ValidateTextMissing(_this){
    var id = $(_this).attr("data-id");
    var divicon = document.getElementById("div-icon");
    document.getElementById("span-error-msgq"+id).innerHTML = "";

    if(_this.validity.valueMissing){
        $(divicon).css({"border": "1px solid #fff", "color":"red", "background-color":"#fff"});
        if(_this.name == "email" || true){
            document.getElementById("span-error-msgq"+id).innerHTML = "<span class='span-arrow'></span> Answer is required.";
            $(divicon).css("color","red");
            $(document.getElementById("span-error-msgq"+id)).fadeIn('fast',function () { 
            });
        }
    }else{
        $(document.getElementById("span-error-msgq"+id)).fadeOut('fast',function () { 
            document.getElementById("span-error-msgq"+id).innerHTML = "";
        });
    }
}

function ValidatePassword(_this){
    var id = $(_this).attr("data-id");
    var txtRePass = document.getElementById("txtRePass");
    var txtPass = document.getElementById("txtPass");
    document.getElementById("span-error-msgp"+id).innerHTML = "";

    if(_this.validity.valueMissing){
        $(document.getElementById("div-icon"+id)).css({"border": "1px solid #fff", "color":"red", "background-color":"#fff"});
        if(_this.name == "email" || true){
            document.getElementById("span-error-msgp"+id).innerHTML = "<span class='span-arrow'></span> Cannot be left blank.";
            //$(document.getElementById("div-icon"+id)).css("color","red");
            $(document.getElementById("span-error-msgp"+id)).fadeIn('fast',function () { 
            });
        }
    }else{
        if(_this.validity.patternMismatch){
            document.getElementById("span-error-msgp"+id).innerHTML = "<span class='span-arrow'></span> Password must contain 6 or more characters.";
            $(document.getElementById("div-icon"+id)).css("color","red");
            $(document.getElementById("span-error-msgp"+id)).fadeIn('fast',function () { 
            });
        }
        else{
            if(txtRePass.value != "" && txtPass.value != ""){
                if(txtRePass.value != txtPass.value){
                    document.getElementById("span-error-msgp" + id).innerHTML = "<span class='span-arrow'></span> Password do not match.";
                    $(document.getElementById("div-icon" + id)).css("color","red");
                    $(document.getElementById("span-error-msgp" + id)).fadeIn('fast',function () { 
                    });
                }else{
                    $(document.getElementById("div-icon"+id)).css("color","#bbb");
                    $(document.getElementById("span-error-msgp"+id)).fadeOut('fast',function () { 
                        document.getElementById("span-error-msgp"+id).innerHTML = "";
                    });
                }
            }else{
                $(document.getElementById("div-icon"+id)).css("color","#bbb");
                $(document.getElementById("span-error-msgp"+id)).fadeOut('fast',function () { 
                    document.getElementById("span-error-msgp"+id).innerHTML = "";
                });
            }
        }
    }
}

function ValidateLF(_this) {
    var id = $(_this).attr("data-id");
    //var divicon = document.getElementById("div-icon" + id);
    document.getElementById("span-error-msg" + id).innerHTML = "";
    document.getElementById("span-warning-msg" + id).innerHTML = "";

    if (_this.validity.valueMissing) {
        $(document.getElementById("div-icon" + id)).css({ "border": "1px solid #fff", "color": "red", "background-color": "#fff" });
        if (_this.name == "email" || true) {
            document.getElementById("span-error-msg" + id).innerHTML = "<span class='span-arrow'></span> Cannot be left blank.";
            if ($(document.getElementById("span-warning-msg" + id)).is(":visible")) {
                $(document.getElementById("span-warning-msg" + id)).fadeOut('fast', function () {
                    $(document.getElementById("div-icon" + id)).css("color", "red");
                    $(document.getElementById("span-error-msg" + id)).fadeIn('fast', function () {
                    });
                });
            } else {
                $(document.getElementById("span-error-msg" + id)).fadeIn('fast', function () {
                    $(document.getElementById("div-icon" + id)).css("color", "red");
                });
            }
        }
    } else {
        $(document.getElementById("span-error-msg" + id)).fadeOut('fast', function () {
            document.getElementById("span-error-msg" + id).innerHTML = "";
            if (_this.validity.typeMismatch) {
                $(document.getElementById("div-icon" + id)).css({ "border": "1px solid #fff", "color": "red", "background-color": "#fff" });
                if (_this.name == "email") {
                    document.getElementById("span-warning-msg" + id).innerHTML = "<span class='span-arrow0'></span> e.g [ you@example.com ]";
                    $(document.getElementById("div-icon" + id)).css("color", "orange");
                    $(document.getElementById("span-warning-msg" + id)).fadeIn('fast', function () {
                    });
                }
            } else {
                $(document.getElementById("div-icon" + id)).css({ "border": "1px solid #fff", "color": "#bbb", "background-color": "#fff" });
                if ($(document.getElementById("span-warning-msg" + id)).is(":visible")) {
                    $(document.getElementById("span-warning-msg" + id)).fadeOut('fast', function () {
                    });
                }
            }
        });
    }
}