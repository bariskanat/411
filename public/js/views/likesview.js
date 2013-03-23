App.Views.Likes=Backbone.View.extend({
 
    initialize:function(){
       
    },
        
    render:function(){
       this.$el.html(this.template(this.model.toJSON()));
       return this;
      
    },
    
   template:_.template($("#useredittemplate").html())
    
});




