(function(){
    window.App={
        Models:{},
        Views:{},
        Collections:{},
        Routes:{}
    };
    App.login={
     
        
        defaults:{
            Effect:"fadeIn",
            Speed:300,      
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
          
          var temp=App.login.defaults;
          if($("span.info").length)
          {
              $("span.info").remove();
          }
      
          $("<span ></span>",{text:info.data,class:"info"}).appendTo(temp.Htmlnode.parent()).hide()[temp.Effect](temp.Speed);
          
         }
             
    
    };
    
   
  
    
    
})();

App.login.init();

App.Models.User=Backbone.Model.extend({
    defaults:{
        
    },
            
    validate:function(args){
        
        if(args.username===""){
            return "you must have username";
        }
    }
    
});

App.Views.User=Backbone.View.extend({
    
    initialize:function(){
        this.model.on('sync',this.render,this);
    },
    render:function(){

    }
});

//console.log(login);


