//Conexão entre os layouts e criação do tempo de carga.
(function(){

   var preload = document.getElementById("abertura");
   var loading = 0;
   var id = setInterval(frame, 64);
   
   function frame() {
       if(loading == 20){
           clearInterval(id);
           window.open("index.php", "_slef", "toolbar=yes,scrollbars=yes,resizable=no,top=400,left=500,width=400,height=800");
     } else{
         loading = loading + 1;
         if (loading == 90) {
             preload.style.animation = "fadeout 1s ease";
         }
     } 

   }


})();