const delay = ms => new Promise(res => setTimeout(res, ms));

function LogoClick() {
    var element = document.getElementById("img");
    element.classList.add("animation");
    element.classList.remove("Pulse");

    var container = document.getElementById("container");
    container.classList.add("exist");
    container.classList.remove("noexist");
  } 

  function LoginStep2(){
    var loginform = document.getElementById("loginform");
    loginform.classList.remove("loginformno");
    loginform.classList.add("loginformdisplay");




  }

  function Login(){
    var centerlogin = document.getElementById("login");
    var centerregister = document.getElementById("register");
    var containermanip = document.getElementById("container");
    var loginform = document.getElementById("loginform");
    centerlogin.classList.add("loginanimationin");
    centerlogin.classList.remove("loginanimationout");
    centerlogin.classList.remove("buttoncraft");
    centerlogin.classList.add("nbcraftlogin");
    centerregister.classList.add("registeranimationout");
    centerregister.classList.add("noexist");
    containermanip.classList.add("containeranimin");
    loginform.classList.add("loginanimation");
    document.getElementById("container").id = 'containerready';
    setTimeout(function () {
        LoginStep2(); // ...
    }, 800);
  




  }


  function RegisterStep2(){
    var registerform = document.getElementById("registerform");
    registerform.classList.remove("registerformno");
    registerform.classList.add("registerformdisplay");




  }

  function Register(){
    var registerlogin = document.getElementById("register");
    var centerlogin = document.getElementById("login");
    var containermanip = document.getElementById("container");
    var registerform = document.getElementById("registerform");
    registerlogin.classList.add("registeranimationin");
    registerlogin.classList.remove("registeranimationout");
    registerlogin.classList.remove("buttoncraft");
    registerlogin.classList.add("nbcraftregister");
    centerlogin.classList.add("loginanimationout");
    centerlogin.classList.add("noexist");
    containermanip.classList.add("containeranimin");
    registerform.classList.add("registeranimation");
    document.getElementById("container").id = 'containerready';
    setTimeout(function () {
        RegisterStep2(); // ...
    }, 800);

  }

  function ChatIconAppearPartTwo(){
    var chatapp = document.getElementById("chatopen");
    chatapp.classList.add("noexist");
    chatapp.classList.remove("home");

    var byeapp = document.getElementById("chatclose");
    byeapp.classList.add("home");
    byeapp.classList.remove("noexist");

    var hellochat = document.getElementById("chatentry");
    hellochat.classList.add("chatsystem");
    hellochat.classList.remove("noexist");
    hellochat.classList.add("popin")
  }

  function ChatIconAppearPartOne() {
    var chatapp = document.getElementById("chatopen");
    chatapp.classList.add("fadeout");
    setTimeout(function () {
      ChatIconAppearPartTwo(); // ...
  }, 100);

   } 


   function ChatIconByePartThree() {
    var hellochat = document.getElementById("chatentry");
    hellochat.classList.remove("chatsystem");
    hellochat.classList.add("noexist");
    hellochat.classList.remove("popout");
   }

   function ChatIconByePartTwo(){
    var chatapp = document.getElementById("chatclose");
    chatapp.classList.add("noexist");
    chatapp.classList.remove("home");

    var byeapp = document.getElementById("chatopen");
    byeapp.classList.add("home");
    byeapp.classList.remove("noexist");

    var hellochat = document.getElementById("chatentry");

    hellochat.classList.add("popout");
    setTimeout(function () {
      ChatIconByePartThree(); // ...
  }, 300);


  }

  function ChatIconByePartOne() {
    var chatapp = document.getElementById("chatclose");
    chatapp.classList.add("fadeout");
    setTimeout(function () {
      ChatIconByePartTwo(); // ...
  }, 100);

   } 

