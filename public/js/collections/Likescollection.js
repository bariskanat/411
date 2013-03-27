var App=App || {};

App.Collections.PhotoLikes=Backbone.Collection.extend({
    
    
    initialize:function(models,options)
    {
        this.photoId=options.id;
    },
        
    url:function()
    {
      return "../likes/"+this.photoId;
    },
        
     youlike:function()
     {        
       return this.filter(function(like){
           return like.get("userlike");
       }).length;
   
     
     },
        
    model:App.Models.PhotoLikes
    
    
    
});

