

App.Collections.PhotoLikes=Backbone.Collection.extend({
    
    
    initialize:function(models,options)
    {
        this.photoId=options.id;
    },
        
    url:function()
    {
      return "../likes/"+this.photoId;
    },
        
    model:App.Models.PhotoLikes
    
    
    
});

