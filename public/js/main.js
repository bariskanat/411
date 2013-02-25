(function(){
    window.App={};
    App.login={
     
        
        defaults:{
            Effect:"fadeIn",
            Speed:500,      
            Url: "searchlogin",            
            zindex:2,
            Htmlnode:$("#username")
           
            
        },
    
    
       init:function(config){
           $.extend(this.defaults,config);
            
           this.bindEvents();
           
       },
           
       bindEvents:function(){
         
          this.defaults.Htmlnode.keyup(this.startSearch);
       },
           
       startSearch:function(){
   
         if($.trim($(this).val()).length>3)
         {
            ajaxrequest=App.login.getAjax({data:$.trim($(this).val())});
            
            App.login.handleRequestAjax(ajaxrequest);
         }
       },
           
          
         getAjax:function(data){
           
            return $.ajax({               
                   type: "POST",
                   url: App.login.defaults.Url,
                   contentType:'application/json',
                   data: JSON.stringify(data),
                   dataType: "json"
              });
         },
             
             
           handleRequestAjax:function(request){
             
             request.done(function(data){
                 
                App.login.template(data);

              });

             
            
         },
             
         template:function(info){
          
          if($("span.info").length)
          {
              $("span.info").remove();
          }
      
          $("<span ></span>",{text:info.data,class:"info"}).appendTo(App.login.defaults.Htmlnode.parent());
          
         }
             
    
    };
    
    
    
    
    
    
    
})();

App.login.init();


//console.log(login);
