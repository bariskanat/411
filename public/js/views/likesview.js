
App.Views.PhotoLikes=Backbone.View.extend({
 
    initialize:function(){
       this.render();
       
    },
        
    render:function(){
       this.collection.fetch();    
       console.log(this.collection.toJSON());
       //this.$el.html(this.template(this.model.toJSON()));
      //return this;
      
    }
   
   
    
});








